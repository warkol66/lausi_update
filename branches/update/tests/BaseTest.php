<?php

abstract class BaseTest {
	private $con;
	
	private $verbose = false;
	
	protected function startup() { return true; }
	
	protected function cleanup() { return true; }
	
	public function run($options) {
		try {
			$appDir = dirname(__FILE__) . '/..';
			$configDbFromPropel = include("$appDir/config/application-conf.php");
			$configDbData = $configDbFromPropel["datasources"]["application"]["connection"];
			$this->con = new PDO($configDbData['dsn'], $configDbData['user'], $configDbData['password']);
		} catch (PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}
		
		if ($options['verbose'])
			$this->verbose = $options['verbose'];
			
		$this->startup();
		if (!$this->startup()) {
			echo "startup\tFAIL\r\n";
			return;
		}
		if (!empty($options['run'])) {
			$methodName = $options['run'] . 'Test';
			if (method_exists($this, $methodName)) {
				if ($this->$methodName())
					echo $methodName . "\tOK\r\n";
				else
					echo $methodName . "\tFAIL\r\n";
			}
		} else {
			$oRefl = new ReflectionClass ( get_class($this) );
	        if ( is_object($oRefl) ) {
	        	$arrMethods = $oRefl->getMethods();
	        	foreach($arrMethods as $method) {
	        		$methodName = $method->getName();
	        		if (substr($methodName, -4) == 'Test') {
	        			if ($method->invoke($this))
							echo $method->getName() . "\tOK\r\n";
						else
							echo $method->getName() . "\tFAIL\r\n";
	        		}
	        	}
	        }
		}
		if (!$this->cleanup())
			echo "cleanup\tFAIL\r\n";
	}
	
	protected function getConnection() {
		return $this->con;
	}
	
	protected function isVerbose() {
		return $this->verbose;
	}
}
