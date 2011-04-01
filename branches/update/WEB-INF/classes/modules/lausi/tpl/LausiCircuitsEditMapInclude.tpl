<fieldset>
<legend>Perímetro</legend>

<div id="point_dummy_container">
	<div id="point_dummy">
		<input type="hidden" id="point_dummy_latitude" name="circuitPoints[point_dummy][params][latitude]" value="" />
		<input type="hidden" id="point_dummy_longitude" name="circuitPoints[point_dummy][params][longitude]" value="" />
		<input type="hidden" id="point_dummy_circuitId" name="circuitPoints[point_dummy][params][circuitId]" value="|-$circuit->getId()-|" />
	</div>
</div>

<div id="map_canvas"></div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="scripts/keydragzoom_packed.js"></script>
<script type="text/javascript" src="scripts/lausi-map-circuit.js"></script>

<script type="text/javascript" language="javascript">
	initializeMap();
	
	|-foreach from=$circuitPoints key=key item=point-|
		var loc = new google.maps.LatLng('|-$point->getLatitude()-|', '|-$point->getLongitude()-|');
		var marker = displayMarker(loc);
		points[marker.position.toString()] = 'point_|-$key-|';
		polyLine.getPath().push(loc);
	|-/foreach-|
	
	|-if $circuitPoints|@count > 2-|
		closePolygon();
	|-/if-|
</script>
</fieldset>