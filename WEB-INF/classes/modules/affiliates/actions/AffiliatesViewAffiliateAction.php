<?php

require_once("BaseAction.php");
require_once("AffiliateInfoPeer.php");
require_once("AffiliatePeer.php");


class AffiliatesViewAffiliateAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function AffiliatesViewAffiliateAction() {
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

		$module = "Affiliates";
		$section = "";
		
		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		$affiliateInfoPeer= new AffiliateInfoPeer();
		$affiliatePeer= new AffiliatePeer();	

		$id=$_GET["id"];

		$affInfo=$affiliateInfoPeer->get($id);
		$affiliate=$affiliatePeer->get($id);
		
		// para que no tire error el tpl si affiliate info esta vacio o sea no tiene datos internos
		if(empty($affInfo)){
			$flag=1;
			$smarty->assign("flag",$flag);
		}
		
		$smarty->assign("affiliateInfo",$affInfo);

		$smarty->assign("affiliate",$affiliate);

		return $mapping->findForwardConfig('success');
	}

}
?>
