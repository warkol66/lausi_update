<script>
    var editField = function(field, id, checkbox) {

        var statusBox = checkbox.parentNode.querySelector('span[name="status"]');

        setRequestStatus('working', statusBox);

        new Ajax.Request('Main.php?do=lausiFastDoEdit', {
            method: 'POST',
            parameters: {
                'id': id,
                'class': '|-$class-|',
                'field': field,
                'value': checkbox.checked
            },
            onSuccess: function(response) {
                try {
                    var data = JSON.parse(response.responseText);
                    if (! ('value' in data) )
                        return handleEditError(statusBox, 'incorrect response data');
                    checkbox.checked = data.value;
                    setRequestStatus('success', statusBox);
                } catch (e) {
                    handleEditError(statusBox, e);
                }
            },
            onFailure: function() {
                handleEditError(statusBox);
            }
        });
    };

    var handleEditError = function(statusBox, error) {
        setRequestStatus('failure', statusBox);
        //console.log(error);
    };
</script>
