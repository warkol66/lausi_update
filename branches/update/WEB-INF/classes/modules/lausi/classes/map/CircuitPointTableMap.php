<?php



/**
 * This class defines the structure of the 'lausi_circuitPoint' table.
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
class CircuitPointTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.CircuitPointTableMap';

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
		$this->setName('lausi_circuitPoint');
		$this->setPhpName('CircuitPoint');
		$this->setClassname('CircuitPoint');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CIRCUITID', 'Circuitid', 'INTEGER', 'lausi_circuit', 'ID', true, null, null);
		$this->addColumn('LATITUDE', 'Latitude', 'NUMERIC', false, 12, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'NUMERIC', false, 12, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Circuit', 'Circuit', RelationMap::MANY_TO_ONE, array('circuitId' => 'id', ), null, null);
	} // buildRelations()

} // CircuitPointTableMap
