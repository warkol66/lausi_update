<?php

class LausiAddressesMigrateToGoogleCodingAction extends BaseAction {

	// ----- Constructor ---------------------------------------------------- //

	function LausiAddressesMigrateToGoogleCodingAction() {
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
		$section = "Addresses";
		$smarty->assign("section",$section);
		
		$addresses = AddressPeer::getAll();
		
		foreach ($addresses as $address) {
			$this->updateAddress($address);
		}

		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}
	
	protected function updateAddress($address) {
		//Armamos la url para la consulta al servicio de geocoding de google
		//ej: http://maps.google.com/maps/api/geocode/xml?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&sensor=true_or_false
		$url = 'http://maps.google.com/maps/api/geocode/json?';
		$url .= 'address=' . $address->getNumber() .'+'. str_replace(' ', '+', $address->getStreet()) . ',+Buenos+Aires,+Argentina';
		$url .= '&sensor=false';
		
		$response = json_decode(file_get_contents($url));
		$params = array();
		
		if ($response->status == 'OK') {
			$addressComponents = $response->results[0]->address_components;
			$params['number'] = $this->getAddressComponentByType($addressComponents, 'street_number')->long_name;
			$params['street'] = $this->getAddressComponentByType($addressComponents, 'route')->long_name;
			
			$params['latitude'] = $response->results[0]->geometry->location->lat;
			$params['longitude'] = $response->results[0]->geometry->location->lng;
			
			if ($this->addressNeedsUpdate($address, $params)) {
				//Common::setObjectFromParams($address, $params);
				//$address->save();
			}
		}
	}
	
	protected function getAddressComponentByType($addressComponents, $type) {
		$i = 0;
		do {
			$addressComponent = $addressComponents[$i];
			$i++;
		} while ($i < count($addressComponents) && $addressComponent->types[0] != $type);
		return $addressComponent;
	}
	
	protected function addressNeedsUpdate($address, $params) {
		//TODO: terminar de especificar la regla para esto.
		return true;
	}

}
