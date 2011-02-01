<h2>##40,Configuración del Sistema##</h2>
<h1>##139,Editar categorías##</h1>
<p>##254,A continuación podrá editar las propiedades de la categoría. Para cambiar el nombre modifique el texto y presione aceptar. Para modificar la cantidad de Actores clave de la categoría ingrese el número en la casilla correspondiente. Para finalizar, haga click en "Aceptar" para guardar los cambios.##</p>
<form method='post'>
<table class='tableTdBorders' width='580' border='0' cellspacing='0' cellpadding='5' id="table_categories_edit">
		<tr>
			<th class="thFillTitle">##146,Editar Categoría##</th>
		</tr>
		<tr>
			<td nowrap="nowrap" class='tdTitle'>##147,Nombre de la categoría##&nbsp;&nbsp;
			<input name="name" type="text" value='|-$category->getName()-|' size="50" class='textodato' /></td>
		</tr>
		<tr>
			<td class='cellboton'><input type="hidden" name="id" id="id" value="|-$category->getId()-|" />
				<input type="hidden" name="accion" id="accion" value="edicion" />
				<input type="hidden" name="do" id="do" value="categoriesDoEdit" />
				<input type='submit' name="ncat" value="##149,Aceptar##" class='button' />
			</td>
		</tr>
	</table>
</form>
