<?php

require_once("db_mysql.inc.php");

class MigrationPeer {

	private $codigosDireccionesId = array();

	function migrate($tables) {
		$result = array();
		foreach ($tables as $table) {
			$method = "migrate".$table;
			$resultTable = MigrationPeer::$method();
			$result[$table] = $resultTable;
		}
		return $result;
	}
	
	function utf8EncodeMultiArray($array) {
		$utf8Array = array();
		for ($i=0;$i<count($array);$i++) {
			foreach ($array[$i] as $key => $value) {
				$utf8Array[$i][$key] = utf8_encode($value);
			}
		}
		return $utf8Array;
	}
	
	function migrateClientes() {
		$con = Propel::getConnection("access");

		$db = new DB_Sql();
		$dsn = $con->getDSN();
		$db->Host = $dsn["hostspec"];
		$db->Database = $dsn["database"];
		$db->User = $dsn["username"];
		$db->Password = $dsn["password"];				

		$query = "SELECT * FROM clientes";

		$db->query($query);
		$resultado = $db->recordset2Array();	

		$resultado = MigrationPeer::utf8EncodeMultiArray($resultado);

		require_once("ClientPeer.php");
		
		$clientsCreateds = 0;

		foreach ($resultado as $cliente) {
			//agrego el cliente si no existe ya
			if (!ClientPeer::exists($cliente["clnombre"])) {
				ClientPeer::create($cliente["clnombre"],$cliente["clcontacto"]);
				$clientsCreateds++;
			}
		}
		return $clientsCreateds;	
	}
	
