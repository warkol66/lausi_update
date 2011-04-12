
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- actionLogs_log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_log`;

CREATE TABLE `actionLogs_log`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userObjectType` VARCHAR(50) NOT NULL COMMENT 'Tipo de usuario',
	`userObjectId` INTEGER NOT NULL COMMENT 'Id del usuario',
	`userId` INTEGER NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100) NOT NULL COMMENT 'action en que se logueo el dato',
	`object` VARCHAR(100) NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`),
	INDEX `actionLogs_log_FI_1` (`userId`),
	INDEX `actionLogs_log_FI_2` (`action`),
	CONSTRAINT `actionLogs_log_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	CONSTRAINT `actionLogs_log_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='logs de acciones del sistema';

-- ---------------------------------------------------------------------
-- actionLogs_label
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_label`;

CREATE TABLE `actionLogs_label`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id Label',
	`action` VARCHAR(100) NOT NULL COMMENT 'action en que se loguea el dato',
	`label` VARCHAR(100) NOT NULL COMMENT 'mensaje del log',
	`language` VARCHAR(100) COMMENT 'idioma de la etiqueta',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`,`action`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Etiquetas de los logs';

-- ---------------------------------------------------------------------
-- common_menuItem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_menuItem`;

CREATE TABLE `common_menuItem`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`action` VARCHAR(100) COMMENT 'Nombre de la accion a ejecutar',
	`url` VARCHAR(255) COMMENT 'Direccion del enlace',
	`order` INTEGER COMMENT 'Indice de ordenamiento',
	`parentId` INTEGER COMMENT 'Id item padre',
	`newWindow` BOOL DEFAULT 0 NOT NULL COMMENT 'Abrir el enlace en nueva ventana',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Items de los menues dinamicos';

-- ---------------------------------------------------------------------
-- common_menuItemInfo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_menuItemInfo`;

CREATE TABLE `common_menuItemInfo`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`menuItemId` INTEGER NOT NULL,
	`name` VARCHAR(100) NOT NULL COMMENT 'Nombre a mostrar en el item',
	`title` VARCHAR(255) COMMENT 'Titulo a mostrar en el item',
	`description` TEXT COMMENT 'Descripcion del item',
	`language` VARCHAR(100) NOT NULL COMMENT 'Idioma',
	PRIMARY KEY (`id`),
	INDEX `common_menuItemInfo_FI_1` (`menuItemId`),
	CONSTRAINT `common_menuItemInfo_FK_1`
		FOREIGN KEY (`menuItemId`)
		REFERENCES `common_menuItem` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Items de los menues dinamicos';

-- ---------------------------------------------------------------------
-- common_alertSubscription
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_alertSubscription`;

CREATE TABLE `common_alertSubscription`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) COMMENT 'Nombre de la suscripcion',
	`entityName` VARCHAR(50) COMMENT 'Nombre unico de la entidad asociada.',
	`entityDateFieldUniqueName` VARCHAR(100) COMMENT 'Nombre unico del campo fecha',
	`entityBooleanFieldUniqueName` VARCHAR(100) COMMENT 'Nombre unico del campo a evaluar por verdadero o falso.',
	`anticipationDays` INTEGER COMMENT 'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.',
	`entityNameFieldUniqueName` VARCHAR(100) COMMENT 'Campo a imprimir en representacion del nombre de cada instancia de la entidad',
	`extraRecipients` TEXT COMMENT 'Destinatarios extra',
	PRIMARY KEY (`id`),
	INDEX `common_alertSubscription_FI_1` (`entityName`),
	INDEX `common_alertSubscription_FI_2` (`entityNameFieldUniqueName`),
	INDEX `common_alertSubscription_FI_3` (`entityDateFieldUniqueName`),
	INDEX `common_alertSubscription_FI_4` (`entityBooleanFieldUniqueName`),
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
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Suscripciones de alerta';

-- ---------------------------------------------------------------------
-- common_alertSubscriptionUser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_alertSubscriptionUser`;

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
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Relacion AlertSubscription - User';

-- ---------------------------------------------------------------------
-- common_scheduleSubscription
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_scheduleSubscription`;

CREATE TABLE `common_scheduleSubscription`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) COMMENT 'Nombre de la suscripcion',
	`entityName` VARCHAR(50) COMMENT 'Nombre unico de la entidad asociada.',
	`entityDateFieldUniqueName` VARCHAR(100) COMMENT 'Nombre unico del campo fecha',
	`entityBooleanFieldUniqueName` VARCHAR(100) COMMENT 'Nombre unico del campo a evaluar por verdadero o falso.',
	`anticipationDays` INTEGER COMMENT 'Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.',
	`entityNameFieldUniqueName` VARCHAR(100) COMMENT 'Campo a imprimir en representacion del nombre de cada instancia de la entidad',
	`extraRecipients` TEXT COMMENT 'Destinatarios extra',
	PRIMARY KEY (`id`),
	INDEX `common_scheduleSubscription_FI_1` (`entityName`),
	INDEX `common_scheduleSubscription_FI_2` (`entityNameFieldUniqueName`),
	INDEX `common_scheduleSubscription_FI_3` (`entityDateFieldUniqueName`),
	INDEX `common_scheduleSubscription_FI_4` (`entityBooleanFieldUniqueName`),
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
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Suscripciones de schedulea';

-- ---------------------------------------------------------------------
-- common_scheduleSubscriptionUser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_scheduleSubscriptionUser`;

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
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Relacion ScheduleSubscription - User';

-- ---------------------------------------------------------------------
-- common_internalMail
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `common_internalMail`;

CREATE TABLE `common_internalMail`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`subject` VARCHAR(255) COMMENT 'Asunto',
	`body` TEXT COMMENT 'Cuerpo del mensaje',
	`recipientId` INTEGER COMMENT 'Receptor del mensaje',
	`recipientType` VARCHAR(50) COMMENT 'Tipo de receptor del mensaje',
	`readOn` DATETIME COMMENT 'Momento en que el mensaje fue leido',
	`fromId` INTEGER COMMENT 'Remitente',
	`fromType` VARCHAR(50) COMMENT 'Tipo de remitente',
	`to` LONGBLOB COMMENT 'Destinatarios',
	`replyId` INTEGER COMMENT 'Id del mensaje al que responde',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`deleted_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `common_internalMail_FI_1` (`replyId`),
	CONSTRAINT `common_internalMail_FK_1`
		FOREIGN KEY (`replyId`)
		REFERENCES `common_internalMail` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Mensajes internos';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
