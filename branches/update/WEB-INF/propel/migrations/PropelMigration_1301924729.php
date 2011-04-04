<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1301924729.
 * Generated on 2011-04-04 10:45:29 by axel
 */
class PropelMigration_1301924729
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

DROP TABLE IF EXISTS `MLUSE_Language`;

DROP TABLE IF EXISTS `MLUSE_Text`;

DROP TABLE IF EXISTS `affiliates_affiliate`;

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;

DROP TABLE IF EXISTS `affiliates_group`;

DROP TABLE IF EXISTS `affiliates_groupCategory`;

DROP TABLE IF EXISTS `affiliates_level`;

DROP TABLE IF EXISTS `affiliates_user`;

DROP TABLE IF EXISTS `affiliates_userGroup`;

DROP TABLE IF EXISTS `affiliates_userInfo`;

DROP TABLE IF EXISTS `categories_category`;

DROP TABLE IF EXISTS `lausi_address_back`;

DROP TABLE IF EXISTS `mluse_language`;

DROP TABLE IF EXISTS `mluse_text`;

DROP TABLE IF EXISTS `users_groupCategory`;

ALTER TABLE `actionLogs_log` ADD
(
	`userObjectType` VARCHAR(50) NOT NULL COMMENT \'Tipo de usuario\',
	`userObjectId` INTEGER NOT NULL COMMENT \'Id del usuario\'
);

ALTER TABLE `actionLogs_log` ADD CONSTRAINT `actionLogs_log_FK_1`
	FOREIGN KEY (`userId`)
	REFERENCES `users_user` (`id`);

ALTER TABLE `actionLogs_log` ADD CONSTRAINT `actionLogs_log_FK_2`
	FOREIGN KEY (`action`)
	REFERENCES `security_action` (`action`);

ALTER TABLE `lausi_address` CHANGE `latitude` `latitude` FLOAT COMMENT \'latitud de la direccion\';

ALTER TABLE `lausi_address` CHANGE `longitude` `longitude` FLOAT COMMENT \'longitud de la direccion\';

ALTER TABLE `lausi_address` CHANGE `orderCircuit` `orderCircuit` INTEGER DEFAULT 0 COMMENT \'ordenamiento por proximidad en el circuito entre direcciones\';

ALTER TABLE `lausi_address` CHANGE `nickname` `nickname` VARCHAR(100) DEFAULT \'\' COMMENT \'Nombre de Fantasia de la direccion\';

ALTER TABLE `lausi_address` ADD CONSTRAINT `lausi_address_FK_1`
	FOREIGN KEY (`circuitId`)
	REFERENCES `lausi_circuit` (`id`);

ALTER TABLE `lausi_address` ADD CONSTRAINT `lausi_address_FK_2`
	FOREIGN KEY (`regionId`)
	REFERENCES `lausi_region` (`id`);

ALTER TABLE `lausi_advertisement` CHANGE `date` `date` DATE NOT NULL COMMENT \'fecha de actualizacion del aviso\';

ALTER TABLE `lausi_advertisement` CHANGE `publishDate` `publishDate` DATE NOT NULL COMMENT \'fecha de publicacion del aviso\';

ALTER TABLE `lausi_advertisement` CHANGE `workforceId` `workforceId` INTEGER DEFAULT 0 COMMENT \'contratista asignado a ese workforce (solo sextuples)\';

CREATE INDEX `lausi_advertisement_FI_3` ON `lausi_advertisement` (`workforceId`);

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_1`
	FOREIGN KEY (`billboardId`)
	REFERENCES `lausi_billboard` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_2`
	FOREIGN KEY (`themeId`)
	REFERENCES `lausi_theme` (`id`);

ALTER TABLE `lausi_advertisement` ADD CONSTRAINT `lausi_advertisement_FK_3`
	FOREIGN KEY (`workforceId`)
	REFERENCES `lausi_workforce` (`id`);

ALTER TABLE `lausi_billboard` CHANGE `height` `height` TINYINT COMMENT \'si esta en altura\';

ALTER TABLE `lausi_billboard` ADD CONSTRAINT `lausi_billboard_FK_1`
	FOREIGN KEY (`addressId`)
	REFERENCES `lausi_address` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `lausi_circuit` ADD
(
	`color` VARCHAR(7) COMMENT \'Color del Circuito para mostrar en mapa\'
);

ALTER TABLE `lausi_clientAddress` CHANGE `latitude` `latitude` FLOAT COMMENT \'latitud de la direccion del cliente\';

ALTER TABLE `lausi_clientAddress` CHANGE `longitude` `longitude` FLOAT COMMENT \'longitud de la direccion del cliente\';

ALTER TABLE `lausi_clientAddress` ADD CONSTRAINT `lausi_clientAddress_FK_1`
	FOREIGN KEY (`circuitId`)
	REFERENCES `lausi_circuit` (`id`);

ALTER TABLE `lausi_clientAddress` ADD CONSTRAINT `lausi_clientAddress_FK_2`
	FOREIGN KEY (`clientId`)
	REFERENCES `lausi_client` (`id`);

ALTER TABLE `lausi_clientAddress` ADD CONSTRAINT `lausi_clientAddress_FK_3`
	FOREIGN KEY (`regionId`)
	REFERENCES `lausi_region` (`id`);

ALTER TABLE `lausi_theme` CHANGE `startDate` `startDate` DATE NOT NULL COMMENT \'fecha de inicio del motivo\';

