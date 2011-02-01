<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
	<div>
		|-assign var="userInfo" value=$loginRegisteredUser->getUserInfo()-|
		|-$userInfo->getName()-|, |-$userInfo->getSurname()-| - Bienvenido al Sistema |-$parameters.siteName-|
	</div>
	</tr>
	<tr>	
		<div><a href="Main.php?do=usersByRegistrationEdit">Editar Opciones de la Cuenta.</a></div>
		<div><a href="Main.php?do=usersByRegistrationDoLogout">Cerrar Sesion</a></div>
	</tr>
</table>

	
