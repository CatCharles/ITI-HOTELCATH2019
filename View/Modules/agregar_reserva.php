<?php
$con = new Database();
$habitacion = $con->select("SELECT id_habitacion,
(SELECT precio from tipos_hab tb where tb.id = h.id_tipos_hab) as precio, 
(SELECT nombre from tipos_hab tb where tb.id = h.id_tipos_hab) as tipo,
(SELECT tamano from tipos_hab tb where tb.id = h.id_tipos_hab) as tamano
FROM habitaciones h where ocupada = 0");
$cliente = $con->select("select id_cliente,nombre, (select nombre from tipos_cliente tp where tp.id_tipo_cliente = c.id_tipo_cliente) as tipo
from clientes c");
?>
<header>
		<h1>Registrar reserva</h1>
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
                <?php 
                foreach($habitacion as $t){?>
                <option value="<?php echo (int) $t["id_habitacion"]; ?>">
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
                <?php 
                foreach($cliente as $t){?>
                <option value="<?php echo (int) $t["id_cliente"]; ?>">
                <?php echo 'Nombre: '.($t["nombre"]).'    Tipo de cliente:'.$t["tipo"];?>
                </option>
                <?php
                }
                ?>
							</select>
						</div>
						<!-- /.input-group -->
						
							<div class="form-group">
									<label class="control-label col-sm-4">Fecha de entrada y fecha de salida</label>
									<div class="col-sm-8">
										<div class="input-daterange input-group" id="date-range">
											<input type="text" class="form-control" name="start" required />
											<span class="input-group-addon bg-primary text-white">a</span>
											<input type="text" class="form-control" name="end" required/>
										</div>
									</div>
								</div>
				
            	<div class="input-group">
            <button type="submit" name="avanza" class="btn btn-info waves-effect waves-light">Registrar reserva <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </div>
  
					<!-- /.card-content -->
				</div>
 </form>
<?php
///Se llama a la clase para acceder al metodo agregar usuario controller
$agregarReserva = new MvcController();
//Este se encargara de verificar los datos agregados
$agregarReserva->agregarReservaController();
?>
