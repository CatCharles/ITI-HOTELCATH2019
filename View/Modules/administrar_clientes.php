<header>
		<h1>Modificaciones a Clientes</h1>
</header>
<?php
///Se llama a la clase MVC para poder utilizar sus metodos.
$clientes = new MvcController();
//Se recibe lo obtenido en el controller que se encargo de llamar al modelo para recibir la consulta.
$respuesta = $clientes->vistaUsuariosController();
$res = "";//la variable res almacenara la cadena de datos obtenida con estructura de tabla.
//se itera lo obtenido
foreach($respuesta as $c){
  $res.='<tr>     
                    <!--<td>'.$c["id_cliente"].'</td>-->
                    <td>'.$c["nombre"].'</td>
                    <td>'.$c["ap_paterno"].'</td>
                    <td>'.$c["ap_materno"].'</td>
                    <td>'.$c["telefono"].'</td>
                    <td>'.$c["tipo"].'</td>   
                      <td>
                    <a href="index.php?action=editar_cliente&idEditar='.$c["id_cliente"].'" title="Editar" class="btn btn-primary btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-pencil"></i>Editar</a>
										
										<a href="index.php?action=borrar_cliente&idBorrar='.$c["id_cliente"].'" title="Borrar" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico ico-left fa fa-trash"></i>Eliminar</a>

                     </td>                  
                    </tr>';
}
?>
<div class="box-content bordered primary">
					<h4 class="box-title"><i class="ico glyphicon glyphicon-pencil"></i>Ediciones</h4>
					<!-- /.box-title -->
					
					<!-- /.dropdown js__dropdown -->
	<p>Busque el <strong>cliente que desea modificar</strong>, se puede buscar por nombre, tipo, etc. Una vez que lo ha encontrado, puede dar doble clic en <strong>GUARDAR</strong> o <strong>ELIMINAR</strong> esto lo enviara a otra pagina para poder visualizar el cliente a editar o simplemente se eliminara.</p>
				</div>

            <div class="box-content">
					<table id="example-edit" class="display" style="width: 100%">
						<thead>
							<tr>
								<!--<th>id</th>-->
								<th>Nombre</th>
								<th>Ap. Paterno</th>
								<th>Ap. Materno</th>
								<th>Telefono</th>
								<th>Tipo de cliente</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<!--<th>id</th>-->
								<th>Nombre</th>
								<th>Ap. Paterno</th>
								<th>Ap. Materno</th>
								<th>Telefono</th>
								<th>Tipo de cliente</th>
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