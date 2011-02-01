<?php


require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("SecurityModule.php");


/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class InstallDoSetupPermissionsAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallDoSetupPermissionsAction() {
		
	}

	function generateSQLInsertSecurityModule($module,$access,$accessAffiliateUser) {
	
		$query = "INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` ) VALUES ('$module', '$access', '$accessAffiliateUser');";
	
		return $query;
	
	}


	
	/**
	 * Escribe los permisos a la salida 
	 * @param $module modulo al que pertenecen las actions 
	 * @param $permission array de permisos de usuario para las acciones recibido por post
	 * @param $permission array de permisos de afiliado para las acciones recibido por post
	 * @param $fd file descriptor del archivo donde se deberan guardar los permisos
	 *
	 */
	function writeActionsPermissionsToOutput($module,$permission,$permissionAffiliate,$fd) {
	
		foreach (array_keys($permission) as $action) {
		
			if (isset($permission[$action]['all'])) {
				//para ese action todos los permisos
				$bitLevel = 1073741823;	
			}
			else {
				$bitLevel = 0; 
				
				foreach ($permission[$action]['access'] as $access) {
					$bitLevel += $access;
				
				}	
			
			}
			
			if (isset($permissionAffiliate[$action]['all'])) {
				//para ese action todos los permisos
				$bitLevelAffiliate = 1073741823;	
			}
			else {
				$bitLevelAffiliate = 0; 
				
				foreach ($permissionAffiliate[$action]['access'] as $access) {
					$bitLevelAffiliate += $access;
				
				}	
			
			}

			//vemos si la accion tiene definido un pair
			$pair = "";
			if (!empty($permission[$action]['pair']))
				$pair = $permission[$action]['pair'];
			
			//TODO FALTA SECCION
			$section = '';
			
			$securityAction = new SecurityAction();
			$securityAction->setAction($action);
			$securityAction->setModule($module);
			$securityAction->setSection($section);
			$securityAction->setAccess($bitLevel);
			$securityAction->setAccessAffiliateUser($bitLevelAffiliate);
			$securityAction->setActive(1);
			$securityAction->setPair($pair);
			
			$sql = $securityAction->getSQLInsert();
			
			fprintf($fd,"%s\n",$sql);

		}
	
	
	}
	
	/**
	 * Escribe los permisos a la salida 
	 * @param $module modulo al que pertenecen las actions 
	 * @param $permission array de permisos de usuario para las acciones recibido por post
	 * @param $permission array de permisos de afiliado para las acciones recibido por post
	 * @param $fd file descriptor del archivo donde se deberan guardar los permisos
	 *
	 */
	function writeGeneralPermissionsToOutput($module,$permission,$permissionAffiliate,$fd) {
	

		if (isset($permission['all'])) {
			//para ese action todos los permisos
			$bitLevel = 1073741823;	
		}
		else {
			$bitLevel = 0; 
			
			foreach ($permission['access'] as $access) {
				$bitLevel += $access;
			
			}	
		
		}
		
		if (isset($permissionAffiliate['all'])) {
			//para ese action todos los permisos
			$bitLevelAffiliate = 1073741823;	
		}
		else {
			$bitLevelAffiliate = 0; 
			
			foreach ($permissionAffiliate['access'] as $access) {
				$bitLevelAffiliate += $access;
			
			}	
		
		}

		$securityModule = new SecurityModule();
		$securityModule->setModule($module);
		$securityModule->setAccess($bitLevel);
		$securityModule->setAccessAffiliateUser($bitLevelAffiliate);
		$sql = $securityModule->getSQLInsert();

		
		fprintf($fd,"%s\n",$sql);

	
	
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
	* @param HttpRequestBase	The HTTP response we are creating	/**
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
		
		
		if (!isset($_POST['permission']) && (!isset($_POST['moduleName']))) {
			return $mapping->findForwardConfig('failure');
		}

		$permission = $_POST['permission'];
		$permissionAffiliate = $_POST['permissionAffiliate'];
		$permissionGeneral = $_POST['permissionGeneral'];
		$permissionAffiliateGeneral = $_POST['permissionAffiliateGeneral'];

		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/';
		
		$module = $_POST['moduleName'];

		//creacion de archivo de salida		
		
		$fd = fopen($modulePath . $module . '-permissions.sql','w');
		if ($fd == false) {
			//error de apertura de archivo a generar
			return $mapping->findForwardConfig('failure');
		}
	
		//limpieza de datos previos si existieran
		$securityModule = new SecurityModule();
		$securityModule->setModule($_POST['moduleName']);
		fprintf($fd,"%s\n",$securityModule->getSQLCleanup());
		
		$this->writeGeneralPermissionsToOutput($module,$permissionGeneral,$permissionAffiliateGeneral,$fd);

		//limpieza de datos previos si existiesen
		$securityAction = new SecurityAction();
		$securityAction->setModule($_POST['moduleName']);
		fprintf($fd,"%s\n",$securityAction->getSQLCleanup());

		$this->writeActionsPermissionsToOutput($module,$permission,$permissionAffiliate,$fd);

		fclose($fd);
		
		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		if (!empty($_POST['mode']))
			$queryData .= '&mode=' . $_POST['mode'];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);

		return $fc;
	
		
	}

}
?>
