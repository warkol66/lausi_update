<h2>##40,Configuración del Sistema##</h2>
<h1>##178,Administración de Grupos de Usuarios##</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edicion"-|
	<p class='paragraphEdit'>##180,Realice los cambios en el grupo de usuarios y haga click en "Aceptar" para guardar las modificaciones. ##</p>
|-else-|
	<p>##179,A continuación podrá editar la lista de grupos de usuarios, permitiendo, al editar el grupo, modificar las categorías que pueden acceder los usuarios miembros del grupo.##</p>
|-/if-|
|-if $message eq "deleted"-|
<div align='center' class='successMessage'>##181,Grupo de Usuarios eliminado##</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='errorMessage'>##182,Ha ocurrido un error al intentar guardar la información del grupo de usuarios##</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='successMessage'>##183,Grupo de Usuarios guardado##</div>
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
|-if $accion eq "edicion"-|
<form method='post' action='Main.php?do=usersGroupsDoEdit'>
	<input type='hidden' name='id' value='|-$currentGroup->getId()-|' />
	<table class='tableTdBorders' cellpadding='5' cellspacing='0'>
		<tr>
			<th colspan="2">##187,Editar nombre del Grupo ##</th>
		</tr>
		<tr>
			<td nowrap="nowrap" class='size2'>##196,Nombre del Grupo##</td>
			<td class='size1size2'><input name='name' type='text'  class='textodato' value='|-$currentGroup->getName()-|' size="70" /></td>
		</tr>
		<tr>
			<td class='cellboton' colspan='2'><input type="hidden" name="accion" value="edicion" />
				<input type='submit' name='guardar' value='##97,Guardar##'  class='boton' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='boton'  />
			</td>
		</tr>
	</table>
</form>
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<th colspan="2" class="thFillTitle">##188,El grupo## |-$currentGroup->getName()-| ##189,tiene acceso a las siguientes categorías:##</th>
	</tr>
	|-if $currentGroupCategories|@count eq 0-|
	<tr>
		<td class='tdSize1'colspan="2"><div class='titulo2'>##190,El grupo todavía no posee acceso a ninguna categoría.##</div></th>
	</tr>
	|-else-|
	<tr>
		<th width="90%" class="thFillTitle">##191,Categorías##</th>
		<th width="10%" class="thFillTitle">&nbsp;</th>
	</tr>
	|-foreach from=$currentGroupCategories item=groupCategory name=for_group_category-|
	|-assign var="category" value=$groupCategory->getCategory()-|
	<tr>
		<td class='size2'><div class='titulo2'>|-$category->getName()-|</div></td>
		<td class='tdSize1 cellTextOptions center' nowrap> [ <a href="Main.php?do=usersGroupsDoRemoveCatFromGroup&category=|-$category->getId()-|&group=|-$currentGroup->getId()-|" class='elim' onclick="return confirm('##257,Esta opción remueve el acceso del grupo a la categoría. ¿Está seguro que desea eliminarlo?##');">##192,Eliminar acceso##</a> ] </td>
	</tr>
	|-/foreach-|
	|-/if-|
	<tr>
		<td class='tdSize1' colspan='2'><form action='Main.php' method='post'>
				##193,Agregar categoría##&nbsp;&nbsp;
				<input type="hidden" name="do" value="usersGroupsDoAddCategoryToGroup" />
				<select name="category">
					<option value="" selected="selected">##103,Seleccione una categoría##</option>
						|-foreach from=$categories item=category name=for_categories-|
					<option value="|-$category->getId()-|">|-$category->getName()-|</option>
						|-/foreach-|
				</select>
				<input type="hidden" name="group" value="|-$currentGroup->getId()-|" />
				<input type='submit' value='##123,Agregar##' class='boton' />
			</form></td>
	</tr>
</table>
|-/if-| <br />
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
	<tr>
		<th width="90%" nowrap="nowrap" class="thFillTitle">##194,Grupo de Usuarios del Sistema ##</th>
		<th width="10%" nowrap="nowrap" class="thFillTitle">&nbsp;</th>
	</tr>
	|-foreach from=$groups item=group name=for_groups-|
	<tr>
		<td class='size2'><div class='titulo2'>|-$group->getName()-|</div></td>
		<td class='tdSize1 cellTextOptions center' nowrap> [ <a href='Main.php?do=usersGroupsList&group=|-$group->getId()-|' class='edit'>##114,Editar##</a> ]
|-if $group->getId() lt 4 -|
			[ <span class='deactivated'>##115,Eliminar##</span> ] 
|-else-|
			[ <a href='Main.php?do=usersGroupsDoDelete&group=|-$group->getId()-|' class='delete' onclick="return confirm('##256,Esta opción eliminar permanentemente a este Grupo. ¿Está seguro que desea eliminarlo?##');">##115,Eliminar##</a> ] 
|-/if-|</td>
	</tr>
	|-/foreach-|
	<tr>
		<td class='celldato' colspan='2'><form action='Main.php' method='post'>
				##195,Agregar Grupo de Usuarios##&nbsp;&nbsp;
				<input type="hidden" name="do" value="usersGroupsDoEdit" />
				<input type="text" name="name" value="" />
				<input type='submit' value='##123,Agregar##' class='boton' />
			</form></td>
	</tr>
</table>
