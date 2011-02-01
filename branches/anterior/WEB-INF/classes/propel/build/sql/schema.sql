
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- users_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_user`;


CREATE TABLE `users_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` INTEGER  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`levelId` INTEGER COMMENT 'User Level',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	`timezone` VARCHAR(100) COMMENT 'Timezone GMT del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_user_U_1` (`username`),
	CONSTRAINT `users_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `users_userInfo` (`userId`),
	INDEX `users_user_FI_2` (`levelId`),
	CONSTRAINT `users_user_FK_2`
		FOREIGN KEY (`levelId`)
		REFERENCES `users_level` (`id`)
)Type=MyISAM COMMENT='Users';

#-----------------------------------------------------------------------------
#-- users_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userInfo`;


CREATE TABLE `users_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `users_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`)
)Type=MyISAM COMMENT='Information about users';

#-----------------------------------------------------------------------------
#-- users_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_userGroup`;


CREATE TABLE `users_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `users_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `users_userGroup_FI_2` (`groupId`),
	CONSTRAINT `users_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- users_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_group`;


CREATE TABLE `users_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_group_U_1` (`name`)
)Type=MyISAM COMMENT='Groups';

#-----------------------------------------------------------------------------
#-- users_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_level`;


CREATE TABLE `users_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `users_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- security_action
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_action`;


CREATE TABLE `security_action`
(
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`module` VARCHAR(100) COMMENT 'Modulo',
	`section` VARCHAR(100) COMMENT 'Seccion',
	`access` INTEGER COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER COMMENT 'El acceso a ese action para los usuarios por afiliados',
	`active` INTEGER COMMENT 'Si el action esta activo o no',
	`pair` VARCHAR(100) COMMENT 'Par del Action',
	PRIMARY KEY (`action`),
	CONSTRAINT `security_action_FK_1`
		FOREIGN KEY (`action`)
		REFERENCES `security_actionLabel` (`action`)
)Type=MyISAM COMMENT='Actions del sistema';

#-----------------------------------------------------------------------------
#-- security_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_module`;


CREATE TABLE `security_module`
(
	`module` VARCHAR(100)  NOT NULL COMMENT 'Modulo',
	`access` INTEGER COMMENT 'El acceso a ese action',
	`accessAffiliateUser` INTEGER COMMENT 'El acceso a ese action para los usuarios por afiliados',
	PRIMARY KEY (`module`)
)Type=MyISAM COMMENT='Modulos del sistema';

#-----------------------------------------------------------------------------
#-- security_actionLabel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_actionLabel`;


CREATE TABLE `security_actionLabel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id label security',
	`action` VARCHAR(100)  NOT NULL COMMENT 'Action pagina',
	`language` VARCHAR(100) COMMENT 'Idioma de la etiqueta',
	`label` VARCHAR(100) COMMENT 'Etiqueta',
	PRIMARY KEY (`id`,`action`),
	INDEX `I_referenced_security_action_FK_1_1` (`action`)
)Type=MyISAM COMMENT='etiquetas de actions de seguridad';

#-----------------------------------------------------------------------------
#-- affiliates_affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliate`;


CREATE TABLE `affiliates_affiliate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id afiliado',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre afiliado',
	`ownerId` INTEGER COMMENT 'Id del usuario administrador del afiliado',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_affiliate_U_1` (`name`),
	CONSTRAINT `affiliates_affiliate_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `affiliates_affiliateInfo` (`affiliateId`)
)Type=MyISAM COMMENT='Afiliados';

#-----------------------------------------------------------------------------
#-- affiliates_affiliateInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_affiliateInfo`;


