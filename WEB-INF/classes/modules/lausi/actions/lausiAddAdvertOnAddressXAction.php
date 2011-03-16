<?php

require_once("BaseAction.php");
require_once("AdvertisementPeer.php");

class lausiAddAdvertOnAddressXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function lausiAddAdvertOnAddressXAction() {
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
		
		//por ser una action ajax.		
		$this->template->template = "template_ajax.tpl";
		
		if (empty($_POST['addressId']) || empty($_POST['quantity']) || empty($_POST['themeId']) || empty($_POST['duration']) || empty($_POST['publishDate']))
				return $mapping->findForwardConfig('failure');
				
		$criteria = new Criteria();
		
		$theme = ThemePeer::get($_POST['themeId']);
		
		$quantity = $_POST['quantity'];
		if ($theme->getType() == ThemePeer::TYPE_DOBLE)
			$quantity = ceil($quantity/2);
		
		$result = BillboardPeer::getAllAvailableByAddress($_POST['addressId'],$_POST['publishDate'],$_POST['duration'],$quantity,$theme->getType());

		$billboards = $result[$_POST['addressId']]['elements'];
		
		$total = $_POST['quantity'];
		$count = 0;
			
		foreach ($billboards as  $billboard) {
			if (!AdvertisementPeer::create($_POST['publishDate'],$_POST['publishDate'],$_POST['duration'],$billboard->getId(),$_POST['themeId'])) {
			$count++;
			}
		}

		if ($theme->getType() == ThemePeer::TYPE_DOBLE)
			$count = $count * 2;
			
		$smarty->assign('total',$total);
		$smarty->assign('count',$count);

		return $mapping->findForwardConfig('success');
	}

}
