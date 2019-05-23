<?php

session_start();

if(($_SESSION["validar"])==0){

	header("location:index.php?action=index");

	exit;
}
else{
    
}

?>

<header>
		<h1>Usuarios</h1>
</header>

<div>
  <!-- Tabla de muestreo de datos -->
  <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th>Id empleado</th>
                        <th>Nombre</th>
                        <th>Ap. Paterno</th>
						<th>Ap. Materno</th>
						<th>Email</th>
						<th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                        $vistaVenta = new MvcController();
                        $vistaVenta -> vistaUsuariosController();

                        if(isset($_GET["action"])){

                            if($_GET["action"] == "fallo"){
                        
                                echo "Fallo al ingresar";
                            
                            }
                        
                        }
                
				?>                         
                </tbody>
            </table>
</div>
