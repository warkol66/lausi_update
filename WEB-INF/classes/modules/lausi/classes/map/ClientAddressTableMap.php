<?php



/**
 * This class defines the structure of the 'lausi_clientAddress' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lausi.classes.map
 */
class ClientAddressTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.ClientAddressTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('lausi_clientAddress');
		$this->setPhpName('ClientAddress');
		$this->setClassname('ClientAddress');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('STREET', 'Street', 'VARCHAR', true, 100, null);
		$this->addColumn('NUMBER', 'Number', 'INTEGER', false, null, null);
		$this->addColumn('INTERSECTION', 'Intersection', 'VARCHAR', false, 100, null);
		$this->addColumn('LATITUDE', 'Latitude', 'FLOAT', false, null, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'FLOAT', false, null, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', false, 100, null);
		$this->addForeignKey('CIRCUITID', 'Circuitid', 'INTEGER', 'lausi_circuit', 'ID', false, null, null);
		$this->addForeignKey('CLIENTID', 'Clientid', 'INTEGER', 'lausi_client', 'ID', true, null, null);
		$this->addForeignKey('REGIONID', 'Regionid', 'INTEGER', 'lausi_region', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Circuit', 'Circuit', RelationMap::MANY_TO_ONE, array('circuitId' => 'id', ), null, null);
    $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('clientId' => 'id', ), null, null);
    $this->addRelation('Region', 'Region', RelationMap::MANY_TO_ONE, array('regionId' => 'id', ), null, null);
	} // buildRelations()

} // ClientAddressTableMap
