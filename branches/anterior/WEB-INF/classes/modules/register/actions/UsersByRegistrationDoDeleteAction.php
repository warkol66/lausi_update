<?php

require_once("BaseAction.php");
require_once("UserByRegistrationPeer.php");

class UsersByRegistrationDoDeleteAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByRegistrationDoDeleteAction() {
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

		$module = "UsersByRegistration";

    		$userByRegistrationPeer = new UserByRegistrationPeer();
		//verificamos que este fijado el id a borrar
		if (isset($_GET['id_registered_user'])) {
	    		
			if ( $userByRegistrationPeer->delete($_GET["id_registered_user"])) {
				return $mapping->findForwardConfig('success');
			}
		}		
		
		//o bien no se llamo se paso via get el id de usuario o no se pudo borrar.
		return $mapping->findForwardConfig('failure');

	}

}
?>
