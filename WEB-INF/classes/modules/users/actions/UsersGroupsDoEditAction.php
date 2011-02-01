<?php

require_once("BaseAction.php");
require_once("GroupPeer.php");

class UsersGroupsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersGroupsDoEditAction() {
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

		$module = "Users";
		$section = "Groups";

    $groupPeer = new GroupPeer();

		if ( !empty($_POST["id"]) ) {
			//estoy editando un grupo de usuarios existente

			if ( $groupPeer->update($_POST["id"],$_POST["name"]) ) {
				Common::doLog('success','userGroupId: ' . $_POST["id"] . ' newName: '. $_POST["name"] . 'action: edit');
  	   			return $mapping->findForwardConfig('success');
  	   		}
			else {
				header("Location: Main.php?do=usersGroupsList&group=".$_POST["id"]."&message=errorUpdate");
				exit;
			}
		}
		else {
		  //estoy creando un nuevo grupo de usuarios

			if ( !empty($_POST["name"]) ) {

				$groupPeer->create($_POST["name"]);
				Common::doLog('success','Name: '. $_POST["name"] . 'action: create');
				return $mapping->findForwardConfig('success');
			}
			else {
				Common::doLog('blankName','');
				return $mapping->findForwardConfig('blankName');
			}
		}
	}

}
?>
