Error: Ha intentado activar un m&oacute;dulo que necesita la activaci&oacute;n de lo(s) siguiente(s) m&oacute;dulo(s):<br>|-foreach from=$dependenciesName item=dependencyName-||-$dependencyName-|<br>|-/foreach-| 



<script language="JavaScript">
	$('active_|-$moduleName-|').checked = false;
	$('messageMod').innerHTML = "";
</script>