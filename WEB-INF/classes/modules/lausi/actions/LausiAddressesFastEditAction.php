<?php

require_once 'LausiAddressesListAction.php';

class LausiAddressesFastEditAction extends LausiAddressesListAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$url = "Main.php?do=lausiAddressesFastEdit";
		foreach ($_GET['filters'] as $key => $value) {
			$url .= "&filters[$key]=$value";
		}
		$smarty->assign("url",$url);

		return $mapping->findForwardConfig('success');
	}
}
