<?php



/**
 * Skeleton subclass for performing query and update operations on the 'lausi_advertisement' table.
 *
 * Base de Avisos
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lausi.classes
 */
class AdvertisementQuery extends BaseAdvertisementQuery {

	public function filterByCurrent() {
		$today = date('Y-m-d');
		$this->withEndDate();
		$this->filterByPublishDate(array('max'=>$today));
		$this->filterByEndDate(array('min'=>$today));
		return $this;
	}
	
	public function withEndDate() {
		$this->withColumn('DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)', 'end_date');
	}
	
	public function filterAdvertisementsForRouteSheetReport($date, $workforceId, $themeId) {
		$this->join('Billboard', Criteria::INNER_JOIN);
		$this->join('Billboard.Address', Criteria::LEFT_JOIN);
		$this->join('Theme', Criteria::INNER_JOIN);
		$this->join('Address.Circuit', Criteria::LEFT_JOIN);
				
//		$this->groupByThemeId();
//		$this->groupByWorkforceId();
		$this->filterByPublishDate($date);
				
		if (!empty($workforceId))
			$this->filterByWorkforceId($workforceId);
		if (!empty($themeId))
			$this->filterByThemeId($themeId);
				
		//solo para sextuples segun requerimiento
		$this->useQuery('Billboard')
			->filterByType(BillboardPeer::TYPE_SEXTUPLE)
			->addGroupByColumn(BillboardPeer::ADDRESSID)
		->endUse();
		
		//ordenamiento primero por nombre de motivo y luego por direccion
		//$this->addAscendingOrderByColumn(CircuitPeer::NAME,ThemePeer::NAME,AddressPeer::STREET,AddressPeer::NUMBER);
		$this->addAscendingOrderByColumn(CircuitPeer::NAME);
		$this->addAscendingOrderByColumn(AddressPeer::ORDERCIRCUIT);

		return $this;
	}
	
	public function filterAdvertisementsForSheetsLocationReport($date,$type,$circuitId=null) {
		$this->join('Billboard', Criteria::INNER_JOIN);
		$this->join('Billboard.Address', Criteria::LEFT_JOIN);
		$this->join('Theme', Criteria::INNER_JOIN);
		$this->join('Address.Circuit', Criteria::LEFT_JOIN);			
		//agrupamiento y ordenamiento
		$this->addAscendingOrderByColumn(AddressPeer::CIRCUITID,AddressPeer::STREET,AddressPeer::NUMBER);
		//condiciones

		//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
		$sql .= "('" . $date . "' >= lausi_advertisement.publishDate AND ";
		$sql .=	"'" . $date ."' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))";

		$this->where($sql);
		
		$this->useQuery('Billboard')
			->filterByType($type)
		->endUse();
		
		$this->useQuery('Theme')
			->filterByActive(1)
		->endUse();
				
		if (!empty($circuitId)) {
			$this->useQuery('Address')
				->filterByCircuitId($circuitId)
			->endUse();
		}
				
		$this->addAscendingOrderByColumn(CircuitPeer::NAME);
		$this->addAscendingOrderByColumn(AddressPeer::ORDERCIRCUIT);
		
		return $this;
	}

	public function filterByCircuit($circuit) {
		return $this
			->join('Billboard')
			->join('Billboard.Address')
			->useQuery('Address')
				->filterByCircuit($circuit)
			->endUse();
	}

} // AdvertisementQuery
