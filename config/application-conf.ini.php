<?php
// This file generated by Propel 1.6.0-RC2 convert-conf target
// from XML runtime conf file C:\apache\htdocs2\egytca_lausiupdate\branches\update\WEB-INF\propel\runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'application' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost; dbname=lausivia_sistema',
        'user' => 'lausivia_sistema',
        'password' => 'sistema',
      ),
    ),
    'default' => 'application',
  ),
  'debugpdo' => 
  array (
    'logging' => 
    array (
      'details' => 
      array (
        'method' => 
        array (
          'enabled' => true,
        ),
        'time' => 
        array (
          'enabled' => true,
        ),
        'mem' => 
        array (
          'enabled' => true,
        ),
      ),
    ),
  ),
  'log' => 
  array (
    'type' => 'file',
    'name' => 'propel.log',
    'ident' => 'application',
    'level' => '7',
  ),
  'generator_version' => '1.6.0-RC2',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-application-conf.ini.php');
return $conf;