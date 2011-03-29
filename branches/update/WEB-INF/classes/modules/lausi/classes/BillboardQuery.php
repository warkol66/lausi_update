<?php



/**
 * Skeleton subclass for performing query and update operations on the 'lausi_billboard' table.
 *
 * Base de Activos (Carteleras)
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lausi.classes
 */
class BillboardQuery extends BaseBillboardQuery {

	public function filterByAvailable($fromDate,$duration) {
		$this->join('Address', Criteria::INNER_JOIN);
		
		$fromDate = new DateTime($fromDate);
		$toDate = new DateTime($fromDate->format('Y-m-d'));
		$toDate->modify("+$duration days");
		
		$fromDate = $fromDate->format('Y-m-d');
		$toDate = $toDate->format('Y-m-d');
		
		//Esta subquery lo que hace es agregar una cuenta de la cantidad de advertisements asociados
		//al billboard cuyo rango temporal de validez tiene alguna intersección con el rango temporal
		//pasado por parámetro.
		$subQuery = AdvertisementQuery::create()
			->where(AdvertisementPeer::BILLBOARDID .' = ' . BillboardPeer::ID)
			->where(AdvertisementPeer::PUBLISHDATE . " <= '$toDate'")
			->where("DATE_ADD(" . AdvertisementPeer::PUBLISHDATE . ",INTERVAL " . AdvertisementPeer::DURATION. " DAY) >= '$fromDate'")
			->clearSelectColumns()
			->addSelectColumn('COUNT(*)');
		$subQuery->setPrimaryTableName(AdvertisementPeer::TABLE_NAME);
			
		$params = array();
		$subQuery = BasePeer::createSelectSql($subQuery, $params);
		
		//Ahora nos fijamos si el resultado de ese subselect es igual a 0.
		$this->where('(' . $subQuery . ') = 0');
		
		$this->distinct();
		
		return $this;
	}
	
	public function selectFieldsForAvailableBillboardsReport() {
		$this->withColumn(CircuitPeer::ID, 'CircuitId');
		$this->withColumn(BillboardPeer::TYPE, 'BillboardType');
		$this->withColumn(CircuitPeer::NAME, 'CircuitName');
		$this->withColumn('COUNT(*)', 'Count');
		$this->select(array('CircuitId', 'Count', 'BillboardType', 'CircuitName'));
		return $this;
	}
} // BillboardQuery
