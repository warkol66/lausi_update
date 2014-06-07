<?php

require_once("BaseAction.php");
require_once("AddressPeer.php");

class LausiAddressesDoDeleteAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiAddressesDoDeleteAction() {
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
		$section = "Addresses";
		$smarty->assign("section",$section);		

		$address = AddressQuery::create()->findOneById($_POST["id"]);
		if (!empty($address)) {
			$deletedAddress = new DeletedAddress();
			$deletedAddress->fromJSON($address->toJSON());
			$deletedAddress->setDeletionDate(time());
			try {
				$address->delete();
				if ($address->isDeleted()) {
					$deletedAddress->save();
				}
			}
			catch (PropelException $exp) {
				if (ConfigModule::get("global","showPropelExceptions"))
					print_r($exp->getMessage());
				return false;
			}
  	}
	   //caso de redireccionamiento desde opciones de busqueda de addressesList
		if (isset($_POST['listRedirect'])) {
			
			$queryData = "";
			
			//armamos la redireccion con los valores necesarios
			foreach ($_POST['listRedirect'] as $key => $value) {
				$queryData .= "&$key=$value";
			}
			
			$myRedirectConfig = $mapping->findForwardConfig('success');
			$myRedirectPath = $myRedirectConfig->getpath();
			$myRedirectPath .= $queryData;
			$fc = new ForwardConfig($myRedirectPath, True);
			return $fc;
			
		}

		return $mapping->findForwardConfig('success');
	}

}
