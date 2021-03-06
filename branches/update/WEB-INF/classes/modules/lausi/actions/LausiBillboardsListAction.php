<?php

class LausiBillboardsListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiBillboardsListAction() {
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
		$section = "Billboards";
		$smarty->assign("section",$section);	
		
		$filters = $_GET['filters'];
		$billboardPeer = new BillboardPeer();
		$this->applyFilters($billboardPeer,$filters,$smarty);
		 
		if (isset($filters["addressId"])) {
			$address = AddressPeer::get($filters["addressId"]);
			$smarty->assign("address",$address);		
			$smarty->assign("billboards",$address->getBillboards());
		} else {
			$smarty->assign('themes',ThemePeer::getAllActive());
			$smarty->assign('regions',RegionPeer::getAll());
			$smarty->assign('circuits',CircuitPeer::getAll());
			
			//opciones para selector de filtro
			$pager = Common::getAllPaginatedFiltered($billboardPeer, $_GET["page"]);
			$smarty->assign("billboards",$pager->getResults());
			$smarty->assign("pager",$pager);

			$url = "Main.php?do=lausiBillboardsList";
			foreach ($filters as $key => $value)
				$url .= "&filters[$key]=$value";
			$smarty->assign("url",$url);
			$smarty->assign("all","1");
		}
   
		$smarty->assign("message",$_GET["message"]);
		
		return $mapping->findForwardConfig('success');
	}
}
