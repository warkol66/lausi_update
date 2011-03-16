<?php

// The parent class
require_once 'om/BaseAddressPeer.php';

// The object class
include_once 'Address.php';

/**
 * Class AddressPeer
 *
 * @package Address
 */
class AddressPeer extends BaseAddressPeer {


	//opciones de busqueda
	private $regionId;
	private $circuitId;
	private $rating;
	private $streetName;
	
	
	/**
	 * Especifica un Barrio para limitar una busqueda
	 * @param integer id de barrio
	 *
	 */
	public function setRegionId($regionId) {
		
		$this->regionId = $regionId;
		
	}

	/**
	 * Especifica un Tipo de cartelera que debe tener la direccion
	 * @param integer tipo de catelera
	 *
	 */
	public function setBillboardType($type) {
		
		$this->billboardType = $type;
		
	}

	/**
	 * Especifica un Circuito para limitar una busqueda
	 * @param integer id de circuit
	 *
	 */	
	public function setCircuitId($circuitId) {
		
		$this->circuitId = $circuitId;
		
	}
	
	/**
	 * Especifica una Valoracion para limitar una busqueda
	 * @param integer codigo de valoracion
	 *
	 */	
	public function setRating($rating) {
		
		$this->rating = $rating;
		
	}
	
	/**
	 * Especifica un nombre de calle o aproximado para limitar una busqueda
	 * @param string nombre de calle o aproximacion
	 *
	 */	
	public function setStreetName($streetName) {
		
		$this->streetName = $streetName;
	}
	
	/**
	 * Crea una criteria a partir de los distintos parametros de filtrado con los que se inicializo
	 * el Peer.
	 *
	 * @return Criteria instancia de criteria
	 */
	private function generateFilterCriteria() {
		
		$criteria = new Criteria();
		
		if (isset($this->rating))
			$criteria->add(AddressPeer::RATING,$this->rating);
		
		if (isset($this->circuitId)) {
			$criteria->add(AddressPeer::CIRCUITID,$this->circuitId);
			$criteria->addAscendingOrderByColumn(AddressPeer::ORDERCIRCUIT);
		}	
		if (isset($this->regionId))
			$criteria->add(AddressPeer::REGIONID,$this->regionId);
		
		if (isset($this->streetName)) {
			$criterionStreet = $criteria->getNewCriterion(AddressPeer::STREET,"%" . $this->streetName . "%",Criteria::LIKE);
			$criterionNickname = $criteria->getNewCriterion(AddressPeer::NICKNAME,"%" . $this->streetName . "%",Criteria::LIKE);
			$criterionStreet->addOr($criterionNickname);

			$criteria->add($criterionStreet);
		}
		
		if (isset($this->billboardType) && ($this->billboardType > 0)) {
			$criteria->addJoin(AddressPeer::ID,BillboardPeer::ADDRESSID,Criteria::INNER_JOIN);
			$criteria->add(BillboardPeer::TYPE,$this->billboardType);
			$criteria->setDistinct();
		}
		
		
		$criteria->addJoin(AddressPeer::CIRCUITID,CircuitPeer::ID,Criteria::LEFT_JOIN);

		//ordenamiento por default pedidos
		$criteria->addAscendingOrderByColumn(AddressPeer::STREET);
		$criteria->addAscendingOrderByColumn(CircuitPeer::NAME);
		
		return $criteria;
		
	}


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
  * Crea un address nuevo.
  *
  * @param string $street street del address
  * @param int $number number del address
  * @param int $rating rating del address
  * @param string $intersection intersection del address
  * @param string $owner owner del address
  * @param float $latitude latitude del address
  * @param float $longitude longitude del address
  * @param int $regionId regionId del address
  * @param string $ownerPhone ownerPhone del address
  * @param int $circuitId circuitId del address
  * @param Connection $con [optional] Conexion a la db  
  * @return Address instance si se creo el address correctamente, false sino
	*/
	function create($street,$number,$rating,$intersection,$owner,$latitude,$longitude,$regionId,$ownerPhone,$circuitId,$nickname,$con = null) {
    	$addressObj = new Address();
    	$addressObj->setstreet($street);
		$addressObj->setnumber($number);
		$addressObj->setrating($rating);
		$addressObj->setintersection($intersection);
		$addressObj->setowner($owner);
		$addressObj->setlatitude($latitude);
		$addressObj->setlongitude($longitude);
		$addressObj->setregionId($regionId);
		$addressObj->setownerPhone($ownerPhone);
		$addressObj->setcircuitId($circuitId);
		$addressObj->setNickname($nickname);
		$addressObj->save($con);
		return $addressObj;
	}
	
