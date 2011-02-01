<?php

require_once('includes/assoc_array2xml.php');
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
class InstallFileCheckAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallFileCheckAction() {
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

		$path = "WEB-INF/classes/modules/" . $_GET['moduleName'] . "/";
		$phpConfigXMLContent = file_exists($path . "phpmvc-config-" . $_GET['moduleName'] . ".xml");
 		$modulePathsContent = file_exists($path . "modulepaths-" . $_GET['moduleName'] . ".php");
 		
 		//archivos generados durante la instalacion
 		
 		$information = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . 'information.sql');
 		$permissions = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . $_GET['moduleName'] . '-permissions.sql');
 		
 		$messages = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . 'messages.sql');
 		
		$smarty->assign('phpConfigXMLContent',$phpConfigXMLContent);
		$smarty->assign('modulePathsContent',$modulePathsContent);
		$smarty->assign('information',$information);
		$smarty->assign('permissions',$permissions);
		$smarty->assign('messages',$messages);
		$smarty->assign('moduleName',$_GET['moduleName']);
		return $mapping->findForwardConfig('success');
	}

}
?>
