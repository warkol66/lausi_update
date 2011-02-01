<h2>##40,Configuración del Sistema##</h2>
<h1>##139,Editar categorías##</h1>
|-if $message eq "notdeleted"-|<div class='errorMessage'>##140,No se pudo eliminar la categoría porque posee datos asociados##.</div>|-/if-|
<p>##141,A continuación podrá editar la lista de categorías disponibles. Podrá Agregar, Modificar o Eliminar categorías de la lista de categorías disponibles. Sólo podrá eliminar las categorías que no tengan ningún dato asignado.##</p>
<table class='tableTdBorders' width='580' border='0' cellspacing='0' cellpadding='5' id="table_categories_list">
	<tr>
		<th class="thFillTitle">##142,Categorías Disponibles##</th>
	</tr>
	|-foreach from=$categories item=category name=for_categories-|
	<tr>
		<td class='line1'><span class='titulo2'>|-$category->getName()-|</span></td>
	</tr>
	|-/foreach-|
</table>
<br />
<table class='tableTdBorders' width='580' border='0' cellspacing='0' cellpadding='5'>
	<tr>
		<th class="thFillTitle">##143,Agregar Nueva Categoría##</th>
	</tr>
	<tr>
		<td class='cellboton'><form method='post' action="Main.php" id="form_category_add" style="display:inline;">
				<input type="text" name="name" id="name" value='' size="50" class='textodato' />
				<input type="hidden" name="do" value="categoriesDoEditX" />
				<input type="hidden" name="catid" value='<?=$catid?>' />
				<input type='button' onclick="categoriesDoEditX()" name="ncat" value="##143,Agregar##" class='smallButton' /><span id="systemWorking" style="display:none;">Agregando Categoría...</span>
			</form></td>
	</tr>
</table>
<br />
|-if $categories|@count gt 0-|
<table class='tableTdBorders' width='580' border='0' cellspacing='0' cellpadding='5'>
	<tr>
		<th class="thFillTitle">##144,Modificar o Eliminar Categoría##</th>
	</tr>
	<tr>
		<td nowrap class='cellboton'>Categorías disponibles
			<form method='get' action="Main.php" style="display:inline;">
				<select name='id' onchange="javascript:document.getElementById('select_modificar_categoria').value=this.value">
 					<option value='' selected>Seleccione ...</option>
         |-foreach from=$categories item=category name=for_categories-|
					<option value='|-$category->getId()-|'>|-$category->getName()-|</option>
          |-/foreach-|
				</select>
				&nbsp;&nbsp;
				<input type='submit' name="mcat" value="##145,Modificar##" class='smallButton' />
				<input type="hidden" name="do" value="categoriesEdit" />
			</form>
			<form method='post' action="Main.php" style="display:inline;">
				&nbsp;&nbsp;
				<input type="hidden" name="id" value="|-$categories[0]->getId()-|" id="select_modificar_categoria" />
				<input type='submit' name="dcat" value="##115,Eliminar##" class='smallButton' onclick="return confirm('##255,Esta opción elimina permanentemente esta Categoría. ¿Está seguro que desea eliminarla?##');" />
				<input type="hidden" name="do" value="categoriesDoDelete" />
		</form></td>
	</tr>
</table>
|-/if-|
