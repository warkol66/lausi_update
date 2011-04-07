<!-- mapa google -->
<div id="map_container" style="display:none">
	<div id="map_canvas"></div>
	<div><ul id="directions_results"></ul></div>
	<br />
	<p>
		<input id="hide_map" type="button" value="Ocultar mapa" title="Ocultar mapa" onClick="$('map_container').hide();$('show_map').show()"/>
	</p>
</div>
<p><input id="show_map" type="button" value="Mostrar mapa" title="Mostrar mapa" onClick="$('map_container').show(); this.hide()" style="display:none;"/></p>
<!-- fin mapa google -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="scripts/keydragzoom_packed.js"></script>
<script type="text/javascript">
	var map;
	var geocoder;
	var infowindow = new google.maps.InfoWindow();
	var marker;
	var suggestions = [];
	
	function initializeMap() {
	    directionsDisplay = new google.maps.DirectionsRenderer();
	    geocoder = new google.maps.Geocoder();
	    var latlng = new google.maps.LatLng(|-if $address->getLatitude() ne '' && $address->getLongitude() ne ''-|'|-$address->getLatitude()-|', '|-$address->getLongitude()-|'|-else-|'-34.649', '-58.456'|-/if-|);
	    var myOptions = {
	      zoom: |-if $address->getId() ne ''-|16|-else-|12|-/if-|,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	    map.enableKeyDragZoom({
                boxStyle: {
                  border: "thick blue",
                  backgroundColor: "blue",
                  opacity: 0.3
                },
                paneStyle: {
                  backgroundColor: "grey",
                  opacity: 0.1
                }
        });
	    
	    |-if $address->getId() ne ''-|
			displayMarker(latlng);
		|-/if-|
		
	  	google.maps.event.addListener(map, 'click', function(evnt) {
	  		clearResultsList();
	    	displayMarker(evnt.latLng);
	    	updateAddressInfoByPosition(evnt.latLng);
	  	});
	  	
	  	|-include file="LausiCircuitsDraw.tpl"-|
	}
	
	function displayMarker(position) {
		if (!marker) {
			marker = new google.maps.Marker({
	        	map: map, 
	        	position: position,
	        	draggable: true
	        });
	        google.maps.event.addListener(marker, 'click', function() {
	    		infowindow.open(map, marker);
	  		});
	  		
		  	google.maps.event.addListener(marker, 'dragend', function() {
		  		clearResultsList;
		  		updateAddressInfoByPosition(marker.getPosition());
		  	});
	    } else {
	    	marker.setPosition(position);
	    }
	}
	
	function updateAddressInfoByPosition(position) {
		if (geocoder) {
	      geocoder.geocode({'latLng': position}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {
	          if (results[0]) {
				updateAddressInfoByResult(results[0]);
	          }
	        } else {
	          alert("Geocoder failed due to: " + status);
	        }
	      });
	    }
	    $('button_edit_address').enable();
	}
	
	function updateAddressInfoByResult(result) {
		infowindow.setContent(result.formatted_address);
	    infowindow.open(map, marker);
	    
	    var addressComponents = result.address_components;
		$('street').value = getComponent(addressComponents, 'route').long_name;

		var number = getComponent(addressComponents, 'street_number').long_name;
		if (number) {
			//La altura devuelta por el geocoding es del tipo 2500-2600
			//Como necesitamos un único número y no un intervalo, tomamos el primer límite.
			number = number.split('-');
			number = parseInt(number[0]);
		} else {
			number = '';
		}
		$('number').value = number;
		
		$('latitude').value = result.geometry.location.lat();
		$('longitude').value = result.geometry.location.lng();
		
		var region = getComponent(addressComponents, 'neighborhood').long_name;
		selectRegion(region);
		
		$('button_edit_address').enable();
	}
	
	function getComponent(addressComponents, componentName) {
		var i = 0;
		var addressComponent;
		do {
			addressComponent = addressComponents[i];
			i++;
		} while (i < addressComponents.size() && addressComponent.types[0] != componentName);
		if (addressComponent.types[0] != componentName)
			return false;
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
	
	function locate(form) {
		$('map_container').show();
		if (!map) {
			initializeMap();
		}
		
		clearResultsList();
	
		//Convertimos el form en un objeto js para facilitar el análisis
		var locationData = form.serialize(true);
		
		//Componemos la dirección para la busqueda de la siguiente manera:
		//<calle> <numero>[, <barrio>], Buenos Aires, Argentina
		var address = locationData['address[street]'];
		
		if (locationData['address[number]'] != '')
			address += ' ' + locationData['address[number]'];
			
		if (locationData['address[regionId]'] != '')
			address += ', ' + $$('select#regionId > option[value="'+locationData['address[regionId]']+'"]')[0].innerHTML;
		
		address += ', Ciudad Autonoma de Buenos Aires, Capital Federal, Argentina';
		
		if (geocoder) {
    		geocoder.geocode( { 'address': address}, function(results, status) {
	     		if (status == google.maps.GeocoderStatus.OK) {
	     			suggestions.clear();
	    			var result = results[0];
	    			displayMarker(result.geometry.location);
	    			updateAddressInfoByResult(result);
	    			if (results.size() > 1)
	    				displayResultsList(results);
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
	
	function displayResultsList(results) {
		var resultsList = $('directions_results');
		resultsList.innerHTML = '';
		results.each(function(result, idx) {
			suggestions['suggestion_'+idx] = result;
			var onClickString = 'displayMarker(suggestions[this.id].geometry.location);updateAddressInfoByResult(suggestions[this.id]);';
			resultsList.insert({bottom:'<li id="suggestion_'+idx+'" onClick="'+onClickString+'">'+result.formatted_address+'</li>'});
		});
	}
	
	function clearResultsList() {
		$('directions_results').innerHTML = '';
		suggestions.clear();
	}
	
</script>
