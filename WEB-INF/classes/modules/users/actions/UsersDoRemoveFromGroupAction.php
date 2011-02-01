<?php

require_once("BaseAction.php");
require_once("UserPeer.php");

class UsersDoRemoveFromGroupAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersDoRemoveFromGroupAction() {
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

    $userPeer = new UserPeer();

    if ( !empty($_GET["group"]) && !empty($_GET["user"]) ) {
			if ( $userPeer->removeUserFromGroup($_GET["user"],$_GET["group"]) ) {
				Common::doLog('success','userId: ' . $_POST["user"] . ' group: ' . $_POST["group"]);
				header("Location: Main.php?do=usersList&user=".$_GET["user"]);
				exit;
		 }
		}
		
		Common::doLog('failure','userId: ' . $_POST["user"] . ' group: ' . $_POST["group"]);
		header("Location: Main.php?do=usersList&user=".$_GET["user"]."&message=notRemovedFromGroup");
		exit;

	}

}
?>
