<header>
		<h1>Clientes</h1>
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
                    <td>'.$c["id_cliente"].'</td>
                    <td>'.$c["nombre"].'</td>
                    <td>'.$c["ap_paterno"].'</td>
                    <td>'.$c["ap_materno"].'</td>
                    <td>'.$c["telefono"].'</td>
                    <td>'.$c["tipo"].'</td>   
                                        
                    </tr>';
}
?>
<div class="box-content bordered primary">
					<h4 class="box-title"><i class="ico glyphicon glyphicon-pencil"></i>Busquedas</h4>
					<!-- /.box-title -->
					
					<!-- /.dropdown js__dropdown -->
	<p>Busque el <strong>cliente que desee</strong>, se puede buscar por <strong>nombre, tipo y cualquier columna</strong> que desee encontrar.</p>
				</div>

            <div class="box-content">
					<table id="example-edit" class="display" style="width: 100%">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Ap. Paterno</th>
								<th>Ap. Materno</th>
								<th>Telefono</th>
								<th>Tipo de cliente</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Ap. Paterno</th>
								<th>Ap. Materno</th>
								<th>Telefono</th>
								<th>Tipo de cliente</th>
							</tr>
						</tfoot>
            <tbody>
              <?php
             //Se muestra la cadena de la estrucutra de la tabla con los datos ya almacenados
                echo $res;?>
             
        
						</tbody>
					</table>
			</div>