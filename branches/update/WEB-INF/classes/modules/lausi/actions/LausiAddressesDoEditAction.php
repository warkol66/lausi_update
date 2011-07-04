<?php

class LausiAddressesDoEditAction extends BaseAction {

	function LausiAddressesDoEditAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Lausi";
		$smarty->assign("module",$module);
		$section = "Addresses";
		$smarty->assign("section",$section);
		
		$params = $_POST['address'];
		$filters = $_POST['filters'];

		if ($_POST["action"] == "edit") {
			//estoy editando un address existente
			$address = AddressPeer::get($_POST["id"]);
			$myRedirectConfig = "success-edit";
		}
		else {
			//estoy creando un nuevo address
			$address = new Address;
			$myRedirectConfig = "success-add";
		}
		
		Common::setObjectFromParams($address, $params);

		if (!$address->save()) {
			$smarty->assign("circuitIdValues",CircuitPeer::getAll());
			$smarty->assign("address",$address);	
			$smarty->assign("action","create");
			$smarty->assign("message","error");
			return $mapping->findForwardConfig('failure');
		}

		$id["id"] = $address->getId();
		$smarty->assign('address',$address);

		return $this->addParamsAndFiltersToForwards($id,$filters,$mapping,$myRedirectConfig);
	}
}