  /**
  * Crea un address nuevo, con sus carteleras.
  *
  * @param string $street street del address
  * @param int $number number del address
  * @param int $rating rating del address
  * @param string $intersection intersection del address
  * @param string $owner owner del address
  * @param float $latitude latitude del address
  * @param float $longitude longitude del address
  * @param int $regionId regionId del address
  * @param string $ownerPhone ownerPhone del address
  * @param int $circuitId circuitId del address
  * @param int $totalBillboardsDobles Cantidad de carteleras dobles
  * @param int $totalBillboardsSextuples Cantidad de carteleras sextuples  
  * @param Connection $con [optional] Conexion a la db  
  * @return Address instance si se creo el address correctamente, false sino
	*/	
	function createWithBillboards($street,$number,$rating,$intersection,$owner,$latitude,$longitude,$regionId,$ownerPhone,$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples,$con = null) {
		$address = AddressPeer::create($street,$number,$rating,$intersection,$owner,$latitude,$longitude,$regionId,$ownerPhone,$circuitId,$con);
		$address->createBillboards($totalBillboardsDobles,$totalBillboardsSextuples);

		return $address;	
	}

  /**
  * Actualiza el circuito y las carteleras de una direccion.
  *
  * @param string $street street del address
  * @param int $number number del address
  * @param int $circuitId circuitId del address
  * @param int $totalBillboardsDobles Cantidad de carteleras dobles
  * @param int $totalBillboardsSextuples Cantidad de carteleras sextuples  
  * @return boolean true si se actualizo correctamente, false sino
	*/		
	function updateCircuitAndBillboards($street,$number,$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples) {
		$address = AddressPeer::getByStreet($street,$number);
		if (!empty($address)) {
			$address->setCircuitId($circuitId);
			$address->save();
			$billboards = $address->getBillboardCount();
			//Solo creo los billboards si la direccion no tiene ninguno
			if ($billboards == 0)
				$address->createBillboards($totalBillboardsDobles,$totalBillboardsSextuples);
			return $address->getId();
		}
		return false;
	}
	
  /**
  * Actualiza el circuito y las carteleras de una direccion con interseccion.
  *
  * @param string $street street del address
  * @param string $intersection interseccion
  * @param int $circuitId circuitId del address
  * @param int $totalBillboardsDobles Cantidad de carteleras dobles
  * @param int $totalBillboardsSextuples Cantidad de carteleras sextuples  
  * @return boolean true si se actualizo correctamente, false sino
	*/		
	function updateCircuitAndBillboardsWithIntersection($street,$intersection,$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples) {
		$address = AddressPeer::getByStreetAndIntersection($street,$intersection);
		if (!empty($address)) {
			$address->setCircuitId($circuitId);
			$address->save();
			$billboards = $address->getBillboardCount();
			//Solo creo los billboards si la direccion no tiene ninguno
			if ($billboards == 0)			
				$address->createBillboards($totalBillboardsDobles,$totalBillboardsSextuples);
			return $address->getId();
		}
		return false;
	}	
	
  /**
  * Actualiza el circuito y las carteleras de una direccion con un like.
  *
  * @param string $street street del address
  * @param int $number number del address
  * @param int $circuitId circuitId del address
  * @param int $totalBillboardsDobles Cantidad de carteleras dobles
  * @param int $totalBillboardsSextuples Cantidad de carteleras sextuples  
  * @return boolean true si se actualizo correctamente, false sino
	*/		
	function updateCircuitAndBillboardsLikeStreet($street,$number,$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples) {
		$address = AddressPeer::getLikeStreet($street,$number);
		if (!empty($address)) {
			$address->setCircuitId($circuitId);
			$address->save();
			$billboards = $address->getBillboardCount();
			//Solo creo los billboards si la direccion no tiene ninguno
			if ($billboards == 0)			
				$address->createBillboards($totalBillboardsDobles,$totalBillboardsSextuples);
			return $address->getId();
		}
		return false;
	}		

