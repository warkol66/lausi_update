DELETE FROM `security_module` WHERE `module` = 'lausi';
OPTIMIZE TABLE `security_module`;
INSERT INTO `security_module` ( `module` , `noCheckLogin` , `access` , `accessAffiliateUser` , `accessRegistrationUser` ) VALUES ('lausi', '', '7', '0','0');
DELETE FROM `security_action` WHERE `module` = 'lausi';
OPTIMIZE TABLE `security_action`;
