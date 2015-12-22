<script>
    updateLocDistCount = (function() {

        var unitCounts = {};

        var updateGlobalCounter = function(unitId, count) {
            var globalCountView = document.getElementById('to-be-distributed-all')
            unitCounts[unitId] = +count;
            var globalCount = 0;
            for (var i in unitCounts) {
                globalCount += unitCounts[i];
            }
            globalCountView.innerHTML = globalCount;
        };

        return function(unitId) {

            var circuitBox = document.getElementById('|-$type-|-' + unitId);
            var circuitCounter = document.getElementById('to-be-distributed-' + unitId);

            var locationCheckboxes = circuitBox.querySelectorAll('input[type="checkbox"].location-selector');
            var count = 0;
            for (var i = 0; i < locationCheckboxes.length; i++) {
                if (locationCheckboxes[i].checked)
                    count++;
            }
            circuitCounter.innerHTML = count;

            updateGlobalCounter(unitId, count);
        };
    })();

    |-foreach from=$results item=result-|
        |-assign var=object value=$result.$type-|
        updateLocDistCount(|-$object->getId()-|);
    |-/foreach-|
</script>
