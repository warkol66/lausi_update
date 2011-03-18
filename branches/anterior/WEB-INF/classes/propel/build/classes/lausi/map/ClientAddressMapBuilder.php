<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'lausi_clientAddress' table to 'lausi' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * 10/03/08 16:25:59
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lausi.map
 */
class ClientAddressMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.map.ClientAddressMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('lausi');

		$tMap = $this->dbMap->addTable('lausi_clientAddress');
		$tMap->setPhpName('ClientAddress');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STREET', 'Street', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NUMBER', 'Number', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('INTERSECTION', 'Intersection', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LATITUDE', 'Latitude', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('LONGITUDE', 'Longitude', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('CIRCUITID', 'Circuitid', 'int', CreoleTypes::INTEGER, 'lausi_circuit', 'ID', false, null);

		$tMap->addForeignKey('CLIENTID', 'Clientid', 'int', CreoleTypes::INTEGER, 'lausi_client', 'ID', true, null);

		$tMap->addForeignKey('REGIONID', 'Regionid', 'int', CreoleTypes::INTEGER, 'lausi_region', 'ID', false, null);

	} // doBuild()

} // ClientAddressMapBuilder