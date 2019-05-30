<?php
$con = new Database();
$habitacion = $con->select("SELECT id_habitacion,
(SELECT precio from tipos_hab tb where tb.id = h.id_tipos_hab) as precio, 
(SELECT nombre from tipos_hab tb where tb.id = h.id_tipos_hab) as tipo,
(SELECT tamano from tipos_hab tb where tb.id = h.id_tipos_hab) as tamano
FROM habitaciones h where ocupada = 0");
$cliente = $con->select("select id_cliente,nombre, (select nombre from tipos_cliente tp where tp.id_tipo_cliente = c.id_tipo_cliente) as tipo
from clientes c");
	//Se manda a llamar a la clase MVC
	$editarReserva = new MvcController();
	//Se habla al metodo que solicita la consulta de dicho usuario elegido
	$reserva = $editarReserva -> editarReservaController(); //se pasa a una variable
   //Se habla al metodo que actualizara los campos modificados.
	$editarReserva -> actualizarReservaController();
//La variable que esta sea recorrida y sea incerttada en los campos indicados y facilitar su edicion.
	foreach($reserva as $c){
?>
<header>
		<h1>Modificaciar a reserva</h1>
</header>

<form method="post">
  

<div class="box-content card white">
					<h4 class="box-title">Información de la reserva.</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
								<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-usd"></i></label></div>
							<!-- /.input-group-btn -->
							<select class="form-control" name="ophabitacion" required>
								<option value="">Seleccione una habitación</option>
								 <option value="<?php echo (int) $c["id_habitacion"]; ?>" selected>
                <?php echo 'Num de habitación: '.($c["id_habitacion"]).'    Precio: $'.$c["precio"].'     Tipo: '.$c["tipohab"];?>
                </option>
                <?php 
                foreach($habitacion as $t){								?>               
								<option value="<?php echo (int) $t["id_habitacion"]; ?>" >
                <?php echo 'Num de habitación: '.($t["id_habitacion"]).'    Precio: $'.$t["precio"].'     Tipo: '.$t["tipo"];?>
                </option>
								
								<?php
								}
								?>
							</select>
						</div>
						<!-- /.input-group -->
						
								<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-usd"></i></label></div>
							<!-- /.input-group-btn -->
							<select class="form-control" name="opcliente" required>
								<option value="">Seleccione un cliente</option>
								<option value="<?php echo (int) $c["id_cliente"]; ?>" selected>
                <?php echo 'Nombre: '.($c["nombre"]).'    Tipo de cliente:'.$c["tipo"];?>
                </option>
                <?php 
                foreach($cliente as $t){
								if($c["id_cliente"] ==  $t["id_cliente"]){}
								else{?>
                <option value="<?php echo (int) $t["id_cliente"]; ?>">
                <?php echo 'Nombre: '.($t["nombre"]).'    Tipo de cliente:'.$t["tipo"];?>
                </option>
                <?php
                }
								}
                ?>
							</select>
						</div>
						<!-- /.input-group -->
						
							<div class="form-group">
									<label class="control-label col-sm-4">Fecha de entrada y fecha de salida</label>
									<div class="col-sm-8">
										<div class="input-daterange input-group" id="date-range">
											<input type="text" class="form-control" name="start" value = "<?php echo $c["fecha_entrada"]?>" required />
											<span class="input-group-addon bg-primary text-white">a</span>
											<input type="text" class="form-control" name="end"  value = "<?php echo $c["fecha_salida"]?>" required/>
										</div>
									</div>
								</div>
				
						<div class="input-group margin-bottom-20">
							<label class="control-label col-sm-4">¿La reserva ha finalizado?</label>
							<div class="checkbox info" style="
    padding-left: 0.5cm;
"><input type="checkbox" name="fina" id="checkbox-4"><label for="checkbox-4">Selecione si ha finalizado.</label></div>
							<input type="hidden" name="iddd" value="<?php echo $c["id_reservacion"]?>">
						</div>
            	<div class="input-group">
            <button type="submit" name="avanza" class="btn btn-info waves-effect waves-light">Modificar reserva <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </div>
  
					<!-- /.card-content -->
				</div>
 </form>
<?php
	}//cierra foreach de res

	?>
