<script type="text/javascript" language="javascript" src="scripts/login.js"></script>
 <form method='post' action="Main.php?do=usersDoLogin"> 
	<!-- Begin Login --> 
	<div id="login"> 
		 <!-- Begin LoginTop --> 
		 <div id="loginTop"></div> 
		 <!-- End LoginTop --> 
		 <!-- Begin LoginContent --> 
		 <div id="loginContent"><br>
			<p>|- if isset($unifiedLogin) -|Selecciones el tipo de usuario e i|-else-|I|-/if-|ngrese su usuario y contraseña para ingresar al sistema</p> 
|-if $message eq "wrongUser"-|
			<div align='center' class='errorMessage'>Usuario desconocido o contraseña incorrecta!. Intente nuevamente.</div> 
			|-/if-| 
			|-if $message eq "passwordSent"-|
			<div align='center' class='successMessage'>Se envio una nueva contraseña a su casilla de correo.</div> 
			|-/if-| 
			|- if isset($unifiedLogin) -|
			|-if !$onlyAdmin -|
			<p>Tipo de Usuario
				 <select name="select"> 
					<option value="admin" selected onClick="javascript:changeActionToAdminLogin(this.form)">Administrador&nbsp;&nbsp;&nbsp;</option> 
					<option value="dependency" onClick="javascript:changeActionToDependecy(this.form)">Dependencia&nbsp;&nbsp;&nbsp;</option> 
				</select> 
			 </p> 
			|-/if-|
			|-/if-|
			<p></p> 
			<h1>Usuario</h1> 
			<p><input type='text' name='username' size='35' class="inputLogin"/> 
			 </p> 
			<h1>Contraseña</h1> 
			<p><input type='password' name='password' size='20' class="inputLogin" /> 
			 </p> 
		</div> 
		 <!-- End LoginContent --> 
		 <!-- Begin LoginBottom --> 
		 <div id="loginBottom"> 
			<input type='submit' value='Ingresar' id="loginButton" /> 
		</div> 
		 <!-- End LoginBottom --> 
	 </div> 
	<!-- End Login --> 
	<script>
	self.moveTo(0,0); self.resizeTo(screen.availWidth,screen.availHeight)
	self.focus()
</script> 
</form> 
