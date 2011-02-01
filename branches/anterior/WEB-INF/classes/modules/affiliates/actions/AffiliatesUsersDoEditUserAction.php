<?php
require_once 'BaseAction.php';
require_once("AffiliateUserPeer.php");
require_once("LevelPeer.php");

class AffiliatesUsersDoEditUserAction extends BaseAction {

	function AffiliateDoEditUserAction() {
		;
	}


	/**
	* execute
	*
	* Procesa la solicitud HTTP solicitada, y crea su respectiva respuesta HTTP o
	* bien lo manda hacia otra web en donde aqui la crea. Devuelve un 
	* "ActionForward" describiendo donde y como se debe mandar la solicitud o
	* NULL si la respuesta ha sido completada. 
	* 
	* 
	* //@param ActionConfig		El ActionConfig (mapping) usado para seleccionar los sucesos
	* //@param ActionForm			El opcional ActionForm con los contenidos de las peticiones
	* //@param HttpRequestBase	El HTTP request de lo que se esta  procesando
	* //@param HttpRequestBase	La respuesta HTTP de lo que estan creando
	* //@public
	* 
	* 
	* @param string $mapping una variable que muestra los sucesos
	* @param array $form con todo el contenido a ejecutar
	* @param pointer &$request puntero a un string de lo que se esta solicitando
	* @param pointer &$response puntero a un string de la respuesta que ha dado el servidor
	* @return ActionForward string $mapping con la cadena "sucess" o "failure"
	*
	*/
	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);


		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Affiliates";
		$smarty->assign("module",$module);

    	$userPeer = new AffiliateUserPeer();
    
		if ( !empty($_SESSION["loginUser"]) )
			$affiliateId = $_POST["affiliateId"];
		else
			$affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();

		if ( $_POST["accion"] == "edicion" ) {
			//estoy editando un usuario existente

			if ( $_POST["pass"] == $_POST["pass2"] ) {
				
				$userPeer->update($_POST["id"],$affiliateId,$_POST["username"],$_POST["pass"],$_POST["levelId"],$_POST["name"],$_POST["surname"],$_POST["mailAddress"],$_POST['timezone']);
 	    	return $mapping->findForwardConfig('success');
			}
			else {
				header("Location: Main.php?do=usersByAffiliateList&user=".$_POST["id"]."&message=wrongPassword");
				exit;
			}

		}
		else {
		  //estoy creando un nuevo usuario
		  
			if ( !empty($_POST["pass"]) && $_POST["pass"] == $_POST["pass2"] ) {

				$userPeer->create($affiliateId,$_POST["username"],$_POST["pass"],$_POST["levelId"],$_POST["name"],$_POST["surname"],$_POST["mailAddress"],$_POST['timezone']);
				return $mapping->findForwardConfig('success');
			}
			else {
				header("Location: Main.php?do=usersList&user=&message=wrongPassword");
				exit;
			}
		}

	}

}
?>
