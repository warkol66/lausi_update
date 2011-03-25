function lausiProposeOperationSuccess(originalRequest) {
	
	$('msgbox').innerHTML = '<span class="resultSuccess">La Operacion ha sido existosa.</span>';
}

function lausiProposeOperationFailure(originalRequest) {

	$('msgbox').innerHTML = '<span class="resultFailure">Ha habido un fallo en la operación.</span>';	
	
}

function lausiProposeDistribution(form) {

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'distributionProposal'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					onFailure: lausiProposeOperationFailure
				});

	


	$('msgbox').innerHTML = '<span class="inProgress">... generando propuesta de distribución ...</span>';

	return true;
	
}

function lausiDoDistribution(form) {

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgbox'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					onFailure: lausiProposeOperationFailure
				});

	


	$('msgbox').innerHTML = '<span class="inProgress">... asignando motivos...</span>';

	return true;

	
}

function lausiThemeCreationCancel(form) {

	form.reset();
	$('themeCreationDiv').hide();
	
}

function lausiThemeCreationShow() {

	$('themeCreationDiv').show();
	
}

function lausiCreationFailure() {
	
		$('msgboxCreation').innerHTML = '<span class="resultFailure">Se ha producido un error en la creación del motivo.</span>';
		
}

function lausiThemeCreationX(form) {

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgboxCreation'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					onFailure: lausiCreationFailure
				});

	$('msgboxCreation').innerHTML = '<span class="inProgress">... creando Motivo ...</span>';

	return true;
	
	
	
}

function lausiUpdateDistributeCount() {
	
	var themeId = $('themeIdSelectDistribute').value;
	var fields = 'Main.php&do=lausiThemesGetCountX&themeId=' + themeId;
	var myAjax = new Ajax.Updater(
				{success: 'themeDistributedCount'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});

	$('msgBoxDistributeCount').innerHTML = '<span class="inProgress">... actualizando cantidad...</span>';

	return true;
	
	
}

function lausiUpdateDistributeCountRegion() {
	
	var themeId = $('themeIdSelectDistribute').value;

	if (themeId == '')
		return false;

	var fields = 'Main.php&do=lausiThemesGetCountX&themeId=' + themeId + '&region=1';
	var myAjax = new Ajax.Updater(
				{success: 'themeDistributedCount'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});

	$('msgBoxDistributeCount').innerHTML = '<span class="inProgress">... actualizando cantidad...</span>';

	return true;
	
	
}

function lausiUpdateDistributeCountCircuit() {
	
	var themeId = $('themeIdSelectDistribute').value;
	
	if (themeId == '')
		return false;
	
	var fields = 'Main.php&do=lausiThemesGetCountX&themeId=' + themeId + '&circuit=1';
	var myAjax = new Ajax.Updater(
				{success: 'themeDistributedCount'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});

	$('msgBoxDistributeCount').innerHTML = '<span class="inProgress">... actualizando cantidad...</span>';

	return true;
	
	
}

function lausiAddAdvertOnAddress(form) {

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgBoxAddAdvert'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});

	$('msgBoxAddAdvert').innerHTML = '<span class="inProgress">... agregando avisos ...</span>';

	return true;

	
	
}

var map;
var polyLine;
var directionsDisplays = [];
var directionsService;

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.649', '-58.456');
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var polyOptions = {
	    strokeColor: '#0000ff',
	    strokeOpacity: 1.0,
	    strokeWeight: 3
  	}
    polyLine = new google.maps.Polyline(polyOptions);
  	polyLine.setMap(map);
  	
  	directionsService = new google.maps.DirectionsService();
}
	
function displayMarker(position) {
	var marker;
	marker = new google.maps.Marker({
       	map: map, 
       	position: position,
    });
        
    google.maps.event.addListener(marker, 'click', function() {
    	markerOnClick(marker);
  	});
}

function markerOnClick(marker) {
	var path = polyLine.getPath();
	var i = 0;
	var found = false;
	
	while (i < path.getLength() && !found) {
		if (path.getAt(i).equals(marker.getPosition()))
			found = true;
		i++;
	}

	if (found) {
		path.removeAt(i - 1);
	} else {
		// Because path is an MVCArray, we can simply append a new coordinate
  		// and it will automatically appear
  		path.push(marker.getPosition());
  	}
}

function generateDirections() {
	var path = polyLine.getPath();
	var subPath = [];

	path.forEach(function(position, idx) {
		subPath.push(position);
		//Enviamos los puntos en paquetes de a 10 para no exceder las limitaciones del geocoder
		if (subPath.size() == 10) {
			requestDirections(subPath);
			subPath.clear();
			subPath.push(position);
		}
	});
	
	//Si quedó algún resto sin enviar lo enviamos ahora.
	if (subPath.size() > 1) {
		requestDirections(subPath);
	}
	
	clearPolyLine();
}

function requestDirections(waypoints) {
	var origin = waypoints.first();
	var destination = waypoints.last();
	
	waypts = [];
	var i;
	
	for (i = 1; i < waypoints.size() - 1; i++) {
		waypts.push({
			location: waypoints[i],
			stopover: true
		});
	}
	
	var request = {
		origin: origin, 
		destination: destination,
		waypoints: waypts,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    
    directionsService.route(request, displayDirections);
}

function displayDirections(result, status) {
	  	
    if (status == google.maps.DirectionsStatus.OK) {
    	var renderer = new google.maps.DirectionsRenderer({
	   		suppressMarkers: true,
	   		directions: result,
	   		map: map,
	   	});
	   	directionsDisplays.push(renderer);
    }
}

function clearPolyLine() {
	var path = polyLine.getPath();
	var lenght = path.getLength();
	var i;
	for (i=0; i<lenght; i++) {
		path.pop();
	}
}

function clearAll() {
	clearPolyLine();
	directionsDisplays.each(function(renderer) {
		renderer.setMap(null);
	});
}
