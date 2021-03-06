<?php

require_once 'lausi/om/BaseBillboard.php';
require_once('AdvertisementPeer.php');


/**
 * Skeleton subclass for representing a row from the 'lausi_billboard' table.
 *
 * Base de Activos (Carteleras)
 *
 * This class was autogenerated by Propel on:
 *
 * 03/28/08 09:59:17
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lausi
 */
class Billboard extends BaseBillboard {

		public $checked = false;

        function setColumn($column) {
                return $this->setBillboardColumn($column);
        }
        
        function getColumn() {
                return $this->getBillboardColumn();
        }        
        
        function getTypeName() {
                $type = $this->getType();
                switch ($type) {
                        case BillboardPeer::TYPE_DOBLE: return "Doble";
                        case BillboardPeer::TYPE_SEXTUPLE: return "Séxtuple";
                }
                return "";
        }
        
        /**
         *
         * Verifica que este disponible la cartelera para una cierta fecha y duracion
         * 
         * @param date $fromDate fecha de publicacion
         * @param integer $duration duracion de la publicacion
         * @todo falta fecha final aplicando duracion del periodo
         */
        function isAvailable($fromDate, $duration) {
        
        
        	$criteria = new Criteria();
        	
     	   	//armamos la fecha final
			ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $fromDate, $splitDate);
			$year = $splitDate[1];
			$month = $splitDate[2];
			$day = $splitDate[3];
			$timestamp = mktime(0,0,0,$month,$day+$duration,$year);
        	$toDate = date('Y-m-d',$timestamp);
    	
			$sql  = 'billboardId = ' . $this->getId() . ' AND ';
			//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea menor a la fecha de finalizacion del periodo
        	$sql .= "((('" . $fromDate . "' >= lausi_advertisement.publishDate) AND ";
			$sql .=	"('" . $toDate ."' >  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY)) AND";
			$sql .=	"('" . $fromDate ."' <  DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

			//Caso fecha de publicacion sea mayor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
        	$sql .= "(('" . $fromDate . "' < lausi_advertisement.publishDate) AND ";
        	$sql .= "('" . $toDate . "' > lausi_advertisement.publishDate) AND ";
			$sql .=	"('" . $toDate ."' <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR ";

			//Caso fecha de publicacion sea mayor igual a la de inicio del periodo y fecha de finalizacion del aviso sea menor igual a la fecha de finalizacion del periodo
        	$sql .= "(('" . $fromDate . "' <= lausi_advertisement.publishDate) AND ";
			$sql .=	"('" . $toDate ."' >= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))) OR";
			
			//Caso fecha de publicacion sea menor a la de inicio del periodo y fecha de finalizacion del aviso sea mayor a la fecha de finalizacion del periodo
        	$sql .= "(('" . $fromDate . "' > lausi_advertisement.publishDate) AND ";
			$sql .=	"('" . $toDate ."' < DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))))";			

			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);
			$adverts = AdvertisementPeer::doSelect($criteria);

        	if (count($adverts) == 0) {
				return true;
			}

       		return false;

      	}
        
        /**
         * Obtiene los avisos que estan en esa cartelera el dia de hoy
         * @return array instancia de advertisements
         *
         */
        private function getTodayAdvertisements() {

			$criteria = new Criteria();
			
			$sql = '(CURDATE() >= lausi_advertisement.publishDate) AND (CURDATE() <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))';
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$sql,Criteria::CUSTOM);

        	$adverts = $this->getAdvertisements($criteria);
        	
        	return $adverts;

        	
        }
        
        /**
         * Indica si la cartelera esta disponible hoy
         *
         * @return boolean devuelve true si esta disponible o la instancia que esta ocupando en este momento la cartelera
         */
        public function isAvailableToday() {

			$adverts = $this->getTodayAdvertisements();
        	if (empty($adverts))
        		return true;
        	
        	return false;
        	
        }
        
        /**
         * Devuelve el motivo que se encuentra el dia de hoy en la cartelera.
         *
         * @return Theme instancia de theme, o null en caso que este libre
         *
		 */
		public function getCurrentTheme() {
			
			$adverts = $this->getTodayAdvertisements();
			if (empty($adverts))
				return null;
				
			$advert = $adverts[0];
			return $advert->getTheme();
			
		}
		
		/**
		 * Devuelve el ultimo motivo publicado en esa cartelera a la fecha de hoy.
		 * @return Theme instanacia de Theme
		 */
		public function getLastTheme() {
			
			require_once('AdvertisementPeer.php');
			
			$criteria = new Criteria();
			$criteria->add(AdvertisementPeer::BILLBOARDID,$this->getId());
			$criteria->addDescendingOrderByColumn(AdvertisementPeer::PUBLISHDATE);
			$criteria->setLimit(1);
			
			$result = AdvertisementPeer::doSelect($criteria);
			if (empty($result)) 
				return false;
			$advert = $result[0]; 
			return $advert->getTheme();
			
		}
		
		/**
		 * Devuelve el ultimo motivo publicado en esa cartelera a la fecha de hoy.
		 * @return Theme instanacia de Theme
		 */
		public function getPreviousTheme($date) {
			
			if (empty($date))
				$date = date('Y-m-d');
				
			require_once('AdvertisementPeer.php');
			
			$criteria = new Criteria();
			$criteria->add(AdvertisementPeer::BILLBOARDID,$this->getId());
			
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$date,Criteria::LESS_EQUAL);
			
			$criteria->addDescendingOrderByColumn(AdvertisementPeer::PUBLISHDATE);
			$criteria->setLimit(2);
			
			$result = AdvertisementPeer::doSelect($criteria);
			if (empty($result)) 
				return false;
			$advert = $result[1];
			
			if (empty($advert))
				return false;
			
			return $advert->getTheme();
			
		}
		
		public function setChecked() {
			
			$this->checked = true;
			
		}
		
		public function isChecked() {
			
			return $this->checked;
			
		}
		
		public function getToBePublished($date,$themeId) {
			$criteria = new Criteria();
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$date);
			$criteria->add(AdvertisementPeer::BILLBOARDID,$this->getId());
			$criteria->add(AdvertisementPeer::THEMEID,$themeId);
			
			return AdvertisementPeer::doSelect($criteria);
			
		}
		
		public function getToBePublishedCount($date,$themeId) {
			return count($this->getToBePublished($date,$themeId));
		}

} // Billboard
