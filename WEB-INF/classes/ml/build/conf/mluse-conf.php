<?php
// This file generated by Propel convert-props target on 09/27/06 00:18:11
// from XML runtime conf file h:\servidor\multilang_use\runtime-conf.xml
return array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'e:\\temp\\propel.log',
    'ident' => 'mluse',
    'level' => '7',
  ),
  'propel' => 
  array (
    'datasources' => 
    array (
      'mluse' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'mer',
          'username' => 'root',
          'password' => '',
        ),
      ),
      'default' => 'mluse',
    ),
  ),
);