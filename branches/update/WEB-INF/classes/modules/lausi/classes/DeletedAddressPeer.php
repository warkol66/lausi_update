<?php



/**
 * Skeleton subclass for performing query and update operations on the 'lausi_deletedAddress' table.
 *
 * Base de Direcciones eliminadas
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lausi.classes
 */
class DeletedAddressPeer extends BaseDeletedAddressPeer {

	//opciones de busqueda
	private $searchRegionId;
	private $searchBillboardType;
	private $searchCircuitId;
	private $searchRating;
	private $searchStreetName;
	private $searchEnumeration;
	
	//mapea las condiciones del filtro
	var $filterConditions = array(
		"searchRegionId"=>"setSearchRegionId",
		"searchBillboardType"=>"setSearchBillboardType",
		"searchCircuitId"=>"setSearchCircuitId",
		"searchRating"=>"setSearchRating",
		"searchStreetName"=>"setSearchStreetName",
		"searchEnumeration"=>"setSearchEnumeration"
	);
	
	/**
	 * Especifica un Barrio para limitar una busqueda
	 * @param integer id de barrio
	 *
	 */
	public function setSearchRegionId($searchRegionId) {
		$this->searchRegionId = $searchRegionId;
	}

	/**
	 * Especifica un Tipo de cartelera que debe tener la direccion
	 * @param integer tipo de catelera
	 *
	 */
	public function setSearchBillboardType($searchBillboardType) {
		$this->searchBillboardType = $searchBillboardType;
	}

	/**
	 * Especifica un Circuito para limitar una busqueda
	 * @param integer id de circuit
	 *
	 */	
	public function setSearchCircuitId($searchCircuitId) {
		$this->searchCircuitId = $searchCircuitId;
	}
	
	/**
	 * Especifica una Valoracion para limitar una busqueda
	 * @param integer codigo de valoracion
	 *
	 */	
	public function setSearchRating($searchRating) {
		$this->searchRating = $searchRating;
	}
	
	/**
	 * Especifica un nombre de calle o aproximado para limitar una busqueda
	 * @param string nombre de calle o aproximacion
	 *
	 */	
	public function setSearchStreetName($searchStreetName) {
		$this->searchStreetName = $searchStreetName;
	}
	
	/**
	 * Especifica un numero de padron para limitar una busqueda
	 * @param string numero de padron
	 *
	 */	
	public function setSearchEnumeration($searchEnumeration) {
		$this->searchEnumeration = $searchEnumeration;
	}

