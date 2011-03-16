<?php



/**
 * This class defines the structure of the 'lausi_theme' table.
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
class ThemeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.ThemeTableMap';

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
		$this->setName('lausi_theme');
		$this->setPhpName('Theme');
		$this->setClassname('Theme');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('SHORTNAME', 'Shortname', 'VARCHAR', false, 100, null);
		$this->addColumn('STARTDATE', 'Startdate', 'DATE', true, null, null);
		$this->addColumn('DURATION', 'Duration', 'INTEGER', true, null, null);
		$this->addColumn('SHEETSTOTAL', 'Sheetstotal', 'INTEGER', false, null, null);
		$this->addColumn('TYPE', 'Type', 'INTEGER', false, null, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, null, true);
		$this->addForeignKey('CLIENTID', 'Clientid', 'INTEGER', 'lausi_client', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('clientId' => 'id', ), null, null);
    $this->addRelation('Advertisement', 'Advertisement', RelationMap::ONE_TO_MANY, array('id' => 'themeId', ), null, null);
	} // buildRelations()

} // ThemeTableMap
