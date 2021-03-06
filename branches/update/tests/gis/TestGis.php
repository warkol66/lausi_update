<?php
require_once "tests/BaseTest.php";
/**
 * Crea algunas tablas para realizar las pruebas
 */

class TestGis extends BaseTest {
	 public function createTablesTest() {
		$con = $this->getConnection();
		$con->beginTransaction();
		try {
			//Eliminamos las tablas si existiesen.
			$con->exec("DROP TABLE IF EXISTS address");
			$con->exec("DROP TABLE IF EXISTS cab");
			
			//Intentamos crearlas
			$con->exec("CREATE TABLE address (
	  			address CHAR(80) NOT NULL,
				  address_loc POINT NOT NULL,
				  PRIMARY KEY(address),
				  SPATIAL KEY(address_loc)
			);");
			$con->exec("CREATE TABLE cab (
			  cab_id INT AUTO_INCREMENT NOT NULL,
			  cab_driver CHAR(80) NOT NULL,
			  cab_loc POINT NOT NULL,
			  PRIMARY KEY(cab_id),
			  SPATIAL KEY(cab_loc)
			);");
			$con->commit();
			
			return true;
		} catch (PDOException $e){
			$con->rollback();
			return false;
		}
	}
	
	public function addDataTest() {
		$con = $this->getConnection();
		$con->beginTransaction();
		try {
			//vaciamos las tablas si tienen algún dato
			$con->exec("TRUNCATE TABLE address");
			$con->exec("TRUNCATE TABLE cab");
			
			//insertamos los datos
			$con->exec("INSERT INTO address VALUES
				('Foobar street 12', GeomFromText('POINT(2671 2500)')),
				('Foobar street 56', GeomFromText('POINT(2971 2520)')),
				('Foobar street 78', GeomFromText('POINT(3171 2510)')),
				('Foobar street 97', GeomFromText('POINT(5671 2530)')),
				('Foobar street 99', GeomFromText('POINT(6271 2460)')),
				('Bloggs lane 10', GeomFromText('POINT(5673 3520)')),
				('Bloggs lane 20', GeomFromText('POINT(5665 3550)')),
				('Bloggs lane 45', GeomFromText('POINT(5571 3510)'))
			;");
			
			$con->exec("INSERT INTO cab VALUES
				(0, 'Joe Bloggs', GeomFromText('POINT(2262 2100)')),
				(0, 'Bill Bloggs', GeomFromText('POINT(2441 1980)')),
				(0, 'Sam Spade', GeomFromText('POINT(5400 3200)'))
			;");
			
			$con->commit();
			
			return true;
		} catch (PDOException $e){
			$con->rollback();
			return false;
		}
	}
	
	public function executeQueryTest() {
		$con = $this->getConnection();
		$con->beginTransaction();
		try {
			$sql = "SELECT
  				c.cab_driver, AsText(c.cab_loc) AS CabCoordinates,AsText(a.address_loc) as AddressCoordinates,
  				round(glength(LineStringFromWKB(LineString(c.cab_loc,a.address_loc)))) AS Distance
				FROM cab c, address a
				WHERE a.address = 'Foobar street 99'
				ORDER BY Distance;";
			
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (empty($result) || !count($result)) {
				return false;
			}
			
			if ($this->isVerbose())	{
				foreach (array_keys($result[0]) as $fieldName) {
					echo $fieldName . "\t";
				}
				echo "\r\n";
				foreach ($result as $row) {
					foreach($row as $field) {
						echo $field . "\t";
					}
					echo "\r\n";
	    		}
    		}
			
			$con->commit();
			return true;
		} catch (PDOException $e){
			$con->rollback();
			return false;
		}	
	}
	
	/**
	 * Obtiene las direcciones ordenadas por proximidad al obelisco.
	 * El cálculo de la distancia se hace mediante la longitud de la linea GIS que une los dos puntos.
	 */
	public function propelAddressGisTest() {
		try {
			$addresses = AddressQuery::create()->withColumn("Round(GLength(LineStringFromWKB(LineString(geomFromText(CONCAT('Point(',`longitude`*10000,' ', `latitude`*10000,')')),geomFromText('Point(-583816 -346037)'))))) / 10000", 'Distance')
											   ->orderBy('Distance')
											   ->find();
			if ($this->isVerbose())
				print_r($addresses);
			
			return true;
		} catch (PropelException $e) {
			if ($this->isVerbose())
				print_r($e);
			return false;
		}
	}
	
	/**
	 * Obtiene las direcciones ordenadas por proximidad al obelisco.
	 * El cálculo de la distancia se hace mediante la norma euclidiana del vector diferencia.
	 */
	public function propelAddressEuclidianNormTest() {
		try {
			$addresses = AddressQuery::create()->withColumn("round(sqrt(pow(abs(`longitude`*10000 - -583816),2) + pow(abs(`latitude`*10000 - -346037),2))) / 10000", 'Distance')
											   ->orderBy('Distance')
											   ->find();
			if ($this->isVerbose())
				print_r($addresses);
			
			return true;
		} catch (PropelException $e) {
			if ($this->isVerbose())
				print_r($e);
			return false;
		}
	}
	
	
	
	public function cleanup() {
		parent::cleanup();
		$con = $this->getConnection();
		$con->beginTransaction();
		try {
			//Eliminamos las tablas si existiesen.
			$con->exec("DROP TABLE IF EXISTS address");
			$con->exec("DROP TABLE IF EXISTS cab");
			
			$con->commit();
			return true;
		} catch (PDOException $e){
			$con->rollback();
			return false;
		}
	}
}