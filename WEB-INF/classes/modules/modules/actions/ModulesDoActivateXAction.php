<?php

require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("ModuleDependencyPeer.php");
/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class ModulesDoActivateXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ModulesDoActivateXAction() {
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

			$this->template->template = "template_ajax.tpl";
		
		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		//asigno modulo y seccion
		$module = "Modules";


		$smarty->assign("module",$module);

		$modulePeer = new ModulePeer();
		$moduleDependencyPeer = new ModuleDependencyPeer();
		
		$moduleName=$_POST["module"];
		$smarty->assign("moduleName",$moduleName);
		if(!$activeModule=$_POST["activeModule"]) $activeModule=0;


		
		$savedModules= $modulePeer->getAll();
		
		//if (isset($_POST["activar"]) ){
					//////////
					// si el modulo no posee dependencias, se actualiza directamente			
				$dependencies=$moduleDependencyPeer->get($moduleName);

			if( empty($dependencies) )
				$assignedModules= $modulePeer->setActive($moduleName,$activeModule);
			
			else {
				$i=0;
				foreach ($dependencies as $dependency) {
					$dependencyName=$dependency->getDependence();
					//echo "dep: $dependencyName";
					$status=$modulePeer->dependencyStatus($dependencyName);
					//echo "status: $status";
					if ($activeModule == 1){
						if ($status == 0 ){
							$dependenciesNames[$i]=$dependencyName;
							$i++;
							$flag=1;
						}
					}
					else {
						if ($status == 1 ){
							
							$dependenciesNames[$i]=$dependencyName;
							$i++;
							$flag=2;
						}
					}			
				}// foreach
				if($flag==1){
						$smarty->assign("flag",$flag);
						$smarty->assign("dependenciesName",$dependenciesNames);
					//	doLogV2('errorDependencyOn');
						return $mapping->findForwardConfig('errorDependencyOn');
				}
				if ($flag==2){
						$smarty->assign("dependenciesName",$dependenciesNames);
					//	doLogV2('errorDependencyOff');
						return $mapping->findForwardConfig('errorDependencyOff');		
				}
				$assignedModules= $modulePeer->setActive($moduleName,$activeModule);
			} //else dependencies
	//	} //isset

		//doLogV2('success');
		//////////
		// Forward control to the specified success URI
		return $mapping->findForwardConfig('success');



	}

}
?>
