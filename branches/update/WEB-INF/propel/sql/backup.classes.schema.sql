
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- backup_log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `backup_log`;

CREATE TABLE `backup_log`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id del log',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='logs de acciones del sistema';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
