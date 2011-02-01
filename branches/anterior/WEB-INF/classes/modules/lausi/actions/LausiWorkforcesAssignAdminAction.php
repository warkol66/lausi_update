<?php

require_once("BaseAction.php");
require_once("WorkforcePeer.php");
require_once("AdvertisementPeer.php");
require_once("CircuitPeer.php");
require_once("ThemePeer.php");

class LausiWorkforcesAssignAdminAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiWorkforcesAssignAdminAction() {
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
		$section = "Workforces";
		$smarty->assign("section",$section);				
 
		$workforces = WorkforcePeer::getAll();
		$circuits = CircuitPeer::getAll();
		$themes = ThemePeer::getAllActive(ThemePeer::TYPE_SEXTUPLE);
		$smarty->assign("workforces",$workforces);
		$smarty->assign("circuits",$circuits);
		$smarty->assign("themes",$themes);

		if (!empty($_GET['workforceId'])) {
		
			$assignedWorkforce = WorkforcePeer::get($_GET['workforceId']);
			$advertisementPeer = new AdvertisementPeer();
			
			$advertisementPeer->setWorkforceId($_GET['workforceId']);
			
			if (!empty($_GET['circuitId'])) {
				$advertisementPeer->setCircuitId($_GET['circuitId']);
				$circuit = CircuitPeer::get($_GET['circuitId']);
				$smarty->assign('assignedCircuit',$circuit);
			}
			
			if (!empty($_GET['fromDate'])) {
				$advertisementPeer->setExactDate(Common::convertToMysqlDateFormat($_GET['fromDate']));
				$smarty->assign('fromDate',$_GET['fromDate']);
			}
			
			if (!empty($_GET['themeId'])) {
	 			$advertisementPeer->setThemeId($_GET['themeId']);
	 			$smarty->assign('themeId',$_GET['themeId']);
	 		}
			
			$assignedAdvertisements = $advertisementPeer->getAllFiltered();
			
			$advertisementPeer->setWithoutWorkforce();
			
			$notAssignedAdvertisements = $advertisementPeer->getAllFiltered();
			
			$smarty->assign('assignedWorkforce',$assignedWorkforce);
			$smarty->assign('notAssignedAdvertisements',$notAssignedAdvertisements);
			$smarty->assign('assignedAdvertisements',$assignedAdvertisements);
			
		}
		   
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}