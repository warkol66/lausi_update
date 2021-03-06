<?php

class LausiThemesRotateAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiThemesRotateAction() {
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
		$section = "Themes";
		$smarty->assign("section",$section);
		
		$filters = $_GET['filters'];
		
		if (!empty($_GET['addressId'])) {
			$smarty->assign('addressId',$_GET['addressId']);
			$advertisements = AdvertisementPeer::getAllCurrentByAddress($_GET['addressId']);
			$smarty->assign('advertisements',$advertisements);
		}

		//opciones de filtrado de direccion
		$smarty->assign('circuits',CircuitPeer::getAll());		
		$smarty->assign('regions',RegionPeer::getAll());

		$addressPeer = new AddressPeer;
		
		$this->applyFilters($addressPeer, $filters, $smarty);

		//obtenemos las direcciones para el selector
		$smarty->assign('addresses',$addressPeer->getAllFiltered());
		return $mapping->findForwardConfig('success');
	}
}
