<?php

// The parent class
require_once 'om/BaseBillboardPeer.php';

// The object class
include_once 'Billboard.php';

require_once('AddressPeer.php');

/**
 * Class BillboardPeer
 *
 * @package Billboard
 */
class BillboardPeer extends BaseBillboardPeer {

  const TYPE_DOBLE = 1;
  const TYPE_SEXTUPLE = 2;

	//opciones de busqueda
	private $regionId;
	private $circuitId;
	private $type;
	private $themeId;
	private $rating;
	private $groupByAddress = false;
	private $groupByType = false;
	private $workforceId;

	
	/**
	 * Especifica un Barrio para limitar una busqueda
	 * @param integer id de barrio
	 *
	 */
	public function setRegionId($regionId) {
		
		$this->regionId = $regionId;
		
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
	public function setType($type) {
		
		$this->type = $type;
		
	}
	
	/**
	 * Especifica un Motivo para limitar una busqueda
	 * @param string nombre de calle o aproximacion
	 *
	 */	
	public function setThemeId($themeId) {
		
		$this->themeId = $themeId;
		
	}

	/**
	 * Especifica un Rating para limitar una busqueda
	 * @param integer id de barrio
	 *
	 */
	public function setRating($rating) {
		
		$this->rating = $rating;
		
	}
	
	/**
	 * Especifica agrupamiento por direccion para una busqueda
	 * 
	 *
	 */
	public function setGroupByAddress() {
		
		$this->groupByAddress = true;
		
	}

	/**
	 * Especifica agrupamiento por tipo para una busqueda
	 * 
	 *
	 */
	public function setGroupByType() {
		
		$this->groupByType = true;
		
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
  * Crea un billboard nuevo.
  *
  * @param int $number number del billboard
  * @param string $type type del billboard
  * @param int $height height del billboard
  * @param int $row row del billboard
  * @param int $column column del billboard
  * @param int $addressId addressId del billboard
  * @return Billboard instance si se creo el billboard correctamente, false sino.
	*/
	function create($number,$type,$height,$row,$column,$addressId) {
    try {
      $billboardObj = new Billboard();
      $billboardObj->setnumber($number);
      $billboardObj->settype($type);
      $billboardObj->setheight($height);
      $billboardObj->setrow($row);
      $billboardObj->setcolumn($column);
      $billboardObj->setaddressId($addressId);
      $billboardObj->save();
      return $billboardObj;
    } catch (PropelException $exp) {
      return false;
    }      
	}

  /**
  * Actualiza la informacion de un billboard.
  *
  * @param int $id id del billboard
  * @param int $number number del billboard
  * @param string $type type del billboard
  * @param int $height height del billboard
  * @param int $row row del billboard
  * @param int $column column del billboard
  * @param int $addressId addressId del billboard
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$number,$type,$height,$row,$column,$addressId) {
    try {
      $billboardObj = BillboardPeer::retrieveByPK($id);
      $billboardObj->setnumber($number);
      $billboardObj->settype($type);
      $billboardObj->setheight($height);
      $billboardObj->setrow($row);
      $billboardObj->setcolumn($column);
      $billboardObj->setaddressId($addressId);
      $billboardObj->save();
      return true;
    } catch (PropelException $exp) {
      return false;
    }      
  }

	/**
	* Elimina un billboard a partir de los valores de la clave.
	*
  * @param int $id id del billboard
	*	@return boolean true si se elimino correctamente el billboard, false sino
	*/
  function delete($id) {
  	$billboardObj = BillboardPeer::retrieveByPK($id);
    $billboardObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un billboard.
  *
  * @param int $id id del billboard
  * @return array Informacion del billboard
  */
  function get($id) {
		$billboardObj = BillboardPeer::retrieveByPK($id);
    return $billboardObj;
  }

  /**
  * Obtiene todos los billboards.
	*
	*	@return array Informacion sobre todos los billboards
  */
	function getAll() {
		$cond = new Criteria();
		$alls = BillboardPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los billboards paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los billboards
  */
  function getAllPaginated($page=1,$perPage=-1,$criteria = null) {  
    if ($perPage == -1)
      $perPage = 	BillboardPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;

    if ($criteria == null)
    	$cond = new Criteria();
    else
    	$cond = $criteria;

    $pager = new PropelPager($cond,"BillboardPeer", "doSelect",$page,$perPage);
    return $pager;
   }

   private function getAllAvailableCriteria($criteria,$fromDate,$duration) {
	
		if ($criteria == null) {
			$criteria = new Criteria();
		}
		
		//hacemos un ordenamiento random de los resultados de la consulta
		$criteria->addAscendingOrderByColumn('RAND()');
		$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
						
	   	//obtenemos todas las carteleras disponibles, para la peticion
		//$result = BillboardPeer::doSelect($criteria);	
		
		//armamos la fecha final
		ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $fromDate, $splitDate);
		$year = $splitDate[1];
		$month = $splitDate[2];
		$day = $splitDate[3];
		$timestamp = mktime(0,0,0,$month,$day+$duration,$year);
    	$toDate = date('Y-m-d',$timestamp);
	
		$sql  = '(SELECT COUNT(*) from lausi_advertisement where lausi_advertisement.billboardId = lausi_billboard.id AND';
		//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea menor a la fecha de finalizacion del periodo
    	$sql .= "((('" . $fromDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $toDate ."' >=  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)) AND";
		$sql .=	"('" . $fromDate ."' <  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

		//Caso fecha de publicacion sea mayor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
    	$sql .= "(('" . $fromDate . "' <= lausi_advertisement.publishDate) AND ";
    	$sql .= "('" . $toDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $toDate ."' < DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

		//Caso fecha de publicacion sea mayor igual a la de inicio del periodo y fecha de finalizacion del aviso sea menor igual a la fecha de finalizacion del periodo
    	$sql .= "(('" . $fromDate . "' <= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $toDate ."' >= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR";

		//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
    	$sql .= "(('" . $fromDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $toDate ."' < DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)))) ) = 0";

		$criteria->add(BillboardPeer::ID,$sql,Criteria::CUSTOM);
		
		return $criteria;
	
   }

	public function getAllAvailableCount($criteria = null, $fromDate, $duration) {

		$criteria = BillboardPeer::getAllAvailableCriteria($criteria,$fromDate,$duration);
		
		$count = BillboardPeer::doCount($criteria);
		
		return $count;

	}

	/**
    * Obtiene todos los disponibles para una fecha y duracion
    *
    * @param Criteria $criteria criteria de busqueda de Propel
    * @param string $fromDate fecha de inicio de disponibilidad
    * @param integer $duration disponibilidad de duracion
    */
	public function getAllAvailable(&$criteria = null, $fromDate, $duration) {
		try {
			//hacemos un ordenamiento random de los resultados de la consulta
			$criteria->addAscendingOrderByColumn('RAND()');
			return $criteria->filterByAvailable($fromDate, $duration)->find();
		} catch (PropelException $exp) {
			if (ConfigModule::get("global","showPropelExceptions"))
				print_r($exp->getMessage());
			return false;
		}
	}
	
	private function getDistributionStructure($billboards) {

		//devolvemos aquellos resultados que resultan disponibles realmente
		$available = array();
		
		
		foreach ($billboards as $billboard) {
			$added = false;

			//lo adicionamos
			if (!isset($available[$billboard->getAddressId()])) {

				$available[$billboard->getAddressId()] = array();
				$available[$billboard->getAddressId()]['elements'] = array();
				$available[$billboard->getAddressId()]['selected'] = 0;
				$available[$billboard->getAddressId()]['address'] = $billboard->getAddress();
				
			}
			
			array_push($available[$billboard->getAddressId()]['elements'],$billboard);

		}

		
		//seleccionamos de a dos en el orden de direccion que fue saliendo
		
		return $available;	
		
	}
	
	/**
	 * Calcula la cantidad real a publicar, dependiendo de la cantidad de 
	 * carteleras disponibles en la busqueda.
	 * @param integer cantidad de carteleras disponibles
	 * @param integer cantidad de carteleras que se pretenden ocupar.
	 */
	private function calculateQuantityToBePublished($availableCount,$quantityToBePublished) {
		//Si quiero distribuir menos o lo mismo de lo disponible, no hay problemas con la cantidad
		if ($availableCount >= $quantityToBePublished)
			return $quantityToBePublished;
		
		//si la cantidad disponible es menor a lo que quiero distribuir
		//solo puedo distribuir lo disponible

		return $availableCount;
		
	}
	
	/**
	 * Permite distribuir por direccion una cantidad de carteleras dadas.
	 *
	 * @param integer cantidad de carteleras a distribuir
	 * @param integer numero de carteleras a distribuir por direccion
	 */ 
	private function distributeByAddress($distributeStructure,$quantity,$numberByAddress = 1) {
		
		$pending = $quantity;

		foreach ($distributeStructure as $key => $addressHolder) {

			//si no hay pendientes, no sigo recorriendo
			if ($pending <= 0)
				break;

			//si hay mas elementos en la direccion que la cantidad que tengo que 
			//asignar por la direccion puedo realizar asignaciones
			if (sizeof($addressHolder['elements']) >= $numberByAddress) {

				$counter = $numberByAddress;
				$position = 0;
				while (($counter > 0) && ($position < (sizeof($addressHolder['elements'])))) {

					$billboard = $addressHolder['elements'][$position];
					
					if (!$billboard->isChecked()) {
											
						//realizo la asignacion
						$billboard->setChecked();
						$distributeStructure[$key]['selected']++;
						$pending--;
						$counter--;
						
						//caso especial a cuando se pide 2 para las dobles
						if ($numberByAddress == 2 && $pending == 1 && $counter == 0 && ($position < (sizeof($addressHolder['elements'])-1))) {
							$counter++;
						}
						

					}
					$position++;
				}
			}

		}

		return $pending;
		

	}

	/** 
	 * Distribucion de motivos sextuples
	 * @param integer cantidad a distribuir	
	 * @param array de instancias de Billboard
	 */
	private function distributeSextuples($quantity,$billboards) {

		$available = BillboardPeer::getDistributionStructure($billboards);
		
		$quantityToBePublished = BillboardPeer::calculateQuantityToBePublished(sizeof($billboards),$quantity);
		
		$pending = $quantityToBePublished;		

		while ($pending > 0) {
			$pending = BillboardPeer::distributeByAddress(&$available,$pending,1);
		}

		return $available;
	
	}

	/** 
	 * Distribucion de motivos sextuples
	 * @param integer cantidad a distribuir
	 * @param array de instancias de Billboard
	 */	
	private function distributeDoubles($quantity,$billboards) {

		$available = BillboardPeer::getDistributionStructure($billboards);

		$quantityToBePublished = BillboardPeer::calculateQuantityToBePublished(sizeof($billboards),$quantity);
		
		$pending = BillboardPeer::distributeByAddress(&$available,$quantityToBePublished,2);
		
		while ($pending > 0) {
			$pending = BillboardPeer::distributeByAddress(&$available,$pending,1);
		}
		
		return $available;
	
	}	
 
   /**
    * Obtiene todos los disponibles para una fecha y duracion
    *
    * @param Criteria $criteria criteria de busqueda de Propel
    * @param string $fromDate fecha de inicio de disponibilidad
    * @param integer $duration disponibilidad de duracion
    */
   public function getAllAvailableOrdered(&$criteria = null,$fromDate, $duration, $quantity, $type) {

		$result = BillboardPeer::getAllAvailable($criteria,$fromDate,$duration);

		$available = array();
		
		if ($type == BillboardPeer::TYPE_DOBLE)
			$available = BillboardPeer::distributeDoubles($quantity,$result);
		if ($type == BillboardPeer::TYPE_SEXTUPLE)
			$available = BillboardPeer::distributeSextuples($quantity,$result);
		
		return $available;
 
   }


   /**
    * Obtiene todos los disponibles para una fecha y duracion
    *
    * @param Criteria $criteria criteria de busqueda de Propel
    * @param string $fromDate fecha de inicio de disponibilidad
    * @param integer $duration disponibilidad de duracion
    */
   public function getAllAvailableOrderedByCircuitAndAddress($criteria = null,$fromDate, $duration, $quantity, $type) {

		$available = BillboardPeer::getAllAvailableOrdered($criteria,$fromDate,$duration,$quantity,$type);

		uasort($available,'comparison');
		
		return $available;
 
   }

   /**
    * Obtiene todos los billboards disponibles para una direccion
    *
    */
   public function getAllAvailableByAddress($addressId, $quantity, $fromDate, $duration, $type = null) {
   
   		$criteria = new BillboardQuery();
	   	
	   	$criteria->add(AddressPeer::ID,$addressId);
	
		//si se pide un tipo especifico se agrega a la consulta
   		if ($type != null)
	   		$criteria->add(BillboardPeer::TYPE,$type);
		
	   	
		return BillboardPeer::getAllAvailableOrdered($criteria,$fromDate, $duration, $quantity, $type);

   	
   }
   
   /**
    * Obtiene todos los billboards disponibles por region y tipo
    *
    * @param integer $regionId id de la region
    * @param integer $quantity cantidad requerida de disponibles
    * @param string $type tipo de billboard
	* @param date $fromDate fecha desde de la publicacion
	* @param integer $duration 
    */
   public function getAllAvailableByRegion($regionId, $quantity, $fromDate, $duration, $type = null) {
   
   		$criteria = new BillboardQuery();
   		
   		//si se pide un tipo especifico se agrega a la consulta
   		if ($type != null)
	   		$criteria->add(BillboardPeer::TYPE,$type);

	   	$criteria->add(AddressPeer::REGIONID,$regionId);
	   	
		return BillboardPeer::getAllAvailableOrdered($criteria,$fromDate, $duration, $quantity, $type);

   	
   }
   
   /**
    * Obtiene todos los billboards disponibles por circuito y tipo
    *
    * @param integer $circuitId id de la region
    * @param integer $quantity cantidad requerida de disponibles
    * @param string $type tipo de billboard
	* @param date $fromDate fecha desde de la publicacion
	* @param integer $duration
    */
   public function getAllAvailableByCircuit($circuitId, $fromDate, $duration, $quantity, $type = null) {
   
   		$criteria = new BillboardQuery();
	
   		//si se pide un tipo especifico se agrega a la consulta
   		if ($type != null)
	   		$criteria->add(BillboardPeer::TYPE,$type);
	   	
	   	$criteria->add(AddressPeer::CIRCUITID,$circuitId);
	   	
		return BillboardPeer::getAllAvailableOrderedByCircuitAndAddress($criteria,$fromDate, $duration, $quantity,$type);
   	
   }

   /**
    * Obtiene todos los billboards disponibles por rating
    *
    * @param integer $rating rating
    * @param integer $quantity cantidad requerida de disponibles
    * @param string $type tipo de billboard
	* @param date $fromDate fecha desde de la publicacion
	* @param integer $duration
    */
   public function getAllAvailableByRating($rating, $fromDate, $quantity, $duration, $type = null) {
   
   		$criteria = new BillboardQuery();
   		
   		//si se pide un tipo especifico se agrega a la consulta
   		if ($type != null)
	   		$criteria->add(BillboardPeer::TYPE,$type);
	
	   	$criteria->add(AddressPeer::RATING,$rating);
	
		return BillboardPeer::getAllAvailableOrdered($criteria,$fromDate,$duration,$quantity,$type);	   	
   	
   }
   
   /**
    * Obtiene todos los billboards disponibles para una ubicacion geografica
    *
    * @param integer $rating rating
    * @param integer $quantity cantidad requerida de disponibles
    * @param string $type tipo de billboard
	* @param date $fromDate fecha desde de la publicacion
	* @param integer $duration
    */
   public function getAllAvailableByLocation($quantity, $longitude_0 , $latitude_0, $radius, $fromDate, $duration, $type = null, $quantity) {
   		$ranges = array(0, $radius, $radius * 1.3, $radius * 1.6, $radius * 2);
   		$criteria = new BillboardQuery();
   		
   		//si se pide un tipo especifico se agrega a la consulta
   		if ($type != null)
	   		$criteria->add(BillboardPeer::TYPE,$type);
			
		$prevCriteria = clone $criteria;
		
		$billboardsAvailable = array();
		$pending = $quantity;	
		
		$i = 0;
		
		while ($pending > 0 && ($i < count($ranges) - 1) ) {
			//Restauramos la criteria a un estado anterior a filtrar por radio.
			$criteria = clone $prevCriteria;
		
			$radiusFrom = $ranges[$i];
			$radiusTo = $ranges[$i+1];
		
			$criteria->filterByRadius($latitude_0, $longitude_0, $radiusFrom, $radiusTo);
			
			if ($i > 0)
				$billboardsAvailable[] = 'Separator'.$i;
				
			$billboardsExtra = BillboardPeer::getAllAvailableOrdered($criteria,$fromDate,$duration,$pending,$type);
			
			//un array merge no funciona como corresponde porque tienen claves numericas.
			foreach($billboardsExtra as $key => $billboardExtra) {
				$billboardsAvailable[$key] = $billboardExtra;
			}
			$pending -= $criteria->count();
			$i++;
		}
   		
		return $billboardsAvailable;
   }
   
  /**
   * Obtiene La cantidad total de carteleras.
   *
   * @returns integer cantidad de carteleras total
   */
  public function getAllCount() {

  		$criteria = new Criteria();
  		$count = BillboardPeer::doCount($criteria);
  		return $count;
  	
  }

  /**
   * Obtiene La cantidad total de carteleras dentro de un circuito.
   *
   * @returns integer cantidad de carteleras total en un circuito
   */
  public function getAllByCircuitCount($circuitId) {
  	
  		$criteria = new Criteria();
  		$criteria->add(AddressPeer::CIRCUITID,$circuitId);
  		$count = BillboardPeer::doCountJoinAddress($criteria);
  		return $count;

  	
  }
  
  	private function getFilterCriteria() {
  
  		
  		$criteria = new Criteria();
  		
	
		$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);	
		
		
		if (isset($this->regionId))
			$criteria->add(AddressPeer::REGIONID,$this->regionId);
	
		if (isset($this->circuitId))
			$criteria->add(AddressPeer::CIRCUITID,$this->circuitId);

		if (isset($this->type))
			$criteria->add(BillboardPeer::TYPE,$this->type);		

		if (isset($this->rating))
			$criteria->add(AddressPeer::RATING,$this->rating);

		if (isset($this->themeId)) {
			$criteria->addJoin(BillboardPeer::ID,AdvertisementPeer::BILLBOARDID,Criteria::INNER_JOIN);
			$criteria->addJoin(AdvertisementPeer::THEMEID,ThemePeer::ID,Criteria::INNER_JOIN);
			$criteria->add(AdvertisementPeer::THEMEID,$this->themeId);
			
			$sql = '(CURDATE() >= lausi_advertisement.publishDate) AND (CURDATE() <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);
		}
		
		if ($this->groupByAddress)
			$criteria->addGroupByColumn(BillboardPeer::ADDRESSID);
  
		if ($this->groupByType) {
			if(!$this->groupByAddress)
				$criteria->addGroupByColumn(BillboardPeer::ADDRESSID);
			$criteria->addGroupByColumn(BillboardPeer::TYPE);			
		}
  		
  		return $criteria;
  		
  	}
  
	/**
	* Obtiene todos los billboards paginados aplicando condiciones de filtro.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de filas por pagina
	*	@return array Informacion sobre todos los billboards
	*/
	public function getAllPaginatedFilter($page=1,$perPage=-1) {
	
		if ($perPage == -1)
			$perPage = 	BillboardPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		
		//obtenemos la criteria para realizar el filtrado
		$criteria = $this->getFilterCriteria();
		
		return $this->getAllPaginated($page,$perPage,$criteria);
		
	}
	
	public function getAllFiltered() {
		
		$cond = $this->getFilterCriteria();
		$alls = BillboardPeer::doSelect($cond);
		return $alls;
		
	}
  
}

function comparison($a,$b) {
	
	$addressA = $a['address'];
	$addressB = $b['address'];
	
	if ($addressA->getOrderCircuit() < $addressB->getOrderCircuit())
		return -1;

	if ($addressA->getOrderCircuit() == $addressB->getOrderCircuit())
		return 0;

	if ($addressA->getOrderCircuit() > $addressB->getOrderCircuit())
		return 1;

	
}

?>
