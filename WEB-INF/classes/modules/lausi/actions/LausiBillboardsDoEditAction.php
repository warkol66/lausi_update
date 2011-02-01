<?php

require_once("BaseAction.php");
require_once("BillboardPeer.php");

class LausiBillboardsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiBillboardsDoEditAction() {
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

		$module = "Lausi";
		$smarty->assign("module",$module);
		$section = "Billboards";
		$smarty->assign("section",$section);		

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un billboard existente
			BillboardPeer::update($_POST["id"],$_POST["number"],$_POST["type"],$_POST["height"],$_POST["row"],$_POST["column"],$_POST["addressId"]);
			
      		//caso de redireccionamiento desde opciones de busqueda de addressesList

			if (isset($_POST['listRedirect'])) {
				
				$queryData = "";
				//armamos la redireccion con los valores necesarios
				foreach ($_POST['listRedirect'] as $key => $value) {
					$queryData .= "&listRedirect[$key]=$value";
				}
			}			
      		
			$myRedirectConfig = $mapping->findForwardConfig('success');
			$myRedirectPath = $myRedirectConfig->getpath();
			$queryData .= '&addressId='.$_POST["addressId"];
			$myRedirectPath .= $queryData;
			$fc = new ForwardConfig($myRedirectPath, True);
			return $fc;			
		}
		else {
		  //estoy creando un nuevo billboard
			
			$billboard = BillboardPeer::create($_POST["number"],$_POST["type"],$_POST["height"],$_POST["row"],$_POST["column"],$_POST["addressId"]);
			
			if ( $billboard == false ) {
				$billboard = new Billboard();
				$billboard->setid($_POST["id"]);
				$billboard->setnumber($_POST["number"]);
				$billboard->settype($_POST["type"]);
				$billboard->setheight($_POST["height"]);
				$billboard->setrow($_POST["row"]);
				$billboard->setcolumn($_POST["column"]);
				$billboard->setaddressId($_POST["addressId"]);
				require_once("AddressPeer.php");		
				$smarty->assign("addressIdValues",AddressPeer::getAll());
				$smarty->assign("billboard",$billboard);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				
				//caso especial desde creacion desde address
				if ($_POST['mode'] == 'ajax') {
				
					//por ser una action ajax.		
					$this->template->template = "template_ajax.tpl";
					return $mapping->findForwardConfig('failure-ajax');
				}
					
				return $mapping->findForwardConfig('failure');
      		}

			//caso especial desde creacion desde address
				if ($_POST['mode'] == 'ajax') {
				
					//por ser una action ajax.		
					$this->template->template = "template_ajax.tpl";					

					$smarty->assign('billboard',$billboard);
					return $mapping->findForwardConfig('success-ajax');
				}
				
			return $mapping->findForwardConfig('success');
		}

	}

}
