<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Niveles de Usuarios</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edicion"-|
	<p class='paragraphEdit'>Realice los cambios en el nivel de usuarios y haga click en "Aceptar" para guardar las modificaciones.</p>
|-else-|
	<p>A continuación podrá editar la lista de niveles de usuarios.</p>
|-/if-|
|-if $message eq "deleted"-|
<div align='center' class='successMessage'>##181,Nivel de Usuarios eliminado##</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='errorMessage'>##182,Ha ocurrido un error al intentar guardar la información del nivel de usuarios##</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='successMessage'>##183,Nivel de Usuarios guardado##</div>
|-/if-|
|-if $message eq "blankName"-|
<div align='center' class='errorMessage'>##184,El Nivel de Usuarios debe tener un Nombre##</div>
|-/if-|
|-if $accion eq "edicion"-|
<form method='post' action='Main.php?do=usersLevelsDoEdit'>
	<input type='hidden' name='id' value='|-$currentLevel->getId()-|' />
	<table class='tableTdBorders' cellpadding='5' cellspacing='0'>
		<tr>
			<th colspan="2" class="thFillTitle">##187,Editar nombre del Nivel ##</th>
		</tr>
		<tr>
			<td nowrap="nowrap" class='size2'>##196,Nombre del Nivel##</td>
			<td class='size2'><input name='name' type='text'  class='textodato' value='|-$currentLevel->getName()-|' size="70" /></td>
		</tr>
		<tr>
			<td class='buttonCell' colspan='2'><input type="hidden" name="accion" value="edicion" />
				<input type='submit' name='guardar' value='##97,Guardar##'  class='button' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='button'  />
			</td>
		</tr>
	</table>
</form>
|-/if-| <br />
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
	<tr>
		<th width="90%" nowrap="nowrap" class="thFillTitle">##194,Niveles de Usuarios del Sistema ##</th>
		<th width="10%" class="thFillTitle">&nbsp;</th>
	</tr>
	|-foreach from=$levels item=level name=for_levels-|
	<tr>
		<td class="size2"><div class='titulo2'>|-$level->getName()-|</div></td>
		<td class='tdSize1 cellTextOptions center' nowrap> [ <a href='Main.php?do=usersLevelsList&level=|-$level->getId()-|' class='edit'>##114,Editar##</a> ]
			|-if $level->getId() gt 3-|[ <a href='Main.php?do=usersLevelsDoDelete&level=|-$level->getId()-|' class='delete' onclick="return confirm('##256,Esta opción elimina permanentemente a este Nivel. ¿Está seguro que desea eliminarlo?##');">##115,Eliminar##</a> ]|-else-|[ <span class='deactivated'>##115,Eliminar##</span> ] |-/if-|</td>
	</tr>
	|-/foreach-|
	<tr>
		<td colspan='2'><form action='Main.php' method='post'>
				##195,Agregar Nivel de Usuarios##&nbsp;&nbsp;
				<input type="hidden" name="do" value="usersLevelsDoEdit" />
				<input type="text" name="name" value="" />
				<input type='submit' value='##123,Agregar##' class='button' />
			</form></td>
	</tr>
</table>
