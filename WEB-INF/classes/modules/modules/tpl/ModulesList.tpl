<script>
function checkscript() {
		alert('El sistema requiere que este módulo siempre esté activo.');
		return false;
	}
</script>
 <table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema</td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Administración de Módulos del Sistema </td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">A continuación podrá administrar los módulos disponibles en el sistema. Para activar o desactivar módulos, debe tener en cuenta las dependencias de los mismos.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0"> 
	<tr> 
		<td class="tdSize2" id="message"><span id="systemWorking" style="display:none;"></span></td> 
		<td class="tdSize2" id="messageMod"></td> 
	</tr> 
	|-if $modulesNumber gt 0-|
	<tr> 
		<td colspan="2" class="tdSize2">Se cargarón en el sistema el siguiente número de módulos nuevos: |-$modulesNumber-| módulo(s) </td> 
	</tr> 
	<tr> 
		<td colspan="2" class="tdSize2">Detalle de módulos instalados:</td> 
	</tr> 
	|-/if-|
	|-foreach from=$modules item=module name=modu-|
	<tr> 
		<td class="tdSize1">|-$module.module-|</td> 
		<td class="tdSize1">|-$module.active-|</td> 
	</tr> 
	|-/foreach-|
	<tr> 
		<td colspan="2">&nbsp;</td> 
	</tr> 
</table> 
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Módulo</th> 
		<th width="70%" scope="col" class="thFillTitle">Descripción</th> 
		<th width="10%" scope="col" class="thFillTitle">Activar</th> 
	</tr> 
	|-foreach from=$assignedModules item=asModule name=modulef-|
	<tr> 
		<td class="tdSize1"> <a href="Main.php?do=modulesEdit&moduleName=|-$asModule->getName()-|">|-$asModule->getLabel()-|</a> </td> 
		<td class="tdSize1"> |-$asModule->getDescription()-| </td> 
		<td class="tdSize1" nowrap> <form id="form_|-$asModule->getName()-|"> 
				<input type="hidden" name="module" value="|-$asModule->getName()-|" /> 
				<input type="hidden" name="do" value="modulesDoActivateX" /> 
				|-if $asModule->getAlwaysActive() eq 1-|
				<input type="checkbox" name="activeModule" value="1" checked="checked" disabled="disabled" /> 
				<img border="0" src="images/help.png" height="20" width="20" onClick="return checkscript()"/> |-else-|
				<input type="checkbox" id="active_|-$asModule->getName()-|" name="activeModule" value="1" |-if $asModule->getActive() eq 1-|checked="checked"|-/if-| onclick="modulesDoActivateX(this.form)" /> |-/if-|
		</form></td> 
	</tr> 
	|-/foreach-|
</table> 
