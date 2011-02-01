<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");
require_once("ThemePeer.php");

class LausiAddressesEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiAddressesEditAction() {
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

    	if ( !empty($_GET["id"]) ) {
			//voy a editar un address

			$address = AddressPeer::get($_GET["id"]);

			$smarty->assign("address",$address);

			require_once("RegionPeer.php");		
			$smarty->assign("regionIdValues",RegionPeer::getAll());
			require_once("CircuitPeer.php");		
			$smarty->assign("circuitIdValues",CircuitPeer::getAll());
			
			//obtengo todas las carteleras en la direccion
			$smarty->assign("billboards",$address->getBillboards());
			//obtengo todos los motivos actuales en esa direccion
			$adverts = AdvertisementPeer::getAllCurrentByAddress($address->getId());
			
			$themes = ThemePeer::getAllActive();
			$smarty->assign('themes',$themes);
			
			//agregado de agrupamiento por Motivo
			$groupByTheme = array();
			
			foreach ($adverts as $advert) {
				
				$themeId = $advert->getThemeId();
				
				if (empty($groupByTheme[$themeId]))
					$groupByTheme[$themeId]['adverts'] = array();
				
				array_push($groupByTheme[$themeId]['adverts'],$advert);
				
				if (empty($groupByTheme[$themeId]['theme']))
					$groupByTheme[$themeId]['theme'] = $advert->getTheme();
				
			}
			
			//disponibilidades
			$billboards = BillboardPeer::getAllAvailableByAddress($_GET['id'], 0, date('Y-M-d'), 1, BillboardPeer::TYPE_DOBLE);
				
			$doubleAvailable = count($billboards[$_GET['id']]['elements']);
			
			$billboards = BillboardPeer::getAllAvailableByAddress($_GET['id'], 0, date('Y-M-d'), 1, BillboardPeer::TYPE_SEXTUPLE);
			$sixAvailable = count($billboards[$_GET['id']]['elements']);
			
			$smarty->assign('doubleAvailable',$doubleAvailable);
			$smarty->assign('sixAvailable',$sixAvailable);
			
			$smarty->assign("groupByTheme",$groupByTheme);
			
	    	$smarty->assign("action","edit");
		}
		else {
			//voy a crear un address nuevo
			$address = new Address();
			$smarty->assign("address",$address);			
			require_once("RegionPeer.php");	
			$smarty->assign("regionIdValues",RegionPeer::getAll());
			require_once("CircuitPeer.php");		
			$smarty->assign("circuitIdValues",CircuitPeer::getAll());
			
			$smarty->assign("action","create");

		}

		if (isset($_GET['listRedirect'])) {
			$smarty->assign('listRedirect',$_GET['listRedirect']);
		}
		
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
