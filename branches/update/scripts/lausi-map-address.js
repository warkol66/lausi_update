AddressMap = function() {
	this.map;
	this.geocoder;
	this.infowindow = new google.maps.InfoWindow();
	this.marker;
	this.suggestions = [];
	this.mapOptions = new Hash();
	
	this.initializeMap = function(canvasId) {
		var _this = this;
	    _this.directionsDisplay = new google.maps.DirectionsRenderer();
	    _this.geocoder = new google.maps.Geocoder();
	    var latlng = new google.maps.LatLng('-34.649', '-58.456');
	    var myOptions = new Hash({
	      zoom: 12,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    });
	    
	    myOptions.update(_this.mapOptions);
	    	
	    _this.map = new google.maps.Map(document.getElementById(canvasId), myOptions.toObject());

	    _this.map.enableKeyDragZoom({
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
	    
	  	google.maps.event.addListener(_this.map, 'click', function(evnt) {
	  		_this.clearResultsList();
	    	_this.displayMarker(evnt.latLng);
	    	_this.updateAddressInfoByPosition(evnt.latLng);
	  	});
	}
	
	this.displayMarker = function(position) {
		var _this = this;
		if (!_this.marker) {
			_this.marker = new google.maps.Marker({
	        	map: _this.map, 
	        	position: position,
	        	draggable: true
	        });
	        google.maps.event.addListener(_this.marker, 'click', function() {
	    		_this.infowindow.open(_this.map, _this.marker);
	  		});
	  		
		  	google.maps.event.addListener(_this.marker, 'dragend', function() {
		  		_this.clearResultsList;
		  		_this.updateAddressInfoByPosition(_this.marker.getPosition());
		  	});
	    } else {
	    	_this.marker.setPosition(position);
	    }
	}
	
	this.updateAddressInfoByPosition = function(position) {
		var _this = this;
		if (_this.geocoder) {
	      _this.geocoder.geocode({'latLng': position}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {
	          if (results[0]) {
				_this.updateAddressInfoByResult(results[0]);
	          }
	        } else {
	          alert("Geocoder failed due to: " + status);
	        }
	      });
	    }
	    $('button_edit_address').enable();
	}
	
	this.updateAddressInfoByResult = function(result) {
		var _this = this;
		_this.infowindow.setContent(result.formatted_address);
	    _this.infowindow.open(_this.map, _this.marker);
	    
	    var addressComponents = result.address_components;
	    var routeComponent = _this.getComponent(addressComponents, 'route');
	    if (routeComponent)
			$('street').value = routeComponent.long_name;
		else
			$('street').value = '';

		var number = _this.getComponent(addressComponents, 'street_number').long_name;
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
		
		var region = _this.getComponent(addressComponents, 'neighborhood').long_name;
		_this.selectRegion(region);
		
		$('button_edit_address').enable();
	}
	
	this.getComponent = function(addressComponents, componentName) {
		var _this = this;
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
	
	this.selectRegion = function(region) {
		var _this = this;
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
	
	this.locate = function(form) {
		var _this = this;
		$('map_container').show();
		if (!_this.map) {
			_this.initializeMap('map_canvas');
			_this.drawCircuits();
		}
		
		_this.clearResultsList();
	
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
		
		if (_this.geocoder) {
    		_this.geocoder.geocode( { 'address': address}, function(results, status) {
	     		if (status == google.maps.GeocoderStatus.OK) {
	     			_this.suggestions.clear();
	    			var result = results[0];
	    			_this.displayMarker(result.geometry.location);
	    			_this.updateAddressInfoByResult(result);
	    			if (results.size() > 1)
	    				_this.displayResultsList(results);
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
	
	this.displayResultsList = function(results) {
		var _this = this;
		var resultsList = $('directions_results');
		resultsList.innerHTML = '';
		results.each(function(result, idx) {
			_this.suggestions['suggestion_'+idx] = result;
			var li = new Element('li', {
				id: 'suggestion_'+idx
			});
			li.update(result.formatted_address);
			li.onclick = function() {
				_this.displayMarker(_this.suggestions['suggestion_'+idx].geometry.location);
				_this.updateAddressInfoByResult(_this.suggestions['suggestion_'+idx]);
			};
			resultsList.insert({bottom: li});
		});
	}
	
	this.clearResultsList = function() {
		var _this = this;
		$('directions_results').innerHTML = '';
		_this.suggestions.clear();
	}
};