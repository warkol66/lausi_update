<script src="scripts/datePicker.js">
</script>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr> 
	<th class="thresultado" scope="col"><span class="style3">Hist&oacute;rico 
	  de Operaciones</span>
	</th>
  </tr>
  <tr>
	<td>
		<form name="form1" method="get" action="Main.php">
		<input type='hidden' name='do' value='logsList' />
		|-if $DISPLAY eq 1-| 
			<table width="100%"  border="0" cellpadding="5" cellspacing="0">
				<tr> 
					<td class="size2" colspan="2">Consultar hist&oacute;rico de operaciones del Sistema 
					</td>
				</tr>
				<tr class="row_even"> 
				  <td nowrap class="style6">Usuario:</td>
				  <td width="30%">
					<select name="selectUser" id="selectUser">
						<option value="-1" selected>Todos</option>
						|-foreach from=$users item=user name=eachuser-|
						<option value="|-$user->getId()-|">|-$user->getUsername()-|</option> 
						|-/foreach-|
					</select>
				  </td>
				</tr>
				<tr> 
					<td nowrap class="style6">Fecha Desde :&nbsp;<span class="size4">(dd-mm-aaaa)</span></td>
					<td>
						<input name="dateFrom" type="text" value="|-$dateFrom-|" size="10">
						&nbsp;&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">  
					</td>
				</tr>
				<tr> 
					<td nowrap class="style6">Fecha Hasta :&nbsp;<span class="size4">(dd-mm-aaaa)</span></td>
					<td>
						<input name="dateTo" type="text" value="|-$dateTo-|" size="10">
						&nbsp;&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">  
					</td>
				</tr>
				<tr> 
					<td nowrap class="style6">Modulo :&nbsp;</td>
					<td>
						<select name="module" id="select">
						  <option value="1" selected>Todos</option>
							|-foreach from=$modules item=module name=foreacmod-|
						  <option value="|-$module-|">|-$module-|</option>
						  |-/foreach-|
						</select>
					</td>
				</tr>
				|-if count ($affiliates) gt 0 -|
				<tr> 
					<td nowrap class="style6">Afiliado :&nbsp;</td>
					<td>
						<select name="affiliate" id="select">
						  <option value="todos" selected>Todos</option>
						  |-foreach from=$affiliates item=affiliate name=foreachaff-|
						  <option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
						  |-/foreach-|
						</select>
					</td>
				</tr>
				|-/if-|
				<tr> 
					<td align="center" colspan="2"><input name="saveButton" type="submit" class="boton" id="saveButton" value="Listar"></td>
				</tr>
			 </table>
			</form>
		</td>
	</tr>
   
  <tr> 
	<td>&nbsp;</td>
  </tr>
  <tr> 
	<th class="thresultado">Administraci&oacute;n del Archivo Hist&oacute;rico</th>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr> 
	<td class="size2"> Puede eliminar registros hist&oacute;ricos 
	  en 
	  <input name="btnPurgarLogs" type="submit" class="botonchico" value="Purga de Datos" onClick="location.href='Main.php?do=logsPurge'" /> 
	</td>
  </tr> 
</table>

|-else-| 
<table width="100%"  border="0" cellpadding="5" cellspacing="0">
  <tr> 
	<td class="size2">Resultado de 
		su consulta al hist&oacute;rico de operaciones del Sistema |-if $affiliate ne '' -| del afiliado |-$affiliate->getName()-| |-/if-|
	</td>
  </tr>
  <tr> 
	<td class="nopaddingCell"> 
		<table width="100%"  border="0" cellpadding="4" cellspacing="1" class="size4">
			<tr class="thresultado"> 
				<th width="10%" nowrap scope="col"><a href='Main.php?|-$QUERY_STRING_NO_ORDER-|&order=fecha' class='thresultado'>Fecha y Hora</a></th>
				<th width="10%" scope="col"><a href='Main.php?|-$QUERY_STRING_NO_ORDER-|&order=nombre' class='thresultado'>Usuario</a></th>
				<th width="30%" scope="col"><a href='Main.php?|-$QUERY_STRING_NO_ORDER-|&order=accion'
				class='thresultado'>Modulo</a></th>
				<th width="50%" scope="col"><a href='Main.php?|-$QUERY_STRING_NO_ORDER-|&order=mensaje' class='thresultado'>Acci&oacute;n</a></th>

			</tr>
			|-if $logs|@count eq 0-|  
			<tr class="row_odd"> 
				<td colspan='4' class="size3" scope="col">No hay registros que coincidan con su consulta.
				</td>
			</tr>
			|-else-| 
			 |-foreach from=$logs item=log name=ctacte -|
			 	|-assign var=action value=$log->getSecurityAction()-|
			<tr class="|-if $smarty.section.record.rownum is even-|row_even|-else-|row_odd|-/if-|"> 
			  <td nowrap scope="col">|-$log->getDatetime()-|</td>
			  <td nowrap scope="col">
					|-$usersName[$smarty.foreach.ctacte.iteration]-|
			  </td>
			  <td scope="col" >|-if $action ne '' -| |-$action->getModule()-| |-/if-|</td>
			  <td scope="col" >|-$log->getLabel()-|:|-$log->getObject()-|</td>
			</tr>
			|-/foreach-|
			|-/if-| 
		</table>
	</td>
  </tr>
  <tr>
	<td colspan="3">|-include file="IncludePaginate.tpl"-|</td>
  </tr>
  <tr> 
	<td align="center"><input name="btnRegresar" type="button" class="boton" id="regresar" value="Regresar" onClick="location.href='Main.php?do=logsList'" /></td>
  </tr>
</table>
            
   |-/if-|
