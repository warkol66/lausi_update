<?php
/*
* Filename        : WEB-INF/boot.ini.php
* @package phpMVCconfig
*
*/

// Timer reporting. 1=on, 0=off
$timerRun = 0;

// The application XML configuration data set:
// array[config-key] => array(config-name, force-compile)
// Eg: $appXmlCfgs['config'] = array('name'=>'phpmvc-config.xml', 'fc'=>True);
$appXmlCfgs = array();
$appXmlCfgs['config'] = array('name'=>'phpmvc-config.xml', 'fc'=>False);

require_once("$appDir/config/generate_config.php");
require_once("$appDir/config/load_config.php");

// Set the application path (no trailing slash).
$moduleRootDir = $appDir.'/'; 

// En archivo config.php
// Set php.MVC library root directory (no trailing slash).
//$appServerRootDir = 'D:\Lib\php\phpmvc';

// Set the framework prepend file and XML (Digester) prepend file to use.
#$globalPrepend		= 'globalPrepend.php';				// <<< DEPRECIATED
$globalPrepend			= 'GlobalPrependEx.php';			// <<< NEW
#$globalPrepend		= 'GlobalPrependEx_Perform.php';	// <<< PERFORMANCE
$globalPrependXML		= 'GlobalPrependXMLEx.php';		// XML (Digester) prepend file



// Setup the application specific ActionDispatcher (RequestDispatcher)
$actionDispatcher = 'SmartyActionDispatcher';

// Relative path to the phpmvc configuration files
$configPath = 'WEB-INF';											// ['./WEB-INF'] no trailing slash

// Setup the module paths
$modulePath = 'WEB-INF/ModulePaths.php';

// Include application specific classes
$prependFile = 'WEB-INF/Prepend.php';

// Action ID [do]
$actionID = 'do';

