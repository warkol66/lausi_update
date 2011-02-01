<?php
/**
* DocumentsDoEditAction
*
*  Action que genera un cambio de estado en la base de datos, le llegan datos de
*  un documento y los actualiza  en dicha base de datos.
* 
* @author documentacion: Marcos Meli
* @author Archivo: Marcos Meli
* @package mer_documents
*/


require_once 'BaseAction.php';
require_once("AffiliateInfoPeer.php");


/**
* DocumentsDoEditAction
*
*  Esta clase hereda la clase BaseAction
* 
*/

class AffiliatesDoEditInfoAction extends BaseAction {


	/**
	* DocumentsDoEditAction
	*
	*  Constructor por defecto
	*
	*/

	function AffiliatesDoEditInfoAction() {
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

		$affiliateInfoPeer = new AffiliateInfoPeer();

		
		
		////////////		
		// obtengo el documento seleccionado
		$id= $_POST["id"];
	

		/*print_r($_POST["flag"]);
		*/
		// 1 significaria que no tenia info interna
		if($_POST["flag"]==1){
	
			$affiliate=$affiliateInfoPeer->add($id,$_POST['holder'],$_POST['directionBoardContact'],$_POST['telephone'],$_POST['extraTelephone'],$_POST['email'],$_POST['reponsible']);
		}
		else{
		
			$affiliate=$affiliateInfoPeer->update($id,$_POST['holder'],$_POST['directionBoardContact'],$_POST['telephone'],$_POST['extraTelephone'],$_POST['email'],$_POST['responsible']);

		}

				
		return $mapping->findForwardConfig('success');




		

	}

}
?>
