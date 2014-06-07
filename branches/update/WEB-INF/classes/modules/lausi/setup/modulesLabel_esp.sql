DELETE FROM `modules_label` WHERE `name` = 'lausi' and `language` = 'esp';
OPTIMIZE TABLE `modules_label`;
INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('lausi', 'Activos Publicitarios', 'Sistema de admininstración de activos publicitarios', 'esp');
