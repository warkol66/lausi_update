<?php

require_once("BaseAction.php");
require_once("UserByRegistrationPeer.php");
require_once("UserByRegistration.php");

class UsersByRegistrationEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByRegistrationEditAction() {
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

		//verifico si un User de Administracion quiere hacer una modificacion sobre un usuario por registracion
		//TODO posible agregado de verificacion de permisos de los usuarios.
		if (isset($_GET['id_registered_user']) && isset($_SESSION["loginUser"])) {
	
			$userByRegistrationPeer = new UserByRegistrationPeer();
			$result = $userByRegistrationPeer->get($_GET['id_registered_user']);
			//devolvemos los datos del usuario creado.
			$smarty->assign("userByRegistration",$result);
			$smarty->assign("action","update_admin");
			return $mapping->findForwardConfig('success');
		
		}

		//verifico si el usuario registrado quiere efectuar cambios sobre los datos de su cuenta.
		if (isset($_SESSION['loginRegistrationUser'])) {
			$userByRegistrationPeer = new UserByRegistrationPeer();
			$user = $_SESSION['loginRegistrationUser'];
			$smarty->assign("userByRegistration",$user);
			$smarty->assign("action","update_user");
			return $mapping->findForwardConfig('success');
		}
		
		//sera entonces un usuario nuevo.
		$smarty->assign("action","new");
		return $mapping->findForwardConfig('success');
	}

}
?>
