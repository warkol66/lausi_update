<?php


require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("ActionLogLabel.php");


/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class InstallDoSetupMessagesAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallDoSetupMessagesAction() {
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

		if (!isset($_POST['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}		

		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/';
				
		$fd = fopen($modulePath  . 'messages.sql','w');
		if (!$fd) {
			$myRedirectConfig = $mapping->findForwardConfig('failure');
		}
		
		$messages = $_POST['message'];
		
		foreach (array_keys($messages) as $action) {
			
			foreach(array_keys($messages[$action]) as $forward) {
			
				foreach(array_keys($messages[$action][$forward]) as $lang) {
			
					//creamos un action log label
					$actionLogLabel = new ActionLogLabel();
					$actionLogLabel->setAction($action);
					$actionLogLabel->setForward($forward);
					$actionLogLabel->setLanguage($lang);
					$actionLogLabel->setLabel($messages[$action][$forward][$lang]);
					//obtenemos el insert asociado a la instancia
					$sql = $actionLogLabel->getSQLInsert();
					fprintf($fd,"%s\n",$sql);
				}			
			}
		
		}

		fclose($fd);
	
		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		if (isset($_POST['mode']))
			$queryData .= '&mode=' . $_POST['mode'];		
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}
?>
