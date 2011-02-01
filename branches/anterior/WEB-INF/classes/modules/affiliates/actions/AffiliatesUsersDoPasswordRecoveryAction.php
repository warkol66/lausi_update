<?php

require_once("BaseAction.php");
require_once("UserPeer.php");

class AffiliatesUsersDoPasswordRecoveryAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function AffiliatesUsersDoPasswordRecoveryAction() {
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
    
		$this->template->template = "TemplateMail.tpl";

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Affiliates";

		if ( !empty($_POST["username"]) && !empty($_POST["mailAddress"]) ) {
			$userAndPassword = AffiliateUserPeer::generatePassword($_POST["username"],$_POST["mailAddress"]);
			if ( !empty($userAndPassword) ) {
        $smarty->assign("user",$userAndPassword[0]);
        $smarty->assign("password",$userAndPassword[1]);
        $body = $smarty->fetch("AffiliatePasswordRecoveryMail.tpl");

				$userInfo = $userAndPassword[0]->getAffiliateUserInfo();
				require_once("libmail.inc.php");

				global $system;

				$m = new Mail();
				$m->From($system["config"]["system"]["parameters"]["fromEmail"]);
				$m->To($userInfo->getMailAddress());
				$m->Subject("Nueva Contraseña");
				$m->Body($body);
				$m->Send();

				return $mapping->findForwardConfig('success');
			}
		}
		
		$this->template->template = "TemplateLogin.tpl";		

    $smarty->assign("message","wrongUser");
		return $mapping->findForwardConfig('failure');
	}

}
?>
