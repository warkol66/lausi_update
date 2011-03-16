<?php

// The parent class
require_once 'om/BaseAdvertisementPeer.php';

// The object class
include_once 'Advertisement.php';

require_once('BillboardPeer.php');
require_once('AddressPeer.php');

/**
 * Class AdvertisementPeer
 *
 * @package Advertisement
 */
class AdvertisementPeer extends BaseAdvertisementPeer {

	//opciones para la busqueda personalizada
	private $clientId;
	private $themeId;
	private $circuitId;
	private $type;
	private $workforceId = '';
	private $fromDate;
	private $toDate;
	private $allThemes = false;
	private $exactDate;
	private $groupByAddressAndTheme = true;
	private $orderByCircuitOrder = false;
	
	/**
	 * Especifica un Client Id para una busqueda personalizada.
	 *
	 * @param $clientId integer id de cliente
	 */
	public function setClientId($clientId) {
		
		$this->clientId = $clientId;
		
	}
	
	/**
	 * Especifica un ordenamiento por valor de ordenamiento del circuito
	 *
	 */	
	public function orderByCircuitOrder() {
		
		$this->orderByCircuitOrder = true;
		
	}
	
	/**
	 * Especifica un Theme Id para una busqueda personalizada.
	 *
	 * @param $themeId integer id de theme
	 */
	public function setThemeId($themeId) {
		
		$this->themeId = $themeId;
		
	}

	/**
	 * Especifica un Circuit para una busqueda personalizada.
	 *
	 * @param $circuitId integer id de circuit
	 */
	public function setCircuitId($circuitId) {
		
		$this->circuitId = $circuitId;
		
	}

	/**
	 * Especifica un Tipo de cartelera para una busqueda personalizada.
	 *
	 * @param $type integer id de type
	 */
	public function setType($type) {
		
		$this->type = $type;
		
	}

	/**
	 * Especifica una fuerza de trabajo para una busqueda personalizada.
	 *
	 * @param $workforceId integer id de workforce
	 */
	public function setWorkforceId($workforceId) {
		
		$this->workforceId = $workforceId;
		
	}

	/**
	 * Especifica una fecha desde para una busqueda personalizada.
	 *
	 * @param $fromDate string YYYY-MM-DD
	 */
	public function setFromDate($fromDate) {
		
		$this->fromDate = $fromDate;
		
	}
	
	/**
	 * Especifica una fecha especifica para avisos.
	 *
	 * @param $fromDate string YYYY-MM-DD
	 */
	public function setExactDate($exactDate) {
		
		$this->exactDate = $exactDate;
		
	}	

	/**
	 * Especifica una fecha hasta para una busqueda personalizada.
	 *
	 * @param $toDate string YYYY-MM-DD
	 */
	public function setToDate($toDate) {
		
		$this->toDate = $toDate;
		
	}
	
	/*
	 * Activa que el filtro muestre avisos relacionados a motivos inactivos
	 *
	 */
	public function setAllThemes() {
		
		$this->allThemes = true;
		
	}
	
	/*
	 * Agrupa por direccion y motivo
	 *
	 */
	public function setNoGroupByAddressAndTheme() {

		$this->groupByAddressAndTheme = false;

	}	
	
	public function getGroupByAddressAndTheme() {

		return $this->groupByAddressAndTheme;

	}
	
	/**
	 * Especifica busqueda de carteleras sextuples sin workforce asignada
	 *
	 */
	public function setWithoutWorkforce() {
		$this->workforceId = 0;
	}			

