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


