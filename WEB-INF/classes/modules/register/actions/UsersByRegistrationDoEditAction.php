<?php

require_once("BaseAction.php");
require_once("UserByRegistrationPeer.php");
require_once("UserByRegistration.php");

class UsersByRegistrationDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByRegistrationDoEditAction() {
		;
	}

	/**
	  Valida que los campos de un UserByRegistration sean correctos
	*/
	private function validateFields($fields) {

		$result = false;
		
		if (isset($fields['username']) && isset($fields['password']) && isset($fields['check_password']) && isset($fields['surname']) &&
		     isset($fields['name']) && isset($fields['email']))
			$result = true;

		if ($fields['username'] == "" || $fields['password'] == "" || $fields['check_password'] == "" || $fields['surname'] == "" ||
		     $fields['name'] == "" && $fields['email'] == "")
			$result = false;
		
		return $result;
	}

	private function validateFieldsEdit($fields) {

		$result = false;
		
		if (isset($fields['username']) && isset($fields['surname']) &&
		     isset($fields['name']) && isset($fields['email']))
			$result = true;

		if ($fields['username'] == "" || $fields['surname'] == "" || $fields['name'] == "" && $fields['email'] == "")
			$result = false;
		
		return $result;
	}

	
	/**
	 * Creacion de un usuario nuevo
	 */
	private function createUser($smarty) {
		$userByRegistrationPeer = new UserByRegistrationPeer();
		$userByRegistrationPeer->create($_POST["username"],$_POST["name"],$_POST["surname"],$_POST["password"],$_POST["email"]); 
		$smarty->assign("message","created");
	}

	/**
	 * Actualizacion de un usuario nuevo
	 */
	private function updateUser($smarty) {
		$userByRegistrationPeer = new UserByRegistrationPeer();
		if (isset($_SESSION["login_user"]))
			$userId = $_POST['user_id'];
		else {
			$user = $_SESSION['loginRegistrationUser'];
			$userId = $user->getId();
		}
		$userByRegistrationPeer->update($userId,$_POST["username"],$_POST["name"],$_POST["surname"],$_POST["password"],$_POST["email"]); 
		$smarty->assign("message","saved");
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
	* TODO agregado de Caso de edicion.
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

		$smarty->assign("values",$_POST);
		$smarty->assign("action",$_POST['action']);
		if (isset($_POST['action'])) {
				
				//validaciones
				//campos no nulos
				if ($_POST['action'] == "new") 
					$resValidation = $this->validateFields($_POST);
				else
					$resValidation = $this->validateFieldsEdit($_POST);
					
				if (!$resValidation) {
					//error de validacion de campos
					$smarty->assign("message","error_fields");
					return $mapping->findForwardConfig('failure');
				}
				
				//passwords iguales
				if ( $_POST["password"] != $_POST["check_password"] ) {
					//error de validacion de password
					$smarty->assign("message","error_passwd");
					return $mapping->findForwardConfig('failure');

				}

				if ($_POST['action'] == "new")
						$userVal = UserByRegistrationPeer::usernameIsUsed($_POST['username']);
				else {
						
						$user = UserByRegistrationPeer::get($_POST['user_id']);
						$userVal = !($user->canChangeToUsername($_POST['username']));
						
				}
				
				if ($userVal) {
					//error de validacion de password
					$smarty->assign("message","error_username_used");
					return $mapping->findForwardConfig('failure');
				}

				//se puede realizar la accion
				
				//es una creacion de un nuevo usuario registrado
				if ($_POST['action'] == "new") {
					$this->createUser($smarty);
					if (isset($_SESSION["login_user"])) 
						//era un usuario administrativo
						return $mapping->findForwardConfig('success_admin');
					//era un usuario registrado.
					return $mapping->findForwardConfig('success');

				}
				if ($_POST['action'] == "update_admin" || $_POST['action'] = "update_user") {
					$this->updateUser($smarty);
					if (isset($_SESSION['loginUser'])) 
						return $mapping->findForwardConfig('success_admin');
					//era un usuario registrado.
					return $mapping->findForwardConfig('success_user');						
					
									
				}
				
				

		}
		
		$smarty->assign("message","error_fields");
		return $mapping->findForwardConfig('failure');

		
		
	
	}



}
?>
