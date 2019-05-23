
<?php

//session_start();

$_SESSION["validar"] = false;



?>
<!--Pestaña de inicio de sesion-->
<header>
		<h1>Iniciar sesion</h1>
</header>
<form method="post">

<div class="inside">

			<div style="text-align:center;padding-top: 15px;">
			<i class="fa fa-user frm-ico" style="padding-right: 10px;"></i>Usuario<input type="email" name="usuario" placeholder="Email" class="frm-inp" required>
			</div>

            <div style="text-align:center;padding-top: 15px;">
			<i class="fa fa-lock frm-ico" style="padding-right: 10px;"></i>Contraseña<input type="password" name="contrasena" placeholder="Contraseña" class="frm-inp" required>
			</div>

            <div style="text-align:center;padding-top: 15px;">
            <button type="submit" name="aceptar" class="frm-submit">Iniciar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
			<button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>
            <a href="index.php?action=agregar_usuario"><button type="button" name="registrar" class="frm-submit">Registrarse --<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button></a>
            </div>
</div>
</form>

<?php
$ingresa = new MvcController();
$ingresa ->ingresaUsuarioController();
?>