CREATE TABLE `affiliates_affiliateInfo`
(
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`affiliateInternalNumber` INTEGER  NOT NULL COMMENT 'Id interno',
	`address` VARCHAR(255) COMMENT 'Direccion afiliado',
	`phone` VARCHAR(50) COMMENT 'Telefono afiliado',
	`email` VARCHAR(50) COMMENT 'Email afiliado',
	`contact` VARCHAR(50) COMMENT 'Nombre de persona de contacto',
	`contactEmail` VARCHAR(100) COMMENT 'Email de persona de contacto',
	`web` VARCHAR(255) COMMENT 'Direccion web del afiliado',
	`memo` TEXT COMMENT 'Informacion adicional del afiliado',
	PRIMARY KEY (`affiliateId`),
	CONSTRAINT `affiliates_affiliateInfo_FK_1`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Informacion del afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_user`;


CREATE TABLE `affiliates_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'User Id',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id afiliado',
	`username` VARCHAR(255)  NOT NULL COMMENT 'username',
	`password` VARCHAR(255)  NOT NULL COMMENT 'password',
	`active` INTEGER  NOT NULL COMMENT 'Is user active?',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`timezone` VARCHAR(100) COMMENT 'Timezone GMT del usuario afiliado',
	`levelId` INTEGER COMMENT 'User Level',
	`lastLogin` DATETIME COMMENT 'Fecha del ultimo login del usuario',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_user_U_1` (`username`),
	CONSTRAINT `affiliates_user_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `affiliates_userInfo` (`userId`),
	INDEX `affiliates_user_FI_2` (`levelId`),
	CONSTRAINT `affiliates_user_FK_2`
		FOREIGN KEY (`levelId`)
		REFERENCES `affiliates_level` (`id`),
	INDEX `affiliates_user_FI_3` (`affiliateId`),
	CONSTRAINT `affiliates_user_FK_3`
		FOREIGN KEY (`affiliateId`)
		REFERENCES `affiliates_affiliate` (`id`)
)Type=MyISAM COMMENT='Usuarios de afiliado';

#-----------------------------------------------------------------------------
#-- affiliates_userInfo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userInfo`;


CREATE TABLE `affiliates_userInfo`
(
	`userId` INTEGER  NOT NULL COMMENT 'User Id',
	`name` VARCHAR(255) COMMENT 'name',
	`surname` VARCHAR(255) COMMENT 'surname',
	`mailAddress` VARCHAR(255) COMMENT 'Email',
	PRIMARY KEY (`userId`),
	CONSTRAINT `affiliates_userInfo_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`)
)Type=MyISAM COMMENT='Information about users by affiliates';

#-----------------------------------------------------------------------------
#-- affiliates_level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_level`;


CREATE TABLE `affiliates_level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Level Name',
	`bitLevel` INTEGER COMMENT 'Bit del nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_level_U_1` (`name`)
)Type=MyISAM COMMENT='Levels';

#-----------------------------------------------------------------------------
#-- affiliates_userGroup
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_userGroup`;


CREATE TABLE `affiliates_userGroup`
(
	`userId` INTEGER  NOT NULL COMMENT 'Group ID',
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	PRIMARY KEY (`userId`,`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `affiliates_user` (`id`),
	INDEX `affiliates_userGroup_FI_2` (`groupId`),
	CONSTRAINT `affiliates_userGroup_FK_2`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Users / Groups';

#-----------------------------------------------------------------------------
#-- affiliates_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_group`;


CREATE TABLE `affiliates_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Group ID',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Group Name',
	`created` DATETIME  NOT NULL COMMENT 'Creation date for',
	`updated` DATETIME  NOT NULL COMMENT 'Last update date',
	`bitLevel` INTEGER COMMENT 'Nivel',
	PRIMARY KEY (`id`),
	UNIQUE KEY `affiliates_group_U_1` (`name`)
)Type=MyISAM COMMENT='Groups';

#-----------------------------------------------------------------------------
#-- categories_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categories_category`;


CREATE TABLE `categories_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Category name',
	`active` INTEGER  NOT NULL COMMENT 'Is category active?',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Categorias';

#-----------------------------------------------------------------------------
#-- users_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_groupCategory`;


CREATE TABLE `users_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `users_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `users_group` (`id`)
		ON DELETE CASCADE,
	INDEX `users_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `users_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `categories_category` (`id`)
)Type=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- affiliates_groupCategory
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `affiliates_groupCategory`;


