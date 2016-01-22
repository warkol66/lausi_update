<?php

require_once 'LausiBillboardsListAction.php';

class LausiBillboardsFastEditAction extends LausiBillboardsListAction {

	function execute($mapping, $form, &$request, &$response) {

		parent::execute($mapping, $form, $request, $response);

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$url = "Main.php?do=lausiBillboardsFastEdit";
		foreach ($_GET['filters'] as $key => $value) {
			$url .= "&filters[$key]=$value";
		}
		$smarty->assign("url",$url);

		return $mapping->findForwardConfig('success');
	}
}
