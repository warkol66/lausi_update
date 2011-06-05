<?php

require_once 'om/BaseRegion.php';


/**
 * Skeleton subclass for representing a row from the 'lausi_region' table.
 *
 * Barrios
 *
 * This class was autogenerated by Propel on:
 *
 * 03/31/08 13:39:59
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lausi
 */
class Region extends BaseRegion {

	public function getSheetsDistributed($themeId) {
		//duplicador
		$duplicator = 1;
		$theme = ThemePeer::get($themeId);
		$type = $theme->getType();
		//regla de negocio, las motivos dobles tienen dos afiches, los sextuples 1.
		if ($type == ThemePeer::TYPE_DOBLE)
			$duplicator = 2;
		require_once('AdvertisementPeer.php');
		
		$cond = new Criteria();
		$cond->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::INNER_JOIN);
		$cond->addJoin(BillboardPeer::ADDRESSID,AddressPeer::ID,Criteria::INNER_JOIN);
		$cond->addJoin(AdvertisementPeer::THEMEID,ThemePeer::ID,Criteria::INNER_JOIN);
		$cond->add(ThemePeer::TYPE,$type);
		$cond->add(AddressPeer::REGIONID,$this->getId());
		$cond->add(ThemePeer::ID,$themeId);
		
		$count = AdvertisementPeer::doCount($cond);

		return $count * $duplicator;
		
	}
	
	public function getAvailableTodayCount($theme) {
		
		$criteria = new BillboardQuery();
		$criteria->add(BillboardPeer::TYPE,$theme->getType());
		$criteria->add(AddressPeer::REGIONID,$this->getId());
		
		return BillboardPeer::getAllAvailableCount($criteria,date("Y-m-d"),1);
		
	}	


} // Region
