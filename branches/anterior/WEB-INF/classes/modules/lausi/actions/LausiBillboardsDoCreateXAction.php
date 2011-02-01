<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");
require_once("BillboardPeer.php");

class LausiBillboardsDoCreateXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiBillboardsDoCreateXAction() {
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

		$address = AddressPeer::get($_POST["addressId"]);
		$smarty->assign("address",$address);
		$number = $address->getNextBillboardNumber();

		$row = 0;
		$quantity = 0;
		
		if ( empty($_POST["row"]) && empty($_POST["column"]) ) {
			$_POST["row"] = 1;
			$_POST["column"] = $_POST["quantity"];
		}
		
		while ( ($row < $_POST["row"]) && ($quantity < $_POST["quantity"]) ) {
			$row++;
			$column = 0;
			while ( ($column < $_POST["column"]) && ($quantity < $_POST["quantity"]) ) {
				$column++;
				BillboardPeer::create($number,$_POST["type"],$_POST["height"],$row,$column,$_POST["addressId"]);	
				$quantity++;
				$number++;
			}			
		} 			
		//por ser una action ajax.		
		$this->template->template = "template_ajax.tpl";					

		return $mapping->findForwardConfig('success');

	}

}
