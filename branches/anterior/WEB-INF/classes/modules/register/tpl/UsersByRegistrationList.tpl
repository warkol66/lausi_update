<h2>##40,Configuración del Sistema##</h2>
<h1>##151,Administración de Usuarios Registrados##</h1>
<p>##152,A continuación podrá editar la lista de usuarios por registracion##</p>
|-if $message eq "deleted"-|
<div class='successMessage'>##153,Usuario eliminado##</div>
|-/if-|
|-if $message eq "saved"-|
<div class='successMessage'>##157,Usuario guardado##</div>
|-/if-|
|-if $message eq "created"-|
<div class='successMessage'>##157,Usuario creado##</div>
|-/if-|
<div align='center'><a href="Main.php?do=usersByRegistrationEdit">Crear Nuevo Usuario</a></div>

	<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>Nombre de Usuario</th>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Opciones</th>
	</tr>
	
	|-foreach from=$users item=user-|
	<tr>	
		|-assign var="userinfo" value=$user->getUserInfo()-|
		<td>|-$user->getUsername()-|</td>
		<td>|-$userinfo->getSurname()-|</td>
		<td>|-$userinfo->getName()-|</td>
		<td>|-$userinfo->getMailAddress()-|</td>
		<td nowrap>[&nbsp;<a href="Main.php?do=usersByRegistrationEdit&id_registered_user=|-$user->getId()-|">Editar</a>&nbsp;] [&nbsp;<a href="Main.php?do=usersByRegistrationDoDelete&id_registered_user=|-$user->getId()-|">Eliminar</a>&nbsp;]</td>
	</tr>
	|-/foreach-|
</table>
	