	function migrateAvisos() {
		$con = Propel::getConnection("access");

		$db = new DB_Sql();
		$dsn = $con->getDSN();
		$db->Host = $dsn["hostspec"];
		$db->Database = $dsn["database"];
		$db->User = $dsn["username"];
		$db->Password = $dsn["password"];				

		//$query = "SELECT *, DATEDIFF(pd.pdtultimodia,pd.pdprimerdia) as duracion FROM pautadireccion pd left join motivos m on m.mocodigo = pd.mocodigo left join clientes cl on m.clcodigo = cl.clcodigo";
		$query = "SELECT * FROM pautadireccion pd left join motivos m on m.mocodigo = pd.mocodigo left join clientes cl on m.clcodigo = cl.clcodigo left join direcciones d on d.dicodigo = pd.dicodigo left join pautamotivo pm on pm.mocodigo = pd.mocodigo";

		$db->query($query);
		$resultado = $db->recordset2Array();
		
		for ($i=0;$i<count($resultado);$i++)
			$resultado[$i]["duracion"] = (strtotime($resultado[$i]["pdtultimodia"]) - strtotime($resultado[$i]["pdprimerdia"])) / 86400;

		$resultado = MigrationPeer::utf8EncodeMultiArray($resultado);

		require_once("ClientPeer.php");
		require_once("ThemePeer.php");
		require_once("AddressPeer.php");
		require_once("AdvertisementPeer.php");
		
		$advertisementsCreateds = 0;
		$advertisementsNotCreateds = 0;
		
		$addressesNotFounds = array();
		$themesNotCreateds = array();
		$billboardsNotCreateds = array();
		$addressesWithErrors = array();
		$addressesWithErrorsDetail = array();
		
		global $system;
		
		$initialDate = $system["config"]["migration"]["advertisementInitialDate"];

		foreach ($resultado as $aviso) {
			
			//obtengo el addressId
			//$addressId = $this->codigosDireccionesId[$aviso["dicodigo"]];
			
			$address = MigrationPeer::getAddress($aviso["dinombre"],$aviso["dialtura"]);
			//$address = AddressPeer::get($addressId);
				
			$client = ClientPeer::getByName($aviso["clnombre"]);
			
			if ($aviso["pdtipo"] == "S") {
				$type = ThemePeer::TYPE_SEXTUPLE;
				$unit = 6;
				$sheets = $aviso["pmcantidad"]/6;
			}
			else {
				$type = ThemePeer::TYPE_DOBLE;
				$unit = 2;
				$sheets = $aviso["pmcantidad"];
			}			
			
			$theme = ThemePeer::getOrCreate($aviso["monombre"],$aviso["monombre"],$initialDate,$aviso["duracion"],$type,$client->getId(),$sheets);
			
			$billboardCount = $aviso["pdcantidad"] / $unit;
			
			if (!empty($address)) {
				$billboards = $address->getAvailableBillboards($initialDate, $aviso["duracion"]);
			
				if (empty($theme)) {
					$themesNotCreateds[] = array("monombre"=>$aviso["monombre"],"billboardCount"=>$billboardCount);
				}	
   
				$billboardsInAddress = count($billboards);
   
				$createds = 0;
				$i = 0;
   
				while ( ($createds < $billboardCount) && ($i < $billboardsInAddress) ) {
					$billboard = $billboards[$i];
					if ( !empty($billboard) && $billboard->getType() == $theme->getType() ) {
						$error = AdvertisementPeer::createWithErrorDetail(time(),$initialDate,$aviso["duracion"],$billboard->getId(),$theme->getId());
						if ($error == "0") {
							$advertisementsCreateds++;
							$createds++;
						} else {
							$billboardsNotCreateds[] = array("dinombre"=>$aviso["dinombre"],"dialtura"=>$aviso["dialtura"],"monombre"=>$aviso["monombre"],"billboardId"=>$billboard->getId(),"themeId"=>$theme->getId(),"error"=>$error);
						}
					}
					$i++;
				}
				if ( ($billboardCount-$createds) > 0 ) {
					$addressesWithErrorsDetail[] = array("dinombre"=>$aviso["dinombre"],"dialtura"=>$aviso["dialtura"],"monombre"=>$aviso["monombre"],"tipo"=>$aviso["pdtipo"],"billboards"=>$billboardCount,"createds"=>$createds,"advertisementsNotCreateds"=>($billboardCount-$createds),"billboardsInAddress"=>$billboardsInAddress);
					$addressesWithErrors[$aviso["dinombre"]." - ".$aviso["dialtura"]." - ".$aviso["pdtipo"]." - ".$aviso["monombre"]] = array("billboards"=>$billboardCount+$addressesWithErrors[$aviso["dinombre"]." - ".$aviso["dialtura"]." - ".$aviso["pdtipo"]." - ".$aviso["monombre"]]["billboards"],"createds"=>$createds+$addressesWithErrors[$aviso["dinombre"]." - ".$aviso["dialtura"]." - ".$aviso["pdtipo"]." - ".$aviso["monombre"]]["creteds"],"advertisementsNotCreateds"=>($billboardCount-$createds)+$addressesWithErrors[$aviso["dinombre"]." - ".$aviso["dialtura"]." - ".$aviso["pdtipo"]." - ".$aviso["monombre"]]["advertisementsNotCreateds"],"billboardsInAddress"=>$billboardsInAddress);
				}
				$advertisementsNotCreateds+=($billboardCount-$createds);
			
			} else {
				$addressesNotFounds[$aviso["dinombre"]." - ".$aviso["dialtura"]." - ".$aviso["pdtipo"]] += $billboardCount;
				$advertisementsNotCreatedsForAddressesNotFounds[$aviso["pdtipo"]] += $billboardCount;
			}				

		}
		return array("createds" => $advertisementsCreateds,"notCreateds" => $advertisementsNotCreateds,"advertisementsNotCreatedsForAddressesNotFounds"=>$advertisementsNotCreatedsForAddressesNotFounds,"addressesNotFounds" => $addressesNotFounds, "themesNotCreateds" => count($themesNotCreateds), "billboardsNotCreatedsCount" => count($billboardsNotCreateds), "billboardsNotCreateds" => $billboardsNotCreateds, "addressesWithErrorsCount" => count($addressesWithErrors), "addressesWithErrors" => $addressesWithErrors, "addressesWithErrorsDetail" => $addressesWithErrorsDetail);	
	}	
	
