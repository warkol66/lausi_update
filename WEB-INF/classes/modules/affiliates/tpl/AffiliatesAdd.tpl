<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Dependencias</h1>
<!-- Link VOLVER --> 
<!-- /Link VOLVER --> 
|-if $accion eq "edicion"-|
<p class='paragraphEdit'>##180,Realice los cambios en la dependencia y haga click en "Guardar Cambios" para guardar las modificaciones. ##</p>
|-else-|
<p>A continuación podrá editar la información de las dependencias.</p>
|-/if-|
<form method="post" action="Main.php?do=affiliatesDoAddAffiliate"> 
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th class="thFillTitle" colspan="2">Agregar Dependencia</th> 
		</tr> 
		<tr> 
			<th colspan="2" class="size2">Ingrese los datos de la nueva depedencia </th> 
		</tr> 
		<tr> 
			<td width="20%" nowrap class="tdTitle">Dependencia</td> 
			<td width="80%"> <input name="name" type="text" value="" size="80"> </td> 
		</tr> 
		<tr> 
			<td width="20%" nowrap class="tdTitle">Titular</td> 
			<td width="80%"> <input name="holder" type="text" value="" size="60"> </td> 
		</tr> 
		<tr> 
			<td width="20%" nowrap class="tdTitle">Funcionario Enlace </td> 
			<td width="80%"> <input name="directionBoardContact" type="text" value="" size="60"> </td> 
		</tr> 
		<tr> 
			<td nowrap class="tdTitle">Teléfono</td> 
			<td> <input name="telephone" type="text" value="" size="50"> </td> 
		</tr> 
		<tr> 
			<td nowrap class="tdTitle">Teléfono Extra</td> 
			<td> <input name="extraTelephone" type="text" value="" size="50"> </td> 
		</tr> 
		<tr> 
			<td nowrap class="tdTitle">E-mail</td> 
			<td> <input name="email" type="text" value="" size="60"> </td> 
		</tr> 
		<tr> 
			<td width="20%" nowrap class="tdTitle">Responsable</td> 
			<td width="80%"> <input name="responsible" type="text" value="" size="60"> </td> 
		</tr> 
		<tr> 
			<th colspan="2" class="size2">Ingrese los datos del usuario administrador de la nueva dependencia</th> 
		</tr> 
		<tr> 
			<td nowrap="nowrap" class='tdTitle'>##162,Identificación del Usuario Administrador##</td> 
			<td><input name='username' type='text'  class='textodato' value='' size="40" /></td> 
		</tr> 
		<tr> 
			<td class='tdTitle'>##163,Nombre##</td> 
			<td><input name='nameuser' type='text'  class='textodato' value='' size="70" /></td> 
		</tr> 
		<tr> 
			<td class='tdTitle'>##164,Apellido##</td> 
			<td><input name='surname' type='text'  class='textodato' value='' size="70" /></td> 
		</tr> 
		<tr> 
			<td class='tdTitle'>E-mail</td> 
			<td><input name='mailAddress' type='text'  class='textodato' value='' size="70" /></td> 
		</tr> 
		<tr> 
			<td class='tdTitle'>##165,Contraseña##</td> 
			<td><input name='pass' type='password' class='textodato' value='' size="20" /></td> 
		</tr> 
		<tr> 
			<td class='tdTitle'>##166,Repetir Contraseña##</td> 
			<td><input name='pass2' type='password' class='textodato' value='' size="20" /></td> 
		</tr> 
		<tr align="right"> 
			<td colspan="2"> <input name="save" type="submit" class="botonchico" value="Agregar Dependencia"> </td> 
		</tr> 
	</table> 
</form>
