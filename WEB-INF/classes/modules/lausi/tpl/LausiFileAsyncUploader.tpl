|-if !$id-|
	|-assign var="id" value="fileAsyncUploaderForm"-|
|-/if-|

<form id="|-$id-|" action="|-$uploadUri-|" onsubmit="prepareUpload(this)" method="post" enctype="multipart/form-data" target="fileAsyncUploader">
	|-if $idParam-|
		<input type="hidden" name="id" value="|-$idParam-|">
	|-/if-|
	<input type="file" name="file">
	<input type="submit" value="Agregar Imagen"/>
	<span name="status"></span>
</form>

<iframe name="fileAsyncUploader" onload="onFileUpload(this)" style="display:none"></iframe>

<script>
	var uploadStatusEnabled = false;

	var getStatusBoxFromParent = function(parent) {
		return parent.querySelector('span[name="status"]');
	};

	var prepareUpload = function(form) {
		setRequestStatus('working', getStatusBoxFromParent(form));
		uploadStatusEnabled = true;
	};

	var createOnFileUploadFn = function(form) {
		return function(iframe) {

			if (!uploadStatusEnabled)
				return;

			var statusBox = getStatusBoxFromParent(form);

			var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
			var match;
			if ( matches = iframeDocument.body.innerHTML.match(/^<pre>({.*})<\/pre>$/) ) {
				//console.log('success', matches)
				try {
					var responseData = JSON.parse(matches[1]);
					setRequestStatus('success', statusBox);
					|-$onSuccess-|(responseData);
				} catch (e) {
					handleRequestError(statusBox, e);
				}
			} else {
				handleRequestError(statusBox, 'response body: ' + iframeDocument.body.innerHTML);
			}
		};
	}

	var onFileUpload = createOnFileUploadFn(document.getElementById('|-$id-|'));

	var handleRequestError = function(statusBox, error) {
		setRequestStatus('failure', statusBox);
		console.log('unknown error uploading file', error);
	};
</script>
