DELETE FROM `security_actionLabel` WHERE `action` LIKE 'Modules%' AND `language` = 'esp';
OPTIMIZE TABLE `security_actionLabel`;
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEdit', 'Editar información del módulo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesEdit', 'Editar información de entidades', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesFieldsEdit', 'Editar campos de entidades', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallFileCheck', 'Verificación de existencia de archivos para instalación', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallSetupActionsLabel', 'Administrar etiquetas de acciones', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallSetupMessages', 'Administrar mensajes del sistema', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallSetupModuleInformation', 'Administrar información del módulo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallSetupPermissions', 'Administrar permisos de acciones', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesDoActivateX', 'Activar módulo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesAutocompleteListX', 'Atucompletar entidades de módulos', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesCreate', 'Crear entidades', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesImportSchemas', 'Importar esquemas de xml', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesFieldsList', 'Ver los campos de entidades disponibles', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesFieldsListX', 'Obtener las entidades disponibles en el sistema via Ajax', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesList', 'Ver las entidades disponibles', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesSchemaGet', 'Otener xml de entidades', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesEntitiesSqlGet', 'Obtener información sql de entidades', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallList', 'Lista de modulos para instalación', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallModuleInformationSetup', 'Administrar información del módulo', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesInstallSetupSelectLanguages', 'Administrar idiomas de instalación', 'esp');
INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('ModulesList', 'Lista de módulos', 'esp');
