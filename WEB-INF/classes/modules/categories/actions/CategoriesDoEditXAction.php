<?php

require_once("BaseAction.php");
require_once("CategoryPeer.php");
require_once("GroupCategoryPeer.php");

class CategoriesDoEditXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CategoriesDoEditXAction() {
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
		
		$module = "Categories";

    $smarty->assign("module",$module);

		if ( $_POST["accion"] == "edicion" ) {
			//estoy editando un category existente

			CategoryPeer::update($_POST["id"],$_POST["name"]);
      return $mapping->findForwardConfig('success');
		}
		else {
		  //estoy creando un nuevo category

			$categoryId = CategoryPeer::create($_POST["name"]);
			
			
			//le asigno permisos a la categoria creada a todos los grupos al cual pertenece el usuario			//separacion entre caso de usuario dependencia y usuario administrador	
			if (Common::isAffiliatedUser()) {
			
				$user = Common::getAffiliatedLogged();
			
			}
			
			if (Common::isAdmin()) {
				
					$user = Common::getAdminLogged();				

			}
			
			if (isset($user)) {
						$user->setGroupsToCategory($categoryId);
			}

			$category = CategoryPeer::get($categoryId);
			$smarty->assign("category",$category);
			return $mapping->findForwardConfig('success');
		}

	}

}
?>
