<?php
/*session_start(); // que no se te olvide iniciar el uso de sesiones. 
$vendedor = $_SESSION["vendedor"];
$idUsuario = $_SESSION["iduser"]; 

*/
$agregarVenta = new MvcController();
$agregarVenta->agregarVentaController();

?>
<header>
		<h1>Agregar Venta</h1>
        
</header>
<form method="post" style="width: 750px;">		
<div class="inside" style="float:left;">

			<div style="padding-top: 15px;">
            <label>Seleccione un producto: </label>
            <select name="producto" id="producto" required style="width: 96%;height: 45px;" onchange="ShowSelected();" required>
            <option value="0">Seleccione una posicion.</option>
                <?php 
                $productos = new Database;
                $producto = $productos->select("select * from tda_productos;");
                    foreach ($producto as $v) { ?>
                    <option value="<?php echo (int)$v["id_producto"]; ?>">
                    <?php echo utf8_encode($v["nombre"]);
                   echo "            $".$v["precio"]; ?></option>   
                <?php  }
                ?>
                </select>
			</div>
             
           
			<input type="hidden"  id="precioproducto" name="precioproducto" class="frm-inp" >
			<input type="hidden"  id="idusuarios" name="idusuarios" class="frm-inp" value="<?php echo $idUsuario;?>">

            <div style="padding-top: 15px;">
            <label>Cantidad: </label>
			<input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" onchange="resultadoPrecio(this.value);" class="frm-inp" min="1">
			</div>
            
            <div style="text-align:center;padding-top: 15px;">
            <button type="submit" name="aceptar" class="frm-submit">Terminar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
            </div>

           
</div>
<div  style="float:right;">
<?php// echo "Vendedor: ". $vendedor." id: ". $idUsuario;?>
			<div style="padding-top: 15px;">
            <label>Fecha actual: </label>
            <input type="text" readonly name="fecha_actual" id="fecha_actual" value="<?php echo $hoy = date('Y/m/d'); ?>" class="frm-inp">
			</div>

            <div style="padding-top: 15px;">
            <label>Precio total: </label>
			<input type="text" readonly id="ptotal" name="ptotal" class="frm-inp" >
			</div>

</div>

</form>
<script>
function ShowSelected()
{

/* Para obtener el resultado actualizado del producto */
var combo = document.getElementById("producto");
//se obtiene el texto
var selected = combo.options[combo.selectedIndex].text;
//se divide para obtener el precio
var resultado = selected.split("$")[1];
console.log(resultado + " resultado");
//se le asigna a un elemento oculto para acceder a el mas tarde.
document.getElementById('precioproducto').value = resultado;

}
/* Obtener el total de la venta recibe la cantidad de producto y su precio. */
function resultadoPrecio (valor) {
    //Se accede al valor oculto anteriormente
    var precioproducto = document.getElementById('precioproducto').value;
    console.log(precioproducto);
    var total = 0;	
    //en variable total se almacenara el resultado final
    valor = parseInt(valor); // Convertir el valor a un entero (número).
	console.log("valor: "+valor);
    //Se obtiene el elemento donde se escribira el resultado
    total = document.getElementById('ptotal').innerHTML;
	
    /* Se hace la operacion. */
    total = (parseInt(valor) * parseInt(precioproducto));
    //Se le da el resultado final
    document.getElementById('ptotal').value = total;
}
</script>

