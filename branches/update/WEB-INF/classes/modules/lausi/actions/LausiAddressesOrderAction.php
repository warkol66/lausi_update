<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");
require_once("RegionPeer.php");
require_once("CircuitPeer.php");

class LausiAddressesOrderAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiAddressesOrderAction() {
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
 	
 		$addressPeer = new AddressPeer();
 	
 		if (!empty($_GET['circuitId'])) {
 			$addressPeer->setCircuitId($_GET['circuitId']);
 			$smarty->assign('circuitId',$_GET['circuitId']);
			
			$addresses = $addressPeer->getAllFilter();
			$smarty->assign("addresses",$addresses);
			
 		} 		
		
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
