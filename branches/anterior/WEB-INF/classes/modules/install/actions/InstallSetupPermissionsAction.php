<?php


require_once("BaseAction.php");
require_once("ModulePeer.php");


/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class InstallSetupPermissionsAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallSetupPermissionsAction() {
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
		global $PHP_SELF;
		//////////
		// Call our business logic from here

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		//asigno modulo
		$modulo = "Install";
		$smarty->assign("modulo",$modulo);
 
		$modulePeer = new ModulePeer();

		if (!isset($_GET['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}
		
		if (isset($_GET['mode']) && $_GET['mode'] == 'reinstall') {
			
			//obtenemos los permisos ya creados anteriormente.
			require_once('SecurityActionPeer.php');
			require_once('SecurityModulePeer.php');
			
			$securityActionPeer = new SecurityActionPeer();
			$securityModulePeer = new SecurityModulePeer();
			
			$securityModule = $securityModulePeer->getAccess($_GET['moduleName']);
			
			$smarty->assign('securityActionPeer',$securityActionPeer);
			$smarty->assign('securityModule',$securityModule);
			
			$smarty->assign('mode',$_GET['mode']);
			
		}
		
		//buscamos todos los modulos sin instalar.

		$modulePath = "WEB-INF/classes/modules/" . $_GET['moduleName'] . "/actions/";
		$directoryHandler = opendir($modulePath);
		$actions = array();
		
		while (false !== ($filename = readdir($directoryHandler))) {
			
			//verifico si es un archivo php
			if (is_file($modulePath . $filename) && (ereg('(.*)Action.php$',$filename,$regs))) {
				array_push($actions,$regs[1]);		
			}
			
		
		}
		closedir($directoryHandler);
		
		//separacion entre accions con par y acciones sin par
		
		foreach ($actions as $action) {

			//separamos los pares de aquellos que no tienen pares
			if (ereg("(.*)([a-z]Do[A-Z])(.*)",$action,$parts)) {
				//armamos el nombre de la posible action sin do				
				$actionWithoutDo = $parts[1].$parts[2][0].$parts[2][3].$parts[3];
			
				if (in_array($actionWithoutDo,$actions)) {			

					$pairActions[$actionWithoutDo] = $action;
				}
		
			}
		}
		
		if (!empty($withPair)) {

			$withPair = array_keys($pairActions);
			$arrays = array_diff($actions,$withPair);

			$actionsToDelete = array_merge(array_keys($pairActions), array_values($pairActions));
			$withoutPair = array_diff($actions,$actionsToDelete);
			
		}
		else {
			$withoutPair = $actions;
			$withPair = array();
		}	
		
		$smarty->assign('withoutPair',$withoutPair);
		$smarty->assign('withPair',$withPair);
		$smarty->assign('pairActions',$pairActions);
		$smarty->assign('moduleName',$_GET['moduleName']);
		
		return $mapping->findForwardConfig('success');
	}

}
?>
