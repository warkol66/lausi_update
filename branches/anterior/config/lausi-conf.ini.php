<?php
// This file generated by Propel convert-props target on Tue Mar 25 11:33:02 2008
// from XML runtime conf file /home/ak/work/proyectos/lausi/WEB-INF/classes/propel/./runtime-conf.xml
return array (
  'log' => 
  array (
    'type' => 'file',
    'name' => 'e:\\temp\\propel.log',
    'ident' => 'lausi',
    'level' => '7',
  ),
  'propel' => 
  array (
    'datasources' => 
    array (
      'lausi' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost:3316',
          'database' => 'lausi',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'access' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost',
          'database' => 'movedb',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),      
      'new' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost:3316',
          'database' => 'lausi',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),       
      'mluse' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'phptype' => 'mysql',
          'hostspec' => 'localhost:3316',
          'database' => 'lausi',
          'username' => 'root',
          'password' => 'dxukal',
        ),
      ),
      'default' => 'lausi',
    ),
  ),
);
