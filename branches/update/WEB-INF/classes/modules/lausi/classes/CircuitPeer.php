<?php

// The parent class
require_once 'om/BaseCircuitPeer.php';

// The object class
include_once 'Circuit.php';

/**
 * Class CircuitPeer
 *
 * @package Circuit
 */
class CircuitPeer extends BaseCircuitPeer {

  /**
  * Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
  *
  * @return int Cantidad de filas por pagina
  */
  function getRowsPerPage() {
    global $system;
    return $system["config"]["system"]["rowsPerPage"];
  }

  /**
  * Crea un circuit nuevo.
  *
  * @param string $name name del circuit
  * @param string $description description del circuit
  * @param string $limitsDescription limitsDescription del circuit
  * @return boolean true si se creo el circuit correctamente, false sino
	*/
	function create($name,$description,$limitsDescription) {
    $circuitObj = new Circuit();
    $circuitObj->setname($name);
		$circuitObj->setdescription($description);
		$circuitObj->setlimitsDescription($limitsDescription);
		$circuitObj->save();
		return true;
	}

  /**
  * Actualiza la informacion de un circuit.
  *
  * @param int $id id del circuit
  * @param string $name name del circuit
  * @param string $description description del circuit
  * @param string $limitsDescription limitsDescription del circuit
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$name,$description,$limitsDescription) {
  	$circuitObj = CircuitPeer::retrieveByPK($id);
    $circuitObj->setname($name);
    $circuitObj->setdescription($description);
    $circuitObj->setlimitsDescription($limitsDescription);
    $circuitObj->save();
		return true;
  }

	/**
	* Elimina un circuit a partir de los valores de la clave.
	*
  * @param int $id id del circuit
	*	@return boolean true si se elimino correctamente el circuit, false sino
	*/
  function delete($id) {
  	$circuitObj = CircuitPeer::retrieveByPK($id);
    $circuitObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un circuit.
  *
  * @param int $id id del circuit
  * @return array Informacion del circuit
  */
  function get($id) {
		$circuitObj = CircuitPeer::retrieveByPK($id);
    return $circuitObj;
  }
  
  /**
  * Obtiene la informacion de un circuit a partir de su nombre.
  *
  * @param string $name nombre del circuit  
  * @return array Informacion del circuit
  */
  function getByName($name) {
    $criteria = new Criteria();
    $criteria->add(CircuitPeer::NAME,$name);
    $circuit = CircuitPeer::doSelectOne($criteria);
    return $circuit;
  }  

  /**
  * Obtiene todos los circuits.
	*
	*	@return array Informacion sobre todos los circuits
  */
	function getAll() {
		$cond = new Criteria();
		$alls = CircuitPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los circuits paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los circuits
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	CircuitPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    $cond = new Criteria();     
    $pager = new PropelPager($cond,"CircuitPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

}
