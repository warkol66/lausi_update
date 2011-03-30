<?php

class LausiAddressesDoEditAction extends BaseAction {

	function LausiAddressesDoEditAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Lausi";
		$smarty->assign("module",$module);
		$section = "Addresses";
		$smarty->assign("section",$section);		

		if ($_POST["action"] == "edit") {
			//estoy editando un address existente
			$latitude = Common::convertToMysqlNumericFormat($_POST["latitude"]);
			$longitude = Common::convertToMysqlNumericFormat($_POST["longitude"]);
			AddressPeer::update($_POST["id"],$_POST["street"],$_POST["number"],$_POST["rating"],$_POST["intersection"],$_POST["owner"],$latitude,$longitude,$_POST["regionId"],$_POST["ownerPhone"],$_POST["circuitId"],$_POST['nickname']);
      		
      //caso de redireccionamiento desde opciones de busqueda de addressesList
			if (isset($_POST['filters'])) {
				$filters = $_POST['filters'];
				$myRedirectConfig = $mapping->findForwardConfig('success');
   				$myRedirectPath = $myRedirectConfig->getpath();
				foreach ($filters as $key => $value)
					$myRedirectPath .= "&filters[$key]=$value";
				$fc = new ForwardConfig($myRedirectPath, True);
				return $fc;
				
			}

      		
      		
			return $mapping->findForwardConfig('success');
		}
		else {
		  //estoy creando un nuevo address
			$latitude = Common::convertToMysqlNumericFormat($_POST["latitude"]);
			$longitude = Common::convertToMysqlNumericFormat($_POST["longitude"]);
			$address = AddressPeer::create($_POST["street"],$_POST["number"],$_POST["rating"],$_POST["intersection"],$_POST["owner"],$latitude,$longitude,$_POST["regionId"],$_POST["ownerPhone"],$_POST["circuitId"],$_POST['nickname']);
			
			if ( $address == false ) {
				$address = new Address();
				$address->setid($_POST["id"]);
				$address->setstreet($_POST["street"]);
				$address->setnumber($_POST["number"]);
				$address->setrating($_POST["rating"]);
				$address->setintersection($_POST["intersection"]);
				$address->setowner($_POST["owner"]);
				$address->setlatitude($_POST["latitude"]);
				$address->setlongitude($_POST["longitude"]);
				$address->setregionId($_POST["regionId"]);
				require_once("RegionPeer.php");		
				$smarty->assign("regionIdValues",RegionPeer::getAll());
				$address->setownerPhone($_POST["ownerPhone"]);
				$address->setcircuitId($_POST["circuitId"]);
				require_once("CircuitPeer.php");		
				$smarty->assign("circuitIdValues",CircuitPeer::getAll());
				$smarty->assign("address",$address);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
      		}

			$smarty->assign('address',$address);
			
			$myRedirectConfig = $mapping->findForwardConfig('success-creation');
			$myRedirectPath = $myRedirectConfig->getpath();
			$queryData = '&id='. $address->getId();
			$myRedirectPath .= $queryData;
			$fc = new ForwardConfig($myRedirectPath, True);
			return $fc;
		}

	}

}
