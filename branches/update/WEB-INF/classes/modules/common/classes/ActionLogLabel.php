<?php


/**
 * Skeleton subclass for representing a row from the 'actionLogs_label' table.
 *
 * Etiquetas de logueo
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.common.classes
 */
class ActionLogLabel extends BaseActionLogLabel {

	/*
	 * Nos da una insert de SQL a partir de los datos de la instancia
	 *
	 */
	function getSQLInsert() {
		$action = $this->getAction();
		$label = $this->getLabel();
		$lang = $this->getlanguage();
		$forward = $this->getForward();
		$sql = "INSERT INTO `actionLogs_label` (`action`, `label`, `language`, `forward`) VALUES ( '$action', '$label','$lang','$forward');";
		return $sql;
	}

} // ActionLogLabel
