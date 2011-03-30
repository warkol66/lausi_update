<fieldset>
<legend>Recorrido</legend>
<p>
<input type="button" value="Generar Recorrido" onClick="generateDirections()" class="noPrint" />
<input type="button" value="Limpiar" onClick="clearAll()" class="noPrint"/>
</p>
<p></p>
<div>
	<ol id="addresses_list" style="float:left;">
	|-foreach from=$results item=result name=for_result-|
		|-foreach from=$result.addresses item=byAddress name=for_byAddress-|
			|-assign var=address value=$byAddress.address-|
			<li id="address_|-$address->getId()-|" onMouseOver="firstPath[this.id].marker.setIcon('images/available.gif')" onMouseOut="firstPath[this.id].marker.setIcon('')">|-$address->getName()-|</li>
		|-/foreach-|
	|-/foreach-|
	</ol>
</div>

<div id="map_canvas"></div>

<script type="text/javascript" src="scripts/lausi-map-circuit.js"></script>

<script type="text/javascript" language="javascript">
	initializeMap();
	
	Sortable.create('addresses_list', {
		onUpdate: function(list) {
			redrawPolyline(list);
		}
	});
	
	|-foreach from=$results item=result name=for_result-|
		|-foreach from=$result.addresses item=byAddress name=for_byAddress-|
			|-assign var=address value=$byAddress.address-|
			var loc = new google.maps.LatLng('|-$address->getLatitude()-|', '|-$address->getLongitude()-|');
			var marker = displayMarker(loc);
			markerOnClick(marker);
			firstPath['address_|-$address->getId()-|'] = {'position': loc, 'marker': marker};
		|-/foreach-|
	|-/foreach-|
</script>
</fieldset>