	function getAddress($street,$number) {	
		//Reemplazo Acentos
		$replaces = array();
		$replaces[] = array("original"=>"á","replacement"=>"a");
		$replaces[] = array("original"=>"é","replacement"=>"e");
		$replaces[] = array("original"=>"í","replacement"=>"i");
		$replaces[] = array("original"=>"ó","replacement"=>"o");
		$replaces[] = array("original"=>"ú","replacement"=>"u");			
		$replaces[] = array("original"=>"à","replacement"=>"a");
		$replaces[] = array("original"=>"è","replacement"=>"e");
		$replaces[] = array("original"=>"ì","replacement"=>"i");
		$replaces[] = array("original"=>"ò","replacement"=>"o");
		$replaces[] = array("original"=>"ù","replacement"=>"u");

		foreach ($replaces as $replace)
			$street = str_replace($replace["original"],$replace["replacement"],$street);				

		$found = false;

		$address = AddressPeer::getByStreet($street,$number);				

		if (!empty($address)) {
			return $address;
		}

		//Busco intersecciones	
		$streets = split(" y ",$street);

		$address = AddressPeer::getByStreetAndIntersection($streets[0],$streets[1]);

		if (!empty($address)) {
			return $address;
		}
		
		$address = AddressPeer::getByStreetAndIntersection($streets[1],$streets[0]);			
		
		if (!empty($address)) {
			return $address;
		}		

		//Busco solo los primeros 10 caracteres	
		$streetShort = substr($street,0,10);				

		$address = AddressPeer::getLikeStreet($streetShort,$number);

		if (!empty($address)) {
			return $address;
		}

		//Cambio a mano direcciones mal conocidas

		$wrongsAddresses = array();
		$wrongsAddresses[] = array("streetOriginal"=>"Paz Gral. Av. (Este) y Zapiola","numberOriginal"=>"0","street"=>"Zapiola","intersection"=>"Paz General Autopista");		
		$wrongsAddresses[] = array("streetOriginal"=>"Herrera 337 lat. puente 9 de julio","numberOriginal"=>"0","street"=>"Herrera","number"=>"337");
		$wrongsAddresses[] = array("streetOriginal"=>"Catamarca y Moreno","numberOriginal"=>"0","street"=>"Catamarca","number"=>"306");
		$wrongsAddresses[] = array("streetOriginal"=>"Magariños Cervantes Alejandro","numberOriginal"=>"3545","street"=>"Cervantes","number"=>"3545");
		$wrongsAddresses[] = array("streetOriginal"=>"Humahuaca e/Agüero y Gallo","numberOriginal"=>"0","street"=>"Humahuaca","intersection"=>"Gallo");
		$wrongsAddresses[] = array("streetOriginal"=>"Ercilla y Fonrouge","numberOriginal"=>"0","street"=>"Ercilla","number"=>"5908");
		$wrongsAddresses[] = array("streetOriginal"=>"Estacion Villa Luro","numberOriginal"=>"0","street"=>"Virgilio","intersection"=>"Bacacay");

		$i = 0;
		$foundWrongsAddresses = false;

		while ( !$foundWrongsAddresses && $i<count($wrongsAddresses) ) {
			//Si es la direccion que busco
			if ($wrongsAddresses[$i]["streetOriginal"] == $street && $wrongsAddresses[$i]["numberOriginal"] == $number) {
				$foundWrongsAddresses = true;
				//Si es una interseccion
				if (!empty($wrongsAddresses[$i]["intersection"])) {
					$address = AddressPeer::getByStreetAndIntersection($wrongsAddresses[$i]["street"],$wrongsAddresses[$i]["intersection"]);				
					if (!empty($address)) {
						return $address;
					}	   						
				} else {
					$address = AddressPeer::getByStreet($wrongsAddresses[$i]["street"],$wrongsAddresses[$i]["number"]);	
					if (!empty($address)) {
						return $address;
					}	   						  							
				}				
			}

			$i++;
		}
	

		return false;	
	}
	
