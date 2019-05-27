<?php 
	//Se manda a llamar a la clase MVC
	$editarUsuario = new MvcController();
	//Se habla al metodo que solicita la consulta de dicho usuario elegido
	$cliente = $editarUsuario -> editarUsuarioController(); //se pasa a una variable
   //Se habla al metodo que actualizara los campos modificados.
	$editarUsuario -> actualizarUsuarioController();
//La variable que esta sea recorrida y sea incerttada en los campos indicados y facilitar su edicion.
	foreach($cliente as $c){
?>
<header>
		<h1>Modificaciar a Cliente <?php echo ucwords(strtolower($c["nombre"]));?></h1>
</header>

<form method="post">
<div class="box-content card white">
					<h4 class="box-title">Información de cliente.</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<label for="inp-type-1" class="col-sm-3 control-label">Nombre</label>
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $c["nombre"];  ?>" onkeyup="mayus(this);" required>
						</div>
						<label for="inp-type-1" class="col-sm-3 control-label">Apellid paterno</label>
            <div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Apellido Paterno" name="ap_paterno" value="<?php echo $c["ap_paterno"];  ?>"   onkeyup="mayus(this);" required>
						</div>
						<label for="inp-type-1" class="col-sm-3 control-label">Apellido materno</label>
            <div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-1" class="btn btn-default"><i class="fa fa-user"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-1" type="text" class="form-control" placeholder="Apellido Materno" name="ap_materno" value="<?php echo $c["ap_materno"];  ?>"  onkeyup="mayus(this);" required>
						</div>
						<label for="inp-type-1" class="col-sm-3 control-label">Telefono</label>
						<!-- /.input-group -->
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-2" class="btn btn-default"><i class="fa fa-envelope"></i></label></div>
							<!-- /.input-group-btn -->
							<input id="ig-2" type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?php echo $c["telefono"];  ?>" maxlength="11" required>
						</div>
						<!-- /.input-group -->
						<label for="inp-type-1" class="col-sm-3 control-label">Tipo de cliente</label>
						<div class="input-group margin-bottom-20">
							<div class="input-group-btn"><label for="ig-3" class="btn btn-default"><i class="fa fa-usd"></i></label></div>
							<!-- /.input-group-btn -->
							<select class="form-control" name="tipo_cliente">
								<option value="">Seleccione un tipo de cliente</option>
                <?php $tipos_cliente = new Database();
                      $tipos = $tipos_cliente->select("select * from tipos_cliente;");
                foreach($tipos as $t){
								if($c["tipo"] == $t["id_tipo_cliente"]){?>
                <option selected value="<?php echo (int) $t["id_tipo_cliente"]; ?>">
                <?php echo utf8_encode($t["nombre"]); ?>
                </option>
                <?php
                }else{ //fin de if
									?>
								<option value="<?php echo (int) $t["id_tipo_cliente"]; ?>">
                <?php echo utf8_encode($t["nombre"]); ?>
                </option>
								<?php
								}//fin de else
								}//fin del for
                ?>
							</select>
						</div>
						<input type="hidden" value="<?php echo $c["id_cliente"]?>" name="idEditar">
						<!-- /.input-group -->
            	<div class="input-group">
            <button type="submit" name="aceptar" class="btn btn-info waves-effect waves-light">Agregar cliente <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </div>
					<!-- /.card-content -->
				</div>
 </form>
<?php
	}//cierra foreach de cliente

	?>
<script>
	//Mantener las mayusculas en los campos indicados como nombre y apellidos
function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>
