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
	
	public function filterByAvailable($fromDate, $duration) {
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
} // AdvertisementQuery
