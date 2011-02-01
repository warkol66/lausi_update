<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");
require_once("BillboardPeer.php");
require_once("ThemePeer.php");
require_once("CircuitPeer.php");
require_once("RegionPeer.php");

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

			//opciones para selector de filtro
			$smarty->assign('themes',ThemePeer::getAllActive());
			$smarty->assign('regions',RegionPeer::getAll());
			$smarty->assign('circuits',CircuitPeer::getAll());
			
			$billboardPeer = new BillboardPeer();
		
			//procesamos las opciones de filtrado que pueden llegar a haberse aplicado
			if (!empty($_GET['regionId'])) {
				$billboardPeer->setRegionId($_GET['regionId']);
				$smarty->assign('regionId',$_GET['regionId']);
			}

			if (!empty($_GET['circuitId'])) {
				$billboardPeer->setCircuitId($_GET['circuitId']);
				$smarty->assign('circuitId',$_GET['circuitId']);
			}

			if (!empty($_GET['themeId'])) {
				$billboardPeer->setThemeId($_GET['themeId']);
				$smarty->assign('themeId',$_GET['themeId']); 			
			}

			if (!empty($_GET['type'])) {
				$billboardPeer->setType($_GET['type']);
				$smarty->assign('type',$_GET['type']); 			
			}

			if (empty($_GET['groupByAddress'])) {
				$billboardPeer->setGroupByAddress();
				$smarty->assign('groupByAddress',true);			
			}
			
			if (!empty($_GET['groupByType'])) {
				$billboardPeer->setGroupByType();
				$smarty->assign('groupByType',true); 			
			}

	 		if (!empty($_GET['rating'])) {
	 			$billboardPeer->setRating($_GET['rating']);
	 			$smarty->assign('rating',$_GET['rating']); 			
	 		}
		
			$pager = $billboardPeer->getAllPaginatedFilter($_GET["page"]);
			$smarty->assign("billboards",$pager->getResult());
			$smarty->assign("pager",$pager);
			$url = "Main.php?do=lausiBillboardsList&regionId=".$_GET['regionId']."&circuitId=".$_GET['circuitId']."&themeId=".$_GET['themeId']."&type=".$_GET['type']."&groupByAddress=".$_GET['groupByAddress']."&groupByType=".$_GET['groupByType'];
			$smarty->assign("url",$url);	
			$smarty->assign("all","1");		
		}
   
		$smarty->assign("message",$_GET["message"]);
		
		if (isset($_GET['listRedirect'])) {
			$smarty->assign('listRedirect',$_GET['listRedirect']);
		}
		
		return $mapping->findForwardConfig('success');
	}

}
