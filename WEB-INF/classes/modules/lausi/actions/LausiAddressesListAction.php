<?php

class LausiAddressesListAction extends BaseAction {

	function LausiAddressesListAction() {
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
 
 		//opciones para filtro
 		$smarty->assign("circuits",CircuitPeer::getAll());
 		$smarty->assign("regions",RegionPeer::getAll());
 	
 		$addressPeer = new AddressPeer();
 	
 		//procesamos las opciones de filtrado que pueden llegar a haberse aplicado
 		
		$filters = $_GET['filters'];
		$smarty->assign("filters",$filters);

 		if (!empty($_GET['filters']['regionId']))
 			$addressPeer->setRegionId($_GET['filters']['regionId']);

 		if (!empty($_GET['filters']['circuitId']))
 			$addressPeer->setCircuitId($_GET['filters']['circuitId']);

 		if (!empty($_GET['filters']['rating']))
 			$addressPeer->setRating($_GET['filters']['rating']);

 		if (!empty($_GET['filters']['streetName']))
 			$addressPeer->setStreetName($_GET['filters']['streetName']);
 		
 
		$pager = $addressPeer->getAllPaginatedFiltered($_GET["page"]);
		$smarty->assign("addresses",$pager->getResult());
		$smarty->assign("pager",$pager);
		//$url = "Main.php?do=lausiAddressesList&regionId" . '&regionId=' . $_GET['regionId'] . "&circuitId=" . $_GET['circuitId'] . "&rating=" . $_GET['rating'] . "&streetName=" . $_GET['streetName'];

				$url = "Main.php?do=lausiAddressesList";

				foreach ($filters as $key => $value)
					$url .= "&filters[$key]=$value";
				$smarty->assign("url",$url);

		$smarty->assign("message",$_GET["message"]);
		$smarty->assign("page",$_GET['page']);

		return $mapping->findForwardConfig('success');
	}

}