	/**
	 * Especifica busqueda de carteleras sextuples sin workforce asignada
	 *
	 */
	public function setForReport() {
		$this->forReport = 1;
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
  * Crea un advertisement nuevo.
  *
  * @param string $date date del advertisement
  * @param string $publishDate publishDate del advertisement
  * @param int $duration duration del advertisement
  * @param int $billboardId billboardId del advertisement
  * @param int $themeId themeId del advertisement
  * @return boolean true si se creo el advertisement correctamente, false sino
	*/
	function create($date,$publishDate,$duration,$billboardId,$themeId) {
		//echo "date:".$date."pub".$publishDate."dur".$duration."billId".$billboardId."themeId".$themeId;
		//no se puede crear un advertisement que no tenga establecidas sus relaciones 
		if (empty($themeId) || empty($publishDate) || empty($billboardId) || empty($duration))
			return false;
		
		require_once('ThemePeer.php');
		
		//la cartelera y el theme deben ser compatibles
		$billboard = BillboardPeer::get($billboardId);
		$theme = ThemePeer::get($themeId);
		
		//verificamos si la cartelera y el motivo son compatibles
		if ($billboard->getType() != $theme->getType())
			return false;
			
		//verificamos que no haya solapamiento.
		if (AdvertisementPeer::hasOverlapping($publishDate,$duration,$billboardId))
	  		return false;		

		try {
		  $advertisementObj = new Advertisement();
		  $advertisementObj->setdate($date);
		  $advertisementObj->setpublishDate($publishDate);
		  $advertisementObj->setduration($duration);
		  $advertisementObj->setbillboardId($billboardId);
		  $advertisementObj->setthemeId($themeId);
		  $advertisementObj->save();
		  return true;
		} catch (PropelException $exp) {
		  return false;
		}      
	}
	
  /**
  * Crea un advertisement nuevo.
  *
  * @param string $date date del advertisement
  * @param string $publishDate publishDate del advertisement
  * @param int $duration duration del advertisement
  * @param int $billboardId billboardId del advertisement
  * @param int $themeId themeId del advertisement
  * @return boolean true si se creo el advertisement correctamente, false sino
	*/
	function createWithErrorDetail($date,$publishDate,$duration,$billboardId,$themeId) {
		//echo "date:".$date."pub".$publishDate."dur".$duration."billId".$billboardId."themeId".$themeId;
		//no se puede crear un advertisement que no tenga establecidas sus relaciones 
		if (empty($themeId) || empty($publishDate) || empty($billboardId) || empty($duration))
			return -1;

		//la cartelera y el theme deben ser compatibles
		$billboard = BillboardPeer::get($billboardId);
		$theme = ThemePeer::get($themeId);

		//verificamos si la cartelera y el motivo son compatibles
		if ($billboard->getType() != $theme->getType())
			return -2;

		//verificamos que no haya solapamiento.
		if (AdvertisementPeer::hasOverlapping($publishDate,$duration,$billboardId))
			return -3;		

		try {
		  $advertisementObj = new Advertisement();
		  $advertisementObj->setdate($date);
		  $advertisementObj->setpublishDate($publishDate);
		  $advertisementObj->setduration($duration);
		  $advertisementObj->setbillboardId($billboardId);
		  $advertisementObj->setthemeId($themeId);
		  $advertisementObj->save();
		  return 0;
		} catch (PropelException $exp) {
		  return -4;
		}      
	}	

	private function hasOverlapping($publishDate,$duration,$billboardId,$advertId = null) {
		
		$criteria = new Criteria();

		$publishDate = str_replace('-','/',$publishDate);	
		
		$fromDate = $publishDate;
		//FIX por bug en distribucion
		//TODO ver que hacer con el tema de fechas
		
		ereg("([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})", $date, $splitDate);
		$year = $splitDate[1];
		$month = $splitDate[2];
		$day = $splitDate[3];

		$timestamp = mktime(0,0,0,$month,$day+$duration,$year);
		$endDate =  date('Y/m/d',$timestamp);
		

		//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea menor a la fecha de finalizacion del periodo
		$sql .= "(((('" . $fromDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $endDate ."' >=  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)) AND";
		$sql .=	"('" . $fromDate ."' <  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

		//Caso fecha de publicacion sea mayor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
		$sql .= "(('" . $fromDate . "' <= lausi_advertisement.publishDate) AND ";
		$sql .= "('" . $endDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $endDate ."' < DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

		//Caso fecha de publicacion sea mayor igual a la de inicio del periodo y fecha de finalizacion del aviso sea menor igual a la fecha de finalizacion del periodo
		$sql .= "(('" . $fromDate . "' <= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $endDate ."' >= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR";

		//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
		$sql .= "(('" . $fromDate . "' >= lausi_advertisement.publishDate) AND ";
		$sql .=	"('" . $endDate ."' < DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)))) ) = 0";


		$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);
		$criteria->add(AdvertisementPeer::BILLBOARDID,$billboardId);
	  	
	  	$adverts = AdvertisementPeer::doSelect($criteria);
	  	
	  	if ($advertId == null && !empty($adverts))
	  		return true;
	  	
	  	if (!empty($adverts)) {
	  		
	  		foreach($adverts as $advert) {
	  			if ($advert->getId() != $advertId) {
	  				return true;
	  			}
	  				
	  		}
	  		
	  	}

		return false;
	}

