<?php

// The parent class
require_once 'om/BaseClientAddressPeer.php';

// The object class
include_once 'ClientAddress.php';

/**
 * Class ClientAddressPeer
 *
 * @package ClientAddress
 */
class ClientAddressPeer extends BaseClientAddressPeer {

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
  * Crea un clientaddress nuevo.
  *
  * @param string $street street del clientaddress
  * @param int $number number del clientaddress
  * @param string $intersection intersection del clientaddress
  * @param float $latitude latitude del clientaddress
  * @param float $longitude longitude del clientaddress
  * @param string $type type del clientaddress
  * @param int $circuitId circuitId del clientaddress
  * @param int $clientId clientId del clientaddress
  * @param int $regionId regionId del clientaddress
  * @return boolean true si se creo el clientaddress correctamente, false sino
	*/
	function create($street,$number,$intersection,$latitude,$longitude,$type,$circuitId,$clientId,$regionId) {
    try {
      $clientaddressObj = new ClientAddress();
      $clientaddressObj->setstreet($street);
      $clientaddressObj->setnumber($number);
      $clientaddressObj->setintersection($intersection);
      $clientaddressObj->setlatitude($latitude);
      $clientaddressObj->setlongitude($longitude);
      $clientaddressObj->settype($type);
      $clientaddressObj->setcircuitId($circuitId);
      $clientaddressObj->setclientId($clientId);
      $clientaddressObj->setregionId($regionId);
      $clientaddressObj->save();
      return true;
    } catch (PropelException $exp) {
      return false;
    }      
	}

  /**
  * Actualiza la informacion de un clientaddress.
  *
  * @param int $id id del clientaddress
  * @param string $street street del clientaddress
  * @param int $number number del clientaddress
  * @param string $intersection intersection del clientaddress
  * @param float $latitude latitude del clientaddress
  * @param float $longitude longitude del clientaddress
  * @param string $type type del clientaddress
  * @param int $circuitId circuitId del clientaddress
  * @param int $clientId clientId del clientaddress
  * @param int $regionId regionId del clientaddress
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$street,$number,$intersection,$latitude,$longitude,$type,$circuitId,$clientId,$regionId) {
    try {
      $clientaddressObj = ClientAddressPeer::retrieveByPK($id);
      $clientaddressObj->setstreet($street);
      $clientaddressObj->setnumber($number);
      $clientaddressObj->setintersection($intersection);
      $clientaddressObj->setlatitude($latitude);
      $clientaddressObj->setlongitude($longitude);
      $clientaddressObj->settype($type);
      $clientaddressObj->setcircuitId($circuitId);
      $clientaddressObj->setclientId($clientId);
      $clientaddressObj->setregionId($regionId);
      $clientaddressObj->save();
      return true;
    } catch (PropelException $exp) {
      return false;
    }      
  }

	/**
	* Elimina un clientaddress a partir de los valores de la clave.
	*
  * @param int $id id del clientaddress
	*	@return boolean true si se elimino correctamente el clientaddress, false sino
	*/
  function delete($id) {
  	$clientaddressObj = ClientAddressPeer::retrieveByPK($id);
    $clientaddressObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un clientaddress.
  *
  * @param int $id id del clientaddress
  * @return array Informacion del clientaddress
  */
  function get($id) {
		$clientaddressObj = ClientAddressPeer::retrieveByPK($id);
    return $clientaddressObj;
  }

  /**
  * Obtiene todos los clientaddresses.
	*
	*	@return array Informacion sobre todos los clientaddresses
  */
	function getAll() {
		$cond = new Criteria();
		$alls = ClientAddressPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los clientaddresses paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los clientaddresses
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	ClientAddressPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    $cond = new Criteria();     
    $pager = new PropelPager($cond,"ClientAddressPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

}
