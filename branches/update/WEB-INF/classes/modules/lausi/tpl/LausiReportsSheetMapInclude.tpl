<input type="button" value="Generar Recorrido" onClick="generateDirections()"/>
<input type="button" value="Limpiar" onClick="clearAll()"/>

<div id="map_canvas" style="height: 480px;"></div>

<script type="text/javascript" src="scripts/lausi-map-circuit.js"></script>

<script type="text/javascript" language="javascript">
	initializeMap();
	
	|-foreach from=$results item=result name=for_result-|
		|-foreach from=$result.addresses item=byAddress name=for_byAddress-|
			|-assign var=address value=$byAddress.address-|
			displayMarker(new google.maps.LatLng('|-$address->getLatitude()-|', '|-$address->getLongitude()-|'));
		|-/foreach-|
	|-/foreach-|
</script>
