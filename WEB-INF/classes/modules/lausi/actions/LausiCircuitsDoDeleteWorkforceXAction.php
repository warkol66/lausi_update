<?php

require_once("BaseAction.php");
require_once("WorkforceCircuitPeer.php");
require_once("WorkforcePeer.php");

class LausiCircuitsDoDeleteWorkforceXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiCircuitsDoDeleteWorkforceXAction() {
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
		
		//por ser una action ajax.		
		$this->template->template = "template_ajax.tpl";

		$module = "Lausi";
		$smarty->assign("module",$module);
		$section = "Circuits";
		$smarty->assign("section",$section);		

    	if (empty($_POST["circuitId"]) && empty($_POST["workforceId"])) {
			return $mapping->findForwardConfig('failure');
		}
		
		//creamos la relacion
		if (!WorkforceCircuitPeer::delete($_POST["circuitId"],$_POST["workforceId"]))
			return $mapping->findForwardConfig('failure');
			
		//pasamos el workforce para eliminarlo
		$smarty->assign('workforce',WorkforcePeer::get($_POST["workforceId"]));			

		return $mapping->findForwardConfig('success');
	}

}
