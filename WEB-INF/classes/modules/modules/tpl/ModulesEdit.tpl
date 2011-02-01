<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema - Administración de Módulos  </td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Administrar Módulo: |-$module->getName()|capitalize-|</td> 
  </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">A continuación podrá cambiar la etiqueta del nombre del módulo y su descripción. Estos cambios no alteran la funcionalidad de los módulos, son sólo los nombres y descripciones que se le  mostrarán al usuario.</td> 
  </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table>
<form name="moduleEdit" action="Main.php?do=modulesDoEdit" method="POST">
<input type=hidden name="moduleName" value="|-$module->getName()-|" />
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<td class="tdTitle">Módulo</td>
			<td class="tdTitle">|-$module->getName()|capitalize-|</td>			
		</tr>
		<tr> 
			<td class="tdTitle">Etiqueta</td>
			<td class="tdSize1"><input name="label" type="text" value="|-$module->getLabel()-|" size="50" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Descripción</td>
			<td class="tdSize1">
				<textarea name="description" cols="40" rows="4" wrap="VIRTUAL">|-$module->getDescription()-|</textarea>
			</td>
		</tr> 
		<tr>
			<td colspan="2" class="buttonCell">
				<input type="submit" name="Activar" value="Guardar Cambios" class="button"/>
			</td> 
		</tr>
</table> 
</form>