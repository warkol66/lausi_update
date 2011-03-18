<?php

//inicializo y elimino archivos existentes
$path = "WEB-INF/propel/sql/";
if (is_file($path."application.sql"))
	unlink($path."application.sql");
if (is_file($path."change_log.sql"))
	unlink($path."change_log.sql");

//Obtengo el SQL de toda la aplicación
$sqls = file_get_contents($path . "sqldb.map");
$allSql = array();
$allSql = explode("\n", $sqls);

$applicationSql = "";
foreach ($allSql as $sqlFile) {
	$sqlFile = explode("=", $sqlFile);
	$file = $sqlFile[0];
	if (is_file($path.$file))
		$applicationSql .= file_get_contents($path . $file);
}

file_put_contents($path."application.sql",$applicationSql);

require_once "config/config_module.php";
require_once "WEB-INF/classes/modules/backup/classes/BackupPeer.php";
require_once "WEB-INF/classes/includes/Include.inc.php";

$moduleRootDir = dirname(__FILE__);

require_once('config/DBConnection.inc.php');
$db = new DBConnection();
$connection = @mysql_connect($db->Host,$db->User,$db->Password);
		
$queries = explode(";\n",$applicationSql);

foreach ($queries as $query) {
	$query = trim($query);
	if (!empty($query))
		$db->query($query);
}

mysql_close($connection);

echo "Base de datos Instalada con SQL: " . $filename;
