<?php

require_once("BaseAction.php");
require_once("UserByRegistrationPeer.php");

class UsersByRegistrationDoLoginAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByRegistrationDoLoginAction() {
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

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "UsersByRegistration";
		if ( !empty($_POST["username"]) && !empty($_POST["password"]) ) {
			$user = UserByRegistrationPeer::auth($_POST["username"],$_POST["password"]);
			if ( !empty($user) ) {
				$_SESSION["loginRegistrationUser"] = $user;
				$smarty->assign("loginRegisteredUser",$user);
				return $mapping->findForwardConfig('success');
			}
		}

		//caso si ya estaba registrado
		if (isset($_SESSION["loginRegistrationUser"])) {
			$user = $_SESSION["loginRegistrationUser"];
			$smarty->assign("loginRegisteredUser",$user);
			return $mapping->findForwardConfig('success');	

		}
		
		$this->template->template = "TemplateLogin.tpl";
    		$smarty->assign("message","wrongUser");
		return $mapping->findForwardConfig('failure');
	}

}
?>
