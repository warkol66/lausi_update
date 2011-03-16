<?php

require_once("BaseAction.php");
require_once("ClientAddressPeer.php");

class LausiClientAddressesDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function LausiClientAddressesDoEditAction() {
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
		$section = "ClientAddresses";
		$smarty->assign("section",$section);		

		$latitude = Common::convertToMysqlNumericFormat($_POST["latitude"]);
		$longitude = Common::convertToMysqlNumericFormat($_POST["longitude"]);

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un clientaddress existente
			ClientAddressPeer::update($_POST["id"],$_POST["street"],$_POST["number"],$_POST["intersection"],$latitude,$longitude,$_POST["type"],$_POST["circuitId"],$_POST["clientId"],$_POST["regionId"]);
      		
			return $mapping->findForwardConfig('success');
		}
		else {
		  //estoy creando un nuevo clientaddress

			if ( !ClientAddressPeer::create($_POST["street"],$_POST["number"],$_POST["intersection"],$_POST["latitude"],$_POST["longitude"],$_POST["type"],$_POST["circuitId"],$_POST["clientId"],$_POST["regionId"]) ) {
				$latitude = Common::convertToMysqlNumericFormat($_POST["latitude"]);
				$longitude = Common::convertToMysqlNumericFormat($_POST["longitude"]);

				$clientaddress = new ClientAddress();
				$clientaddress->setid($_POST["id"]);
				$clientaddress->setstreet($_POST["street"]);
				$clientaddress->setnumber($_POST["number"]);
				$clientaddress->setintersection($_POST["intersection"]);
				$clientaddress->setlatitude($latitude);
				$clientaddress->setlongitude($longitude);
				$clientaddress->settype($_POST["type"]);
				$clientaddress->setcircuitId($_POST["circuitId"]);
				require_once("CircuitPeer.php");		
				$smarty->assign("circuitIdValues",CircuitPeer::getAll());
				$clientaddress->setclientId($_POST["clientId"]);
				require_once("ClientPeer.php");		
				$smarty->assign("clientIdValues",ClientPeer::getAll());
				$clientaddress->setregionId($_POST["regionId"]);
				require_once("RegionPeer.php");		
				$smarty->assign("regionIdValues",RegionPeer::getAll());
				$smarty->assign("clientaddress",$clientaddress);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
      		}

			return $mapping->findForwardConfig('success');
		}

	}

}