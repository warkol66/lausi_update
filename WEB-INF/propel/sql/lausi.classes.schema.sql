
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- lausi_workforce
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_workforce`;

CREATE TABLE `lausi_workforce`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de fuerza de trabajo',
	`name` VARCHAR(100) NOT NULL COMMENT 'Nombre de fuerza de trabajo',
	`telephone` VARCHAR(100) COMMENT 'telefono de contacto',
	`workInHeight` TINYINT COMMENT 'Trabaja en altura',
	`deleted_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Fuerza de Trabajo';

-- ---------------------------------------------------------------------
-- lausi_circuit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_circuit`;

CREATE TABLE `lausi_circuit`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de Circuito',
	`name` VARCHAR(100) NOT NULL COMMENT 'Nombre del circuito',
	`description` TEXT COMMENT 'descripcion del circuito',
	`limitsDescription` TEXT COMMENT 'descripcion de los limites del circuito',
	`orderBy` INTEGER COMMENT 'Orden del Circuito',
	`color` VARCHAR(7) COMMENT 'Color del Circuito para mostrar en mapa',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Circuitos';

-- ---------------------------------------------------------------------
-- lausi_circuitPoint
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_circuitPoint`;

CREATE TABLE `lausi_circuitPoint`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de Circuito',
	`circuitId` INTEGER NOT NULL,
	`latitude` FLOAT COMMENT 'latitud',
	`longitude` FLOAT COMMENT 'longitud',
	PRIMARY KEY (`id`),
	INDEX `lausi_circuitPoint_FI_1` (`circuitId`),
	CONSTRAINT `lausi_circuitPoint_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Puntos que conforman el perimetro de los circuitos';

-- ---------------------------------------------------------------------
-- lausi_workforceCircuit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_workforceCircuit`;

CREATE TABLE `lausi_workforceCircuit`
(
	`workforceId` INTEGER NOT NULL,
	`circuitId` INTEGER NOT NULL,
	PRIMARY KEY (`workforceId`,`circuitId`),
	INDEX `lausi_workforceCircuit_FI_2` (`circuitId`),
	CONSTRAINT `lausi_workforceCircuit_FK_1`
		FOREIGN KEY (`workforceId`)
		REFERENCES `lausi_workforce` (`id`),
	CONSTRAINT `lausi_workforceCircuit_FK_2`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci';

-- ---------------------------------------------------------------------
-- lausi_region
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_region`;

CREATE TABLE `lausi_region`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL COMMENT 'Name',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `lausi_region_U_1` (`name`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Barrios';

-- ---------------------------------------------------------------------
-- lausi_address
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_address`;

CREATE TABLE `lausi_address`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de la calle',
	`street` VARCHAR(100) NOT NULL COMMENT 'Nombre de la calle',
	`number` INTEGER COMMENT 'numero de la calle',
	`rating` INTEGER COMMENT 'Valoracion de la calle',
	`intersection` VARCHAR(100) COMMENT 'cruce con otra calle de la direccion',
	`owner` VARCHAR(100) COMMENT 'duenio de la direccion',
	`latitude` FLOAT COMMENT 'latitud de la direccion',
	`longitude` FLOAT COMMENT 'longitud de la direccion',
	`regionId` INTEGER COMMENT 'barrio de la direccion',
	`ownerPhone` VARCHAR(100) COMMENT 'telefono de contacto',
	`orderCircuit` INTEGER DEFAULT 0 COMMENT 'ordenamiento por proximidad en el circuito entre direcciones',
	`nickname` VARCHAR(100) DEFAULT '' COMMENT 'Nombre de Fantasia de la direccion',
	`circuitId` INTEGER COMMENT 'circuito al que pertenece la calle',
	PRIMARY KEY (`id`),
	INDEX `lausi_address_FI_1` (`circuitId`),
	INDEX `lausi_address_FI_2` (`regionId`),
	CONSTRAINT `lausi_address_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`),
	CONSTRAINT `lausi_address_FK_2`
		FOREIGN KEY (`regionId`)
		REFERENCES `lausi_region` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Direcciones';

-- ---------------------------------------------------------------------
-- lausi_client
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_client`;

CREATE TABLE `lausi_client`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id del cliente',
	`name` VARCHAR(100) NOT NULL COMMENT 'Nombre del cliente',
	`contact` VARCHAR(100) COMMENT 'contacto del cliente',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Clientes';

-- ---------------------------------------------------------------------
-- lausi_clientAddress
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_clientAddress`;

