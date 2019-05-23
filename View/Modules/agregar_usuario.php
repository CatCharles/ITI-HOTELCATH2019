<?php

$agregarUsuario = new MvcController();
$agregarUsuario->agregarUsuarioController();

?>
<header>
		<h1>Agregar Usuario</h1>
        
</header>
<form method="post" style="width: 750px;">		
<div class="inside" style="float:left;">


            <div style="padding-top: 15px;">
            <label>Nombre: </label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Apellido materno: </label>
			<input type="text" name="apMaterno" id="apMaterno" placeholder="Apellido Materno" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Email: </label>
			<input type="email" name="email" id="email" placeholder="Ingrese su correo" class="frm-inp" required>
			</div>        
           
            <div style="text-align:center;padding-top: 15px;">
            <button type="submit" name="aceptar" class="frm-submit">Terminar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
            </div>

           
</div>
<div  style="float:right;">

            <div style="padding-top: 15px;">
            <label>Apellido paterno: </label>
			<input type="text" name="apPaterno" id="apPaterno" placeholder="Apellido Paterno" class="frm-inp" required >
			</div>

            <div style="padding-top: 15px;">
            <label>Nombre de usuario: </label>
			<input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Contraseña: </label>
			<input type="text" name="contrasena" id="contrasena" placeholder="Contraseña" class="frm-inp" required>
			</div>

			

</div>

</form>