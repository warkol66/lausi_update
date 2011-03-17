<?php
/*
* Main
* Dispatcher del phpMVC
* @package phpMVCconfig
*/

// Set error reporting level. See PHP manual: XXVI. Error Handling and Logging Functions
// Note: E_STRICT  (PHP5 compliance) will cause the PHP4 code base to fail.
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// The application root directory
$appDir = NULL;
$appDir = dirname(__FILE__);

include 'config/boot.ini.php';

// Setup application class paths first
include $appServerRootDir.'/WEB-INF/classes/phpmvc/utils/ClassPath.php';

// Setup the app server paths
include $appServerRootDir.'/WEB-INF/GlobalPaths.php';
$globalPaths = GlobalPaths::getGlobalPaths();
$propelVersionPath='WEB-INF/lib/pear/propel/'.$propelVersion.'/runtime';
array_push($globalPaths,$propelVersionPath);
$gPath = ClassPath::getClassPath($appServerRootDir, $globalPaths, $osType);

// Setup the module paths
include $moduleRootDir.$modulePath;
$modulePaths = ModulePaths::getModulePaths();

$mPath = ClassPath::getClassPath($moduleRootDir, $modulePaths, $osType);
$cPath = ClassPath::concatPaths($gPath, $mPath, $osType);

// Set the 'include_path' variables, as used by the file functions
ini_set('include_path', $cPath);
define('CLASSPATH', True);

require_once 'lib/Propel.php';
Propel::init("$moduleRootDir/config/application-conf.php");

//processing using commandline
if (!empty($argc)) {
	foreach ($argv as $value) {
		if ($value != 'Test.php') {
			$parts = explode('=',$value);
			$_REQUEST[$parts[0]] = $parts[1];
			$_POST[$parts[0]] = $parts[1];
			$_GET[$parts[0]] = $parts[1];
		} 
	}
	$_ENV['PHPMVC_MODE_CLI'] = true;
}
else
	$_ENV['PHPMVC_MODE_CLI'] = false;

if (empty($_GET)) {
	printHelp();
	die();
}

include_once 'tests/gis/'.$_GET['testName'].'.php';
if (class_exists($_GET['testName'])) {
	$test = new $_GET['testName'];
	if (method_exists($test, 'run'))
		$test->run($_GET);
	else
		die('No se ha encontrado ninguna prueba con ese nombre');
} else {
	die('No se ha encontrado ninguna prueba con ese nombre');
}

function printHelp() {
	echo 'Script para ejecutar prubeas' . "\r\n";
	echo 'Uso:' . "\r\n";
	echo "\t" . 'Test.php testName=<valor> [<opcion>=<valor> ...]' . "\r\n";
	echo 'Opciones:' . "\r\n";
	echo "\t" . 'testName: nombre de la suite de pruebas a ejecutar, ej: TestGis' . "\r\n";
	echo "\t" . 'run: nombre de un método especifico a ejecutar. Opcional. ej: createTables' . "\r\n";
	echo "\t" . 'verbose: true|false, indica si se imprimen datos adicionales' . "\r\n";
}


