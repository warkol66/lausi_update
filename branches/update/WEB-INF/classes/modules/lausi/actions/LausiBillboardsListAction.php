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

		 
		if (isset($_GET["addressId"])) {
			$address = AddressPeer::get($_GET["addressId"]);
			$smarty->assign("address",$address);		
			$smarty->assign("billboards",$address->getBillboards());
		}
		else {

			$smarty->assign('themes',ThemePeer::getAllActive());
			$smarty->assign('regions',RegionPeer::getAll());
			$smarty->assign('circuits',CircuitPeer::getAll());

			if (!empty($_GET['filters'])) {
				//opciones para selector de filtro
	
				$billboardPeer = new BillboardPeer();

				$filters = $_GET['filters'];
				$smarty->assign("filters",$filters);
//				$this->applyFilters($billboardPeer,$filters,$smarty);
			
				//procesamos las opciones de filtrado que pueden llegar a haberse aplicado
				if (!empty($_GET['filters']['regionId']))
					$billboardPeer->setRegionId($_GET['filters']['regionId']);
	
				if (!empty($_GET['filters']['circuitId']))
					$billboardPeer->setCircuitId($_GET['filters']['circuitId']);
	
				if (!empty($_GET['filters']['themeId']))
					$billboardPeer->setThemeId($_GET['filters']['themeId']);
	
				if (!empty($_GET['filters']['type']))
					$billboardPeer->setType($_GET['filters']['type']);
	
				if (empty($_GET['filters']['groupByAddress']))
					$billboardPeer->setGroupByAddress();
				
				if (!empty($_GET['filters']['groupByType']))
					$billboardPeer->setGroupByType();
	
		 		if (!empty($_GET['filters']['rating']))
		 			$billboardPeer->setRating($_GET['filters']['rating']);
			
				$pager = $billboardPeer->getAllPaginatedFilter($_GET["page"]);
				$smarty->assign("billboards",$pager->getResult());
				$smarty->assign("pager",$pager);

				//$url = "Main.php?do=lausiBillboardsList&regionId=".$_GET['regionId']."&circuitId=".$_GET['circuitId']."&themeId=".$_GET['themeId']."&type=".$_GET['type']."&groupByAddress=".$_GET['groupByAddress']."&groupByType=".$_GET['groupByType'];
				$url = "Main.php?do=lausiBillboardsList";

				foreach ($filters as $key => $value)
					$url .= "&filters[$key]=$value";
				$smarty->assign("url",$url);

				$smarty->assign("url",$url);	
				$smarty->assign("all","1");
			}
		
		}
   
		$smarty->assign("message",$_GET["message"]);
		
		return $mapping->findForwardConfig('success');
	}

}