  /**
  * Actualiza la informacion de un address.
  *
  * @param int $id id del address
  * @param string $street street del address
  * @param int $number number del address
  * @param int $rating rating del address
  * @param string $intersection intersection del address
  * @param string $owner owner del address
  * @param float $latitude latitude del address
  * @param float $longitude longitude del address
  * @param int $regionId regionId del address
  * @param string $ownerPhone ownerPhone del address
  * @param int $circuitId circuitId del address
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$street,$number,$rating,$intersection,$owner,$latitude,$longitude,$regionId,$ownerPhone,$circuitId,$nickname) {
  	$addressObj = AddressPeer::retrieveByPK($id);
    $addressObj->setstreet($street);
    $addressObj->setnumber($number);
    $addressObj->setrating($rating);
    $addressObj->setintersection($intersection);
    $addressObj->setowner($owner);
    $addressObj->setlatitude($latitude);
    $addressObj->setlongitude($longitude);
    $addressObj->setregionId($regionId);
    $addressObj->setownerPhone($ownerPhone);
    $addressObj->setcircuitId($circuitId);
	$addressObj->setNickname($nickname);
    $addressObj->save();
		return true;
  }

	/**
	* Elimina un address a partir de los valores de la clave.
	*
  * @param int $id id del address
	*	@return boolean true si se elimino correctamente el address, false sino
	*/
  function delete($id) {
  	$addressObj = AddressPeer::retrieveByPK($id);
    $addressObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un address.
  *
  * @param int $id id del address
  * @return array Informacion del address
  */
  function get($id) {
		$addressObj = AddressPeer::retrieveByPK($id);
    return $addressObj;
  }
  
  /**
  * Indica si existe una dirección con una calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return boolean true si existe la dirección, false si no existe
  */  
  function exists($street,$number) {
  	$criteria = new Criteria();
	$criteria->add(AddressPeer::STREET,$street);
	$criteria->add(AddressPeer::NUMBER,$number);
	$result = AddressPeer::doSelect($criteria);
	if (count($result)>0)
		return true;
	else
		return false;
  }
  
  /**
  * Obtiene una dirección con una calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return Address dirección
  */    
  function getByStreet($street,$number) {
	$criteria = new Criteria();
	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"á","a"),"é","e"),"í","i"),"ó","o"),"ú","u") = "'.$street.'" )';
	$criteria->add(AddressPeer::STREET,$sql,Criteria::CUSTOM);
	$criteria->add(AddressPeer::NUMBER,$number);
	$address = AddressPeer::doSelectOne($criteria); 
	return $address; 
  }
  
  /**
  * Obtiene una dirección con un like calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return Address dirección
  */    
  function getLikeStreet($street,$number) {
	$criteria = new Criteria();
	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"á","a"),"é","e"),"í","i"),"ó","o"),"ú","u") LIKE "'.$street.'%" )';
	$criteria->add(AddressPeer::STREET,$sql,Criteria::CUSTOM);
	$criteria->add(AddressPeer::NUMBER,$number);
	$address = AddressPeer::doSelectOne($criteria); 
	return $address; 
  }  
  
  /**
  * Obtiene una dirección con una calle y intersection dado.
  *
  * @param string $street calle
  * @param string $intersection calle
  * @return Address dirección
  */    
  function getByStreetAndIntersection($street,$intersection) {
	$criteria = new Criteria();
	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"á","a"),"é","e"),"í","i"),"ó","o"),"ú","u") = "'.$street.'" )';
	$criteria->add(AddressPeer::STREET,$sql,Criteria::CUSTOM);
	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.intersection,"á","a"),"é","e"),"í","i"),"ó","o"),"ú","u") like "%'.$intersection.'%" )';	
	$criteria->add(AddressPeer::INTERSECTION,$sql,Criteria::CUSTOM);
	$address = AddressPeer::doSelectOne($criteria); 
	return $address; 
  }  

  /**
  * Obtiene todos los addresses.
	*
	*	@return array Informacion sobre todos los addresses
  */
	function getAll($criteria = null) {
	
		if ($criteria == null)		
			$cond = new Criteria();
		else
			$cond = $criteria;
			
		$alls = AddressPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los addresses paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los addresses
  */
  function getAllPaginated($page=1,$perPage=-1,$criteria = null) {  
    if ($perPage == -1)
      $perPage = 	AddressPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    if ($criteria == null)
    	$cond = new Criteria();
    else 
    	$cond = $criteria;
    $pager = new PropelPager($cond,"AddressPeer", "doSelect",$page,$perPage);
    return $pager;
   }

	/**
	* Obtiene todos los addresses paginados aplicando el filtro correspondiente.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de filas por pagina
	*	@return array Informacion sobre todos los addresses segun el criterio de filtrado
	*/
	public function getAllPaginatedFiltered($page=1,$perPage=-1) {
		if (empty($page))
			$page = 1;

		$criteria = $this->generateFilterCriteria();
		return $this->getAllPaginated($page,$perPage,$criteria);
	}

	/**
	* Obtiene todos los addresses aplicando los criterios de filtrado
	*
	*	@return array Informacion sobre todos los addresses
	*/
	public function getAllFilter() {
		
		$criteria = $this->generateFilterCriteria();
		return $this->getAll($criteria);
		
	}
	
	public function changeAddressOrderCircuit($addressId,$position) {
		$address = AddressPeer::get($addressId);

		try {
			$address->setOrderCircuit($position);
			$address->save();
		}
		catch (Exception $exp) {
			return false;
		}
		
		return true;

	}

}