CREATE TABLE `affiliates_groupCategory`
(
	`groupId` INTEGER  NOT NULL COMMENT 'Group ID',
	`categoryId` INTEGER  NOT NULL COMMENT 'Category ID',
	PRIMARY KEY (`groupId`,`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_1`
		FOREIGN KEY (`groupId`)
		REFERENCES `affiliates_group` (`id`)
		ON DELETE CASCADE,
	INDEX `affiliates_groupCategory_FI_2` (`categoryId`),
	CONSTRAINT `affiliates_groupCategory_FK_2`
		FOREIGN KEY (`categoryId`)
		REFERENCES `categories_category` (`id`)
)Type=MyISAM COMMENT='Groups / Categories';

#-----------------------------------------------------------------------------
#-- modules_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_module`;


CREATE TABLE `modules_module`
(
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre del modulo',
	`active` INTEGER default 0 NOT NULL COMMENT 'Estado del modulo',
	`alwaysActive` INTEGER default 0 NOT NULL COMMENT 'Modulo siempre activo',
	PRIMARY KEY (`name`)
)Type=MyISAM COMMENT=' Registro de modulos';

#-----------------------------------------------------------------------------
#-- modules_dependency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_dependency`;


CREATE TABLE `modules_dependency`
(
	`moduleName` VARCHAR(50)  NOT NULL COMMENT 'Modulo',
	`dependence` VARCHAR(50)  NOT NULL COMMENT 'Modulos de los cuales depende',
	PRIMARY KEY (`moduleName`,`dependence`),
	CONSTRAINT `modules_dependency_FK_1`
		FOREIGN KEY (`moduleName`)
		REFERENCES `modules_module` (`name`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Dependencia de modulos ';

#-----------------------------------------------------------------------------
#-- modules_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modules_label`;


CREATE TABLE `modules_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id module label',
	`name` VARCHAR(255)  NOT NULL COMMENT 'nombre del modulo',
	`label` VARCHAR(255) COMMENT 'Etiqueta',
	`description` VARCHAR(255) COMMENT 'Descripcion del modulo',
	`language` VARCHAR(100) COMMENT 'idioma de la etiqueta',
	PRIMARY KEY (`id`,`name`),
	INDEX `modules_label_FI_1` (`name`),
	CONSTRAINT `modules_label_FK_1`
		FOREIGN KEY (`name`)
		REFERENCES `modules_module` (`name`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Etiquetas de modulos ';

#-----------------------------------------------------------------------------
#-- actionLogs_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_log`;


CREATE TABLE `actionLogs_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id log',
	`userId` INTEGER  NOT NULL COMMENT 'Id del usuario',
	`affiliateId` INTEGER  NOT NULL COMMENT 'Id del afiliado',
	`datetime` DATETIME  NOT NULL COMMENT 'Fecha en que se logueo el dato',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se logueo el dato',
	`object` VARCHAR(100)  NOT NULL COMMENT 'objeto sobre el cual se realizo la accion',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`),
	INDEX `actionLogs_log_FI_1` (`userId`),
	CONSTRAINT `actionLogs_log_FK_1`
		FOREIGN KEY (`userId`)
		REFERENCES `users_user` (`id`),
	INDEX `actionLogs_log_FI_2` (`action`),
	CONSTRAINT `actionLogs_log_FK_2`
		FOREIGN KEY (`action`)
		REFERENCES `security_action` (`action`)
)Type=MyISAM COMMENT='logs del sistema';

#-----------------------------------------------------------------------------
#-- actionLogs_label
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actionLogs_label`;


CREATE TABLE `actionLogs_label`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id Label',
	`action` VARCHAR(100)  NOT NULL COMMENT 'action en que se loguea el dato',
	`label` VARCHAR(100)  NOT NULL COMMENT 'mensaje del log',
	`language` VARCHAR(100) COMMENT 'idioma de la etiqueta',
	`forward` VARCHAR(100) COMMENT 'tipo de accion de la etiqueta',
	PRIMARY KEY (`id`,`action`)
)Type=MyISAM COMMENT='Etiquetas de logueo';

#-----------------------------------------------------------------------------
#-- lausi_workforce
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_workforce`;


CREATE TABLE `lausi_workforce`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de fuerza de trabajo',
	`name` VARCHAR(100)  NOT NULL COMMENT 'Nombre de fuerza de trabajo',
	`telephone` VARCHAR(100) COMMENT 'telefono de contacto',
	`workInHeight` INTEGER COMMENT 'Trabaja en altura',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Base de Fuerza de Trabajo';

#-----------------------------------------------------------------------------
#-- lausi_circuit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_circuit`;


CREATE TABLE `lausi_circuit`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de Circuito',
	`name` VARCHAR(100)  NOT NULL COMMENT 'Nombre del circuito',
	`description` TEXT COMMENT 'descripcion del circuito',
	`limitsDescription` TEXT COMMENT 'descripcion de los limites del circuito',
	`orderBy` INTEGER COMMENT 'Orden del Circuito',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Base de Circuitos';

#-----------------------------------------------------------------------------
#-- lausi_workforceCircuit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_workforceCircuit`;


CREATE TABLE `lausi_workforceCircuit`
(
	`workforceId` INTEGER  NOT NULL,
	`circuitId` INTEGER  NOT NULL,
	PRIMARY KEY (`workforceId`,`circuitId`),
	CONSTRAINT `lausi_workforceCircuit_FK_1`
		FOREIGN KEY (`workforceId`)
		REFERENCES `lausi_workforce` (`id`),
	INDEX `lausi_workforceCircuit_FI_2` (`circuitId`),
	CONSTRAINT `lausi_workforceCircuit_FK_2`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- lausi_region
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_region`;


CREATE TABLE `lausi_region`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL COMMENT 'Name',
	PRIMARY KEY (`id`),
	UNIQUE KEY `lausi_region_U_1` (`name`)
)Type=MyISAM COMMENT='Barrios';

#-----------------------------------------------------------------------------
#-- lausi_address
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_address`;


CREATE TABLE `lausi_address`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la calle',
	`street` VARCHAR(100)  NOT NULL COMMENT 'Nombre de la calle',
	`number` INTEGER COMMENT 'numero de la calle',
	`rating` INTEGER COMMENT 'Valoracion de la calle',
	`intersection` VARCHAR(100) COMMENT 'cruce con otra calle de la direccion',
	`owner` VARCHAR(100) COMMENT 'duenio de la direccion',
	`latitude` FLOAT COMMENT 'latitud de la direccion',
	`longitude` FLOAT COMMENT 'longitud de la direccion',
	`regionId` INTEGER COMMENT 'barrio de la direccion',
	`ownerPhone` VARCHAR(100) COMMENT 'telefono de contacto',
	`orderCircuit` INTEGER default 0 COMMENT 'ordenamiento por proximidad en el circuito entre direcciones',
	`nickname` VARCHAR(100) default '' COMMENT 'Nombre de Fantasia de la direccion',
	`circuitId` INTEGER COMMENT 'circuito al que pertenece la calle',
	PRIMARY KEY (`id`),
	INDEX `lausi_address_FI_1` (`circuitId`),
	CONSTRAINT `lausi_address_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`),
	INDEX `lausi_address_FI_2` (`regionId`),
	CONSTRAINT `lausi_address_FK_2`
		FOREIGN KEY (`regionId`)
		REFERENCES `lausi_region` (`id`)
)Type=MyISAM COMMENT='Base de Direcciones';

