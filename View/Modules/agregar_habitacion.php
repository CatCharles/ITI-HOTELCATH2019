<?php
//Se llama a la clase MVC
$agregarHabitacion = new MvcController();
//Asi como a la clase Data base para poder acceder a sus metodos 
$tipos_hab = new Database();
//se realiza una consulta para llenar campos necesarios de los tipos de habitaciones
$tipos = $tipos_hab->select("select * from tipos_hab;");
$i=0;//variable como iterador
foreach($tipos as $t){//se itera la consutla
	//se almacena la informacion en vectores.
	$precios[$i] = $t["precio"];
	$tamp[$i] = $t["tamano"];
	$cant[$i] = $t["cantcamas"];
	$i++;
	//Dependiendo del tipo es lo que se va a mostraar en la pantalla de agregar
}
?>
<header>
	<h1>Agregar habitación</h1>
</header>
<form action="#" method="post" enctype="multipart/form-data">


	<div class="box-content card white">
		<h4 class="box-title">Información de habitación.</h4>
		<!-- /.box-title -->
		<div class="card-content">
			<!-- /.input-group -->
					<!-- /.radio -->
					<h2>Tipos de habitación</h2>
			<p>
				Seleccine un tipo de habitación: 
			</p>
					<ul class="list-inline">
						<li>
							<div class="radio info"><input type="radio" checked  name="tipo_hab" id="1" value="1"><label for="1"><strong>Simple </strong> <br> <?php echo "Precio: $ ".$precios[0]?> <br> <?php echo "Tamaño: ". $tamp[0]?> <br> <?php echo "Cantidad de camas: ".$cant[0]?> </label></div>
							<!-- /.radio -->
						</li>
						<li>
							<div class="radio pink"><input type="radio" name="tipo_hab" id="2" value="2"><label for="2"><strong>Doble </strong> <br> <?php echo "Precio: $ ".$precios[1]?> <br> <?php echo "Tamaño: ". $tamp[1]?> <br> <?php echo "Cantidad de camas: ".$cant[1]?></label></div>
							<!-- /.radio -->
						</li>
						<li>
							<div class="radio inverse"><input type="radio" name="tipo_hab" id="3" value="3"><label for="3"><strong>Matrimonial </strong> <br> <?php echo "Precio: $ ".$precios[2]?> <br> <?php echo "Tamaño: ". $tamp[2]?> <br> <?php echo "Cantidad de camas: ".$cant[2]?></label></div>
							<!-- /.radio -->
						</li>
					</ul>
					<!-- /.list-inline -->
		<!-- /.card-content -->
		<div class="box-content">
					<h2>Imagen de la habitación</h2>
			<!-- se busca la imagen y se coloca-->		
			<input type="file" id="imagen" name="imagen" class="dropify" required >
				</div>
			<div class="input-group">
				<button type="submit" name="aceptar1" class="btn btn-info waves-effect waves-light">Agregar habitación <i class="fa fa-arrow-circle-right"></i></button>
			</div>
		</div>


	</div>
	
</form>
<?php
///Se llama a la clase para acceder al metodo agregar habitacion controller
$agregarHabitacion = new MvcController();
//Este se encargara de verificar los datos agregados
$agregarHabitacion->agregarHabitacionController();
?>

	