<?php



/**
 * This class defines the structure of the 'lausi_address' table.
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
class AddressTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.AddressTableMap';

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
		$this->setName('lausi_address');
		$this->setPhpName('Address');
		$this->setClassname('Address');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('STREET', 'Street', 'VARCHAR', true, 100, null);
		$this->addColumn('NUMBER', 'Number', 'INTEGER', false, null, null);
		$this->addColumn('RATING', 'Rating', 'INTEGER', false, null, null);
		$this->addColumn('INTERSECTION', 'Intersection', 'VARCHAR', false, 100, null);
		$this->addColumn('OWNER', 'Owner', 'VARCHAR', false, 100, null);
		$this->addColumn('LATITUDE', 'Latitude', 'NUMERIC', false, 12, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'NUMERIC', false, 12, null);
		$this->addForeignKey('REGIONID', 'Regionid', 'INTEGER', 'lausi_region', 'ID', false, null, null);
		$this->addColumn('OWNERPHONE', 'Ownerphone', 'VARCHAR', false, 100, null);
		$this->addColumn('ORDERCIRCUIT', 'Ordercircuit', 'INTEGER', false, null, 0);
		$this->addColumn('NICKNAME', 'Nickname', 'VARCHAR', false, 100, '');
		$this->addColumn('ENUMERATION', 'Enumeration', 'VARCHAR', false, 15, null);
		$this->addColumn('CREATIONDATE', 'Creationdate', 'DATE', false, null, null);
		$this->addColumn('DELETIONDATE', 'Deletiondate', 'DATE', false, null, null);
		$this->addColumn('HASGRILLE', 'Hasgrille', 'BOOLEAN', false, null, false);
		$this->addForeignKey('CIRCUITID', 'Circuitid', 'INTEGER', 'lausi_circuit', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Circuit', 'Circuit', RelationMap::MANY_TO_ONE, array('circuitId' => 'id', ), null, null);
    $this->addRelation('Region', 'Region', RelationMap::MANY_TO_ONE, array('regionId' => 'id', ), null, null);
    $this->addRelation('AddressPhoto', 'AddressPhoto', RelationMap::ONE_TO_MANY, array('id' => 'addressId', ), null, null);
    $this->addRelation('Billboard', 'Billboard', RelationMap::ONE_TO_MANY, array('id' => 'addressId', ), 'CASCADE', null);
    $this->addRelation('Photo', 'Photo', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null);
	} // buildRelations()

} // AddressTableMap
