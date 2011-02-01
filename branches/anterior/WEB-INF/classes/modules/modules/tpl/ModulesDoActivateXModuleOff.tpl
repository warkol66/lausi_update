Error: Ha intentado desactivar un m&oacute;dulo que necesita la desactivaci&oacute;n de lo(s) siguiente(s) m&oacute;dulo(s):<br>|-foreach from=$dependenciesName item=dependencyName-||-$dependencyName-|<br>|-/foreach-|

<script language="JavaScript">
	$('active_|-$moduleName-|').checked = true;
	$('messageMod').innerHTML = "";
</script>