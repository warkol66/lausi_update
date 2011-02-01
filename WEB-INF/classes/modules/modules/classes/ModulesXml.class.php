<?php

require_once('includes/common.inc.php');
require_once("config/DBConnection.inc.php");

/**
* Utilizada para obtener informacion de las solicitudes.
*
* @package mod_solicitudes
*/
class ModulesXml {

	/**
	* Constructor de la clase Solicitudes
	*
	* Inicializa los atributos de la clase
	* @param integer $concesionario Id del concesionario. -1 para obtener las solicitudes de todos los concesionarios
	*/
	function ModulesXml() {
	}

	
	
	/**
	*  Guarda 1 tag de xml
	*
	* @param string $action con el nombre del action
	* @param string $modulo con el nombre del modulo al cual pertenece el action
	* @param int $access con el numero de acceso que tendrá el action
	* @return true si todo está ok
	*/

	function insertTag($parentId,$tag,$value) {

		$db = new DBConnection();
		$db->connect();
		$query = "INSERT INTO modules_xml(parentId,tag,value)
              VALUES('$parentId','".$tag."','".$value."')";          
		$db->query($query);

		$query = "SELECT MAX(ID) FROM modules_xml";
		$db->query($query);
		$db->next_record();
		$result = $db->recordset2Array();

		return $result["0"]["0"];

	}

	
	/*
	* Funcion recursiva que va insertando datos en la DB en forma de arbol
	* @param integer $idBase el id del padre
	* @param array $array1 el array del padre
	* @autor Marcos Meli.
	*/

	function viewChild($idBase,$array1){
		foreach ($array1 as $keyArray => $array2){
			if(is_array($array2)){
				$idBaseChild=ModulesXml::insertTag($idBase,$keyArray);
				ModulesXml::viewChild($idBaseChild,$array2);
			}
			else {

				$idBaseChild=ModulesXml::insertTag($idBase,$keyArray,$array2);
			}
		}
	}

	/*
	* Busca el id de la raiz del xml que se ha seleccionado
	* @param string $selectedModule nombre del modulo
	* @return integer $result id principal del xml
	*/


	function searchIdXml($selectedModule){
		$result = array();
		$db = new DBConnection();
		$db->connect();
		$query = "SELECT ID FROM modules_xml WHERE value='".$selectedModule."' and parentId=0";
		$db->query($query);
		$db->next_record();
		$result = $db->recordset2Array();

		print_r($result);
		return $result["0"]["0"];
	}


	/**
	* Obtiene un arbol xml
	*
	* @param int $id Id del nodo raiz del arbol
	* @return array Arbol
	*/
	 function getTreeFromDb($id) {
		$tree = array();
		$tree["node"] = $id;
		$tree["childs"] =ModulesXml::getAllChilds($id);
			return $tree;
	 }
	
	/*
	* Obtiene todos los hijos del nodo y los hijos de los hijos.
	*
	* @return array Subarbol
	*/
	function getAllChilds() {
	  //Obtengo todos los hijos del nodo
		//$childs = $this->getChilds();
		//Obtengo recursivamente todos los hijos de cada hijo
		$childsArray = array();
		foreach ($childs as $child) {
			$childsElement = array();
			$childsElement["node"] = $child;
			//$childsElement["childs"] = $child->getAllChilds();
			$childsArray[] = $childsElement;
		}
		return $childsArray;
	}



}
?>
