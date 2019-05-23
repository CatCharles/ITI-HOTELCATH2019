<?php
$agregarProducto = new MvcController();
$agregarProducto->agregarProductoController();

?>
<header>
		<h1>Agregar Producto</h1>
        
</header>
<form method="post" style="width: 750px;">		
<div class="inside" style="float:left;">

            <div style="padding-top: 15px;">
            <label>Nombre: </label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" class="frm-inp" required>
			</div>
             
                       
            <div style="text-align:center;padding-top: 15px;">
            <button type="submit" name="aceptar" class="frm-submit">Terminar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
            </div>

           
</div>
<div  style="float:right;">


            <div style="padding-top: 15px;">
            <label>Precio: </label>
			<input type="number"  id="precio" name="precio" class="frm-inp" >
			</div>

</div>

</form>