#-----------------------------------------------------------------------------
#-- lausi_client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_client`;


CREATE TABLE `lausi_client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del cliente',
	`name` VARCHAR(100)  NOT NULL COMMENT 'Nombre del cliente',
	`contact` VARCHAR(100) COMMENT 'contacto del cliente',
	PRIMARY KEY (`id`)
)Type=MyISAM COMMENT='Base de Clientes';

#-----------------------------------------------------------------------------
#-- lausi_clientAddress
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_clientAddress`;


CREATE TABLE `lausi_clientAddress`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id de la direccion del cliente',
	`street` VARCHAR(100)  NOT NULL COMMENT 'Nombre de la direccion del cliente',
	`number` INTEGER COMMENT 'numero de la direccion del cliente',
	`intersection` VARCHAR(100) COMMENT 'cruce con otra calle de la direccion del cliente',
	`latitude` FLOAT COMMENT 'latitud de la direccion del cliente',
	`longitude` FLOAT COMMENT 'longitud de la direccion del cliente',
	`type` VARCHAR(100) COMMENT 'tipo de la direccion del cliente',
	`circuitId` INTEGER COMMENT 'circuito al que pertenece la direccion del cliente',
	`clientId` INTEGER  NOT NULL COMMENT 'Id del cliente de esa direccion',
	`regionId` INTEGER COMMENT 'barrio de la direccion',
	PRIMARY KEY (`id`),
	INDEX `lausi_clientAddress_FI_1` (`circuitId`),
	CONSTRAINT `lausi_clientAddress_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`),
	INDEX `lausi_clientAddress_FI_2` (`clientId`),
	CONSTRAINT `lausi_clientAddress_FK_2`
		FOREIGN KEY (`clientId`)
		REFERENCES `lausi_client` (`id`),
	INDEX `lausi_clientAddress_FI_3` (`regionId`),
	CONSTRAINT `lausi_clientAddress_FK_3`
		FOREIGN KEY (`regionId`)
		REFERENCES `lausi_region` (`id`)
)Type=MyISAM COMMENT='Base de Direcciones de Clientes';