	function migrateDirecciones() {
		$con = Propel::getConnection("access");
			
		$db = new DB_Sql();
		$dsn = $con->getDSN();
		$db->Host = $dsn["hostspec"];
		$db->Database = $dsn["database"];
		$db->User = $dsn["username"];
		$db->Password = $dsn["password"];				
   
		$query = "SELECT * FROM direcciones left join circuitos on circuitos.cicodigo = direcciones.cicodigo";
		
		$db->query($query);
		$resultado = $db->recordset2Array();	

		$resultado = MigrationPeer::utf8EncodeMultiArray($resultado);
		
		require_once("AddressPeer.php");
		require_once("CircuitPeer.php");
		require_once("BillboardPeer.php");
		
		$addressesNotFound = array();
		$addressesFound = array();
		$addressWithBillboardError = array();
		
		foreach ($resultado as $direccion) {
			
			$cinombre = substr($direccion["cinombre"],3);
			
			switch ($cinombre) {
				case "Avenidas Norte":
					$cinombre = "Av. Norte";
					break;
				case "Internos Norte":
					$cinombre = "Int. Norte";
					break;					
			}
			
			$circuit = CircuitPeer::getByName($cinombre);
			if (!empty($circuit))
				$circuitId = $circuit->getId();
			else
				$circuitId = 0;		
			
			$totalBillboards = $direccion["dicantidad"];
			$totalBillboardsSextuples = $direccion["dicantsextuple"];
			$totalBillboardsDobles = $totalBillboards - $totalBillboardsSextuples;			
			$totalBillboardsDobles = $totalBillboardsDobles / 2; 
			$totalBillboardsSextuples = $totalBillboardsSextuples / 6;			
				
			$street = $direccion["dinombre"];
   
   			//Reemplazo Acentos
			$replaces = array();
			$replaces[] = array("original"=>"á","replacement"=>"a");
			$replaces[] = array("original"=>"é","replacement"=>"e");
			$replaces[] = array("original"=>"í","replacement"=>"i");
			$replaces[] = array("original"=>"ó","replacement"=>"o");
			$replaces[] = array("original"=>"ú","replacement"=>"u");			
			$replaces[] = array("original"=>"à","replacement"=>"a");
			$replaces[] = array("original"=>"è","replacement"=>"e");
			$replaces[] = array("original"=>"ì","replacement"=>"i");
			$replaces[] = array("original"=>"ò","replacement"=>"o");
			$replaces[] = array("original"=>"ù","replacement"=>"u");
   
			foreach ($replaces as $replace)
				$street = str_replace($replace["original"],$replace["replacement"],$street);				
			
			$found = false;
				
			$addressId = AddressPeer::updateCircuitAndBillboards($street,$direccion["dialtura"],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);				
				
			if ($addressId) {
				$addressesFound["lings"][] = $direccion;
				$found = true;
				$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
			}
			
			if (!$found) {				
				//Busco intersecciones	
				$streets = split(" y ",$street);
			
				$addressId = AddressPeer::updateCircuitAndBillboardsWithIntersection($streets[0],$streets[1],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);				
			}

			if (!$found && $addressId) {
				$addressesFound["intersections"][] = $direccion;			
				$found = true;
				$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
			}
			
			if (!$found) {			
				$addressId = AddressPeer::updateCircuitAndBillboardsWithIntersection($streets[1],$streets[0],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);				
			}
			
			if (!$found && $addressId) {
				$addressesFound["intersections"][] = $direccion;			
				$found = true;
				$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
			}				
			
			if (!$found) {				
				//Busco solo los primeros 10 caracteres	
				$street = substr($street,0,10);				

				$addressId = AddressPeer::updateCircuitAndBillboardsLikeStreet($street,$direccion["dialtura"],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);
			}

			if (!$found && $addressId) {
				$addressesFound["justTen"][] = $direccion;
				$found = true;
				$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
			}
			
			if (!$found) {
			
				//Cambio a mano direcciones mal conocidas
				$street = $direccion["dinombre"];
   
				$wrongsAddresses = array();
				$wrongsAddresses[] = array("streetOriginal"=>"Paz Gral. Av. (Este) y Zapiola","numberOriginal"=>"0","street"=>"Zapiola","intersection"=>"Paz General Autopista");		
				$wrongsAddresses[] = array("streetOriginal"=>"Herrera 337 lat. puente 9 de julio","numberOriginal"=>"0","street"=>"Herrera","number"=>"337");
				$wrongsAddresses[] = array("streetOriginal"=>"Catamarca y Moreno","numberOriginal"=>"0","street"=>"Catamarca","number"=>"306");
				$wrongsAddresses[] = array("streetOriginal"=>"Magariños Cervantes Alejandro","numberOriginal"=>"3545","street"=>"Cervantes","number"=>"3545");
				$wrongsAddresses[] = array("streetOriginal"=>"Humahuaca e/Agüero y Gallo","numberOriginal"=>"0","street"=>"Humahuaca","intersection"=>"Gallo");
				$wrongsAddresses[] = array("streetOriginal"=>"Ercilla y Fonrouge","numberOriginal"=>"0","street"=>"Ercilla","number"=>"5908");
				$wrongsAddresses[] = array("streetOriginal"=>"Estacion Villa Luro","numberOriginal"=>"0","street"=>"Virgilio","intersection"=>"Bacacay");
   
				$newAddress = array();
				$i = 0;
				$foundWrongsAddresses = false;
   
				while ( !$foundWrongsAddresses && $i<count($wrongsAddresses) ) {
					//Si es la direccion que busco
					if ($wrongsAddresses[$i]["streetOriginal"] == $street && $wrongsAddresses[$i]["numberOriginal"] == $direccion["dialtura"]) {
						$foundWrongsAddresses = true;
						//Si es una interseccion
						if (!empty($wrongsAddresses[$i]["intersection"])) {
							$addressId = AddressPeer::updateCircuitAndBillboardsWithIntersection($wrongsAddresses[$i]["street"],$wrongsAddresses[$i]["intersection"],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);				
							if ($addressId) {
								$addressesFound["manual"][] = $direccion;			
								$found = true;
								$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
							}	   						
						} else {
							$addressId = AddressPeer::updateCircuitAndBillboards($wrongsAddresses[$i]["street"],$wrongsAddresses[$i]["number"],$circuitId,$totalBillboardsDobles,$totalBillboardsSextuples);	
							if ($addressId) {
								$addressesFound["manual"][] = $direccion;			
								$found = true;
								$this->codigosDireccionesId[$direccion["dicodigo"]] = $addressId;
							}	  							
						}				
					}
   
					$i++;
				}
   
			}		
			
			if (!$found)	
				$addressesNotFound[] = $direccion;
			elseif ($addressId) {
				$addressFound = AddressPeer::get($addressId);
				$addressDetail = array();
				$addressDetail["name"] = $addressFound->getName();
				$addressDetail["doblesAccess"] = $totalBillboardsDobles;
				$addressDetail["sextuplesAccess"] = $totalBillboardsSextuples;
				$addressDetail["dobles"] = $addressFound->getBillboardCountByType(1);
				$addressDetail["sextuples"] = $addressFound->getBillboardCountByType(2);
				if ( ($addressDetail["doblesAccess"] != $addressDetail["dobles"]) || ($addressDetail["sextuplesAccess"] != $addressDetail["sextuples"])  )
					$addressWithBillboardError[] = $addressDetail;
			} 
															
		}
		
		$results = array("addressesNotFound" => $addressesNotFound, "addressesFound" => $addressesFound, "addressWithBillboardError" => $addressWithBillboardError);
		
		return $results;
	}				

}