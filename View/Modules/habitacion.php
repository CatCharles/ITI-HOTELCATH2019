<header>
		<h1>Habitaciones</h1>
</header>
<?php
///Se llama a la clase MVC para poder utilizar sus metodos.
$habitaciones = new MvcController();
//Se recibe lo obtenido en el controller que se encargo de llamar al modelo para recibir la consulta.
$respuesta = $habitaciones->vistaHabitacionesController();
$res = "";//la variable res almacenara la cadena de datos obtenida con estructura de tabla.

//se itera lo obtenido
foreach($respuesta as $h){
  $res.='<tr>     
                    <td>'.$h["id_habitacion"].'</td>
                    <td>'.$h["tipo"].'</td>
                    <td> $ '.$h["precio"].'</td>
                    <td>'.$h["tamano"].'</td>
                    <td>'.$h["cantcamas"].'</td>
										
                    <td>'.'<img src="'.utf8_encode(utf8_decode((($h["imagen"])))).'" alt="User Image" width="200" height="200" align="center">'.'</td>
										
										<td>
                    <a href="index.php?action=editar_habitacion&idEditar='.$h["id_habitacion"].'" title="Editar" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-pencil"></i>Editar</a>
										
										<a href="index.php?action=borrar_habitacion&idBorrar='.$h["id_habitacion"].'" title="Borrar" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-trash"></i>Eliminar</a>

                     </td>  
										
                       
                    </tr>';
}
?>
<form method="post" action="#">
	

<div class="box-content bordered primary">
					<h4 class="box-title"><i class="ico glyphicon glyphicon-pencil"></i>Busquedas</h4>
					<!-- /.box-title -->
					
					<!-- /.dropdown js__dropdown -->
	<p>Busque la <strong>habitación que desee</strong>, se puede buscar por <strong>tipos, precios, tamaños y cualquier columna</strong> que desee encontrar.</p>
				</div>

            <div class="box-content">
					<table id="example-edit" class="display" style="width: 100%">
						<thead>
							<tr>
								<th>Número de habitación</th>
								<th>Tipo</th>
								<th>Precio</th>
								<th>Tamaño</th>
								<th>Cant. de camas</th>
								<th>Imagen</th>
								<th>Acciones</th>
							
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Número de habitación</th>
								<th>Tipo</th>
								<th>Precio</th>
								<th>Tamaño</th>
								<th>Cant. de camas</th>
								<th>Imagen</th>
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