<?php

/**
 * Skeleton subclass for representing a row from the 'lausi_address' table.
 *
 * Base de Direcciones
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lausi
 */
class Address extends BaseAddress {

        function getName() {
				
				$nickname = $this->getNickname();
				if (!empty($nickname)) {
					return $nickname;
				}
								
				if ($this->getNumber() != 0)
                	return $this->getStreet()." ".$this->getNumber();
				else
                	return $this->getStreet()." y ".$this->getIntersection();
        }
        
		/**
		 * Devuelve el pr�ximo n�mero de cartelera en la direcci�n
		 *
		 * @return integer pr�ximo n�mero de cartelera en la direcci�n
		 */
    function getNextBillboardNumber() {
			$billboard = BillboardQuery::create()
										->filterByAddress($this)
										->orderByNumber()
										->findOne();
      if (empty($billboard))
      	return 1;
      return $billboard->getNumber()+1;
    }
        
		/**
		 * Devuelve la cantidad de carteleras por tipo en cada direcci�n
     * @param integer $type tipe de cartelera
		 * @return integer cantidad de carteleras por tipo
		 */
    function getBillboardCountByType($type) {
			$billboards = BillboardQuery::create()
								->filterByAddress($this)
								->filterByType($type)
								->count();
    	return $billboards;
    }
		
		function getBillboardCount() {
				require_once("BillboardPeer.php");
				$billboards = $this->getBillboards();
				if (empty($billboards))
						return 0;
				return count($billboards);
		}		

		public function getToBePublished($date,$themeId) {
			
			$criteria = new Criteria();
			$criteria->addJoin(AdvertisementPeer::BILLBOARDID,BillboardPeer::ID,Criteria::LEFT_JOIN);
			$criteria->add(AdvertisementPeer::PUBLISHDATE,$date);
			$criteria->add(BillboardPeer::ADDRESSID,$this->getId());
			$criteria->add(AdvertisementPeer::THEMEID,$themeId);
			
			return AdvertisementPeer::doSelect($criteria);
			
		}
		
		public function getToBePublishedCount($date,$themeId) {
			
			$theme = ThemePeer::get($themeId);
			$duplicator = 1;
			
			if ($theme->getType() == ThemePeer::TYPE_DOBLE)
				$duplicator = 2;
			
			
			$count = count($this->getToBePublished($date,$themeId));
			return $count * $duplicator;
		}
		
		public function getPreviousThemes($date,$themeId) {
			
			$lastThemes = array();
			
			$toBePublished = $this->getToBePublished($date,$themeId);
			
			foreach ($toBePublished as $advertisement) {
				$billboard = $advertisement->getBillboard();
				$lastTheme = $billboard->getPreviousTheme($date);
				if (($lastTheme != false) && !isset($lastThemes[$lastTheme->getId()])) {
					$lastThemes[$lastTheme->getId()]['theme'] = $lastTheme;
					$lastThemes[$lastTheme->getId()]['counter'] = 1;
				}
				else {
					
					if (($lastTheme != false) && isset($lastThemes[$lastTheme->getId()]))
						$lastThemes[$lastTheme->getId()]['counter']++;
				}
			}
			
			return $lastThemes;
			
		}

		public function getPreviousThemesText($date,$themeId) {
			$text = '';
			$lastThemes = $this->getPreviousThemes($date,$themeId);
			foreach ($lastThemes as $theme) {
				$text .= $theme->getName();
			}
			return $text;
		}
		
		function createBillboards($totalBillboardsDobles,$totalBillboardsSextuples) {
				require_once("BillboardPeer.php");
				$number = $this->getNextBillboardNumber();

				$row = 1;
				$quantity = 0;
				$column = 0;

				while ($quantity < $totalBillboardsDobles) {
						$column++;
						BillboardPeer::create($number,BillboardPeer::TYPE_DOBLE,0,$row,$column,$this->getId());	
						$quantity++;
						$number++;
				} 	

				$quantity = 0;
				$column = 0;

				while ($quantity < $totalBillboardsSextuples) {
						$column++;
						BillboardPeer::create($number,BillboardPeer::TYPE_SEXTUPLE,0,$row,$column,$this->getId());	
						$quantity++;
						$number++;
				} 	        
		}   
		
		/**
		 * Devuelve la cantidad de afiches distribuidos de un cierto motivo en esta direccion.
		 *
		 * @return integer cantidad de afiches
		 */
		public function getSheetsDistributed($themeId) {
			//duplicador
			$duplicator = 1;
			$theme = ThemePeer::get($themeId);
			$type = $theme->getType();
			//regla de negocio, las motivos dobles tienen dos afiches, los sextuples 1.
			if ($type == ThemePeer::TYPE_DOBLE)
				$duplicator = 2;
			require_once('ThemePeer.php');
			require_once('AdvertisementPeer.php');
			$count = AdvertisementPeer::getAllByThemeCount($this->getId());
			
			return $count * $duplicator;
			
		}
		
		/**
		 * Obtiene los themes actuales que hay en esa direccion
		 * @return array de instancias de Theme
		 */
		public function getCurrentThemes()	{
			
			$billboards = $this->getBillboards();
			$themes = array();
			foreach ($billboards as $billboard) {
				$theme = $billboard->getCurrentTheme();
				if (!empty($theme) && empty($themes[$theme->getId()]))
					$themes[$theme->getId()] = $theme;
			}
			
			return $themes;
		}
		
		public function getAvailableBillboards($fromDate, $duration) {
				require_once("BillboardPeer.php");
				$cond = new Criteria();
				$billboards = $this->getBillboards($cond);	
				$availables = array();
				foreach ($billboards as $billboard) {
					if ($billboard->isAvailable($fromDate, $duration))
						$availables[] = $billboard;
				}
				return $availables;
		}
		
		public function getDistanceTo($otherAddress) {
			//cada grado de longitud equivale a 110900 metros
			//cada grado de latitud equivale a 90000
			return sqrt(pow(($this->getLatitude() - $otherAddress->getLatitude()) * 90000,2)+ pow(($this->getLongitude() - $otherAddress->getLongitude()) * 110900,2));
		}
		          		
		
} // Address
