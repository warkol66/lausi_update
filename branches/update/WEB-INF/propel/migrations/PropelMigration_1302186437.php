<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1302186437.
 * Generated on 2011-04-07 11:27:17 by axel
 */
class PropelMigration_1302186437
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'application' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#ATENCION: esta migración no tiene vuelta atras.

#1- Borramos todos los billboards que no tengan address
DELETE FROM `lausi_billboard` WHERE (SELECT COUNT(*) FROM lausi_address WHERE lausi_address.id=lausi_billboard.addressId)=0;

#2- Borramos todos los advertisements que no tengan billboards
DELETE FROM `lausi_advertisement` WHERE (SELECT COUNT(*) FROM lausi_billboard WHERE lausi_billboard.id=lausi_advertisement.billboardId)=0;

#3- Borramos todos los advertisements que no tengan theme
DELETE FROM `lausi_advertisement` WHERE (SELECT COUNT(*) FROM lausi_theme WHERE lausi_theme.id=lausi_advertisement.themeId)=0;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'application' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#No tiene vuelta atras...

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}