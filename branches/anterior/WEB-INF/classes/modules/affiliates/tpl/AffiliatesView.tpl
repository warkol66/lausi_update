<h2>Tablero de Control</h2>
<h1>Dependencias</h1>
<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Dependencia</td> 
		<td> |-$affiliate->getId()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Nombre:</td> 
		<td>|-$affiliate->getName()-|</td> 
	</tr> 
	|-if $flag ne 1 -|
	<tr> 
		<td width="20%" nowrap class="tdTitle">Titular</td> 
		<td> |-$affiliateInfo->getHolder()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Contacto</td> 
		<td> |-$affiliateInfo->getDirectionBoardContact()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Teléfono</td> 
		<td> |-$affiliateInfo->getTelephone()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Teléfono Extra</td> 
		<td> |-$affiliateInfo->getExtraTelephone()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">E-mail</td> 
		<td> |-$affiliateInfo->getEmail()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Responsible</td> 
		<td> |-$affiliateInfo->getResponsible()-| </td> 
	</tr> 
	|-/if-|
	<tr align="right"> 
		<td colspan="2"><a href='Main.php?do=affiliatesList'>Volver</a></td> 
	</tr> 
</table>
