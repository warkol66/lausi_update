<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Dependencias</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edicion"-|
	<p class='paragraphEdit'>##180,Realice los cambios en la dependencia y haga click en "Aceptar" para guardar las modificaciones. ##</p>
|-else-|
	<p>A continuación podrá editar la lista de Dependencias del sistema.</p>
|-/if-|
|-if $message eq "deleted"-|
<div align='center' class='successMessage'>Dependencia eliminado</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='errorMessage'>Ha ocurrido un error al intentar guardar la información. Intente nuevamente.</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='successMessage'>##183,Grupo de Usuarios guardado##</div>
|-/if-|
|-if $message eq "edited"-|
<div align='center' class='successMessage'>##183,Dependencia guardada##</div>
|-/if-|
|-if $message eq "blankName"-|
<div align='center' class='errorMessage'>##184,El Grupo de Usuarios debe tener un Nombre##</div>
|-/if-|
|-if $message eq "notAddedToGroup"-|
<div align='center' class='errorMessage'>##185,Ha ocurrido un error al intentar agregar la categoría al grupo##</div>
|-/if-|
|-if $message eq "notRemovedFromGroup"-|
<div align='center' class='errorMessage'>##186,Ha ocurrido un error al intentar eliminar la categoría del grupo##</div>
|-/if-|
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='3' class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch" style="display:inline;">Busqueda por nombre</a><div id="divSearch" style="display:none;"><form action='Main.php' method='get' style="display:inline;">
				<input type="hidden" name="do" value="affiliatesList" />
				Nombre: <input name="name" type="text" value="" size="30" />
				&nbsp;&nbsp;<input type='submit' value='Buscar' class='tdSearchButton' />
			</form></div></td>
		
	</tr>
	|-if $allFlag eq 1-|
	<tr>
		<th colspan='3'><a href='Main.php?do=affiliatesList'>Volver a la selección de dependencias</a></th>
	</tr>
	|-/if-|
	<tr>
		 <th colspan="3" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesAddAffiliate" class="agregarNueva">Agregar Dependencia</a></div></th>
	</tr>
	|-foreach from=$affiliates item=affiliate name=for_affiliate-|
	<tr>
		<td width="5%" class='tdSize1'><div>|-$affiliate->getId()-|</div></td>
		<td width="85%" class='tdData'><div class='titulo2'>|-$affiliate->getName()-|</div></td>
		<td width="10%" nowrap class='cellTextOptions'>[ <a href='Main.php?do=affiliatesViewAffiliate&id=|-$affiliate->getId()-|' class='detail'>Ver datos</a> ] [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|' class='edit'>##114,Editar##</a> ]
			[ <a href='Main.php?do=affiliatesDoDelete&affiliate=|-$affiliate->getId()-|' class='delete' onclick="return confirm('##256,Esta opción eliminar permanentemente a este Grupo. ¿Está seguro que desea eliminarlo?##');">##115,Eliminar##</a> ]</td>
	</tr>
	|-/foreach-|
	<tr>
		<td colspan="3" class="pages">|-include file="PaginateInclude.tpl"-|</td>
	</tr>
	<tr>
		 <th colspan="3" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesAddAffiliate" class="agregarNueva">Agregar Dependencia</a></div></th>
	</tr>
</table>
