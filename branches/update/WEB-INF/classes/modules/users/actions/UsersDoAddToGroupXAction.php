<?php
/**
 * UsersDoAddToGroupXAction
 *
 * @package users
 * @subpackage groups
 */

class UsersDoAddToGroupXAction extends BaseAction {

	function UsersDoAddToGroupXAction() {
		;
	}

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

		$module = "Users";

		$userPeer = new UserPeer();

		$currentUser = UserPeer::get($_POST["userId"]);
		$group = UserGroupPeer::get($_POST["groupId"]);
		$smarty->assign('currentUser',$currentUser);
		$smarty->assign('group',$group);


		if ( !empty($_POST["groupId"]) && !empty($_POST["userId"]) )
			if ( $userPeer->addUserToGroup($_POST["userId"],$_POST["groupId"]) )
				return $mapping->findForwardConfig('success');


		$smarty->assign('errorTagId','groupMsgField');
		return $mapping->findForwardConfig('failure');

	}

}
