<h2>Bienvenido al Sistema |-$parameters.siteName-|</h2> 
				|-if $message eq "error_fields"-|
<div align='center' class='errorMessage'>Error. Complete todos los campos correctamente.</div>
				|-/if-|
				|-if $message eq "error_passwd"-|
<div align='center' class='errorMessage'>Error. Los passwords proporcionados no concuerdan.</div>
				|-/if-|
				|-if $message eq "error_username_used"-|
<div align='center' class='errorMessage'>El nombre de usuario se encuentra en uso, por favor ingrese uno distinto.</div>
				|-/if-|

			<form method='post' action="Main.php?do=usersByRegistrationDoEdit"> 
				<center> 
					<table width='520' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'> 
						<tr> 
							<td colspan='2' class='tdTitle'>Registro de Usuarios.</td> 
						</tr> 
						<tr> 
							<td width='20%' nowrap class='tdTitle'>Identificación de Usuario</td> 
							<td class='tdData'>
								<input type='text' name='username' size='35' value="|-if isset($userByRegistration)-||-assign var="userinfo" value=$userByRegistration->getUserInfo()-||- $userByRegistration->getUsername() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.username-||-/if-|"/>
							</td> 
						</tr> 
						<tr> 
							<td class='tdTitle'>Contraseña</td> 
							<td class='tdData'>
								<input type='password' name='password' size='20' />
							</td> 
						</tr>
						<tr>
							<td class='tdTitle'>Reingrese Contraseña</td> 
							<td class='tdData'>
								<input type='password' name='check_password' size='20' />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Apellido</td> 
							<td class='tdData'>
								<input type='text' name='surname' size='20' value="|-if isset($userinfo)-||- $userinfo->getSurname() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.surname-||-/if-|" />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Nombre</td> 
							<td class='tdData'>
								<input type='text' name='name' size='20'value="|-if isset($userinfo)-||- $userinfo->getName() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.name-||-/if-|" />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Email</td> 
							<td class='tdData'>
								<input type='text' name='email' size='20' value="|-if isset($userinfo)-||- $userinfo->getMailAddress() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.email-||-/if-|" />
								
							</td> 
 						</tr>
						<tr> 
							<td colspan='2' class='buttonCell' align='center'>
								|-if isset($userByRegistration) or isset($values.user_id) -|
									<input type='hidden' name="action" value='update' class='button' />
									<input type='hidden' name="user_id" value='|- if isset($userByRegistration) -||-$userByRegistration->getId() -||-else-||-$values.user_id -||-/if-|'/>
								|- else -|
									<input type='hidden' name="action" value='new' class='button' />
								|-/if-|
									<input type='submit' value='Guardar' class='button' />
								
							</td> 
						</tr> 
					</table> 
				</center> 
			</form> 
			<br /> 
			<br /> 
			<br /> 
			<script>
	self.moveTo(0,0); self.resizeTo(screen.availWidth,screen.availHeight)
	self.focus()
</script> 
			<!--inicio de pie --> </td> 
	</tr> 
</table>
