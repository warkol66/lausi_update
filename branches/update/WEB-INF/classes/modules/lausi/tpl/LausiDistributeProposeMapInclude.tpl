<div id="map_canvas"></div>

<script type="text/javascript" language="javascript">
	initializeMap();
	
	|-foreach from=$results item=result name=for_result-|
		|-foreach from=$result.options item=byAddress name=for_byAddress-|
			|-assign var=address value=$byAddress.address-|
			displayMarker(|-$address->getId()-|, new google.maps.LatLng('|-$address->getLatitude()-|', '|-$address->getLongitude()-|'), |-if $byAddress.selected == $byAddress.elements|@count-|'assigned'|-elseif $byAddress.selected == 0-|'available'|-else-|'partiallyAssigned'|-/if-|, function(marker){javascript:switch_vis('div_|-$address->getId()-|'); document.location.href = '#div_|-$address->getId()-|';});
		|-/foreach-|
	|-/foreach-|
</script>