  /**
  * Actualiza la informacion de un advertisement.
  *
  * @param int $id id del advertisement
  * @param string $date date del advertisement
  * @param string $publishDate publishDate del advertisement
  * @param int $duration duration del advertisement
  * @param int $billboardId billboardId del advertisement
  * @param int $themeId themeId del advertisement
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$date,$publishDate,$duration,$billboardId,$themeId) {


	//no se puede actualizar un advertisement que no tenga establecidas sus relaciones 
	if (empty($themeId) || empty($publishDate) || empty($billboardId) || empty($duration))
		return false;
		
	//la cartelera y el theme deben ser compatibles
	$billboard = BillboardPeer::get($billboardId);
	$theme = ThemePeer::get($themeId);
		
	//verificamos si la cartelera y el motivo son compatibles
	if ($billboard->getType() != $theme->getType())
			return false;
  
	//verificamos si hay solapamiento
  	if (AdvertisementPeer::hasOverlapping($publishDate,$duration,$billboardId,$id))
  		return false;
  	 
    try {
      $advertisementObj = AdvertisementPeer::retrieveByPK($id);
      $advertisementObj->setdate($date);
      $advertisementObj->setpublishDate($publishDate);
      $advertisementObj->setduration($duration);
      $advertisementObj->setbillboardId($billboardId);
      $advertisementObj->setthemeId($themeId);
      $advertisementObj->save();
      return true;
    } catch (PropelException $exp) {
      return false;
    }      
  }

	/**
	* Elimina un advertisement a partir de los valores de la clave.
	*
  * @param int $id id del advertisement
	*	@return boolean true si se elimino correctamente el advertisement, false sino
	*/
  function delete($id) {
  	$advertisementObj = AdvertisementPeer::retrieveByPK($id);
    $advertisementObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un advertisement.
  *
  * @param int $id id del advertisement
  * @return array Informacion del advertisement
  */
  function get($id) {
		$advertisementObj = AdvertisementPeer::retrieveByPK($id);
    return $advertisementObj;
  }

  /**
  * Obtiene todos los advertisements.
	*
	*	@return array Informacion sobre todos los advertisements
  */
	function getAll() {
		$cond = new Criteria();
		$alls = AdvertisementPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los advertisements paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los advertisements
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	AdvertisementPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    $cond = new Criteria();     
    
    $pager = new PropelPager($cond,"AdvertisementPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

	public function generateFilterCriteria() {
		
		require_once('ThemePeer.php');
		
		$criteria = new Criteria();
		
		$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);
		$criteria->addJoin(AdvertisementPeer::THEMEID,ThemePeer::ID,Criteria::INNER_JOIN);
		$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
		$criteria->addJoin(AddressPeer::CIRCUITID,CircuitPeer::ID,Criteria::INNER_JOIN);
		
		//condicion que solo se consideran los aviso relacionados a motivos activos
		
		if (!$this->allThemes)
			$criteria->add(ThemePeer::ACTIVE,1);
		
		if (!empty($this->clientId)) {
			$criteria->add(ThemePeer::CLIENTID,$this->clientId);
		}
		
		if (!empty($this->themeId)) {
			$criteria->add(AdvertisementPeer::THEMEID,$this->themeId);
		}

		if (!empty($this->type)) {
			$criteria->add(BillboardPeer::TYPE,$this->type);
		}

		if (!empty($this->circuitId)) {
			$criteria->add(AddressPeer::CIRCUITID,$this->circuitId);
		}

		if ($this->workforceId >= 0 && $this->forReport !=1) {
			//las workforce solo son para sextuples
			$criteria->add(AdvertisementPeer::WORKFORCEID,$this->workforceId);
		}
	
		if (!empty($this->fromDate)) {			
			
			$sql = '('. "'" . $this->fromDate . "'" .' >= lausi_advertisement.publishDate) AND ('. "'" . $this->fromDate . "'" .' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';

			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);

		}
		
		if ($this->orderByCircuitOrder) {
			$criteria->addAscendingOrderByColumn(CircuitPeer::ORDERBY);
		}
		
		if (!empty($this->toDate)) {

			$sql = '('. "'" . $this->toDate . "'" .' >= lausi_advertisement.publishDate) AND ('. "'" . $this->fromDate . "'" .' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';

			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);
		}
		
		if (!empty($this->exactDate)) {		
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$this->exactDate);

		}
		
		if ($this->groupByAddressAndTheme) {
				$criteria->addGroupByColumn(BillboardPeer::ADDRESSID);
				$criteria->addGroupByColumn(AdvertisementPeer::THEMEID);
				$criteria->addAsColumn("themes","count(".AdvertisementPeer::ID.")");
		}		
		
