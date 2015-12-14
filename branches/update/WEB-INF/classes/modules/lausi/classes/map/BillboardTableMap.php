<?php



/**
 * This class defines the structure of the 'lausi_billboard' table.
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
class BillboardTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.BillboardTableMap';

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
		$this->setName('lausi_billboard');
		$this->setPhpName('Billboard');
		$this->setClassname('Billboard');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NUMBER', 'Number', 'INTEGER', true, null, null);
		$this->addColumn('TYPE', 'Type', 'INTEGER', false, null, null);
		$this->addColumn('HEIGHT', 'Height', 'BOOLEAN', false, null, false);
		$this->addColumn('ROW', 'Row', 'INTEGER', false, null, null);
		$this->addColumn('BILLBOARDCOLUMN', 'Billboardcolumn', 'INTEGER', false, null, null);
		$this->addForeignKey('ADDRESSID', 'Addressid', 'INTEGER', 'lausi_address', 'ID', true, null, null);
		// validators
		$this->addValidator('ADDRESSID', 'required', 'propel.validator.RequiredValidator', '', 'Es necesario especificar una direccion.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Address', 'Address', RelationMap::MANY_TO_ONE, array('addressId' => 'id', ), 'CASCADE', null);
    $this->addRelation('Advertisement', 'Advertisement', RelationMap::ONE_TO_MANY, array('id' => 'billboardId', ), 'CASCADE', null);
	} // buildRelations()

} // BillboardTableMap
