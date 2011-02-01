<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Dependencias</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edicion"-|
	<p class='paragraphEdit'>##180,Realice los cambios en la dependencia y haga click en "Guardar Cambios" para guardar las modificaciones. ##</p>
|-else-|
	<p>A continuación podrá editar la lista de Dependencias del sistema.</p>
|-/if-|
<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">
	<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tableTdBorders">
		<tr>
			<td colspan="2" class="size2">Realice los cambios y para guardar haga click en "Guardar Cambios"</td>
		</tr>
		 <tr> 
			 <td width="20%" nowrap class="tdTitle">ID</td>
			<td width="80%"> 
				 <input name="affiliateId" type="text" value="|-$affiliate->getId()-|" size="4" disabled>
		   </td>
		 </tr>
		 <tr> 
			 <td class="tdTitle">Nombre:</td>
			 <td><input name="name" type="text" value="|-$affiliate->getName()-|" size="60"></td>
		 </tr>
		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </td>
		 </tr>
	</table>
<br />
 [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|&editInfo=1' class='edit'>Editar datos Internos</a> ]	</form>
<br />
<br />
	|-if $editInfo eq 1 -|	
	<form method="post" action="Main.php?do=affiliatesDoEditInfo">	
		<input name="id" type="hidden" value="|-$affiliate->getId()-|">
		<input name="flag" type="hidden" value="|-$flag-|">
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders">		 
		<tr>
			<td width="20%" nowrap class="tdTitle">Titular de la Dependencia </td>
			<td width="80%"> 
				<input name="holder" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getHolder()-||-/if-|" size="60"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Funcionario enlace </td>
			<td width="80%"> 
				<input name="directionBoardContact" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getDirectionBoardContact()-||-/if-|" size="60"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Teléfono</td>
			<td width="80%"> 
				<input name="telephone" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getTelephone()-||-/if-|" size="35"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">TeléfonoExtra</td>
			<td width="80%"> 
				<input name="extraTelephone" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getExtraTelephone()-||-/if-|" size="35"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">E-mail</td>
			<td width="80%"> 
				<input name="email" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getEmail()-||-/if-|" size="45"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Responsable</td>
			<td width="80%"> 
				<input name="responsible" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getResponsible()-||-/if-|" size="60"> 
			</td>
		</tr>

		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </td>
		 </tr>
	 </table>
</form>
|-/if-|
</table>

 
