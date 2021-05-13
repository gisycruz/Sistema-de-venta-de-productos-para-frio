
<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Ingresar su cuenta</p>
    <form  action ="<?php  echo FRONT_ROOT."User/validateUser"?>" method = "post" class="login-form bg-dark-alpha p-5 bg-light">
            <?php if(isset($message) && !empty($message)){ echo "<div class =div-errorLogin >" . $message . "</div>" ;}?>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input"  type="email"  name ="email" id="email" placeholder="Ingresar usuario" required>
			    <label class="mdl-textfield__label" for="email" >Usuario</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input"  type="password"  name= "password" id="password"  placeholder="Ingresar constraseña" required>
			    <label class="mdl-textfield__label" for="password">Contraseña</label>
			</div>
			<button type="submit" id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				Ingresar <i class="zmdi zmdi-mail-send"></i>
			</button>
		</form>
	</div>
</body>