<header>
		<h1>Agregar cliente</h1>
</header>
<form method="post">
  

<div class="box-content card white">
					<h4 class="box-title">Información de cliente.</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Nombre" name="nombre" onkeyup="mayus(this);" required>
						</div>
            <div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Apellido Paterno" name="ap_paterno" onkeyup="mayus(this);" required>
						</div>
            <div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Apellido Materno" name="ap_materno" onkeyup="mayus(this);" required>
						</div>
						<!-- /.input-group -->
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-2" class="btn btn-default"><i class="fa fa-envelope"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-2" type="text" class="form-control" placeholder="Telefono" maxlength="11" name="telefono" required>
						</div>
						<!-- /.input-group -->
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-usd"></i></label></div>
							<!-- /.input-group-btn -->
							<select class="form-control" name="tipo_cliente">
								<option value="">Seleccione un tipo de cliente</option>
                <?php $tipos_cliente = new Database();
                      $tipos = $tipos_cliente->select("select * from tipos_cliente;");
                foreach($tipos as $t){?>
                <option value="<?php echo (int) $t["id_tipo_cliente"]; ?>">
                <?php echo utf8_encode($t["nombre"]);?>
                </option>
                <?php
                }
                ?>
							</select>
						</div>
						<!-- /.input-group -->
            	<div class="input-group">
            <button type="submit" class="btn btn-info waves-effect waves-light">Agregar cliente <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </div>
  
					<!-- /.card-content -->
				</div>
 </form>
<?php
///Se llama a la clase para acceder al metodo agregar usuario controller
$agregarCliente = new MvcController();
//Este se encargara de verificar los datos agregados
$agregarCliente->agregarUsuarioController();
?>
<script>
	//Mantener las mayusculas en los campos indicados como nombre y apellidos
function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>