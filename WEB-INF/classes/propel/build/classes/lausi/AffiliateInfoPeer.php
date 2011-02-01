<?php

  // include base peer class
  require_once 'om/BaseAffiliateInfoPeer.php';
  
  // include object class
  include_once 'AffiliateInfo.php';


/**
 * Skeleton subclass for performing query and update operations on the 'renal_affiliateinfo' table.
 *
 * Informacion del afiliado
 *
 * This class was autogenerated by Propel on:
 *
 * 12/27/06 11:08:05
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class AffiliateInfoPeer extends BaseAffiliateInfoPeer {


  function get($id) {
		$cond = new Criteria();
		$cond->add(AffiliateInfoPeer::AFFILIATEID, $id);
		$todosObj = AffiliateInfoPeer::doSelect($cond);
		return $todosObj[0];
  }

 function update($id,$affiliateId,$holder,$directionBoardContact,$telephone,$extraTelephone,$email,$responsible) {
		$affiliate = AffiliateInfoPeer::retrieveByPK($id);		
		$affiliate->setAffiliateId($affiliateId);		
		$affiliate->setHolder($holder);
		$affiliate->setDirectionBoardContact($directionBoardContact);
		$affiliate->setTelephone($telephone);
		$affiliate->setExtraTelephone($extraTelephone);
		$affiliate->setEmail($email);
		$affiliate->setResponsible($responsible);		
		$affiliate->save();
		return true;
  }

  
	 function add($affiliateId,$holder,$directionBoardContact,$telephone,$extraTelephone,$email,$responsible,$con = null) {
		$affiliate = new AffiliateInfo();		
		$affiliate->setAffiliateId($affiliateId);
		$affiliate->setHolder($holder);
		$affiliate->setDirectionBoardContact($directionBoardContact);
		$affiliate->setTelephone($telephone);
		$affiliate->setExtraTelephone($extraTelephone);
		$affiliate->setEmail($email);
		$affiliate->setResponsible($responsible);		
		try {
			$affiliate->save($con);
		}
		catch(PropelException $exp) {
			return false;
		}
		return true;
  	}
  

} // AffiliateInfoPeer
