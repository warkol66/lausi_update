DELETE FROM `modules_label` WHERE `name` = 'users';
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('users', 'usuarios mod', 'Manejo', 'esp');
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('users', 'users mod', 'Users Management mod', 'eng');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'users';
INSERT INTO `modules_dependency` ( `moduleName` , `dependence` ) VALUES ('users', 'backup');
DELETE FROM `modules_module` WHERE `name` = 'users';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive` ) VALUES ('users', '1', '0');
