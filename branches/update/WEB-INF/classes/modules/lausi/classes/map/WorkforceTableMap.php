<?php



/**
 * This class defines the structure of the 'lausi_workforce' table.
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
class WorkforceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.WorkforceTableMap';

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
		$this->setName('lausi_workforce');
		$this->setPhpName('Workforce');
		$this->setClassname('Workforce');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('TELEPHONE', 'Telephone', 'VARCHAR', false, 100, null);
		$this->addColumn('WORKINHEIGHT', 'Workinheight', 'BOOLEAN', false, null, null);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('WorkforceCircuit', 'WorkforceCircuit', RelationMap::ONE_TO_MANY, array('id' => 'workforceId', ), null, null);
    $this->addRelation('Advertisement', 'Advertisement', RelationMap::ONE_TO_MANY, array('id' => 'workforceId', ), 'SET NULL', null);
    $this->addRelation('Circuit', 'Circuit', RelationMap::MANY_TO_MANY, array(), 'SET NULL', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'soft_delete' => array('deleted_column' => 'deleted_at', ),
		);
	} // getBehaviors()

} // WorkforceTableMap
