<?php 
//Esta clase tiene los  metodos que se van a necesitar para mostrarle contenido al usuario
    class MvcController{
        //LLAMAR A LA PLANTILLA
        public function plantilla(){
            //el include se utiliza para invocar el archivo que tiene el codigo html
            include "View/template.php";
        }
        //Interaccion con el usuario
        public function enlacesPaginasController(){
            //Viene del templete
            if(isset($_GET["action"])){
                $enlacesController = $_GET["action"];
            }else{
                $enlacesController="index";
            }
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);

            include $respuesta;
        }

        //-------------------------------------VENTAS-----------------------------------------------
        //Interaccion para mostrar las ventas
        public function vistaVentasController(){
            $respuesta = Datos::vistaVentasModel();
            foreach($respuesta as $row => $i){
                echo '<tr>
               
                    <td>'.$i["id"].'</td>
                    <td>'.$i["vendedor"].'</td>
                    <td>'.$i["fecha"].'</td>
                    <td>'.$i["total"].'</td>
                    <td>
                    <a href="index.php?action=editar_venta&idEditar='.$i["id"].'" title="Editar" ><i class="glyphicon glyphicon-pencil" style="color:#5bc0de;padding-right: 30px;"></i></a>
                    <a  href="index.php?action=borrar_venta&idBorrar='.$i["id"].'&idBorrarT='.$i["id_ticket"].'"  title="Eliminar" ><i  class="glyphicon glyphicon-remove" style="color:#e34724"></i></a>
                     </td>
                </tr>	';
                 

            }
        }
         //Interaccion para mostrar las ventas
         public function vistaVentasTicketController(){
            $respuesta = Datos::vistaVentasTicketModel();
            foreach($respuesta as $row => $i){
                echo '<tr>
               
                    <td>'.$i["id_ticket"].'</td>
                    <td>'.$i["producto"].'</td>
                    <td>'.$i["cantidad"].'</td>
                    <td>'.$i["total"].'</td>
                    
                </tr>	';
                 

            }
        }
        //Interaccion para borrar una venta
        public function borrarVentaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			$datoTicketController =$_GET["idBorrarT"];
			$respuesta = Datos::borrarVentaModel($datosController, "tda_ventas","id_venta");
            $res = Datos::borrarVentaModel($datoTicketController,"tda_ticket","id_ticket");
			if($respuesta == "correcto"){

				header("location:index.php?action=ventas");
			
			}

        }
        }

         //Interaccion para agregar productos
        public function agregarVentaController(){
            if(isset($_POST["ptotal"])){

                $datosTicketController = array( "idproducto"=>$_POST["producto"], 
                "ptotal"=>$_POST["ptotal"], "cantidad"=>$_POST["cantidad"]);

                $datosVentaController = array( "idusuario"=>$_POST["idusuarios"], 
                "ptotal"=>$_POST["ptotal"], "fecha"=>$_POST["fecha_actual"]);

                echo "idusuario: ". $datosVentaController['idusuario'];
                echo "idusuari2o: ". $datosVentaController['fecha'];

                $respuesta = Datos::ingregarVentasModel($datosTicketController,$datosVentaController);

                if($respuesta == true){
                    echo "TRUEEEE";
                   // echo '<script type="text/javascript">
                 //   window.location.replace("index.php?action=ventas");
                 // </script>';
                    // header("location:index.php?action=ventas");
                    
                }else{
                    header("location:index.php?action=fallo");
                }

            }
        }

        //--------------------------------PRODUCTOS-----------------------------------------------------
         //Interaccion para mostrar las ventas
         public function vistaProductosController(){
            $respuesta = Datos::vistaProductosModel();
            foreach($respuesta as $row => $i){
                echo '<tr>
               
                    <td>'.$i["id_producto"].'</td>
                    <td>'.$i["nombre"].'</td>
                    <td>'.$i["precio"].'</td>
                    <td>
                    <a href="index.php?action=editar_producto&idEditar='.$i["id_producto"].'" title="Editar" ><i class="glyphicon glyphicon-pencil" style="color:#5bc0de;padding-right: 30px;"></i></a>
                    <a  href="index.php?action=borrar_producto&idBorrar='.$i["id_producto"].'"  title="Eliminar" ><i  class="glyphicon glyphicon-remove" style="color:#e34724"></i></a>
                     </td>
                    
                </tr>	';
                 

            }
        }
        //Agregar producto
        public function agregarProductoController(){
            if(isset($_POST["aceptar"])){
                $datosController = array( "nombre"=>$_POST["nombre"], 
                                            "precio"=>$_POST["precio"]
                );

                $respuesta = Datos::agregarProductosModel($datosController);

                if($respuesta == true){
                    header("location:index.php?action=productos");
                    
                }else{
                    header("location:index.php?action=agregar_producto");
                }
            }
        }

        //Editar producto
        public function editarProductoController(){
            
            $datosController = $_GET["idEditar"];
            $respuesta = Datos::editarProductoModel($datosController);

            
            foreach($respuesta as $it){
    
                
                echo '<div class="inside" style="float:left;">

                <div style="padding-top: 15px;">
                <label>Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="'.$it["nombre"].'" class="frm-inp" required>
                </div>
                 
                           
                <div style="text-align:center;padding-top: 15px;">
                <button type="submit" name="aceptar" class="frm-submit">Terminar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
                </div>
    
               
    </div>
    <div  style="float:right;">
    
    
                <div style="padding-top: 15px;">
                <label>Precio: </label>
                <input type="number"  id="precio" name="precio" value="'.$it["precio"].'" class="frm-inp" >
                </div>
    
    </div>';
                echo'<input type="hidden" value="'.$it["id_producto"].'" name="idEditar">';
                }
    

        }
         //Actualizar producto
         public function actualizarProductoController(){

            if(isset($_POST["aceptar"])){
    
                $datosController = array( "nombre"=>$_POST["nombre"], 
                                            "precio"=>$_POST["precio"],
                                            "id_producto"=>$_POST["idEditar"]
                                            
                );
                
                $respuesta = Datos::actualizarProductoModel($datosController);
    
                if($respuesta){
    
                    echo "<h3>Se actualizo Correctamente</h3>";
    
                }
    
                else{
    
                    echo "error";
    
                }
    
            }
        
        }

        //Borrar producto
        public function borrarProductoController(){
            if(isset($_GET["idBorrar"])){
    
                $datosController = $_GET["idBorrar"];
               
                $respuesta = Datos::borrarProductoModel($datosController, "tda_productos");
                
                if($respuesta == "correcto"){
    
                    header("location:index.php?action=productos");
                
                }
    
            }
        }
        //--------------------------------USUARIOS-----------------------------------------------------
        public function ingresaUsuarioController(){
            if(isset($_POST["usuario"])){
                $datosController = array( "email"=>$_POST["usuario"], 
								        "contrasena"=>$_POST["contrasena"]);
            
        
                $respuesta = Datos::ingresaUsuarioModel($datosController,"tda_usuarios");
                foreach($respuesta as $row => $i){
                    $r=$i["email"];
                    $c=$i["contrasena"];
                    $v=$i["nombre"];
                    $idd=$i["id_usuario"];
                }
              
                if($r == $_POST["usuario"] && $c == $_POST["contrasena"]){
                   // session_start();
                    
                    $_SESSION['validar'] = true;
                    $_SESSION['vendedor'] = $v; 
                    $_SESSION['iduser'] = $idd;

                    echo "Vendedor: ".$_SESSION["vendedor"];

                    echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ventas");
                  </script>';
                  //  header("location:index.php?action=ventas");
                }
                else{
                    header("location:index.php?action=fallo");
                }
            }
        }

        //Se agregan nuevos usuario a la base de datos.
        public function agregarUsuarioController(){
            if(isset($_POST["contrasena"])){
                $datosController = array( "usuario"=>$_POST["usuario"], 
                                            "contrasena"=>$_POST["contrasena"],
                                            "email"=>$_POST["email"],
                                            "nombre"=>$_POST["nombre"],
                                            "ap_paterno"=>$_POST["apPaterno"],
                                            "ap_materno"=>$_POST["apMaterno"]
                );

                $respuesta = Datos::agregarUsuariosModel($datosController,$tabla);

                if($respuesta == true){
                    header("location:index.php?action=inicio");
                    
                }else{
                    header("location:index.php?action=agregar_usuario");
                }
            }
        }

        //Interaccion para mostrar los usuarios
        public function vistaUsuariosController(){
            $respuesta = Datos::vistaUsuariosModel();
            foreach($respuesta as $row => $i){
                echo '<tr>
               
                    <td>'.$i["id_usuario"].'</td>
                    <td>'.$i["nombre"].'</td>
                    <td>'.$i["ap_paterno"].'</td>
                    <td>'.$i["ap_materno"].'</td>
                    <td>'.$i["email"].'</td>
                    <td>
                    <a href="index.php?action=editar_usuario&idEditar='.$i["id_usuario"].'" title="Editar" ><i class="glyphicon glyphicon-pencil" style="color:#5bc0de;padding-right: 30px;"></i></a>
                    <a  href="index.php?action=borrar_usuario&idBorrar='.$i["id_usuario"].'"  title="Eliminar" ><i  class="glyphicon glyphicon-remove" style="color:#e34724"></i></a>
                     </td>
                </tr>	';
                 

            }
        }

        //Interaccion para borrar un usuario
        public function borrarUsuarioController(){

            if(isset($_GET["idBorrar"])){
    
                $datosController = $_GET["idBorrar"];
               
                $respuesta = Datos::borrarUsuarioModel($datosController, "tda_usuarios");
                
                if($respuesta == "correcto"){
    
                    header("location:index.php?action=usuarios");
                
                }
    
            }
        }

        //Editar un usuario
        public function editarUsuarioController(){

            $datosController = $_GET["idEditar"];
            $respuesta = Datos::editarUsuarioModel($datosController);

            foreach($respuesta as $it){
    
            echo '<div class="inside" style="float:left;">


            <div style="padding-top: 15px;">
            <label>Nombre: </label>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="'.$it["nombre"].'" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Apellido materno: </label>
			<input type="text" name="apMaterno" id="apMaterno" placeholder="Apellido Materno" value="'.$it["ap_materno"].'" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Email: </label>
			<input type="email" name="email" id="email" placeholder="Ingrese su correo" value="'.$it["email"].'" class="frm-inp" required>
			</div>        
           
            <div style="text-align:center;padding-top: 15px;">
            <button type="submit" name="aceptar" class="frm-submit">Terminar<i class="fa fa-arrow-circle-right" style="padding-left: 10px;"></i></button>
            </div>

           
</div>
<div  style="float:right;">

            <div style="padding-top: 15px;">
            <label>Apellido paterno: </label>
			<input type="text" name="apPaterno" id="apPaterno" placeholder="Apellido Paterno" value="'.$it["ap_paterno"].'" class="frm-inp" required >
			</div>

            <div style="padding-top: 15px;">
            <label>Nombre de usuario: </label>
			<input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" value="'.$it["usuario"].'" class="frm-inp" required>
			</div>

            <div style="padding-top: 15px;">
            <label>Contraseña: </label>
			<input type="text" name="contrasena" id="contrasena" placeholder="Contraseña" value="'.$it["contrasena"].'" class="frm-inp" required>
			</div>

			

</div>';
            echo'<input type="hidden" value="'.$it["id_usuario"].'" name="idEditar">';
            }
    
        }

        //Actualizar usuario
        public function actualizarUsuarioController(){

            if(isset($_POST["aceptar"])){
    
                $datosController = array( "usuario"=>$_POST["usuario"], 
                                            "contrasena"=>$_POST["contrasena"],
                                            "email"=>$_POST["email"],
                                            "nombre"=>$_POST["nombre"],
                                            "ap_paterno"=>$_POST["apPaterno"],
                                            "ap_materno"=>$_POST["apMaterno"],
                                            "id_usuario"=>$_POST["idEditar"]
                );
                
                $respuesta = Datos::actualizarUsuarioModel($datosController);
    
                if($respuesta){
    
                    echo "<h3>Se actualizo Correctamente</h3>";
    
                }
    
                else{
    
                    echo "error";
    
                }
    
            }
        
        }
        
    }
?>