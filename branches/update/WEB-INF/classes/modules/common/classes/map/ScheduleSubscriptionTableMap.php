<?php



/**
 * This class defines the structure of the 'common_scheduleSubscription' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.common.classes.map
 */
class ScheduleSubscriptionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'common.classes.map.ScheduleSubscriptionTableMap';

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
		$this->setName('common_scheduleSubscription');
		$this->setPhpName('ScheduleSubscription');
		$this->setClassname('ScheduleSubscription');
		$this->setPackage('common.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 100, null);
		$this->addForeignKey('ENTITYNAME', 'Entityname', 'VARCHAR', 'modules_entity', 'NAME', false, 50, null);
		$this->addForeignKey('ENTITYDATEFIELDUNIQUENAME', 'Entitydatefielduniquename', 'VARCHAR', 'modules_entityField', 'UNIQUENAME', false, 100, null);
		$this->addForeignKey('ENTITYBOOLEANFIELDUNIQUENAME', 'Entitybooleanfielduniquename', 'VARCHAR', 'modules_entityField', 'UNIQUENAME', false, 100, null);
		$this->addColumn('ANTICIPATIONDAYS', 'Anticipationdays', 'INTEGER', false, null, null);
		$this->addForeignKey('ENTITYNAMEFIELDUNIQUENAME', 'Entitynamefielduniquename', 'VARCHAR', 'modules_entityField', 'UNIQUENAME', false, 100, null);
		$this->addColumn('EXTRARECIPIENTS', 'Extrarecipients', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ModuleEntity', 'ModuleEntity', RelationMap::MANY_TO_ONE, array('entityName' => 'name', ), 'CASCADE', null);
    $this->addRelation('ModuleEntityFieldRelatedByEntitynamefielduniquename', 'ModuleEntityField', RelationMap::MANY_TO_ONE, array('entityNameFieldUniqueName' => 'uniqueName', ), 'CASCADE', null);
    $this->addRelation('ModuleEntityFieldRelatedByEntitydatefielduniquename', 'ModuleEntityField', RelationMap::MANY_TO_ONE, array('entityDateFieldUniqueName' => 'uniqueName', ), 'CASCADE', null);
    $this->addRelation('ModuleEntityFieldRelatedByEntitybooleanfielduniquename', 'ModuleEntityField', RelationMap::MANY_TO_ONE, array('entityBooleanFieldUniqueName' => 'uniqueName', ), 'CASCADE', null);
    $this->addRelation('ScheduleSubscriptionUser', 'ScheduleSubscriptionUser', RelationMap::ONE_TO_MANY, array('id' => 'scheduleSubscriptionId', ), 'CASCADE', null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null);
	} // buildRelations()

} // ScheduleSubscriptionTableMap
