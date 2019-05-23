
<header>
		<h1>Editar Producto</h1>
        
</header>
<form method="post" style="width: 750px;">		

<?php

	$editarProducto = new MvcController();
	$editarProducto -> editarProductoController();
	
	$editarProducto -> actualizarProductoController();

	?>
</form>