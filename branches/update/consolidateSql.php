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

echo "SQL: " . $path . "application.sql generado!";