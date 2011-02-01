<?php

/**
* DocumentsEditAction
*
* Action que permite ver los datos correspondientes de un documento que pueden modificarse
*
* @author documentacion: Marcos Meli
* @author Archivo: Marcos Meli
* @package mer_documents
*/

require_once 'BaseAction.php';
require_once("AffiliatePeer.php");
require_once("AffiliateInfoPeer.php");


/**
* DocumentsEditAction
*
*  Esta clase hereda la clase BaseAction
* 
*/

class AffiliatesEditAction extends BaseAction {


	/**
	* DocumentsEditAction
	*
	*  Constructor por defecto
	*
	*/

	function AffiliatesEditAction() {
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


		$affiliatePeer= new AffiliatePeer();

		$affiliateInfoPeer= new AffiliateInfoPeer();

		$msg=$request->getParameter("message");
		if(empty($msg)){
			$msg="noError";
		}
		$smarty->assign("message",$msg);


		$id=$request->getParameter("id");

		$affiliate=$affiliatePeer->get($id);


		$affInfo=$affiliateInfoPeer->get($id);
		$smarty->assign("affiliateInfo",$affInfo);
		// para que no tire error el tpl si affiliate info esta vacio o sea no tiene datos internos
		if(empty($affInfo)){
			$flag=1;
			$smarty->assign("flag",$flag);
		}
		
				
		$editInfo=$_GET['editInfo'];

		
		$smarty->assign("editInfo",$editInfo);
	
		$smarty->assign("affiliate",$affiliate);




		return $mapping->findForwardConfig('success');

	}

}
?>