CREATE TABLE `lausi_clientAddress`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de la direccion del cliente',
	`street` VARCHAR(100) NOT NULL COMMENT 'Nombre de la direccion del cliente',
	`number` INTEGER COMMENT 'numero de la direccion del cliente',
	`intersection` VARCHAR(100) COMMENT 'cruce con otra calle de la direccion del cliente',
	`latitude` FLOAT COMMENT 'latitud de la direccion del cliente',
	`longitude` FLOAT COMMENT 'longitud de la direccion del cliente',
	`type` VARCHAR(100) COMMENT 'tipo de la direccion del cliente',
	`circuitId` INTEGER COMMENT 'circuito al que pertenece la direccion del cliente',
	`clientId` INTEGER NOT NULL COMMENT 'Id del cliente de esa direccion',
	`regionId` INTEGER COMMENT 'barrio de la direccion',
	PRIMARY KEY (`id`),
	INDEX `lausi_clientAddress_FI_1` (`circuitId`),
	INDEX `lausi_clientAddress_FI_2` (`clientId`),
	INDEX `lausi_clientAddress_FI_3` (`regionId`),
	CONSTRAINT `lausi_clientAddress_FK_1`
		FOREIGN KEY (`circuitId`)
		REFERENCES `lausi_circuit` (`id`),
	CONSTRAINT `lausi_clientAddress_FK_2`
		FOREIGN KEY (`clientId`)
		REFERENCES `lausi_client` (`id`),
	CONSTRAINT `lausi_clientAddress_FK_3`
		FOREIGN KEY (`regionId`)
		REFERENCES `lausi_region` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Direcciones de Clientes';

-- ---------------------------------------------------------------------
-- lausi_billboard
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_billboard`;

CREATE TABLE `lausi_billboard`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id del activo',
	`number` INTEGER NOT NULL COMMENT 'numero del activo',
	`type` INTEGER COMMENT 'tipo del activo',
	`height` TINYINT COMMENT 'si esta en altura',
	`row` INTEGER COMMENT 'fila del activo',
	`billboardColumn` INTEGER COMMENT 'columna del activo',
	`addressId` INTEGER NOT NULL COMMENT 'altura del activo',
	PRIMARY KEY (`id`),
	INDEX `lausi_billboard_FI_1` (`addressId`),
	CONSTRAINT `lausi_billboard_FK_1`
		FOREIGN KEY (`addressId`)
		REFERENCES `lausi_address` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Activos (Carteleras)';

-- ---------------------------------------------------------------------
-- lausi_theme
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_theme`;

CREATE TABLE `lausi_theme`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id del motivo',
	`name` VARCHAR(100) NOT NULL COMMENT 'nombre del motivo',
	`shortName` VARCHAR(100) COMMENT 'nombre abreviado del motivo',
	`startDate` DATE NOT NULL COMMENT 'fecha de inicio del motivo',
	`duration` INTEGER NOT NULL COMMENT 'duracion del motivo',
	`sheetsTotal` INTEGER COMMENT 'cantidad total de afiches que deberan distribuirse del motivo',
	`type` INTEGER COMMENT 'tipo del motivo',
	`active` TINYINT DEFAULT 1 COMMENT 'indica si el motivo esta activo o no',
	`clientId` INTEGER NOT NULL COMMENT 'Id del cliente del motivo',
	PRIMARY KEY (`id`),
	INDEX `lausi_theme_FI_1` (`clientId`),
	CONSTRAINT `lausi_theme_FK_1`
		FOREIGN KEY (`clientId`)
		REFERENCES `lausi_client` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Motivos';

-- ---------------------------------------------------------------------
-- lausi_advertisement
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lausi_advertisement`;

CREATE TABLE `lausi_advertisement`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id del motivo',
	`date` DATE NOT NULL COMMENT 'fecha de actualizacion del aviso',
	`publishDate` DATE NOT NULL COMMENT 'fecha de publicacion del aviso',
	`duration` INTEGER NOT NULL COMMENT 'duracion del motivo',
	`billboardId` INTEGER NOT NULL COMMENT 'activo del aviso',
	`themeId` INTEGER NOT NULL COMMENT 'motivo del aviso',
	`workforceId` INTEGER DEFAULT 0 COMMENT 'contratista asignado a ese workforce (solo sextuples)',
	PRIMARY KEY (`id`),
	INDEX `lausi_advertisement_FI_1` (`billboardId`),
	INDEX `lausi_advertisement_FI_2` (`themeId`),
	INDEX `lausi_advertisement_FI_3` (`workforceId`),
	CONSTRAINT `lausi_advertisement_FK_1`
		FOREIGN KEY (`billboardId`)
		REFERENCES `lausi_billboard` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `lausi_advertisement_FK_2`
		FOREIGN KEY (`themeId`)
		REFERENCES `lausi_theme` (`id`),
	CONSTRAINT `lausi_advertisement_FK_3`
		FOREIGN KEY (`workforceId`)
		REFERENCES `lausi_workforce` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Base de Avisos';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
