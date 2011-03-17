<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'lausi_billboard' table to 'lausi' DatabaseMap object.
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
class BillboardMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.map.BillboardMapBuilder';

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

		$tMap = $this->dbMap->addTable('lausi_billboard');
		$tMap->setPhpName('Billboard');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMBER', 'Number', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE', 'Type', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HEIGHT', 'Height', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ROW', 'Row', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BILLBOARDCOLUMN', 'Billboardcolumn', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('ADDRESSID', 'Addressid', 'int', CreoleTypes::INTEGER, 'lausi_address', 'ID', true, null);

	} // doBuild()

} // BillboardMapBuilder