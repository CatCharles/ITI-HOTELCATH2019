<header>
		<h1>Administración de reservas</h1>
</header>
<?php
///Se llama a la clase MVC para poder utilizar sus metodos.
$reservas = new MvcController();
//Se recibe lo obtenido en el controller que se encargo de llamar al modelo para recibir la consulta.
$respuesta = $reservas->vistaReservasController();
$res = "";//la variable res almacenara la cadena de datos obtenida con estructura de tabla.
//se itera lo obtenido
foreach($respuesta as $c){
  $res.='<tr>     
                    <td>'.$c["id_reservacion"].'</td>
                    <td>'.$c["numhabitacion"].'</td>
                    <td>'.$c["nombre"].'</td>
                    <td>'.$c["fecha_entrada"].'</td>
                    <td>'.$c["fecha_salida"].'</td>  
                      <td>
                    <a href="index.php?action=editar_reserva&idEditar='.$c["id_reservacion"].'" title="Editar" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-pencil"></i>Editar</a>
										
										<a href="index.php?action=borrar_reserva&idBorrar='.$c["id_reservacion"].'&idhab='.$c["numhabitacion"].'" title="Borrar" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-trash"></i>Eliminar</a>

                     </td>                  
                    </tr>';
}
?>
<form method="post">
	
<div class="box-content bordered primary">
					<h4 class="box-title"><i class="ico glyphicon glyphicon-pencil"></i>Ediciones</h4>
					<!-- /.box-title -->
					
					<!-- /.dropdown js__dropdown -->
	<p>Busque la <strong>reserva que desea modificar</strong>, se puede buscar por numero de reserva, numero de habitacion, etc. Una vez que lo ha encontrado, puede dar doble clic en <strong>GUARDAR</strong> o <strong>ELIMINAR</strong> esto lo enviara a otra pagina para poder visualizar el cliente a editar o simplemente se eliminara.</p>
				</div>

            <div class="box-content">
					<table id="example-edit" class="display" style="width: 100%">
						<thead>
							<tr>
								<th>Núm. reservacion</th>
								<th>Núm. habitación</th>
								<th>Propietario</th>
								<th>Fecha de ingreso</th>
								<th>Fecha de salida</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Núm. reservacion</th>
								<th>Núm. habitación</th>
								<th>Propietario</th>
								<th>Fecha de ingreso</th>
								<th>Fecha de salida</th>
								<th>Acciones</th>
							</tr>
						</tfoot>
            <tbody>
              <?php
             //Se muestra la cadena de la estrucutra de la tabla con los datos ya almacenados
                echo $res;?>
             
        
						</tbody>
					</table>
			</div>
	</form>
