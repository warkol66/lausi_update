<?php 

require_once("config/DBConnection.inc.php");
require_once('includes/mysql_dump.inc.php');
	/**
	 * Generacion de Backups de la base
	 * Tanto para PHP4 como PHP5, y no tiene dependencias con propel
	 * Para que el mismo funcione, debe estar configurado DBConnection.inc.php en /config/
	 *
	 * @todo verificacion de prefijo de tablas.
	 * 
	 */
	class BackupPeer {
		
		var $header = '';
		
		/**
		 * Verifica actualemente si la configuracion de la base tiene prefijo
		 *
		 * @return el prefijo de la tabla si lo tiene, false sino
		 */
		function configHasPrefix() {
			
			$prefix = $this->header;
			if (!empty($prefix))
				return $this->header;
			
			global $system;
			
			$tablePrefix = $system['config']['system']['parameters']['tablePrefix'];
			
			if (empty($tablePrefix))
				return false;
			
			return $tablePrefix;
		}
		
		/**
		 * Permite indicar una cabecera opcional para poder obtener solo un conjunto de tablas
		 * @param string table header
		 */
		function setTableHeader($header) {
			
			$this->header = $header;
			return true;
		}
		
		/**
		 * Obtiene el listado de backups almacenados en el servidor
		 *
		 * @return array de nombres de archivo
		 */
		function getBackupList() {
			
			$path = 'WEB-INF/../backups/';
			$dir = opendir($path);
			$filenames = array();
		
			while ($file = readdir($dir)) {
			
				if (eregi("\.zip",$file)) {
					array_push($filenames,$file);
				}
			
			}
			//ordenamos los nombres de archivo
			sort($filenames);

			return $filenames;
		}
		
		/**
		 * Crea un backup en el servidor
		 *
		 * @todo Ver de donde obtener nombre de sistema
		 * @todo Ver como separar los casos con prefijo solamente
		 * @return true si fue exitoso, false sino
		 */
		function createBackup($path = 'WEB-INF/../backups/') {
			
			$db = new DBConnection();

			$connection = @mysql_connect($db->Host,$db->User,$db->Password);

			require_once('TimezonePeer.php');
			
			$timezonePeer = new TimezonePeer();
			$timestamp = $timezonePeer->getServerTimeOnGMT0();
			$datetime = date('Y-m-d  H:i:s',$timestamp);
			$currentDatetime = Common::getDatetimeOnTimezone($datetime);

			$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.zip';
			
			$dumper = new MySQLDump($db->Database,$path . $filename,false,false);
			
			//verificamos si tiene table prefix
			if (($tablePrefix = BackupPeer::configHasPrefix()) != false)
				$dumper->setTablePrefix($tablePrefix);
				
			$headerAndFooter = $this->getDumpHeaderAndFooter();
			$header = $headerAndFooter["header"];
			$footer = $headerAndFooter["footer"];				
			
			$filecontent = $dumper->doDumpToString();
			
			$filecontents = $header.$filecontent.$footer;

			mysql_close($connection);
			
			BackupPeer::writeToBackupLog('Se ha creado un backup en el servidor');
						
			$zipContents = BackupPeer::getZipFromFile($filecontents);	
			
			if ($fp = fopen($path . $filename, 'a')) {
    			fwrite($fp, $zipContents);

    			fclose($fp);
			}
			else 
				return false;
			
			return true;;
					
		}

		/**
		 * Restaura un backup en del servidor
		 *
		 * @return true si fue exitoso, false sino
		 */		
		function restoreBackup($zipFilename) {
			require_once("zip.class.php"); 
			$zipfile = new zipfile; 
			$zipfile->read_zip($zipFilename);
			
			foreach($zipfile->files as $filea)
			{
				if ($filea["name"] == "dump.sql")
					$sql = $filea["data"];
			} 			

			$db = new DBConnection();
			$connection = @mysql_connect($db->Host,$db->User,$db->Password);


			/*
			* En algun momento hubo problemas con saltos de linea, aparentemente ya no los hay, no logre reproducir
			* archivos generados por el backup con \r\n
			* Supongo ahora haciendo memoria que puede ser lso archivos que alguna vez usamso para correr updates de la base
			* desde el sistema
			*/
			$linefeed = substr($sql, 1, 1000);
			preg_match_all("/\r\n/",$linefeed,$matches);
			if (count($matches) > 5)
				$queries = explode(";\r\n",$sql);
			else
				$queries = explode(";\n",$sql);

			
			//guardamos una copia actual del contenido de la base de datos en el servidor en /backups/restore		
			$this->setTableHeader('actionLogs_');
			$this->createBackup('WEB-INF/../backups/restore/');
			$this->writeToBackupLog('Se ha guardado una copia de resguardo en la base actual en /backups/restore/: ');
			
			foreach ($queries as $query) {
				$query = trim($query);
				if (!empty($query))
					$db->query($query);
			}

			mysql_close($connection);
			
			$text = 'Se ha restaurado el backup en el servidor de nombre de archivo: ' . $filename;
			
			$this->writeToBackupLog($text);
			//mail a administrador
			require_once('libmail.inc.php');
			
			$mail = new Mail();
			
			global $system;
			
			$mail->From($system["config"]["system"]["parameters"]["fromEmail"]);
			$mail->To($system["config"]["system"]["parameters"]["webmasterMail"]);
			$mail->Subject('Restauracion de Backup');
            $mail->Body($text);
            $mail->Send();
			
			return true;
			
		}

		/**
		 * Devuelve el contenido de un backup de archivo
		 *
		 * @return string contenido del backup en SQL
		 */		
		function createFileBackup() {
			
			$db = new DBConnection();

			$connection = @mysql_connect($db->Host,$db->User,$db->Password);
			
			require_once('TimezonePeer.php');
			
			$timezonePeer = new TimezonePeer();
			$timestamp = $timezonePeer->getServerTimeOnGMT0();
			$datetime = date('Y-m-d  H:i:s',$timestamp);
			$currentDatetime = Common::getDatetimeOnTimezone($datetime);
			
			$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.sql';
			
			$dumper = new MySQLDump($db->Database,false,false,false);
			
			//verificamos si tiene table prefix
			if (($tablePrefix = BackupPeer::configHasPrefix()) != false)
				$dumper->setTablePrefix($tablePrefix);
		
			$headerAndFooter = $this->getDumpHeaderAndFooter();
			$header = $headerAndFooter["header"];
			$footer = $headerAndFooter["footer"];

			$filecontent = $dumper->doDumpToString();
			
			$filecontents = $header.$filecontent.$footer;
					
			mysql_close($connection);
			
			BackupPeer::writeToBackupLog('Se ha creado un backup para descarga');
						
			return BackupPeer::getZipFromFile($filecontents);				
		}
		
		/*
		 * Obtiene el header y el footer del dump, con los drop tables y rename con las tablas con camelcase.
		 * 
		 * @return array Header en elemento "header" y footer en elemento "footer"
		 */
		function getDumpHeaderAndFooter() {
			global $moduleRootDir,$osType;
			$header = "";
			$footer = "";
			if ($osType == "WINDOWS") {
				$pathToXml = $moduleRootDir.'/WEB-INF/classes/propel/schema.xml';
				
				$xml = file_get_contents($pathToXml);			
				
				require_once("xml2ary.php");
				$xml2ary = new Xml2ary();
				$array = $xml2ary->getArray($xml);
				$arrayTables = $array["database"]["_c"]["table"];
				
				$tables = array();				
				
				foreach ($arrayTables as $tableElement) {
					$tableName = $tableElement["_a"]["name"];
					if (ereg("[A-Z]",$tableName))
						$tables[] = $tableName;
				}
				
				$header = "#Eliminacion de tablas con camelcase.\n";
				$footer = "#Renombre de tablas con camelcase.\n";
	
				foreach ($tables as $table) {
					$header .= "DROP TABLE ". $table .";\n";
					$footer .= "RENAME TABLE ". strtolower($table) . " TO " . $table .";\n";
				}			
	
				$header .= "\n\n";
				$footer .= "\n\n";			
			}
			return array("header"=>$header, "footer"=>$footer);
		}
		
		function getZipFromFile($file) {
			require_once("zip.class.php");  
			$zipfile = new zipfile; 
			$zipfile->create_dir("."); 
			$zipfile->create_file($file, "dump.sql"); 

			return $zipfile->zipped_file(); 			
		}
		
		/**
		 * Devuelve el contenido de un backup del archivo que este almacenado en el servidor
		 * @param string $filename nombre del archivo
		 * @return string contenido del backup en SQL
		 */		
		function deleteBackup($filename){
			
			$path = 'WEB-INF/../backups/'.$filename;
			
			if (!file_exists($path))
				return false;
				
			$status = unlink($path);
			
			if ($status)
				BackupPeer::writeToBackupLog('Se ha eliminado el backup del servidor de nombre de archivo: ' . $filename);
			
			return $status;
			
		}

		/**
		 * Ontiene el contenido de un backup guardado en el servidor
		 *
		 * @param string nombre del archivo en el servidor
		 * @return string contenido del archivo
		 */		
		function getBackupContents($filename) {

			if (file_exists('WEB-INF/../backups/' . $filename) == false)
				return false;
			$contents = file_get_contents('WEB-INF/../backups/' . $filename);
			
			return $contents;
			
		}
		
		function writeToBackupLog($message) {
			
			$fd = fopen('WEB-INF/logs/backupActivity.log','a+');
			require_once('TimezonePeer.php');
			
			$timezonePeer = new TimezonePeer();
			$timestamp = $timezonePeer->getServerTimeOnGMT0();
			$datetime = date('Y-m-d  H:i:s',$timestamp);
			$currentDatetime = Common::getDatetimeOnTimezone($datetime);
			
			fprintf($fd,"%s\n", $currentDatetime . ' - ' . $message);
			fclose($fd);
			
			return true;
			
		}
		
		/**
		 * Devuelve el contenido de un backup de archivo
		 *
		 * @return string contenido del backup en SQL
		 */		
		function createCustomFileBackup($filecontent) {
											
			return BackupPeer::getZipFromFile($filecontent);				
		}
	
	}//end class

