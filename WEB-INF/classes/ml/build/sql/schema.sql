# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.

SET FOREIGN_KEY_CHECKS = 0;
# -----------------------------------------------------------------------
# MLUSE_Text# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `MLUSE_Text`;

CREATE TABLE `MLUSE_Text`(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `languageId` INTEGER NOT NULL ,
    `text` TEXT NOT NULL ,
    PRIMARY KEY(`id`,`languageId`),
    CONSTRAINT `MLUSE_Text_ibfk_1` FOREIGN KEY (`languageId`) REFERENCES `MLUSE_Language` (`id`))
Type=MyISAM;
# -----------------------------------------------------------------------
# MLUSE_Language# -----------------------------------------------------------------------
DROP TABLE IF EXISTS `MLUSE_Language`;

CREATE TABLE `MLUSE_Language`(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL ,
    `code` VARCHAR(30) NOT NULL ,
    PRIMARY KEY(`id`))
Type=MyISAM;
  
  
# This restores the fkey checks, after having unset them
# in database-start.tpl

SET FOREIGN_KEY_CHECKS = 1;

