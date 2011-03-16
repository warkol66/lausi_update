<?php
/**
* Prepend
*
* $author Modulos Empresarios / Egytca
* @package phpMVCconfig
*/


#if(!defined('CONFIGRULESET'))
#	include_once './WEB-INF/configRules/ConfigRuleSet.php';

//includes del phpMVC1.1
  include_once 'Locale.php';
  include_once 'PropertyMessageResources.php';

require_once 'lib/Propel.php';
Propel::init("$moduleRootDir/config/anmaga-conf.php");

//ponemos el server en UTC
date_default_timezone_set('UTC');

require_once("BaseAction.php");
