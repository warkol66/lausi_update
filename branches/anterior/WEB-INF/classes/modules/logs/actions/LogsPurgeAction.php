<?php
/**
* LogsPurgarAction
*
*  Borra desde una determinada fecha, hasta otra, datos de la base de datos
*  Los datos a borrar requieren confirmacion, una vez confirmado, borra
*  determinados datos y reconfigura la tabla
* @package mod_logs
* @author Modulos empresarios
* @author re-documentacion: Marcos Meli
*/


include_once 'BaseAction.php';
require_once("ActionLogPeer.php");


/**
* LogsPurgarAction
*
*  Esta clase hereda la clase BaseAction
*/

class LogsPurgeAction extends BaseAction {


	/**
	* LoginAdminAction
	*
	*  Constructor por defecto
	*
	*/

	function LogsPurgeAction() {
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
	* @param string $mapping una variable que muestra los sucesos
	* @param array $form con todo el contenido a ejecutar
	* @param pointer &$request puntero a un string de lo que se esta solicitando
	* @param pointer &$response puntero a un string de la respuesta que ha dado el servidor
	* @return ActionForward string $mapping con la cadena "sucess" o "failure"
	* @public
	*/
	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);
		global $PHP_SELF;
		//////////
		// Aqui el acceso al plugin de Smarty
		// Vea que existe una referencia "=&"

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}
		
		$smarty->left_delimiter  = "|-";
	    $smarty->right_delimiter = "-|";


		$logs = new ActionLogPeer();

			

			////////////////
			//funcione que en estos momentos no se usan
			//$registros=$logs->getHours($dateTo,$dateFrom);	
			//$years=$logs->getDistinctYears();
			////

		///////
		/// usado para mostrar 2 fechas a listar, que seran hace un mes, y hoy
		$smarty->assign("dateFrom",date('d-m-Y',mktime(0,0,0,date("m")-1,date("d"),date("Y"))));        
		$smarty->assign("dateTo",date('d-m-Y'));
		

		$smarty->assign("LOGIN",$_SESSION['usuario']);
		$smarty->assign("SESION", $_SESSION);

		return $mapping->findForwardConfig('success');

	}

}
?>
