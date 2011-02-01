<?php

require_once("BaseAction.php");
require_once("AdvertisementPeer.php");

class LausiAdvertisementsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiAdvertisementsDoEditAction() {
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
		$section = "Advertisements";
		$smarty->assign("section",$section);		

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un advertisement existente
			if (!AdvertisementPeer::update($_POST["id"],$_POST["date"],$_POST["publishDate"],$_POST["duration"],$_POST["billboardId"],$_POST["themeId"]));
   				return $mapping->findForwardConfig('failure-overlapping');
			return $mapping->findForwardConfig('success');
		}
		else {
		  //estoy creando un nuevo advertisement

			if ( !AdvertisementPeer::create($_POST["date"],$_POST["publishDate"],$_POST["duration"],$_POST["billboardId"],$_POST["themeId"]) ) {
				$advertisement = new Advertisement();
				$advertisement->setid($_POST["id"]);
				$advertisement->setdate($_POST["date"]);
				$advertisement->setpublishDate($_POST["publishDate"]);
				$advertisement->setduration($_POST["duration"]);
				$advertisement->setbillboardId($_POST["billboardId"]);
				require_once("BillboardPeer.php");		
				$smarty->assign("billboardIdValues",BillboardPeer::getAll());
				$advertisement->setthemeId($_POST["themeId"]);
				require_once("ThemePeer.php");		
				$smarty->assign("themeIdValues",ThemePeer::getAllActive());
				$smarty->assign("advertisement",$advertisement);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
			}

			return $mapping->findForwardConfig('success');
		}

	}

}
