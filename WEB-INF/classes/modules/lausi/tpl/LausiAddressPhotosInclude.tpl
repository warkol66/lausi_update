<link rel="stylesheet" href="scripts/egytca/carousel/index.css">
<script src="scripts/egytca/carousel/index.js"></script>
<script src="scripts/egytca/ajax-utils.js"></script>

<style>
	ul.gallery li {
		display: inline-block;
	}

	ul.gallery li button {
		visibility: hidden;
	}

	ul.gallery li:hover button {
		visibility: visible;
	}

	img.miniature {
		border: 1px solid black;
		border-radius: 5px;
		cursor: pointer;
		width: 100px;
		height: 100px;
	}
</style>

<div id="photo-box-template" style="display:none">
	|-include file="LausiAddressesPhotoBoxInclude.tpl" id="#id#" uri="#uri#" useCarousel=false-|
</div>

<ul id="addressPhotos" class="gallery">
	|-foreach from=$photos item="photo"-|
		|-include file="LausiAddressesPhotoBoxInclude.tpl" id=$photo->getId() uri=$photo->getUri()-|
	|-/foreach-|
</ul>

<script>

	var pageCarousels = Egytca.Carousel.createFromDocument();

	var addPhoto = function(responseData) {

		var uri = responseData.Uri.replace(/&amp;/g, '&');

		var templateClone = document.getElementById('photo-box-template').cloneNode(true);
		templateClone.innerHTML = templateClone.innerHTML
			.replace(/#id#/g, responseData.Id)
			.replace(/#uri#/g, uri);

		var imgBox = templateClone.children[0];
		templateClone.removeChild(imgBox);
		document.getElementById('addressPhotos').appendChild(imgBox);

		if ( !('directionGallery' in pageCarousels) )
			pageCarousels.directionGallery = new Egytca.Carousel();

		var carousel = pageCarousels.directionGallery;
		carousel.addImage(uri);
		carousel.addTrigger(imgBox.querySelector('img'), uri);
	};

	var deletePhoto = function(photoId, photoUri, button) {

		if (!confirm('¿Desea eliminar la foto?'))
			return;

		var statusBox = button.parentNode.querySelector('span[name="status"]');

		setRequestStatus('working', statusBox);

		new Ajax.Request('Main.php?do=lausiPhotosDoDelete', {
			method: 'POST',
			parameters: {
				'id': photoId,
			},
			onSuccess: function(response) {
				try {
					var data = JSON.parse(response.responseText);
					if (! ('Id' in data) )
						return handleRequestError(statusBox, 'incorrect response data');
					var photoBox = document.getElementById('photo-box-' + photoId);
					photoBox.parentNode.removeChild(photoBox);
					pageCarousels.directionGallery.removeImage(photoUri);
				} catch (e) {
					handleRequestError(statusBox, e);
				}
			},
			onFailure: function() {
				handleRequestError(statusBox);
			}
		});
	};

	var handleRequestError = function(statusBox, error) {
		setRequestStatus('failure', statusBox);
		//console.log(error);
	};
</script>

|-include file="LausiFileAsyncUploader.tpl" uploadUri="Main.php?do=lausiAddressesDoUploadPhoto" onSuccess="addPhoto" idParam=$address->getId()-|
