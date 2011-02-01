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
class InstallSetupMessagesAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallSetupMessagesAction() {
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

		$xmlBase = file_get_contents($path . 'phpmvc-config'. '-' . $_GET['moduleName'] . ".xml");
		$xml = "<root>" . $xmlBase . "</root>";

		if(!($doc = DomDocument::loadXML($xml))) {
			return $mapping->findForwardConfig('failure');			
		}
		
		$actionsMappings = $doc->getElementsByTagName('action-mappings');
		
		foreach ($actionsMappings as $actionMappings) {
		
			$actions = $actionMappings->getElementsByTagName('action');
			
			foreach ($actions as $action) {

				$actionName = $action->getAttribute('path');
				$forwards = $action->getElementsByTagName('forward');
				$messages[$actionName] = array();
				foreach ($forwards as $forward) {
					$forwardName = $forward->getAttribute('name');
					array_push($messages[$actionName],$forwardName);
				}

			}
		
		}
		
		if (isset($_GET['mode']) && $_GET['mode'] == 'reinstall') {
			
			//obtenemos los mensajes creados anteriormente
			$smarty->assign('mode',$_GET['mode']);
			
			require_once('ActionLogLabelPeer.php');
			
			$actualMessages = array();
			
			foreach ($messages as $action => $forwards) {
				
				foreach ($forwards as $forward) {
					$english = ActionLogLabelPeer::getAllByInfo($action,$forward,'eng');
					$spanish = ActionLogLabelPeer::getAllByInfo($action,$forward,'esp');
					$actualMessages[$action][$forward]['eng'] = $english->getLabel();
					$actualMessages[$action][$forward]['esp'] = $spanish->getLabel();
				}
			}
			$smarty->assign('actualMessages',$actualMessages);
		}		

		$smarty->assign('actions',array_keys($messages));
		$smarty->assign('messages',$messages);
		$smarty->assign('moduleName',$_GET['moduleName']);		
		return $mapping->findForwardConfig('success');
	}

}
?>
