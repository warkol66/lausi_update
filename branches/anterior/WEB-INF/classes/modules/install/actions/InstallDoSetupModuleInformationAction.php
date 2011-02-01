<?php

require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("ModuleDependency.php");


/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class InstallDoSetupModuleInformationAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallDoSetupModuleInformationAction() {
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
		
		//guardado de informacion de descripcion del modulo

		$fd = fopen($modulePath . 'information.sql','w');

		if ($fd == false)
			return $mapping->findForwardConfig('failure');
			
		$moduleLabelPeer = new ModuleLabelPeer();
		$moduleLabel = new ModuleLabel();
		$moduleLabel->setName($_POST['moduleName']);
		
		fprintf($fd,"%s\n",$moduleLabel->getSQLCleanup());		
		
		$moduleLabel->setLabel($_POST['labelsEnglish']);
		$moduleLabel->setDescription($_POST['descriptionEnglish']);
		$sqlEng = $moduleLabel->getSQLInsertEnglish();

		$moduleLabel->setLabel($_POST['labelsSpanish']);
		$moduleLabel->setDescription($_POST['descriptionSpanish']);
		$sqlSpa = $moduleLabel->getSQLInsertSpanish();

		fprintf($fd,"%s\n",$sqlSpa);
		fprintf($fd,"%s\n",$sqlEng);
		
		
		//generacion de sql de las dependencias
		$moduleDependency = new ModuleDependency();
		$moduleDependency->setModuleName($_POST['moduleName']);
		fprintf($fd,"%s\n",$moduleDependency->getSQLCleanup());		
		
		if (isset($_POST['dependencies'])) {

			if ($fd == false)
				return $mapping->findForwardConfig('failure');			

			foreach($_POST['dependencies'] as $dependencyName) {

				$moduleDependency = new ModuleDependency();
				$moduleDependency->setModuleName($_POST['moduleName']);
				$moduleDependency->setDependence($dependencyName);
				$sql = $moduleDependency->getSQLInsert();
				fprintf($fd,"%s\n",$sql);								
			}
		
			
		}
		
		$moduleObj = new Module();
		$moduleObj->setName($_POST['moduleName']);
		$moduleObj->setAlwaysActive($_POST['alwaysActive']);
		
		fprintf($fd,"%s\n",$moduleObj->getSQLCleanup());
		$sqlAlwaysActive = $moduleObj->getSQLInsert(); 
		fprintf($fd,"%s\n",$sqlAlwaysActive);
		
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
