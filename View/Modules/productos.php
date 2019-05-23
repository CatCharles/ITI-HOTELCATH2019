<?php

session_start();

if(($_SESSION["validar"])==0){

	header("location:index.php?action=index");

	exit;
}
else{
    
}

?>

<header>
		<h1>Productos</h1>
</header>
<div style="text-align: right;">
<a href="index.php?action=agregar_producto"><input type="button" name="aceptar" class="frm-submit" value = "Agregar Producto"><i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></a>

</div>

<div>
  <!-- Tabla de muestreo de datos -->
  <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
						<th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                        $vistaVenta = new MvcController();
                        $vistaVenta -> vistaProductosController();

                        if(isset($_GET["action"])){

                            if($_GET["action"] == "fallo"){
                        
                                echo "Fallo al ingresar";
                            
                            }
                        
                        }
                
				?>                         
                </tbody>
            </table>
</div>
