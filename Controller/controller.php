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
          //Se verifica el contenido del action desde la url
            if(isset($_GET["action"])){
              //en caso de contener algo esto es almacenado para poder dirigirnos a el 
                $enlacesController = $_GET["action"];
            }else{
              //caso contrario nos redirige al index para una verificacion.
                $enlacesController="index";
            }
          //Ingresamos a la clase EnlacesPaginas y a su metdo que nos verifica a donde queremos ir
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
          //y lo que recibimos es el docuemtnto que se incluira en el actual.
            include $respuesta;
        }

         //--------------------------------USUARIO ADMINISTRADOR--------------------------------------
        public function ingresaUsuarioController(){
          //se verifica si se han ingresado datos
            if(isset($_POST["contrasena"])){
              //se colocan en un arreglo asociativo
                $datosController = array( "email"=>$_POST["usuario"], 
								        "contrasena"=>$_POST["contrasena"]);
                //Se manda hacia la clase DATOS donde se verificaran solicitaran los datos ingresados        
                $respuesta = Datos::ingresaUsuarioModel($datosController,"administradores");
              //Regresando con la informacion, se almacenan las coincidencias
                foreach($respuesta as $row => $i){
                    $r=$i["email"];
                    $c=$i["contrasena"];
                    $v=$i["nombre"];
                    $idd=$i["id_admin"];
                }
              //Se verifican las coincidencias encontradas
                if($r == $_POST["usuario"] && $c == $_POST["contrasena"]){
                    session_start(); //Se inicia una sesion para almacenar
                    //Se guarda el nombre del usuario ingresado
                    $_SESSION['usuario'] = $v; 
                    //Asi como si identificador
                    $_SESSION['iduser'] = $idd;
                    //Una vez echo esto nos redirecciona al index donde nos envia a la pagina dashboard del sistema
                    echo '<script type="text/javascript">
                    window.location.replace("index.php");
                  </script>';
                }
                else{
                    header("location:index.php?action=fallo");
                }
            }
        }
         //--------------------------------USUARIO CLIENTES--------------------------------------
        //Se agregan nuevos usuario a la base de datos.
        public function agregarUsuarioController(){
          //se verifica que el ultimo elemento de la lista contenga algo 
            if(isset($_POST["tipo_cliente"]) && $_POST["tipo_cliente"] != ""){
              //Se almacena la informacion en un arreglo asociativo
                $datosController = array(   "tipo_cliente"=>$_POST["tipo_cliente"],
                                            "telefono"=>$_POST["telefono"],
                                            "nombre"=>$_POST["nombre"],
                                            "ap_paterno"=>$_POST["ap_paterno"],
                                            "ap_materno"=>$_POST["ap_materno"]
                );
                //Se habla a la clase DATOS para poder enviarle la peticion de agregar un nuevo registro, enviandole el arreglo y la tabla.
                $respuesta = Datos::agregarUsuariosModel($datosController,"clientes");

                if($respuesta == true){
                  //En caso positivo nos redirecciona al cliente.
                    echo '<script>		
			              location.href= "index.php?action=cliente";
		                </script>';
                    
                }else{
                  //En caso negativo nos deja en la misma ventana.
                  echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';/*
                    echo '<script>		
			              location.href= "index.php?action=agregar_cliente";
		                 </script>';*/
                }
            }
        }

        //Interaccion para mostrar los usuarios
        public function vistaUsuariosController(){
          //Se envia la consulta al model para que regrese la informacion
            $respuesta = Datos::vistaUsuariosModel();
          //y esta es enviada a la vista para ser procesada y mostrada.
          return $respuesta;
        }

        //Editar un usuario
        public function editarUsuarioController(){
          //Se obtiene el id del cliente que se quiere modificar  
          $datosController = $_GET["idEditar"];
          //este se es enviado al modelo ddonde nos regresara la consutla ordenada
            $respuesta = Datos::editarUsuarioModel($datosController);
          //Y esta es enviada de regreso y pueda ser mostrada en la vista.
            return $respuesta;    
        }

        //Actualizar usuario
        public function actualizarUsuarioController(){
          //Se verifica el contenido
            if(isset($_POST["aceptar"])){
              //este se amacena en un array asociativo
                $datosController = array( "usuario"=>$_POST["usuario"], 
                                            "id_tipo_cliente"=>$_POST["tipo_cliente"],
                                            "telefono"=>$_POST["telefono"],
                                            "nombre"=>$_POST["nombre"],
                                            "ap_paterno"=>$_POST["ap_paterno"],
                                            "ap_materno"=>$_POST["ap_materno"],
                                            "id_cliente"=>$_POST["idEditar"]
                );
                //el array es enviado al modelo para ser procesado y envie la consulta a la base de datos, y simplemente recibir una resppuesta.
                $respuesta = Datos::actualizarUsuarioModel($datosController);
    
                if($respuesta){
                  //en caso de ser exitoso se redireccionara a la pagina anterior
                  echo '<script>		
			              location.href= "index.php?action=administrar_clientes";
		                </script>';
                  //se mostrara un menaje de exitoso
                    echo '<div class="alert alert-success" role="success"> <strong>Exito!</strong> Se ha modificado correctamente. </div>';
                }
              //En caso de existir algun error se notificara.
                else{
                    echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';
    
                }
    
            }
        
        }
  
        //Interaccion para borrar un usuario
        public function borrarUsuarioController(){
            //Se obtiene el id que se quiere eliminar y se verifica
            if(isset($_GET["idBorrar"])){
                //Al tenerlo este se pasa a una variable
                $datosController = $_GET["idBorrar"];
               //Es enviado hacia el modelo para realizar la conexion y este lo elimine
                $respuesta = Datos::borrarUsuarioModel($datosController, "clientes");
                
                if($respuesta == "correcto"){
                  //Al ser correcto se recarga la pagina anterior para verificar el cambio.
                    echo '<script>		
			              location.href= "index.php?action=administrar_clientes";
		                </script>';
                
                }
                    
            }
        }
 
      //--------------------------------HABITACIONES--------------------------------------
        //Se agregan nuevas habitaciones a la base de datos.
        public function agregarHabitacionController(){
          //se verifica que el ultimo elemento de la lista contenga algo 
            if(isset($_POST["aceptar1"])){
                $ruta="View/Modules/images/";//ruta carpeta donde queremos copiar las imágenes
                $uploadfile_temporal=$_FILES["imagen"]["tmp_name"];//se guarda la ruta interna
                $uploadfile_nombre=$ruta.$_FILES["imagen"]["name"];//se guarda la ruta a que se va a dirigir
                if (is_uploaded_file($uploadfile_temporal))//se carga a la ruta interna
                {
                  move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);//se mueve a la carpeta que decidimos destinar.
                  //Se almacena la informacion en un arreglo asociativo
                  $datosController = array(   "tipo_hab"=>$_POST["tipo_hab"],
                                              "file_name"=>$uploadfile_nombre                 
                   );
                //Se habla a la clase DATOS para poder enviarle la peticion de agregar un nuevo registro, enviandole el arreglo y la tabla.
                $respuesta = Datos::agregarHabitacionModel($datosController,"habitaciones");

                }
                           
                if($respuesta == true){
                  //En caso positivo nos redirecciona al cliente.
                   echo '<script>		
			              location.href= "index.php?action=habitacion";
		                </script>';
                    
                }else{
                  //En caso negativo nos deja en la misma ventana.
                  echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';

                }
            }//finisset
        }//fin funcion
       //*************************
			//Interaccion para mostrar las habitaciones
        public function vistaHabitacionesController(){
          //Se envia la consulta al model para que regrese la informacion
            $respuesta = Datos::vistaHabitacionesModel();
          //y esta es enviada a la vista para ser procesada y mostrada.
          return $respuesta;
        }
      
				//Editar una habitacion
        public function editarHabitacionController(){
          //Se obtiene el id del cliente que se quiere modificar  
          $datosController = $_GET["idEditar"];
          //este se es enviado al modelo ddonde nos regresara la consutla ordenada
            $respuesta = Datos::editarHabitacionModel($datosController);
          //Y esta es enviada de regreso y pueda ser mostrada en la vista.
            return $respuesta;    
        }

			  //Actualizar habitacion
        public function actualizarHabitacionController(){
          //Se verifica el contenido
					
            if(isset($_POST["tipo_hab"])){
							if(isset($_POST["imagen"])){
								$ruta="View/Modules/images/";//ruta carpeta donde queremos copiar las imágenes				
								$uploadfile_temporal=$_FILES["imagen"]["tmp_name"];//se guarda la ruta interna
								 $uploadfile_nombre=$ruta.$_FILES["imagen"]["name"];//se guarda la ruta a que se va a dirigir
								if (is_uploaded_file($uploadfile_temporal))//se carga a la ruta interna
                {
                  move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);//se mueve a la carpeta que decidimos destinar.
                  //Se almacena la informacion en un arreglo asociativo
                  $datosController = array(   "tipo_hab"=>$_POST["tipo_hab"],
                                              "file_name"=>$uploadfile_nombre,
																					 		"id_habitacion"=>$id_hab
                   );
               
								}
							}else{
								$datosController = array(   "tipo_hab"=>$_POST["tipo_hab"],
                                              "file_name"=>$_POST["antes"],
																					 		"id_habitacion"=>$id_hab
                   );
							}
							 //el array es enviado al modelo para ser procesado y envie la consulta a la base de datos, y simplemente recibir una resppuesta.
                $respuesta = Datos::actualizarHabitacionModel($datosController);
							
							
							if($respuesta == true){
                  //En caso positivo nos redirecciona al cliente.
                   echo '<script>		
			              location.href= "index.php?action=habitacion";
		                </script>';
                    
                }else{
                  //En caso negativo nos deja en la misma ventana.
                  echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';

                }
						}

       }//fin funcion

			//Interaccion para borrar una habitacion
        public function borrarHabitacionController(){
            //Se obtiene el id que se quiere eliminar y se verifica
            if(isset($_GET["idBorrar"])){
                //Al tenerlo este se pasa a una variable
                $datosController = $_GET["idBorrar"];
               //Es enviado hacia el modelo para realizar la conexion y este lo elimine
                $respuesta = Datos::borrarHabitacionModel($datosController, "habitaciones");
                
                if($respuesta == "correcto"){
                  //Al ser correcto se recarga la pagina anterior para verificar el cambio.
                    echo '<script>		
			              location.href= "index.php?action=habitacion";
		                </script>';
                
                }
                    
            }
        }
 
			//**************************
			
   //--------------------------------RESERVAS--------------------------------------
        //Se agregan nueva reserva a la base de datos.
        public function agregarReservaController(){
          //se verifica que el ultimo elemento de la lista contenga algo 
            if(isset($_POST["avanza"])){
							
              //Se almacena la informacion en un arreglo asociativo
                $datosController = array(   "id_habitacion"=>$_POST["ophabitacion"],
                                            "id_cliente"=>$_POST["opcliente"],
                                            "fecha_entrada"=>$_POST["start"],
                                            "fecha_salida"=>$_POST["end"]
                );
                //Se habla a la clase DATOS para poder enviarle la peticion de agregar un nuevo registro, enviandole el arreglo y la tabla.
                $respuesta = Datos::agregarReservaModel($datosController,"reservaciones");

                if($respuesta == true){
                  //En caso positivo nos redirecciona al cliente.
									echo $respuesta;
                    echo '<script>		
			              location.href= "index.php?action=administracion_reservas";
		                </script>';
                    
                }else{
                  //En caso negativo nos deja en la misma ventana.
                  echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';/*
                    echo '<script>		
			              location.href= "index.php?action=agregar_cliente";
		                 </script>';*/
                }
            }
        }
		    
			//Interaccion para mostrar las reservas
        public function vistaReservasController(){
          //Se envia la consulta al model para que regrese la informacion
            $respuesta = Datos::vistaReservasModel();
          //y esta es enviada a la vista para ser procesada y mostrada.
          return $respuesta;
        }
			
   //Editar un reserva
        public function editarReservaController(){
          //Se obtiene el id del cliente que se quiere modificar  
          $datosController = $_GET["idEditar"];
          //este se es enviado al modelo ddonde nos regresara la consutla ordenada
            $respuesta = Datos::editarReservaModel($datosController);
          //Y esta es enviada de regreso y pueda ser mostrada en la vista.
            return $respuesta;    
        }
			
			//Actualizar una reserva
        public function actualizarReservaController(){
          //Se verifica el contenido
            if(isset($_POST["avanza"])){
              //Se almacena la informacion en un arreglo asociativo
                $datosController = array(   "id_habitacion"=>$_POST["ophabitacion"],
                                            "id_cliente"=>$_POST["opcliente"],
                                            "fecha_entrada"=>$_POST["start"],
                                            "fecha_salida"=>$_POST["end"],
																				 		"id"=>$_POST["iddd"],
																				    "fina"=>$_POST["fina"]
																				 		
                );
                //el array es enviado al modelo para ser procesado y envie la consulta a la base de datos, y simplemente recibir una resppuesta.
                $respuesta = Datos::actualizarReservaModel($datosController);
    
                if($respuesta){
                  //en caso de ser exitoso se redireccionara a la pagina anterior
                  echo '<script>		
			              location.href= "index.php?action=administracion_reservas";
		                </script>';
                  //se mostrara un menaje de exitoso
                    echo '<div class="alert alert-success" role="success"> <strong>Exito!</strong> Se ha modificado correctamente. </div>';
                }
              //En caso de existir algun error se notificara.
                else{
                    echo '<div class="alert alert-warning" role="alert"> <strong>Error!</strong> Revise el contenido que desea agregar. </div>';
    
                }
    
            }
        
        }
		
        //Interaccion para borrar una reservva
        public function borrarReservaController(){
            //Se obtiene el id que se quiere eliminar y se verifica
            if(isset($_GET["idBorrar"])){
                //Al tenerlo este se pasa a una variable
								$u= $_GET["idhab"];
                $datosController = $_GET["idBorrar"];
               //Es enviado hacia el modelo para realizar la conexion y este lo elimine
                $respuesta = Datos::borrarReservaModel($datosController,$u, "reservaciones");
                
                if($respuesta == "correcto"){
                  //Al ser correcto se recarga la pagina anterior para verificar el cambio.
                    echo '<script>		
			              location.href= "index.php?action=administracion_reservas";
		                </script>';
                
                }
                    
            }
        }
 
    }
?>