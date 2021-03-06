<?php

require_once("BaseAction.php");

class ConfigCreateXmlForAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ConfigCreateXmlForAction() {
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

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Config";

		$smarty->assign("module",$module);

		/*
		* Hecho exclusivamente para mostrar todos los modulos existentes en la lista de filtros
		*
		*/
		$dir = "WEB-INF/classes/modules/";
		$dh  = opendir($dir);
		while (false !== ($module = readdir($dh))) {
			if ($module[0]!='.') {	
				$i++;
				$allModulesName[$i]=$module;
			}
		}
		
		$smarty->assign("modules",$allModulesName);


		$selectedModule=$_GET["module"];

		$smarty->assign("selectedModule",$selectedModule);

		if (!empty($selectedModule)) {
			$config = array();
			
			require_once('includes/assoc_array2xml.php');
			
			$converter= new assoc_array2xml;		

			//////////
			// esa direccion de directorio es especifica de un modulo
			$path = "WEB-INF/classes/modules/$selectedModule/$selectedModule.xml";
			
			$xml = file_get_contents($path);

			if(empty($xml)){
				$path="config/emptyXml.xml";
				$xml = file_get_contents($path);
				$flag=1;
			}

			$arrayXml = $converter->xml2array($xml);

			$smarty->assign("config",$arrayXml);
			
			
			if ($flag != 1){
				//////////
				// parte de carga de nombres de actions, $actions contiene todos los nombres de actions del modulo
				$actionPath = "WEB-INF/classes/modules/$selectedModule/actions/";
				$dh  = opendir($actionPath);

				while (false!== ($actionName = readdir($dh)) ){ 

					if (ereg("(.*)Action.php$",$actionName,$files))	{	
						
						$actions[$moduleFolder][] = $files[1];
						//los ordeno
						array_multisort($actions[$moduleFolder]);
				
					}
				}

				//////////
				// Guardo los nombres de los actions actualmente "instalados" en el xml
			foreach ($arrayXml["moduleInstalation"]["moduleInstalation:actions"] as $installedActionName => $savedActions){

				$savedActionNames[]=$installedActionName;

				}

				
				//////////
				// Seccion donde creo un array de nuevos actions con sus respectivos tags
				// hay un foreach de mas (el 2do) que se tendr�a que ver como hacer para sacarlo
				
						

				foreach($actions as $action){
					//foreach($action as $actionName){					

					$newActions=array_diff($savedActionNames,$action);
					$newActionsB=array_diff($action,$savedActionNames);

					//echo "a es :$a    ";
					print_r($newActions);
					print_r($newActionsB);
							//if ((strcasecmp ($savedActionName,$actionName)) == 0){
							//if(!in_array ( strtolower($actionName),strtolower($savedActionNames) )){

					foreach ($newActions as $eachAction){
								$pathXmlAction="config/emptyXmlAction.xml";
								$xmlAction = file_get_contents($pathXmlAction);

									//echo "action name es : $action y action saved es $savedActionName    ";					
								$arrayActionAux = $converter->xml2array($xmlAction);
								$arrayAction[$eachAction]=$arrayActionAux["editThisTag"];
							
					}

						
						//	echo "array action es :  \n";
						//	print_r($arrayAction);

						//	print_r($arrayNew);
					
				}

				//////////
				// hardcoreado
				
				$pair="hola";
				$smarty->assign("pair",$pair);

				$smarty->assign("actions",$actions);

				$smarty->assign("actionXmls",$arrayAction);
			} // if flag != 1
		
		} // if empty selectedModule


		$smarty->assign("flag",$flag);

		$smarty->assign("message",$_GET["message"]);		

		return $mapping->findForwardConfig('success');
	}

}
?>
