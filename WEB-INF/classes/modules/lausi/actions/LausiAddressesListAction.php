<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");
require_once("RegionPeer.php");
require_once("CircuitPeer.php");

class LausiAddressesListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiAddressesListAction() {
		;
	}
	

	// ----- Public Methods ------------------------------------------------- //

	/**
	* Process the specified HTTP request, and create the corresponding HTTP
	* response (or forward to another web component that will create it).
	* Return an <code>ActionForward</code> instance describing where and how
	* control should be forwarded, or <code>NULL</code> if the response has
	* already been completed.
	*
	* @param ActionConfig		The ActionConfig (mapping) used to select this instance
	* @param ActionForm			The optional ActionForm bean for this request (if any)
	* @param HttpRequestBase	The HTTP request we are processing
	* @param HttpRequestBase	The HTTP response we are creating
	* @public
	* @returns ActionForward
	*/
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
 		
 		if (!empty($_GET['regionId'])) {
 			$addressPeer->setRegionId($_GET['regionId']);
 			$smarty->assign('regionId',$_GET['regionId']);
 		}

 		if (!empty($_GET['circuitId'])) {
 			$addressPeer->setCircuitId($_GET['circuitId']);
 			$smarty->assign('circuitId',$_GET['circuitId']);
 		}

 		if (!empty($_GET['rating'])) {
 			$addressPeer->setRating($_GET['rating']);
 			$smarty->assign('rating',$_GET['rating']); 			
 		}

 		if (!empty($_GET['streetName'])) {
 			$addressPeer->setStreetName($_GET['streetName']);
 			$smarty->assign('streetName',$_GET['streetName']); 			
 		}
 		
 
		$pager = $addressPeer->getAllPaginatedFiltered($_GET["page"]);
		$smarty->assign("addresses",$pager->getResult());
		$smarty->assign("pager",$pager);
		$url = "Main.php?do=lausiAddressesList&regionId" . '&regionId=' . $_GET['regionId'] . "&circuitId=" . $_GET['circuitId'] . "&rating=" . $_GET['rating'] . "&streetName=" . $_GET['streetName'];
		$smarty->assign("url",$url);		

		$smarty->assign("message",$_GET["message"]);
		$smarty->assign("page",$_GET['page']);

		return $mapping->findForwardConfig('success');
	}

}
