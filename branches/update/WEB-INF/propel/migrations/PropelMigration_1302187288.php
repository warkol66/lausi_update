<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1302187288.
 * Generated on 2011-04-07 11:41:28 by axel
 */
class PropelMigration_1302187288
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


ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_2`
	FOREIGN KEY (`themeId`)
	REFERENCES `lausi_theme` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_3`
	FOREIGN KEY (`workforceId`)
	REFERENCES `lausi_workforce` (`id`)
	ON DELETE SET NULL;

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

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_2`
	FOREIGN KEY (`themeId`)
	REFERENCES `lausi_theme` (`id`);

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_3`
	FOREIGN KEY (`workforceId`)
	REFERENCES `lausi_workforce` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}