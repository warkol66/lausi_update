<?php



/**
 * This class defines the structure of the 'lausi_addressPhotos' table.
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
class AddressPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lausi.classes.map.AddressPhotoTableMap';

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
		$this->setName('lausi_addressPhotos');
		$this->setPhpName('AddressPhoto');
		$this->setClassname('AddressPhoto');
		$this->setPackage('lausi.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ADDRESSID', 'Addressid', 'INTEGER' , 'lausi_address', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PHOTOID', 'Photoid', 'INTEGER' , 'lausi_photo', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Address', 'Address', RelationMap::MANY_TO_ONE, array('addressId' => 'id', ), null, null);
    $this->addRelation('Photo', 'Photo', RelationMap::MANY_TO_ONE, array('photoId' => 'id', ), null, null);
	} // buildRelations()

} // AddressPhotoTableMap
