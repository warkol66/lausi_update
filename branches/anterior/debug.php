<?	
$path="WEB-INF/classes/modules/modules/modules.xml";
			/////////
			// parte de carga de xml
			require_once('WEB-INF/classes/includes/assoc_array2xml.php');
			$converter= new assoc_array2xml;
			$xml = file_get_contents($path);
			$arrayXml = $converter->xml2array_ns($xml,":");

			print_r($arrayXml);
?>