<?php

class LausiCircuitsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiCircuitsDoEditAction() {
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
		$section = "Circuits";
		$smarty->assign("section",$section);		

		if ( $_POST["action"] == "edit" ) {
			$circuit = CircuitPeer::get($_POST["id"]);
			//estoy editando un circuit existente
			CircuitPeer::update($_POST["id"],$_POST["name"],$_POST["description"],$_POST["limitsDescription"]);
		}
		else {
		  	//estoy creando un nuevo circuit
			if ( !CircuitPeer::create($_POST["name"],$_POST["description"],$_POST["limitsDescription"]) ) {
				$circuit = new Circuit();
				$circuit->setid($_POST["id"]);
				$circuit->setname($_POST["name"]);
				$circuit->setdescription($_POST["description"]);
				$circuit->setlimitsDescription($_POST["limitsDescription"]);
				$smarty->assign("circuit",$circuit);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
      		}
		}
		
		CircuitPointQuery::create()->filterByCircuit($circuit)->delete();
		
		$this->processPointsInfo($_POST["circuitPoints"]);

		return $mapping->findForwardConfig('success');
	}

	protected function processPointsInfo($pointsInfo) {
		foreach ($pointsInfo as $pointInfo) {
			$point = new CircuitPoint;
			Common::setObjectFromParams($point, $pointInfo['params']);
			$point->save();
		}
	}

}