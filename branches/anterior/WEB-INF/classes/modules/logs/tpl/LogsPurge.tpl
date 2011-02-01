</script>
<script src="scripts/datePicker.js">
</script>
 <form name="formPurge" method="get" action="Main.php" style='margin-top:10px'> 
	<input type='hidden' name='do' value='logsDoPurge' /> 
	<table width="100%"  border="0" cellpadding="0" cellspacing="0"> 
		 <tr> 
			<th class="thresultado" scope="col"><span class="style3">Histórico de Operaciones - Purga de Datos</span></th> 
		</tr> 
		 <tr> 
			<td class="size2">Purga de datos para el histórico de operaciones del Sistema<br /> 
				 <br /></td> 
		</tr> 
		 |- if $mensaje neq '' -|
		 <tr> 
			<td><div class="errorMessage">|-$mensaje-|</div></td> 
		</tr> 
		 <tr> 
			<td style='text-align:center'> <input name="fecha_desde" type="hidden" class="boton" id="btnGuardar" value="|-$fecha_desde-|"> 
				 <input name="fecha_hasta" type="hidden" class="boton" id="btnGuardar" value="|-$fecha_hasta-|"> 
				 <input name="purgar" type="hidden" class="boton" id="btnGuardar" value="purga"> 
				 <input name="confirmar" type="submit" class="boton" id="btnGuardar" value="Confirmar"> </td> 
		</tr> 
		 |- else-|
		 <tr> 
			<td class="nopaddingCell">  
		</tr> 
		 <tr> 
			<td nowrap class="style6">Fecha Desde:&nbsp;<span class="size4">(dd-mm-aaaa)</span>
		<input name="dateFrom" type="text" value="|-$dateFrom-|" size="10"> 
&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha"> </td> 
		</tr> 
		 <tr> 
			<td nowrap class="style6">Fecha Hasta:&nbsp;<span class="size4">(dd-mm-aaaa)</span>
		<input name="dateTo" type="text" value="|-$dateTo-|" size="10"> 
&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha"> </td> 
		</tr> 
		 <tr> 
			<td align="center"><input name="purgar" type="submit" class="boton" id="btnGuardar" value="Purgar" onclick="return confirm('Esta opción elimina permanentemente esta Categoría. ¿Está seguro que desea eliminarla?');"> </td> 
		</tr> 
		 |- /if-|
	 </table> 
</form> 