ALTER TABLE `lausi_theme` CHANGE `active` `active` TINYINT DEFAULT 1 COMMENT \'indica si el motivo esta activo o no\';

ALTER TABLE `lausi_theme` ADD CONSTRAINT `lausi_theme_FK_1`
	FOREIGN KEY (`clientId`)
	REFERENCES `lausi_client` (`id`);

ALTER TABLE `lausi_workforce` CHANGE `workInHeight` `workInHeight` TINYINT COMMENT \'Trabaja en altura\';

ALTER TABLE `lausi_workforce` ADD
(
	`deleted_at` DATETIME
);

ALTER TABLE `lausi_workforceCircuit` ADD CONSTRAINT `lausi_workforceCircuit_FK_1`
	FOREIGN KEY (`workforceId`)
	REFERENCES `lausi_workforce` (`id`);

ALTER TABLE `lausi_workforceCircuit` ADD CONSTRAINT `lausi_workforceCircuit_FK_2`
	FOREIGN KEY (`circuitId`)
	REFERENCES `lausi_circuit` (`id`);

ALTER TABLE `modules_dependency` ADD CONSTRAINT `modules_dependency_FK_1`
	FOREIGN KEY (`moduleName`)
	REFERENCES `modules_module` (`name`)
	ON DELETE CASCADE;

ALTER TABLE `modules_label` ADD CONSTRAINT `modules_label_FK_1`
	FOREIGN KEY (`name`)
	REFERENCES `modules_module` (`name`)
	ON DELETE CASCADE;

ALTER TABLE `modules_module` CHANGE `active` `active` TINYINT DEFAULT 0 NOT NULL COMMENT \'Estado del modulo\';

ALTER TABLE `modules_module` CHANGE `alwaysActive` `alwaysActive` TINYINT DEFAULT 0 NOT NULL COMMENT \'Modulo siempre activo\';

ALTER TABLE `modules_module` ADD
(
	`hasCategories` TINYINT DEFAULT 0 NOT NULL COMMENT \'El Modulo tiene categorias relacionadas?\'
);

ALTER TABLE `security_action` ADD
(
	`accessRegistrationUser` INTEGER COMMENT \'El acceso a ese action para los usuarios por registracion\',
	`noCheckLogin` TINYINT DEFAULT 0 COMMENT \'Si no se chequea login ese action\'
);

CREATE INDEX `security_action_FI_1` ON `security_action` (`module`);

ALTER TABLE `security_action` ADD CONSTRAINT `security_action_FK_1`
	FOREIGN KEY (`module`)
	REFERENCES `security_module` (`module`);

DROP INDEX `I_referenced_security_action_FK_1_1` ON `security_actionLabel`;

ALTER TABLE `security_actionLabel` ADD
(
	`description` VARCHAR(255) COMMENT \'Descripcion\'
);

ALTER TABLE `security_module` ADD
(
	`accessRegistrationUser` INTEGER COMMENT \'El acceso a ese modulo para los usuarios por registracion\',
	`noCheckLogin` TINYINT DEFAULT 0 COMMENT \'Si no se chequea login ese modulo\'
);

ALTER TABLE `users_user` CHANGE `active` `active` TINYINT NOT NULL COMMENT \'Is user active?\';

ALTER TABLE `users_user` CHANGE `timezone` `timezone` VARCHAR(25) COMMENT \'Timezone GMT del usuario\';

ALTER TABLE `users_user` ADD CONSTRAINT `users_user_FK_1`
	FOREIGN KEY (`levelId`)
	REFERENCES `users_level` (`id`);

ALTER TABLE `users_userGroup` ADD CONSTRAINT `users_userGroup_FK_1`
	FOREIGN KEY (`userId`)
	REFERENCES `users_user` (`id`);

ALTER TABLE `users_userGroup` ADD CONSTRAINT `users_userGroup_FK_2`
	FOREIGN KEY (`groupId`)
	REFERENCES `users_group` (`id`)
	ON DELETE CASCADE;

CREATE TABLE `backup_log`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT \'Id del log\',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'logs de acciones del sistema\';

CREATE TABLE `common_menuItem`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`action` VARCHAR(100) COMMENT \'Nombre de la accion a ejecutar\',
	`url` VARCHAR(255) COMMENT \'Direccion del enlace\',
	`order` INTEGER COMMENT \'Indice de ordenamiento\',
	`parentId` INTEGER COMMENT \'Id item padre\',
	`newWindow` BOOL DEFAULT 0 NOT NULL COMMENT \'Abrir el enlace en nueva ventana\',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Items de los menues dinamicos\';

CREATE TABLE `common_menuItemInfo`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`menuItemId` INTEGER NOT NULL,
	`name` VARCHAR(100) NOT NULL COMMENT \'Nombre a mostrar en el item\',
	`title` VARCHAR(255) COMMENT \'Titulo a mostrar en el item\',
	`description` TEXT COMMENT \'Descripcion del item\',
	`language` VARCHAR(100) NOT NULL COMMENT \'Idioma\',
	PRIMARY KEY (`id`),
	INDEX `common_menuItemInfo_FI_1` (`menuItemId`),
	CONSTRAINT `common_menuItemInfo_FK_1`
		FOREIGN KEY (`menuItemId`)
		REFERENCES `common_menuItem` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Items de los menues dinamicos\';

