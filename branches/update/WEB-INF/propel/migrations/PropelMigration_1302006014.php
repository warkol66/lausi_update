<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1302006014.
 * Generated on 2011-04-05 09:20:14 by axel
 */
class PropelMigration_1302006014
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

#Pasamos los campos FLOAT de las latitudes y longitudes a DECIMAL(12,9)

ALTER TABLE `lausi_address` CHANGE `latitude` `latitude` DECIMAL(12,9) COMMENT \'latitud de la direccion\';

ALTER TABLE `lausi_address` CHANGE `longitude` `longitude` DECIMAL(12,9) COMMENT \'longitud de la direccion\';

ALTER TABLE `lausi_circuitPoint` CHANGE `latitude` `latitude` DECIMAL(12,9) COMMENT \'latitud\';

ALTER TABLE `lausi_circuitPoint` CHANGE `longitude` `longitude` DECIMAL(12,9) COMMENT \'longitud\';

ALTER TABLE `lausi_clientAddress` CHANGE `latitude` `latitude` DECIMAL(12,9) COMMENT \'latitud de la direccion del cliente\';

ALTER TABLE `lausi_clientAddress` CHANGE `longitude` `longitude` DECIMAL(12,9) COMMENT \'longitud de la direccion del cliente\';

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

ALTER TABLE `lausi_address` CHANGE `latitude` `latitude` FLOAT;

ALTER TABLE `lausi_address` CHANGE `longitude` `longitude` FLOAT;

ALTER TABLE `lausi_circuitPoint` CHANGE `latitude` `latitude` FLOAT;

ALTER TABLE `lausi_circuitPoint` CHANGE `longitude` `longitude` FLOAT;

ALTER TABLE `lausi_clientAddress` CHANGE `latitude` `latitude` FLOAT;

ALTER TABLE `lausi_clientAddress` CHANGE `longitude` `longitude` FLOAT;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}