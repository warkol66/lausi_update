<?php



/**
 * This class defines the structure of the 'lausi_workforceCircuit' table.
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
class WorkforceCircuitTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.WorkforceCircuitTableMap';

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
		$this->setName('lausi_workforceCircuit');
		$this->setPhpName('WorkforceCircuit');
		$this->setClassname('WorkforceCircuit');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('WORKFORCEID', 'Workforceid', 'INTEGER' , 'lausi_workforce', 'ID', true, null, null);
		$this->addForeignPrimaryKey('CIRCUITID', 'Circuitid', 'INTEGER' , 'lausi_circuit', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Workforce', 'Workforce', RelationMap::MANY_TO_ONE, array('workforceId' => 'id', ), null, null);
    $this->addRelation('Circuit', 'Circuit', RelationMap::MANY_TO_ONE, array('circuitId' => 'id', ), null, null);
	} // buildRelations()

} // WorkforceCircuitTableMap
