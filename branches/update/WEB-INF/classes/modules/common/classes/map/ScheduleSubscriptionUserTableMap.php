<?php



/**
 * This class defines the structure of the 'common_scheduleSubscriptionUser' table.
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
class ScheduleSubscriptionUserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'common.classes.map.ScheduleSubscriptionUserTableMap';

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
		$this->setName('common_scheduleSubscriptionUser');
		$this->setPhpName('ScheduleSubscriptionUser');
		$this->setClassname('ScheduleSubscriptionUser');
		$this->setPackage('common.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('SCHEDULESUBSCRIPTIONID', 'Schedulesubscriptionid', 'INTEGER' , 'common_scheduleSubscription', 'ID', true, null, null);
		$this->addForeignPrimaryKey('USERID', 'Userid', 'INTEGER' , 'users_user', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ScheduleSubscription', 'ScheduleSubscription', RelationMap::MANY_TO_ONE, array('scheduleSubscriptionId' => 'id', ), 'CASCADE', null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // ScheduleSubscriptionUserTableMap
