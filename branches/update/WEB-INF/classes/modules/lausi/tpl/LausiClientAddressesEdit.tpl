<h2>Configuración del Sistema</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Dirección de Cliente</h1>				<div id="div_clientaddress">
<form name="form_edit_clientaddress" id="form_edit_clientaddress" action="Main.php" method="post">
	|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la dirección de cliente</span>|-/if-|
	<p>
		Ingrese los datos de la dirección de cliente.
	</p>
	<fieldset title="Formulario de edición de datos de una dirección de cliente">
	<p>
			<label for="clientId">Cliente</label>
			<select id="clientId" name="clientId" title="clientId">
				<option value="">Seleccione un Cliente</option>
								|-foreach from=$clientIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getclientId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
		</p>
		<p>
			<label for="street">Calle</label>
			<input name="street" type="text" id="street" title="street" value="|-$clientaddress->getstreet()-|" size="45" maxlength="100" />
		</p>
		<p>
			<label for="number">Número</label>
			<input name="number" type="text" id="number" title="number" value="|-$clientaddress->getnumber()-|" size="12" />
		</p>
		<p>
			<label for="intersection">Intersección</label>
			<input name="intersection" type="text" id="intersection" title="intersection" value="|-$clientaddress->getintersection()-|" size="45" maxlength="100" />
		</p>
		<p>
			<label for="latitude">Latitud</label>
			<input name="latitude" type="text" id="latitude" title="latitude" value="|-$clientaddress->getlatitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<label for="longitude">Longitud</label>
			<input name="longitude" type="text" id="longitude" title="longitude" value="|-$clientaddress->getlongitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<label for="type">Tipo</label>
			<input type="text" id="type" name="type" value="|-$clientaddress->gettype()-|" title="type" maxlength="100" />
		</p>
		<p>
			<label for="circuitId">Circuito</label>
			<select id="circuitId" name="circuitId" title="circuitId">
				<option value="">Seleccione un Circuito</option>
								|-foreach from=$circuitIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getcircuitId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
						</p>
		
		<p>
			<label for="regionId">Barrio</label>
			<select id="regionId" name="regionId" title="regionId">
				<option value="">Seleccione un Barrio</option>
								|-foreach from=$regionIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getregionId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
						</p>
		<p>
			|-if $action eq "edit"-|
			<input type="hidden" name="id" id="id" value="|-$clientaddress->getid()-|" />
			|-/if-|
			<input type="hidden" name="action" id="action" value="|-$action-|" />
			<input type="hidden" name="do" id="do" value="lausiClientAddressesDoEdit" />
			<input type="submit" id="button_edit_clientaddress" name="button_edit_clientaddress" title="Aceptar" value="Aceptar" />
		</p>
			</fieldset>
</form>
</div>
<div id="map_canvas" style="height: 480px;"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
	var map;
	var geocoder;
	var infowindow = new google.maps.InfoWindow();
	var marker;
	
	window.onload = function() { initializeMap(); }
	
	function initializeMap() {
	    directionsDisplay = new google.maps.DirectionsRenderer();
	    geocoder = new google.maps.Geocoder();
	    var latlng = new google.maps.LatLng(|-if $clientaddress->getLatitude() ne '' && $clientaddress->getLongitude() ne ''-|'|-$clientaddress->getLatitude()-|', '|-$clientaddress->getLongitude()-|'|-else-|'-34.649', '-58.456'|-/if-|);
	    var myOptions = {
	      zoom: |-if $clientaddress->getId() ne ''-|16|-else-|12|-/if-|,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	    
	    |-if $clientaddress->getId() ne ''-|
			displayMarker(latlng);
		|-/if-|
		
	  	google.maps.event.addListener(map, 'click', function(evnt) {
	    	displayMarker(evnt.latLng);
	    	updateAddressInfo(evnt.latLng);
	  	});
	}
	
	function displayMarker(position) {
		if (!marker) {
			marker = new google.maps.Marker({
	        	map: map, 
	        	position: position,
	        	draggable: true
	        });
	    } else {
	    	marker.setPosition(position);
	    }
	        
	    google.maps.event.addListener(marker, 'click', function() {
	    	infowindow.open(map, marker);
	  	});
	  		
	  	google.maps.event.addListener(marker, 'dragend', function() {
	  		updateAddressInfo(marker.getPosition());
	  	});
	}
	
	function updateAddressInfo(position) {
		if (geocoder) {
	      geocoder.geocode({'latLng': position}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {
	          if (results[1]) {
	            infowindow.setContent(results[0].formatted_address);
	            infowindow.open(map, marker);
	            var addressComponents = results[0].address_components;
		    	$('street').value = getStreetComponent(addressComponents).long_name;
		    	//La altura devuelta por el geocoding es del tipo 2500-2600
		    	//Como necesitamos un único número y no un intervalo, tomamos el primer límite.
		    	var number = getNumberComponent(addressComponents).long_name;
		    	number = number.split('-');
		    	number = parseInt(number[0]);
		    	$('number').value = number;
		    	$('latitude').value = results[0].geometry.location.lat();
		    	$('longitude').value = results[0].geometry.location.lng();
		    	var region = getNeighborhoodComponent(addressComponents).long_name;
		    	selectRegion(region);
		    	console.log(results[0]);
	          }
	        } else {
	          alert("Geocoder failed due to: " + status);
	        }
	      });
	    }
	}
	
	function getStreetComponent(addressComponents) {
		var i = 0;
		var addressComponent;
		do {
			addressComponent = addressComponents[i];
			i++;
		} while (i < addressComponents.size() && addressComponent.types[0] != 'route');
		return addressComponent;
	}
	
	function getNumberComponent(addressComponents) {
		var i = 0;
		var addressComponent;
		do {
			addressComponent = addressComponents[i];
			i++;
		} while (i < addressComponents.size() && addressComponent.types[0] != 'street_number');
		return addressComponent;
	}
	
	function getNeighborhoodComponent(addressComponents) {
		var i = 0;
		var addressComponent;
		do {
			addressComponent = addressComponents[i];
			i++;
		} while (i < addressComponents.size() && addressComponent.types[0] != 'neighborhood');
		return addressComponent;
	}
	
	function selectRegion(region) {
		var corrections = {
			'Monserrat': 'Montserrat',
			'Núñez': 'Nuñez',
			'San Nicolas': 'San Nicolás',
			'Villa Ortuzar': 'Villa Ortúzar',
			'Villa Pueyrredón': 'Villa Pueyrredon',
			'Villa Gral.mitre': 'Villa Gral Mitre',
		};
		
		if (corrections[region])
			region = corrections[region];
	
		$$('select#regionId > option').each(function(option) {
			if (option.innerHTML == region) {
				option.selected = true;
				$('regionId').selectedIndex = option.index;
			} else {
				option.selected = false;
			}
		});
	}
	
</script>

