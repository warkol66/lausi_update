<?php

abstract class BaseTest {
	private $con;
	
	public function run() {
		try {
			$appDir = dirname(__FILE__) . '/..';
			$configDbFromPropel = include("$appDir/config/application-conf.php");
			$configDbData = $configDbFromPropel["datasources"]["application"]["connection"];
			$this->con = new PDO($configDbData['dsn'], $configDbData['user'], $configDbData['password']);
		} catch (PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}
		
		$oRefl = new ReflectionClass ( get_class($this) );
        if ( is_object($oRefl) ) {
        	$arrMethods = $oRefl->getMethods();
        	foreach($arrMethods as $method) {
        		$methodName = $method->getName();
        		if (substr($methodName, -4) == 'Test') {
        			$method->invoke($this);
        		}
        	}
        }
	}
	
	protected function getConnection() {
		return $this->con;
	}
}