	/**
	 * Crea una criteria a partir de los distintos parametros de filtrado con los que se inicializo
	 * el Peer.
	 *
	 * @return Criteria instancia de criteria
	 */
	public function getSearchCriteria() {
		$criteria = new DeletedAddressQuery();
		
		if ($this->searchRating)
			$criteria->filterByRating($this->searchRating);
		
		if ($this->searchCircuitId) {
			$criteria->filterByCircuitId($this->searchCircuitId)
					 ->orderByOrdercircuit();
		}	
		if ($this->searchRegionId)
			$criteria->filterByRegionId($this->searchRegionId);
		
		if ($this->searchStreetName) {
			$criteria->filterByStreet("%" . $this->searchStreetName . "%", Criteria::LIKE)
					 ->_or()
					 ->filterByNickname("%" . $this->searchStreetName . "%", Criteria::LIKE);
		}
		
		if ($this->searchEnumeration)
			$criteria->filterByEnumeration("%" . $this->searchEnumeration . "%", Criteria::LIKE);

		if ($this->searchBillboardType && ($this->searchBillboardType > 0)) {
			$criteria->join('Billboard')
					 ->useQuery('Billboard')
						->filterByType($this->searchBillboardType)
					 ->endUse()
					 ->distinct();
		}
		
		$criteria->join('Circuit', Criteria::LEFT_JOIN);

		//ordenamiento por default pedidos
		$criteria->orderByStreet();
		$criteria->orderBy('Circuit.Name');
		return $criteria;
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
	function createWithBillboards($params,$totalBillboardsDobles,$totalBillboardsSextuples) {
		$address = new Address;
		Common::setObjectFromParams($address, $params);
		$address->save();	
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
		$address = DeletedAddressPeer::getByStreet($street,$number);
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
		$address = DeletedAddressPeer::getByStreetAndIntersection($street,$intersection);
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
		$address = DeletedAddressPeer::getLikeStreet($street,$number);
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
  * Elimina un address a partir de los valores de la clave.
  *
  * @param int $id id del address
  *	@return boolean true si se elimino correctamente el address, false sino
  */
  function delete($id) {
  	return DeletedAddressQuery::create()->filterByPrimaryKey($id)->delete();
  }

  /**
  * Obtiene la informacion de un address.
  *
  * @param int $id id del address
  * @return array Informacion del address
  */
  function get($id) {
  	return DeletedAddressQuery::create()->findPk($id);
  }
  
  /**
  * Indica si existe una direcci�n con una calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return boolean true si existe la direcci�n, false si no existe
  */  
  function exists($street,$number) {
  	return DeletedAddressQuery::create()
  		->filterByStreet($street)
		->filterByNumber($number)
		->count > 0;
  }
  
  /**
  * Obtiene una direcci�n con una calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return Address direcci�n
  */    
  function getByStreet($street,$number) {
  	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"�","a"),"�","e"),"�","i"),"�","o"),"�","u") = "'.$street.'" )';
	
  	return DeletedAddressQuery::create()
		->where($sql)
		->filterByNumber($number)
		->findOne();
  }
  
  /**
  * Obtiene una direcci�n con un like calle y numero dado.
  *
  * @param string $street calle
  * @param int $number nro
  * @return Address direcci�n
  */    
  function getLikeStreet($street,$number) {
  	$sql = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"�","a"),"�","e"),"�","i"),"�","o"),"�","u") LIKE "'.$street.'%" )';
	
  	return DeletedAddressQuery::create()
		->where($sql)
		->filterByNumber($number)
		->findOne();
  }  
  
  /**
  * Obtiene una direcci�n con una calle y intersection dado.
  *
  * @param string $street calle
  * @param string $intersection calle
  * @return Address direcci�n
  */    
  function getByStreetAndIntersection($street,$intersection) {
  	$sql1 = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.street,"�","a"),"�","e"),"�","i"),"�","o"),"�","u") = "'.$street.'" )';
	$sql2 = '( REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(lausi_address.intersection,"�","a"),"�","e"),"�","i"),"�","o"),"�","u") like "%'.$intersection.'%" )';
	
  	return DeletedAddressQuery::create()
		->where($sql1)
		->where($sql2)
		->findOne();
  }  

	/**
	 * Obtiene todos los addresses.
	 *
	 *	@return array Informacion sobre todos los addresses
	 */
	function getAll($criteria = null) {
		return DeletedAddressQuery::create(null, $criteria)->find();
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
			$perPage = 	Common::getRowsPerPage();
		if (empty($page))
			$page = 1;
		if ($criteria == null)
			$cond = new DeletedAddressQuery();
		else 
			$cond = $criteria;
		$pager = new PropelPager($cond,"DeletedAddressPeer", "doSelect",$page,$perPage);
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

		$criteria = $this->getSearchCriteria();
		return $this->getAllPaginated($page,$perPage,$criteria);
	}

	/**
	* Obtiene todos los addresses aplicando los criterios de filtrado
	*
	*	@return array Informacion sobre todos los addresses
	*/
	public function getAllFiltered() {
		$criteria = $this->getSearchCriteria();
		return $this->getAll($criteria);
	}
	
	public function changeAddressOrderCircuit($addressId,$position) {
		$address = DeletedAddressPeer::get($addressId);

		try {
			$address->setOrderCircuit($position);
			$address->save();
		} catch (Exception $exp) {
			return false;
		}
		
		return true;
	}
}
