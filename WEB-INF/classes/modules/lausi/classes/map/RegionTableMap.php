<?php



/**
 * This class defines the structure of the 'lausi_region' table.
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
class RegionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.RegionTableMap';

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
		$this->setName('lausi_region');
		$this->setPhpName('Region');
		$this->setClassname('Region');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Address', 'Address', RelationMap::ONE_TO_MANY, array('id' => 'regionId', ), null, null);
    $this->addRelation('DeletedAddress', 'DeletedAddress', RelationMap::ONE_TO_MANY, array('id' => 'regionId', ), null, null);
    $this->addRelation('ClientAddress', 'ClientAddress', RelationMap::ONE_TO_MANY, array('id' => 'regionId', ), null, null);
	} // buildRelations()

} // RegionTableMap
