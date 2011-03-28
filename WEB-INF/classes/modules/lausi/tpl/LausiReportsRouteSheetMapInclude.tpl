<input type="button" value="Generar Recorrido" onClick="generateDirections()"/>
<input type="button" value="Limpiar" onClick="clearAll()"/>

<div id="map_canvas" style="height: 480px;"></div>

<script type="text/javascript" src="scripts/lausi-map-circuit.js"></script>

<script type="text/javascript" language="javascript">
	initializeMap();
	
	|-foreach from=$results item=result name=for_result-|
		|-assign var=advertisements value=$result.adverts-|
		|-foreach from=$advertisements item=advertisement name=for_advertisements-|
			|-assign var=billboard value=$advertisement->getBillboard()-|
			|-assign var=address value=$billboard->getAddress()-|
			displayMarker(new google.maps.LatLng('|-$address->getLatitude()-|', '|-$address->getLongitude()-|'));
		|-/foreach-|
	|-/foreach-|
</script>
