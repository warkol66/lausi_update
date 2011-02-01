INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` ) VALUES ('backup', '3', '0');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupCreate','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupCreateToFile','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupDelete','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupDownload','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupList','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupRestore','backup','','3','0','1','');
INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('BackupRestoreFromFile','backup','','3','0','1','');