		return $criteria;
	}

  function doCountRS($criteria) {
	
	/* @var $copy Criteria */
	$copy = clone $criteria;

	$count = count(AdvertisementPeer::doSelect($copy));
	
	return $count;

  }

  /**
  * Obtiene todos los advertisements paginados.
  * Si hay condiciones de filtrado aplicadas al AdvertisementPeer, las aplica
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los advertisements
  */
  function getAllPaginatedFiltered($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	AdvertisementPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;

    $cond = $this->generateFilterCriteria();	    
    
	if ($this->groupByAddressAndTheme) {
		$pager = new PropelPager($cond,"AdvertisementPeer", "doSelectRS",$page,$perPage);
		$pager->setPeerCountMethod('doCountRS');
	}
	else {
    	$pager = new PropelPager($cond,"AdvertisementPeer", "doSelect",$page,$perPage);
	}	
    return $pager;
   }    
   
   function hydrateResult($rs) {
	
		$n = AdvertisementPeer::NUM_COLUMNS;
		$results = array();
		while($rs->next()) {
			$adv = new Advertisement();
			$adv->hydrate($rs);
			$themeCount = $rs->getInt($n+1);
			//$themeCount = $rs->getString('themes');
			$adv->themes = $themeCount;
			$results[] = $adv;
		}	   
		return $results;
   }


	/**
	* Obtiene todos los advertisements vigentes para una cierta direccion.
	*   @param integer Id de la direccion
	*	@return array Informacion sobre todos los advertisements
	*/
	function getAllCurrentByAddress($addressId) {

		$cond = new Criteria();
		$cond->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);
		$cond->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
		$cond->add(AddressPeer::ID,$addressId);
		$today = date('Y-m-d');
		$sql = '('. "'" . $today . "'" .' >= lausi_advertisement.publishDate) AND ('. "'" . $today . "'" .' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';
		$cond->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);
		

		try {
			
			$alls = AdvertisementPeer::doSelect($cond);
			
		}
		catch (PropelException $exp) {
			$alls = array();			
		}

		return $alls;

	}
	
	/**
	 * Extiende un aviso una cantidad de dias
	 *
	 * @param integer id de advertisement
	 * @param integer extension de la duracion
	 */
	public function extendAdvertisement($id,$extension) {
		
		$advert = AdvertisementPeer::get($id);
		
		if (empty($advert))
			return false;
		
		//la extension debe ser mayor a cero
		if ($extension <= 0)
			return false;	

		$newDuration = $extension + ($advert->getDuration());
		$billboard = $advert->getBillboard();
		$billboardId = $billboard->getId();
		
		if (AdvertisementPeer::hasOverlapping($advert->getPublishDate(),$newDuration,$billboardId,$advert->getId())) {
			return false;
		}
		
		try {
			$advert->setDuration($newDuration);
			$advert->save();
		}
		catch(PropelException $exp) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * reduce un aviso una cantidad de dias
	 *
	 * @param integer id de advertisement
	 * @param integer reduccion de la duracion
	 */
	public function reduceAdvertisement($id,$reduction) {
		
		$advert = AdvertisementPeer::get($id);
		
		if (empty($advert))
			return false;
		
		//la reduccion debe ser mayor a cero
		if ($reduction <= 0)
			return false;	

		$newDuration = ($advert->getDuration()) - $reduction;
		// no puede su duracion ser menor o igual a cero
		if ($newDuration <= 0) {
			return false;
		}
		try {
			$advert->setDuration($newDuration);
			$advert->save();
		}
		catch(PropelException $exp) {
			return false;
		}
		
		return true;
	}
	
	/*
	 * Indica la cantidad de avisos que tiene un cierto motivo
	 * @param integer $themeId
	 * @return integer cantidad de avisos
	 *
	 */
	function getAllByThemeCount($themeId=0) {
		
		$criteria = new Criteria();
		$criteria->add(AdvertisementPeer::THEMEID,$themeId);
		$value = AdvertisementPeer::doCount($criteria);
		return $value;
	}
	
	function getAllFiltered() {
		
		$criteria = $this->generateFilterCriteria();

		if ($this->groupByAddressAndTheme) {
			$count = count(AdvertisementPeer::doSelect($criteria));
			$pager = new PropelPager($criteria,"AdvertisementPeer", "doSelectRS",1,$count);
			$pager->setPeerCountMethod('doCountRS');

			$advertisements = $pager->getResult();
			$result = $this->hydrateResult($advertisements);
		}
		else {
			$result = AdvertisementPeer::doSelect($criteria);
		}	

		return $result;

	}


}
