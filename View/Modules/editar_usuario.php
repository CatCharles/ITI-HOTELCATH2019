
<header>
		<h1>Editar Usuario</h1>
        
</header>
<form method="post" style="width: 750px;">		

<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarUsuarioController();
	$editarUsuario -> actualizarUsuarioController();

	?>
</form>