CREATE TABLE `common_alertSubscription`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) COMMENT \'Nombre de la suscripcion\',
	`entityName` VARCHAR(50) COMMENT \'Nombre unico de la entidad asociada.\',
	`entityDateFieldUniqueName` VARCHAR(100) COMMENT \'Nombre unico del campo fecha\',
	`entityBooleanFieldUniqueName` VARCHAR(100) COMMENT \'Nombre unico del campo a evaluar por verdadero o falso.\',
	`anticipationDays` INTEGER COMMENT \'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.\',
	`entityNameFieldUniqueName` VARCHAR(100) COMMENT \'Campo a imprimir en representacion del nombre de cada instancia de la entidad\',
	`extraRecipients` TEXT COMMENT \'Destinatarios extra\',
	PRIMARY KEY (`id`),
	INDEX `common_alertSubscription_FI_1` (`entityName`(50)),
	INDEX `common_alertSubscription_FI_2` (`entityNameFieldUniqueName`(100)),
	INDEX `common_alertSubscription_FI_3` (`entityDateFieldUniqueName`(100)),
	INDEX `common_alertSubscription_FI_4` (`entityBooleanFieldUniqueName`(100)),
	CONSTRAINT `common_alertSubscription_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	CONSTRAINT `common_alertSubscription_FK_2`
		FOREIGN KEY (`entityNameFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	CONSTRAINT `common_alertSubscription_FK_3`
		FOREIGN KEY (`entityDateFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	CONSTRAINT `common_alertSubscription_FK_4`
		FOREIGN KEY (`entityBooleanFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Suscripciones de alerta\';

CREATE TABLE `common_alertSubscriptionUser`
(
	`alertSubscriptionId` INTEGER NOT NULL,
	`userId` INTEGER NOT NULL,
	PRIMARY KEY (`alertSubscriptionId`,`userId`),
	INDEX `common_alertSubscriptionUser_FI_2` (`userId`),
	CONSTRAINT `common_alertSubscriptionUser_FK_1`
		FOREIGN KEY (`alertSubscriptionId`)
		REFERENCES `common_alertSubscription` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `common_alertSubscriptionUser_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Relacion AlertSubscription - User\';

CREATE TABLE `common_scheduleSubscription`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) COMMENT \'Nombre de la suscripcion\',
	`entityName` VARCHAR(50) COMMENT \'Nombre unico de la entidad asociada.\',
	`entityDateFieldUniqueName` VARCHAR(100) COMMENT \'Nombre unico del campo fecha\',
	`entityBooleanFieldUniqueName` VARCHAR(100) COMMENT \'Nombre unico del campo a evaluar por verdadero o falso.\',
	`anticipationDays` INTEGER COMMENT \'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.\',
	`entityNameFieldUniqueName` VARCHAR(100) COMMENT \'Campo a imprimir en representacion del nombre de cada instancia de la entidad\',
	`extraRecipients` TEXT COMMENT \'Destinatarios extra\',
	PRIMARY KEY (`id`),
	INDEX `common_scheduleSubscription_FI_1` (`entityName`(50)),
	INDEX `common_scheduleSubscription_FI_2` (`entityNameFieldUniqueName`(100)),
	INDEX `common_scheduleSubscription_FI_3` (`entityDateFieldUniqueName`(100)),
	INDEX `common_scheduleSubscription_FI_4` (`entityBooleanFieldUniqueName`(100)),
	CONSTRAINT `common_scheduleSubscription_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	CONSTRAINT `common_scheduleSubscription_FK_2`
		FOREIGN KEY (`entityNameFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	CONSTRAINT `common_scheduleSubscription_FK_3`
		FOREIGN KEY (`entityDateFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE,
	CONSTRAINT `common_scheduleSubscription_FK_4`
		FOREIGN KEY (`entityBooleanFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Suscripciones de schedulea\';

CREATE TABLE `common_scheduleSubscriptionUser`
(
	`scheduleSubscriptionId` INTEGER NOT NULL,
	`userId` INTEGER NOT NULL,
	PRIMARY KEY (`scheduleSubscriptionId`,`userId`),
	INDEX `common_scheduleSubscriptionUser_FI_2` (`userId`),
	CONSTRAINT `common_scheduleSubscriptionUser_FK_1`
		FOREIGN KEY (`scheduleSubscriptionId`)
		REFERENCES `common_scheduleSubscription` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `common_scheduleSubscriptionUser_FK_2`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Relacion ScheduleSubscription - User\';

CREATE TABLE `common_internalMail`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`subject` VARCHAR(255) COMMENT \'Asunto\',
	`body` TEXT COMMENT \'Cuerpo del mensaje\',
	`recipientId` INTEGER COMMENT \'Receptor del mensaje\',
	`recipientType` VARCHAR(50) COMMENT \'Tipo de receptor del mensaje\',
	`readOn` DATETIME COMMENT \'Momento en que el mensaje fue leido\',
	`fromId` INTEGER COMMENT \'Remitente\',
	`fromType` VARCHAR(50) COMMENT \'Tipo de remitente\',
	`to` LONGBLOB COMMENT \'Destinatarios\',
	`replyId` INTEGER COMMENT \'Id del mensaje al que responde\',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `common_internalMail_FI_1` (`replyId`),
	CONSTRAINT `common_internalMail_FK_1`
		FOREIGN KEY (`replyId`)
		REFERENCES `common_internalMail` (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Mensajes internos\';

CREATE TABLE `lausi_circuitPoint`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT \'Id de Circuito\',
	`circuitId` INTEGER NOT NULL,
	`latitude` FLOAT COMMENT \'latitud\',
	`longitude` FLOAT COMMENT \'longitud\',
	PRIMARY KEY (`id`),
	INDEX `lausi_circuitPoint_FI_1` (`circuitId`),
	CONSTRAINT `lausi_circuitPoint_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Puntos que conforman el perimetro de los circuitos\';

CREATE TABLE `modules_entity`
(
	`moduleName` VARCHAR(50) NOT NULL COMMENT \'nombre del modulo\',
	`name` VARCHAR(50) NOT NULL COMMENT \'Nombre de la entidad\',
	`phpName` VARCHAR(50) COMMENT \'Nombre de la Clase\',
	`description` VARCHAR(255) COMMENT \'Descripcion de la entidad\',
	`softDelete` BOOL COMMENT \'Indica si usa softdelete\',
	`relation` BOOL COMMENT \'Indica si es una entidad principal o una relacion de dos entidades\',
	`saveLog` BOOL COMMENT \'Indica si guarda log de cambios\',
	`nestedset` BOOL COMMENT \'Indica si es una entidad nestedset\',
	`scopeFieldUniqueName` VARCHAR(100) COMMENT \'Indica el campo que es usado como scope en el nestedset\',
	`behaviors` LONGBLOB COMMENT \'Indica los behaviors que tiene la entidad\',
	PRIMARY KEY (`name`),
	INDEX `modules_entity_FI_1` (`moduleName`(50)),
	INDEX `modules_entity_FI_2` (`scopeFieldUniqueName`(100)),
	CONSTRAINT `modules_entity_FK_1`
		FOREIGN KEY (`moduleName`)
		REFERENCES `modules_module` (`name`),
	CONSTRAINT `modules_entity_FK_2`
		FOREIGN KEY (`scopeFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Entidades de modulos \';

CREATE TABLE `modules_entityField`
(
	`uniqueName` VARCHAR(100) NOT NULL COMMENT \'Nombre unico del campo\',
	`entityName` VARCHAR(50) NOT NULL COMMENT \'Nombre de la entidad\',
	`name` VARCHAR(50) NOT NULL COMMENT \'Nombre del campo (max 50 caracteres)\',
	`description` VARCHAR(255) COMMENT \'Descripcion del campo (comment)\',
	`isRequired` BOOL COMMENT \'Indica si es obligatorio\',
	`defaultValue` VARCHAR(255) COMMENT \'Valor por defecto\',
	`isPrimaryKey` BOOL COMMENT \'Indica si clave primaria\',
	`isAutoIncrement` BOOL COMMENT \'Indica si el campo es autoincremental\',
	`order` INTEGER NOT NULL COMMENT \'Orden\',
	`type` INTEGER NOT NULL COMMENT \'Tipo de campo\',
	`unique` BOOL COMMENT \'Indica si es unica\',
	`size` INTEGER COMMENT \'Size del campo\',
	`aggregateExpression` VARCHAR(255) COMMENT \'Detalles de la expresion agregada\',
	`label` VARCHAR(255) COMMENT \'Etiqueta para el formulario\',
	`formFieldType` INTEGER COMMENT \'Tipo de campo para formulario\',
	`formFieldSize` INTEGER COMMENT \'Size del campo en formulario\',
	`formFieldLines` INTEGER COMMENT \'Size del campo en formulario lineas\',
	`formFieldUseCalendar` BOOL COMMENT \'Si utiliza o no el calendario en formulario\',
	`foreignKeyTable` VARCHAR(50) COMMENT \'Entidad con la que enlaza la clave remota\',
	`foreignKeyRemote` VARCHAR(100) COMMENT \'Nombre del campo en la tabla remota\',
	`onDelete` VARCHAR(30) COMMENT \'Comportamiento onDelete\',
	`automatic` BOOL COMMENT \'Indica si es una columna autogenerada por un behavior\',
	PRIMARY KEY (`uniqueName`),
	INDEX `modules_entityField_FI_1` (`entityName`(50)),
	INDEX `modules_entityField_FI_2` (`foreignKeyTable`(50)),
	INDEX `modules_entityField_FI_3` (`foreignKeyRemote`(100)),
	CONSTRAINT `modules_entityField_FK_1`
		FOREIGN KEY (`entityName`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE CASCADE,
	CONSTRAINT `modules_entityField_FK_2`
		FOREIGN KEY (`foreignKeyTable`)
		REFERENCES `modules_entity` (`name`)
		ON DELETE SET NULL,
	CONSTRAINT `modules_entityField_FK_3`
		FOREIGN KEY (`foreignKeyRemote`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE SET NULL
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\' COMMENT=\'Campos de las entidades de modulos\';

CREATE TABLE `modules_entityFieldValidation`
(
	`entityFieldUniqueName` VARCHAR(100) NOT NULL COMMENT \'Nombre unico del campo\',
	`name` VARCHAR(50) NOT NULL COMMENT \'Nombre del validador\',
	`value` VARCHAR(50) COMMENT \'Valor del validador\',
	`message` VARCHAR(255) COMMENT \'Mensaje\',
	PRIMARY KEY (`entityFieldUniqueName`,`name`),
	CONSTRAINT `modules_entityFieldValidation_FK_1`
		FOREIGN KEY (`entityFieldUniqueName`)
		REFERENCES `modules_entityField` (`uniqueName`)
		ON DELETE CASCADE
) ENGINE=MyISAM COMMENT=\'Validaciones de los campos de las entidades de modulos \';

CREATE TABLE `multilang_text`
(
	`id` INTEGER NOT NULL,
	`moduleName` VARCHAR(255) NOT NULL,
	`languageCode` VARCHAR(30) NOT NULL,
	`text` TEXT NOT NULL,
	PRIMARY KEY (`id`,`moduleName`,`languageCode`),
	INDEX `multilang_text_FI_1` (`languageCode`(30)),
	INDEX `multilang_text_FI_2` (`moduleName`(255)),
	CONSTRAINT `multilang_text_FK_1`
		FOREIGN KEY (`languageCode`)
		REFERENCES `multilang_language` (`code`)
		ON DELETE CASCADE,
	CONSTRAINT `multilang_text_FK_2`
		FOREIGN KEY (`moduleName`)
		REFERENCES `modules_module` (`name`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\';

CREATE TABLE `multilang_language`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`code` VARCHAR(30) NOT NULL,
	`locale` VARCHAR(30),
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\' COLLATE=\'utf8_general_ci\';


#Cambios no automáticos -------------------------------------------------

#Datos de users_userInfo pasan a users_user

ALTER TABLE `users_user` ADD
(
	`passwordUpdated` DATE COMMENT \'Fecha de actualizacion de la clave\',
	`recoveryHash` VARCHAR(255) COMMENT \'Hash enviado para la recuperacion de clave\',
	`recoveryHashCreatedOn` DATETIME COMMENT \'Momento de la solicitud para la recuperacion de clave\',
	`name` VARCHAR(90) COMMENT \'Nombre\',
	`surname` VARCHAR(90) COMMENT \'Apellido\',
	`mailAddress` VARCHAR(90) COMMENT \'Direccion electronica\',
	`mailAddressAlt` VARCHAR(90) COMMENT \'Direccion electronica alternativa\',
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	`updated_at` DATETIME
);

UPDATE `users_user` ,`users_userInfo` SET 
`users_user`.`name` = `users_userInfo`.`name`,
`users_user`.`surname` = `users_userInfo`.`surname`,
`users_user`.`mailAddress` = `users_userInfo`.`mailAddress`,
`passwordUpdated` = NOW(),
`users_user`.`created_at`=`users_user`.`created`,
`users_user`.`updated_at`=`users_user`.`updated`
 WHERE `users_userInfo`.`userId` = `users_user`.`id`;
 
ALTER TABLE `users_user` DROP `created`;

ALTER TABLE `users_user` DROP `updated`;

DROP TABLE IF EXISTS `users_userInfo`;

#Agregamos la información de los circuitos
TRUNCATE TABLE `lausi_circuit`;
INSERT INTO `lausi_circuit` (`id`, `name`, `description`, `limitsDescription`, `orderBy`, `color`) VALUES
(1, \'Av. Norte\', \'\', \'del Rio a Av. Cabildo y de Scalabrini Ortiz y Gral Paz\', 2, \'#0008A8\'),
(2, \'Int. Norte\', \'\', \'de Av. Cabildo a Warnes-Constituyentes y de S. Ortiz-J B Justo a Gral Paz\r\n\', 3, \'#FFF600\'),
(3, \'Centro\', \'\', \'de Av Caseros a S. Ortiz y del Rio a Av La Plata-Rio de Janeiro\', 1, \'#0090ff\'),
(4, \'Sur 2\', \'\', \'de Av. La Plata-Saenz al Rio y del Riachuelo a Av. Caseros.\', 8, \'#000394\'),
(5, \'Caracol 1\', \'\', \'de Nazca a Rio de Janeiro y de J B Justo-Warnes a Rivadavia\', 5, \'#85ff55\'),
(6, \'Caracol 2\', \'\', \'de Constituyentes a Rivadavia y de Beiro - Nazca a Gral Paz\', 6, \'#237b00\'),
(7, \'Oeste 1\', \'\', \'de Rivadavia al Riachuelo y de S Pedrito - M Acosta a Av La Plata\', 4, \'#c4461d\'),
(8, \'Oeste 2\', \'\', \'de Rivadavia al Riachuelo y de S. Pedrito-M Acosta a Gral Paz\', 7, \'#ff9000\');

INSERT INTO `lausi_circuitPoint` (`id`, `circuitId`, `latitude`, `longitude`) VALUES
(134, 1, -34.5447, -58.4732),
(133, 1, -34.5461, -58.4704),
(132, 1, -34.566, -58.4524),
(131, 1, -34.579, -58.4263),
(130, 1, -34.5861, -58.4156),
(129, 1, -34.5703, -58.3987),
(128, 1, -34.5576, -58.4103),
(127, 1, -34.5516, -58.4265),
(126, 1, -34.5395, -58.4364),
(125, 1, -34.5302, -58.4533),
(146, 2, -34.5501, -58.5005),
(145, 2, -34.5699, -58.5095),
(144, 2, -34.5892, -58.4845),
(143, 2, -34.5965, -58.4658),
(142, 2, -34.597, -58.4587),
(141, 2, -34.6025, -58.4416),
(140, 2, -34.586, -58.4151),
(139, 2, -34.5788, -58.4261),
(138, 2, -34.5663, -58.4527),
(137, 2, -34.5469, -58.4699),
(136, 2, -34.5449, -58.473),
(33, 3, -34.5714, -58.3981),
(34, 3, -34.5857, -58.3659),
(35, 3, -34.622, -58.3535),
(36, 3, -34.6285, -58.3774),
(37, 3, -34.6335, -58.3899),
(38, 3, -34.6402, -58.423),
(39, 3, -34.6154, -58.4296),
(40, 3, -34.6027, -58.4409),
(41, 3, -34.5867, -58.415),
(215, 4, -34.659, -58.3992),
(214, 4, -34.66, -58.399),
(213, 4, -34.6608, -58.3994),
(212, 4, -34.6606, -58.4004),
(211, 4, -34.6599, -58.4012),
(210, 4, -34.6595, -58.403),
(209, 4, -34.6598, -58.405),
(208, 4, -34.6598, -58.4084),
(207, 4, -34.6589, -58.4099),
(206, 4, -34.6584, -58.4129),
(205, 4, -34.6592, -58.4164),
(204, 4, -34.6488, -58.4171),
(203, 4, -34.6404, -58.4232),
(202, 4, -34.6341, -58.3903),
(201, 4, -34.629, -58.3787),
(200, 4, -34.622, -58.3536),
(199, 4, -34.6326, -58.3454),
(198, 4, -34.636, -58.3537),
(197, 4, -34.6391, -58.358),
(196, 4, -34.6392, -58.3601),
(62, 6, -34.571, -58.509),
(63, 6, -34.6165, -58.531),
(64, 6, -34.6395, -58.5295),
(65, 6, -34.64, -58.5142),
(66, 6, -34.6309, -58.4701),
(67, 6, -34.6208, -58.474),
(68, 6, -34.5956, -58.4938),
(69, 6, -34.5892, -58.485),
(70, 6, -34.5719, -58.5082),
(71, 5, -34.6311, -58.4687),
(72, 5, -34.6157, -58.4304),
(73, 5, -34.6031, -58.4416),
(74, 5, -34.597, -58.4601),
(75, 5, -34.597, -58.4659),
(76, 5, -34.589, -58.4838),
(77, 5, -34.5957, -58.4931),
(78, 5, -34.6203, -58.4737),
(79, 7, -34.6593, -58.4167),
(80, 7, -34.649, -58.4172),
(81, 7, -34.6402, -58.4235),
(82, 7, -34.6158, -58.4299),
(83, 7, -34.6313, -58.4691),
(84, 7, -34.6393, -58.466),
(85, 7, -34.6512, -58.4527),
(86, 7, -34.6691, -58.4311),
(87, 7, -34.6624, -58.4244),
(88, 8, -34.6397, -58.5295),
(89, 8, -34.6532, -58.5284),
(90, 8, -34.7048, -58.4611),
(91, 8, -34.6695, -58.4309),
(92, 8, -34.64, -58.4661),
(93, 8, -34.6313, -58.4695),
(94, 8, -34.6407, -58.5142),
(135, 1, -34.5388, -58.4749),
(147, 2, -34.5388, -58.4758),
(195, 4, -34.6395, -58.3612),
(194, 4, -34.6404, -58.3611),
(193, 4, -34.6418, -58.3584),
(192, 4, -34.644, -58.3574),
(191, 4, -34.6449, -58.3578),
(190, 4, -34.648, -58.3625),
(189, 4, -34.648, -58.3639),
(188, 4, -34.6513, -58.3697),
(187, 4, -34.6533, -58.3699),
(186, 4, -34.6568, -58.3741),
(185, 4, -34.6579, -58.3853),
(184, 4, -34.6601, -58.3879),
(183, 4, -34.6623, -58.3923),
(182, 4, -34.662, -58.3971),
(216, 4, -34.6583, -58.3982),
(217, 4, -34.6585, -58.3969),
(218, 4, -34.6593, -58.3958),
(219, 4, -34.6603, -58.3959),
(220, 4, -34.6608, -58.3973),
(221, 4, -34.6617, -58.3977);


#Fin cambios no automáticos ----------------------------------------------


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

DROP TABLE IF EXISTS `backup_log`;

DROP TABLE IF EXISTS `common_menuItem`;

DROP TABLE IF EXISTS `common_menuItemInfo`;

DROP TABLE IF EXISTS `common_alertSubscription`;

DROP TABLE IF EXISTS `common_alertSubscriptionUser`;

DROP TABLE IF EXISTS `common_scheduleSubscription`;

DROP TABLE IF EXISTS `common_scheduleSubscriptionUser`;

DROP TABLE IF EXISTS `common_internalMail`;

DROP TABLE IF EXISTS `lausi_circuitPoint`;

DROP TABLE IF EXISTS `modules_entity`;

DROP TABLE IF EXISTS `modules_entityField`;

DROP TABLE IF EXISTS `modules_entityFieldValidation`;

DROP TABLE IF EXISTS `multilang_text`;

DROP TABLE IF EXISTS `multilang_language`;

ALTER TABLE `actionLogs_log` DROP FOREIGN KEY `actionLogs_log_FK_1`;

ALTER TABLE `actionLogs_log` DROP FOREIGN KEY `actionLogs_log_FK_2`;

ALTER TABLE `actionLogs_log` DROP `userObjectType`;

ALTER TABLE `actionLogs_log` DROP `userObjectId`;

ALTER TABLE `lausi_address` DROP FOREIGN KEY `lausi_address_FK_1`;

ALTER TABLE `lausi_address` DROP FOREIGN KEY `lausi_address_FK_2`;

ALTER TABLE `lausi_address` CHANGE `latitude` `latitude` DECIMAL(12,9);

ALTER TABLE `lausi_address` CHANGE `longitude` `longitude` DECIMAL(12,9);

ALTER TABLE `lausi_address` CHANGE `orderCircuit` `orderCircuit` INTEGER(1) NOT NULL;

ALTER TABLE `lausi_address` CHANGE `nickname` `nickname` VARCHAR(100);

ALTER TABLE `lausi_advertisement` DROP FOREIGN KEY `lausi_advertisement_FK_1`;

ALTER TABLE `lausi_advertisement` DROP FOREIGN KEY `lausi_advertisement_FK_2`;

ALTER TABLE `lausi_advertisement` DROP FOREIGN KEY `lausi_advertisement_FK_3`;

DROP INDEX `lausi_advertisement_FI_3` ON `lausi_advertisement`;

ALTER TABLE `lausi_advertisement` CHANGE `date` `date` DATE DEFAULT \'0000-00-00\' NOT NULL;

ALTER TABLE `lausi_advertisement` CHANGE `publishDate` `publishDate` DATE DEFAULT \'0000-00-00\' NOT NULL;

ALTER TABLE `lausi_advertisement` CHANGE `workforceId` `workforceId` INTEGER NOT NULL;

ALTER TABLE `lausi_billboard` DROP FOREIGN KEY `lausi_billboard_FK_1`;

ALTER TABLE `lausi_billboard` CHANGE `height` `height` INTEGER;

ALTER TABLE `lausi_circuit` DROP `color`;

ALTER TABLE `lausi_clientAddress` DROP FOREIGN KEY `lausi_clientAddress_FK_1`;

ALTER TABLE `lausi_clientAddress` DROP FOREIGN KEY `lausi_clientAddress_FK_2`;

ALTER TABLE `lausi_clientAddress` DROP FOREIGN KEY `lausi_clientAddress_FK_3`;

ALTER TABLE `lausi_clientAddress` CHANGE `latitude` `latitude` DECIMAL(12,9);

ALTER TABLE `lausi_clientAddress` CHANGE `longitude` `longitude` DECIMAL(12,9);

ALTER TABLE `lausi_theme` DROP FOREIGN KEY `lausi_theme_FK_1`;

ALTER TABLE `lausi_theme` CHANGE `startDate` `startDate` DATE DEFAULT \'0000-00-00\' NOT NULL;

ALTER TABLE `lausi_theme` CHANGE `active` `active` TINYINT(1) DEFAULT 1 NOT NULL;

ALTER TABLE `lausi_workforce` CHANGE `workInHeight` `workInHeight` INTEGER;

ALTER TABLE `lausi_workforce` DROP `deleted_at`;

ALTER TABLE `lausi_workforceCircuit` DROP FOREIGN KEY `lausi_workforceCircuit_FK_1`;

ALTER TABLE `lausi_workforceCircuit` DROP FOREIGN KEY `lausi_workforceCircuit_FK_2`;

ALTER TABLE `modules_dependency` DROP FOREIGN KEY `modules_dependency_FK_1`;

ALTER TABLE `modules_label` DROP FOREIGN KEY `modules_label_FK_1`;

ALTER TABLE `modules_module` CHANGE `active` `active` INTEGER NOT NULL;

ALTER TABLE `modules_module` CHANGE `alwaysActive` `alwaysActive` INTEGER NOT NULL;

ALTER TABLE `modules_module` DROP `hasCategories`;

ALTER TABLE `security_action` DROP FOREIGN KEY `security_action_FK_1`;

DROP INDEX `security_action_FI_1` ON `security_action`;

ALTER TABLE `security_action` DROP `accessRegistrationUser`;

ALTER TABLE `security_action` DROP `noCheckLogin`;

ALTER TABLE `security_actionLabel` DROP `description`;

CREATE INDEX `I_referenced_security_action_FK_1_1` ON `security_actionLabel` (`action`);

ALTER TABLE `security_module` DROP `accessRegistrationUser`;

ALTER TABLE `security_module` DROP `noCheckLogin`;

ALTER TABLE `users_user` DROP FOREIGN KEY `users_user_FK_1`;

ALTER TABLE `users_user` CHANGE `active` `active` INTEGER NOT NULL;

ALTER TABLE `users_user` CHANGE `timezone` `timezone` VARCHAR(100);

ALTER TABLE `users_user` ADD
(
	`created` DATETIME NOT NULL,
	`updated` DATETIME NOT NULL
);

ALTER TABLE `users_userGroup` DROP FOREIGN KEY `users_userGroup_FK_1`;

ALTER TABLE `users_userGroup` DROP FOREIGN KEY `users_userGroup_FK_2`;

CREATE TABLE `MLUSE_Language`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`code` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `MLUSE_Text`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`languageId` INTEGER NOT NULL,
	`text` TEXT NOT NULL,
	PRIMARY KEY (`id`,`languageId`),
	INDEX `MLUSE_Text_ibfk_1` (`languageId`)
) ENGINE=MyISAM;

CREATE TABLE `affiliates_affiliate`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`ownerId` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `affiliates_affiliate_U_1` (`name`(255))
) ENGINE=MyISAM;

CREATE TABLE `affiliates_affiliateInfo`
(
	`affiliateId` INTEGER NOT NULL,
	`affiliateInternalNumber` INTEGER NOT NULL,
	`address` VARCHAR(255),
	`phone` VARCHAR(50),
	`email` VARCHAR(50),
	`contact` VARCHAR(50),
	`contactEmail` VARCHAR(100),
	`web` VARCHAR(255),
	`memo` TEXT,
	PRIMARY KEY (`affiliateId`)
) ENGINE=MyISAM;

CREATE TABLE `affiliates_group`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`created` DATETIME NOT NULL,
	`updated` DATETIME NOT NULL,
	`bitLevel` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `affiliates_group_U_1` (`name`(255))
) ENGINE=MyISAM;

CREATE TABLE `affiliates_groupCategory`
(
	`groupId` INTEGER NOT NULL,
	`categoryId` INTEGER NOT NULL,
	PRIMARY KEY (`groupId`,`categoryId`),
	INDEX `affiliates_groupCategory_FI_2` (`categoryId`)
) ENGINE=MyISAM;

CREATE TABLE `affiliates_level`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`bitLevel` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `affiliates_level_U_1` (`name`(255))
) ENGINE=MyISAM;

CREATE TABLE `affiliates_user`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`affiliateId` INTEGER NOT NULL,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`active` INTEGER NOT NULL,
	`created` DATETIME NOT NULL,
	`updated` DATETIME NOT NULL,
	`timezone` VARCHAR(100),
	`levelId` INTEGER,
	`lastLogin` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `affiliates_user_U_1` (`username`(255)),
	INDEX `affiliates_user_FI_2` (`levelId`),
	INDEX `affiliates_user_FI_3` (`affiliateId`)
) ENGINE=MyISAM;

CREATE TABLE `affiliates_userGroup`
(
	`userId` INTEGER NOT NULL,
	`groupId` INTEGER NOT NULL,
	PRIMARY KEY (`userId`,`groupId`),
	INDEX `affiliates_userGroup_FI_2` (`groupId`)
) ENGINE=MyISAM;

CREATE TABLE `affiliates_userInfo`
(
	`userId` INTEGER NOT NULL,
	`name` VARCHAR(255),
	`surname` VARCHAR(255),
	`mailAddress` VARCHAR(255),
	PRIMARY KEY (`userId`)
) ENGINE=MyISAM;

CREATE TABLE `categories_category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`active` INTEGER NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `lausi_address_back`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`street` VARCHAR(100) NOT NULL,
	`number` INTEGER,
	`rating` INTEGER,
	`intersection` VARCHAR(100),
	`owner` VARCHAR(100),
	`latitude` DECIMAL(12,9),
	`longitude` DECIMAL(12,9),
	`regionId` INTEGER,
	`ownerPhone` VARCHAR(100),
	`circuitId` INTEGER,
	`orderCircuit` INTEGER(1) NOT NULL,
	`nickname` VARCHAR(100),
	PRIMARY KEY (`id`),
	INDEX `lausi_address_FI_1` (`circuitId`),
	INDEX `lausi_address_FI_2` (`regionId`)
) ENGINE=MyISAM;

CREATE TABLE `mluse_language`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`code` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `mluse_text`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`languageId` INTEGER NOT NULL,
	`text` TEXT NOT NULL,
	PRIMARY KEY (`id`,`languageId`),
	INDEX `MLUSE_Text_ibfk_1` (`languageId`)
) ENGINE=MyISAM;

CREATE TABLE `users_groupCategory`
(
	`groupId` INTEGER NOT NULL,
	`categoryId` INTEGER NOT NULL,
	PRIMARY KEY (`groupId`,`categoryId`),
	INDEX `users_groupCategory_FI_2` (`categoryId`)
) ENGINE=MyISAM;

CREATE TABLE `users_userInfo`
(
	`userId` INTEGER NOT NULL,
	`name` VARCHAR(255),
	`surname` VARCHAR(255),
	`mailAddress` VARCHAR(255),
	PRIMARY KEY (`userId`)
) ENGINE=MyISAM;

#Cambios no automáticos -------------------------------------------------

#Datos de users_userInfo pasan a users_user

INSERT INTO `users_userInfo` (`userId`, `name`, `surname`, `mailAddress`)
SELECT `id`, `name`, `surname`, `mailAddress` FROM `users_user` WHERE 1;

UPDATE `users_user` SET
`users_user`.`created`=`users_user`.`created_at`,
`users_user`.`updated`=`users_user`.`updated_at`;

ALTER TABLE `users_user` DROP `passwordUpdated`;

ALTER TABLE `users_user` DROP `recoveryHash`;

ALTER TABLE `users_user` DROP `recoveryHashCreatedOn`;

ALTER TABLE `users_user` DROP `name`;

ALTER TABLE `users_user` DROP `surname`;

ALTER TABLE `users_user` DROP `mailAddress`;

ALTER TABLE `users_user` DROP `mailAddressAlt`;

ALTER TABLE `users_user` DROP `deleted_at`;

ALTER TABLE `users_user` DROP `created_at`;

ALTER TABLE `users_user` DROP `updated_at`;

#Fin cambios no automáticos ----------------------------------------------

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}