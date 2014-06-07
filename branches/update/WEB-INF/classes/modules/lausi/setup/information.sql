DELETE FROM `modules_module` WHERE `name` = 'lausi';
INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('lausi', '1', '','');
DELETE FROM `modules_dependency` WHERE `moduleName` = 'lausi';
