<?php

//Se llama a la clase MVC
$editarHabitacion = new MvcController();
$habitacion = $editarHabitacion->editarHabitacionController();//aqui ya se sabe que habitacion es.

//Se almacenan los valores necesarios para su utilizacion.
foreach($habitacion as $hab){
	$id_hab = $hab["id_habitacion"];
	$tipo_hab=$hab["id_tipos_hab"];
	$imag=$hab["imagen"];	//se obtiene solo la imagen
}
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
	<h1>Editar habitación</h1>
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
							
							<div class="radio info"><input type="radio" checked name="tipo_hab" id="1" value="1"><label for="1"><strong>Simple </strong> <br> <?php echo "Precio: $ ".$precios[0]?> <br> <?php echo "Tamaño: ". $tamp[0]?> <br> <?php echo "Cantidad de camas: ".$cant[0]?> </label></div>

							<!-- /.radio -->
						</li>
					
						<li>
							<div class="radio pink"><input type="radio"   name="tipo_hab" id="2" value="2"><label for="2"><strong>Doble </strong> <br> <?php echo "Precio: $ ".$precios[1]?> <br> <?php echo "Tamaño: ". $tamp[1]?> <br> <?php echo "Cantidad de camas: ".$cant[1]?></label></div>
							<!-- /.radio -->
						</li>
							<li>
							<div class="radio inverse"><input type="radio"  name="tipo_hab" id="3" value="3"><label for="3"><strong>Matrimonial </strong> <br> <?php echo "Precio: $ ".$precios[2]?> <br> <?php echo "Tamaño: ". $tamp[2]?> <br> <?php echo "Cantidad de camas: ".$cant[2]?></label></div>
							<!-- /.radio -->
						</li>
					</ul>
					<!-- /.list-inline -->
		<!-- /.card-content -->
		<div class="box-content">
					<h2>Imagen de la habitación</h2>
			<div style="text-align:center">
					<img src="<?php echo $imag;?>" name="antes" style="align:center" width="200" height="200" align="center">
			</div>
		
			<!-- se busca la imagen y se coloca		-->
			<h4>Si desea cambiarla, cargue aquí.</h4>
			<input type="file" id="imagen" name="imagen" class="dropify">
				</div>
			<div class="input-group">
				<button type="submit"  class="btn btn-info waves-effect waves-light">Modificar habitación <i class="fa fa-arrow-circle-right"></i></button>
			</div>
		</div>


	</div>
	
</form>

<?php
//Este se encargara de verificar los datos agregados
$editarHabitacion->actualizarHabitacionController();?>

	