#-----------------------------------------------------------------------------
#-- lausi_billboard
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_billboard`;


CREATE TABLE `lausi_billboard`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del activo',
	`number` INTEGER  NOT NULL COMMENT 'numero del activo',
	`type` INTEGER COMMENT 'tipo del activo',
	`height` INTEGER COMMENT 'si esta en altura',
	`row` INTEGER COMMENT 'fila del activo',
	`billboardColumn` INTEGER COMMENT 'columna del activo',
	`addressId` INTEGER  NOT NULL COMMENT 'altura del activo',
	PRIMARY KEY (`id`),
	INDEX `lausi_billboard_FI_1` (`addressId`),
	CONSTRAINT `lausi_billboard_FK_1`
		FOREIGN KEY (`addressId`)
		REFERENCES `lausi_address` (`id`)
		ON DELETE CASCADE
)Type=MyISAM COMMENT='Base de Activos (Carteleras)';

#-----------------------------------------------------------------------------
#-- lausi_theme
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_theme`;


CREATE TABLE `lausi_theme`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del motivo',
	`name` VARCHAR(100)  NOT NULL COMMENT 'nombre del motivo',
	`shortName` VARCHAR(100) COMMENT 'nombre abreviado del motivo',
	`startDate` DATE  NOT NULL COMMENT 'fecha de inicio del motivo',
	`duration` INTEGER  NOT NULL COMMENT 'duracion del motivo',
	`sheetsTotal` INTEGER COMMENT 'cantidad total de afiches que deberan distribuirse del motivo',
	`type` INTEGER COMMENT 'tipo del motivo',
	`active` INTEGER default 1 COMMENT 'indica si el motivo esta activo o no',
	`clientId` INTEGER  NOT NULL COMMENT 'Id del cliente del motivo',
	PRIMARY KEY (`id`),
	INDEX `lausi_theme_FI_1` (`clientId`),
	CONSTRAINT `lausi_theme_FK_1`
		FOREIGN KEY (`clientId`)
		REFERENCES `lausi_client` (`id`)
)Type=MyISAM COMMENT='Base de Motivos';

#-----------------------------------------------------------------------------
#-- lausi_advertisement
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_advertisement`;


CREATE TABLE `lausi_advertisement`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT COMMENT 'Id del motivo',
	`date` DATE  NOT NULL COMMENT 'fecha de actualizacion del aviso',
	`publishDate` DATE  NOT NULL COMMENT 'fecha de publicacion del aviso',
	`duration` INTEGER  NOT NULL COMMENT 'duracion del motivo',
	`billboardId` INTEGER  NOT NULL COMMENT 'activo del aviso',
	`themeId` INTEGER  NOT NULL COMMENT 'motivo del aviso',
	`workforceId` INTEGER default 0 COMMENT 'contratista asignado a ese workforce (solo sextuples)',
	PRIMARY KEY (`id`),
	INDEX `lausi_advertisement_FI_1` (`billboardId`),
	CONSTRAINT `lausi_advertisement_FK_1`
		FOREIGN KEY (`billboardId`)
		REFERENCES `lausi_billboard` (`id`)
		ON DELETE CASCADE,
	INDEX `lausi_advertisement_FI_2` (`themeId`),
	CONSTRAINT `lausi_advertisement_FK_2`
		FOREIGN KEY (`themeId`)
		REFERENCES `lausi_theme` (`id`),
	INDEX `lausi_advertisement_FI_3` (`workforceId`),
	CONSTRAINT `lausi_advertisement_FK_3`
		FOREIGN KEY (`workforceId`)
		REFERENCES `lausi_workforce` (`id`)
)Type=MyISAM COMMENT='Base de Avisos';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
