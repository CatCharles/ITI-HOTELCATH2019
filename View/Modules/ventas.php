<?php

/*session_start();

if(($_SESSION["validar"])==0){

	header("location:index.php?action=index");

	exit;
}
else{
    
}
*/
?>

<header>
		<h1>Ventas</h1>
</header>
<div style="text-align:left;">
<?php
$bd = new Database();
$hoy=date("Y/m/d");
$res = $bd->select("select sum(total)as suma from tda_ventas where fecha ='$hoy';");
foreach($res as $r){ $rr= $r["suma"];}

?>
<label >Total vendido actual: </label>
<label> $ <?php echo $rr;?> </label>
</div>
<div style="text-align: right;">
<a href="index.php?action=agregar_venta"><input type="button" name="aceptar" class="frm-submit" value = "Agregar Venta"><i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></a>

</div>


<div>
  <!-- Tabla de muestreo de datos -->
  <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Vendedor</th>
                        <th>Fecha</th>
						<th>Total</th>
						<th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                        $vistaVenta = new MvcController();
                        $vistaVenta -> vistaVentasController();

                        if(isset($_GET["action"])){

                            if($_GET["action"] == "fallo"){
                        
                                echo "Fallo al ingresar";
                            
                            }
                        
                        }
                
				?>                         
                </tbody>
            </table>
</div>


<div>
  <!-- Tabla de muestreo de datos -->
  <h1>Muestreo general</h1>

  <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
						<th>Total</th>
						
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                        $vistaVenta = new MvcController();
                        $vistaVenta -> vistaVentasTicketController();

                        if(isset($_GET["action"])){

                            if($_GET["action"] == "fallo"){
                        
                                echo "Fallo al ingresar";
                            
                            }
                        
                        }
                
				?>                         
                </tbody>
            </table>
</div>