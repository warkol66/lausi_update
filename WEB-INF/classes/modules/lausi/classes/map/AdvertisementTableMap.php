<?php



/**
 * This class defines the structure of the 'lausi_advertisement' table.
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
class AdvertisementTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.AdvertisementTableMap';

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
		$this->setName('lausi_advertisement');
		$this->setPhpName('Advertisement');
		$this->setClassname('Advertisement');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('PUBLISHDATE', 'Publishdate', 'DATE', true, null, null);
		$this->addColumn('DURATION', 'Duration', 'INTEGER', true, null, null);
		$this->addForeignKey('BILLBOARDID', 'Billboardid', 'INTEGER', 'lausi_billboard', 'ID', true, null, null);
		$this->addForeignKey('THEMEID', 'Themeid', 'INTEGER', 'lausi_theme', 'ID', true, null, null);
		$this->addForeignKey('WORKFORCEID', 'Workforceid', 'INTEGER', 'lausi_workforce', 'ID', false, null, 0);
		// validators
		$this->addValidator('PUBLISHDATE', 'required', 'propel.validator.RequiredValidator', '', 'Es necesario especificar la fecha de publicación.');
		$this->addValidator('DURATION', 'required', 'propel.validator.RequiredValidator', '', 'Es necesario especificar la duración de la publicación.');
		$this->addValidator('BILLBOARDID', 'required', 'propel.validator.RequiredValidator', '', 'Es necesario especificar una cartelera.');
		$this->addValidator('THEMEID', 'required', 'propel.validator.RequiredValidator', '', 'Es necesario especificar un motivo.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Billboard', 'Billboard', RelationMap::MANY_TO_ONE, array('billboardId' => 'id', ), 'CASCADE', null);
    $this->addRelation('Theme', 'Theme', RelationMap::MANY_TO_ONE, array('themeId' => 'id', ), null, null);
    $this->addRelation('Workforce', 'Workforce', RelationMap::MANY_TO_ONE, array('workforceId' => 'id', ), null, null);
	} // buildRelations()

} // AdvertisementTableMap
