<?php

require_once("BaseAction.php");

class UsersDoLogoutAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersDoLogoutAction() {
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

		if (isset($_SESSION["login_user"])) {
			$user = $_SESSION["login_user"];
			$username = $user->getUsername();
		}

		if (isset($_SESSION["loginUser"])) {
			$user = $_SESSION["loginUser"];	
			$username = $user->getUsername();
		}
		

		unset($_SESSION["login_user"]);

		if($_SESSION["loginUser"]){
			unset($_SESSION["loginUser"]);
		}
		
		Common::doLog('success','username: ' . $username);
		return $mapping->findForwardConfig('success');

	}

}
?>
