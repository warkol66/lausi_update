<?php

require_once('AdvertisementPeer.php');
require_once('BillboardPeer.php');
require_once('AddressPeer.php');
require_once('WorkforceCircuitPeer.php');
require_once('ThemePeer.php');
require_once('CircuitPeer.php');

	/**
	* Generador de Reportes
	*/
	class ReportGenerator {
		
		private $workforceId = null;
		private $themeId = null;
		
		function __construct() {
			;
		}
		
		public function setWorkforceId($workforceId) {
			$this->workforceId = $workforceId;
		}
		
		public function setThemeId($themeId) {
			$this->themeId = $themeId;
		}
		
		public function getRouteSheetReport($date) {
			

				$criteria = new Criteria();
				
				$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);
				$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::LEFT_JOIN);
				$criteria->addJoin(AdvertisementPeer::THEMEID,ThemePeer::ID,Criteria::INNER_JOIN);
				$criteria->addJoin(AddressPeer::CIRCUITID,CircuitPeer::ID,Criteria::LEFT_JOIN);
				
				$criteria->addGroupByColumn(BillboardPeer::ADDRESSID);
//				$criteria->addGroupByColumn(AdvertisementPeer::THEMEID);
//				$criteria->addGroupByColumn(AdvertisementPeer::WORKFORCEID);
				$criteria->add(AdvertisementPeer::PUBLISHDATE,$date);
				
				if (!empty($this->workforceId))
					$criteria->add(AdvertisementPeer::WORKFORCEID,$this->workforceId);
				if (!empty($this->themeId))
					$criteria->add(AdvertisementPeer::THEMEID,$this->themeId);
				
				//solo para sextuples segun requerimiento
				$criteria->add(BillboardPeer::TYPE,BillboardPeer::TYPE_SEXTUPLE);
				//ordenamiento primero por nombre de motivo y luego por direccion
				//$criteria->addAscendingOrderByColumn(CircuitPeer::NAME,ThemePeer::NAME,AddressPeer::STREET,AddressPeer::NUMBER);
				$criteria->addAscendingOrderByColumn(CircuitPeer::NAME);
				$criteria->addAscendingOrderByColumn(AddressPeer::ORDERCIRCUIT);

				$adverts = AdvertisementPeer::doSelect($criteria);

			foreach ($adverts as $advert) {
					
					$theme = $advert->getTheme();
					
					if (!isset($results[$theme->getId()])) {
						$results[$theme->getId()]['theme'] = $theme;
						$results[$theme->getId()]['adverts'] = array();
					}
					
					array_push($results[$theme->getId()]['adverts'],$advert);		
					
				}

				return $results;

		}
	
		public function getSheetsLocationReport($date,$type,$circuitId=null) {

				//casos de afiches dobles (dos por cartelera) y sextuples (1 por cartelera)
				$multiplier = 1;
				if ($type == BillboardPeer::TYPE_DOBLE)
					$multiplier = 2;			

				$criteria = new Criteria();
				$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::LEFT_JOIN);
				$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::LEFT_JOIN);
				$criteria->addJoin(AdvertisementPeer::THEMEID,ThemePeer::ID,Criteria::LEFT_JOIN);
				$criteria->addJoin(AddressPeer::CIRCUITID,CircuitPeer::ID,Criteria::LEFT_JOIN);				
				//agrupamiento y ordenamiento
				$criteria->addAscendingOrderByColumn(AddressPeer::CIRCUITID,AddressPeer::STREET,AddressPeer::NUMBER);
				//condiciones

				//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
				$sql .= "('" . $date . "' >= lausi_advertisement.publishDate AND ";
				$sql .=	"'" . $date ."' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))";

				$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);

				$criteria->add(BillboardPeer::TYPE,$type);
				$criteria->add(ThemePeer::ACTIVE,1);
				
				if (!empty($circuitId)) {
					$criteria->add(AddressPeer::CIRCUITID,$circuitId);
				}
				
				$criteria->addAscendingOrderByColumn(CircuitPeer::NAME);
				$criteria->addAscendingOrderByColumn(AddressPeer::ORDERCIRCUIT);
				
				$adverts = AdvertisementPeer::doSelect($criteria);


				$results = array();
				
				foreach ($adverts as $advert) {
					
					$theme = $advert->getTheme();
					$billboard = $advert->getBillboard();
					$address = $billboard->getAddress();
					$circuit = $address->getCircuit();
					
					if (!isset($results[$circuit->getId()])) {
						$results[$circuit->getId()]['circuit'] = $circuit;
						$results[$circuit->getId()]['addresses'] = array();
						$results[$circuit->getId()]['total'] = 0;
						$results[$circuit->getId()]['totals'] = array();
					}

					if (!isset($results[$circuit->getId()]['addresses'][$address->getId()])) {
						$results[$circuit->getId()]['addresses'][$address->getId()]['adverts'] = array();
						$results[$circuit->getId()]['addresses'][$address->getId()]['total'] = 0;
					}
					
					if (!isset($results[$circuit->getId()]['addresses'][$address->getId()])) {
						$results[$circuit->getId()]['addresses'][$address->getId()]['adverts'] = array();
						$results[$circuit->getId()]['addresses'][$address->getId()]['totals'] = array();
					}

					if (!isset($results[$circuit->getId()]['addresses'][$address->getId()]['adverts'][$theme->getId()])) {
						$results[$circuit->getId()]['addresses'][$address->getId()]['adverts'][$theme->getId()] = 0; 
					}					
					
					if (!isset($results[$circuit->getId()]['totals'][$theme->getId()]))
						$results[$circuit->getId()]['totals'][$theme->getId()] = 0;
					
					$results[$circuit->getId()]['addresses'][$address->getId()]['address'] = $address;
					$results[$circuit->getId()]['totals'][$theme->getId()] = $results[$circuit->getId()]['totals'][$theme->getId()] + (1 * $multiplier);
					$results[$circuit->getId()]['addresses'][$address->getId()]['adverts'][$theme->getId()] += (1 * $multiplier);
					
					$results[$circuit->getId()]['total'] = $results[$circuit->getId()]['total'] + (1 * $multiplier);
					
				}
				

				return $results;

		}
		
		public function getThemesReport($type=null,$circuit=null) {

			$sql = "SELECT DISTINCT lausi_advertisement.themeId,COUNT(*),DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY) as endDate, lausi_theme.name FROM lausi_advertisement,lausi_theme  WHERE lausi_advertisement.themeId = lausi_theme.id GROUP BY themeId,publishDate,lausi_advertisement.duration";
			$sqlPropel = "SELECT DISTINCT  lausi_advertisement.THEMEID, COUNT(*) as totalAdvertisements, DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY) as endDate, lausi_theme.NAME FROM lausi_theme INNER JOIN lausi_advertisement ON (lausi_theme.ID=lausi_advertisement.THEMEID) GROUP BY lausi_advertisement.THEMEID";
			$criteria = new Criteria();


			$criteria->setDistinct();
			$criteria->addSelectColumn(AdvertisementPeer::THEMEID);
			$criteria->addSelectColumn('COUNT(*) as totalAdvertisements');
			$criteria->addSelectColumn('DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY) as endDate');
			$criteria->addSelectColumn(ThemePeer::NAME);

			$criteria->addGroupByColumn(AdvertisementPeer::THEMEID);
			$criteria->addGroupByColumn(AdvertisementPeer::PUBLISHDATE);
			$criteria->addGroupByColumn(AdvertisementPeer::DURATION);
			$criteria->addJoin(ThemePeer::ID,AdvertisementPeer::THEMEID,Criteria::INNER_JOIN);
			
			if ($type != null)
				$criteria->add(ThemePeer::TYPE,$type);
			
			if ($circuit != null) {
				$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);			
				$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
				$criteria->add(AddressPeer::CIRCUITID,$circuit->getId());
			}
				
			$resultSet = AdvertisementPeer::doSelectRS($criteria);
			
			$result = array();
			while($resultSet->next()) {
				$result = array();
				$result['id'] = $resultSet->getInt(1);
				$result['total'] = $resultSet->getInt(2);
				$result['endDate'] = $resultSet->getString(3);
				$result['name'] = $resultSet->getString(4);

				$today = strtotime(date("Y-m-d"));
				$expiration = strtotime($result['endDate']);

				if ($today >= $expiration)
					$result['expired'] = true;
				else
					$result['expired'] = false;
				
				$results[] = $result;
			}
			
			return $results;
		}
		
		public function getAvailableBillboardsReport() {
			
			require_once('BillboardPeer.php');
			require_once('CircuitPeer.php');
			global $system;
			
			$iterations = $system['config']['lausi']['availableBillboardsDays'];
			$result = array();
			$circuits = CircuitPeer::getAll();

			for ($i=0; $i<$iterations ; $i++) {
				
				$fromDate = date("Y-m-d",mktime(0,0,0,date("m"),date('d')+$i,date("Y")));

				$duration = 1;

				$criteria = new Criteria();
			
				//el result set tendra registros con id de circuitm nombre de circuit, cuenta y tipo
				$criteria->addSelectColumn(CircuitPeer::ID);
				$criteria->addSelectColumn('COUNT(*)');
				$criteria->addSelectColumn(BillboardPeer::TYPE);
				$criteria->addSelectColumn(CircuitPeer::NAME);
			
				$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
				$criteria->addJoin(AddressPeer::CIRCUITID,CircuitPeer::ID,Criteria::INNER_JOIN);

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
				

				$criteria->addGroupByColumn(BillboardPeer::TYPE);
				$criteria->addGroupByColumn(AddressPeer::CIRCUITID);
				
				$resultSet = BasePeer::doSelect($criteria);

				if (empty($result['total']['dates'][$fromDate]['numberDoble'])) {
					$result['total']['dates'][$fromDate]['numberDoble'] = 0;
				}

				if (empty($result['total']['dates'][$fromDate]['numberSextuple'])) {
					$result['total']['dates'][$fromDate]['numberSextuple'] = 0;
				}
				
				foreach ($circuits as $circuit) {
					$index = $circuit->getId();
					$result['circuit'][$index]['dates'][$fromDate]['numberDoble'] = 0;
					$result['circuit'][$index]['dates'][$fromDate]['numberSextuple'] = 0;
					$result['circuit'][$index]['name'] = $circuit->getName();
				}			

			
				while ($resultSet->next()) {
					//we obtain the result from the second column of the record
					$index = $resultSet->getInt(1);	
				
					if ($resultSet->getInt(3) == BillboardPeer::TYPE_DOBLE) {
						
						$result['total']['dates'][$fromDate]['numberDoble'] += $resultSet->getInt(2);


						$result['circuit'][$index]['dates'][$fromDate]['numberDoble'] = $resultSet->getInt(2);
					}

					if ($resultSet->getInt(3) == BillboardPeer::TYPE_SEXTUPLE) {

					
						$result['total']['dates'][$fromDate]['numberSextuple'] += $resultSet->getInt(2);					
				
						$result['circuit'][$index]['dates'][$fromDate]['numberSextuple'] = $resultSet->getInt(2);
					}
					
				}
			

			}

			return $result;
			
			
		}
		
		public function getThemeByCircuitReport($theme) {
			
			$criteria = new Criteria();
			$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);
			$criteria->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
			$criteria->add(AdvertisementPeer::THEMEID,$theme->getId());
			$sql = '(CURDATE() >= lausi_advertisement.publishDate) AND (CURDATE() <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);		

			$billboards = BillboardPeer::doSelect($criteria);

			$results = array();
			
			foreach ($billboards as $billboard) {
				$address = $billboard->getAddress();
				$circuit = $address->getCircuit();
				
				if (empty($results[$circuit->getId()])) {
					$results[$circuit->getId()]['circuit'] = $circuit;
					$results[$circuit->getId()]['addresses'] = array();
				}
				
				if (empty($results[$circuit->getId()]['addresses'][$address->getId()])) {
					$results[$circuit->getId()]['addresses'][$address->getId()]['address'] = $address;
					$results[$circuit->getId()]['addresses'][$address->getId()]['count'] = 0;
				}

				$results[$circuit->getId()]['addresses'][$address->getId()]['count'] = $results[$circuit->getId()]['addresses'][$address->getId()]['count'] + 1;
				
			}
			return $results;
			
		}
	
	}


?>