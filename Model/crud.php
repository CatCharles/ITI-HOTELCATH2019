<?php 
//Aqui se realizara todas las operaciones necesarias para registros,CRUD etc.

//Llamando al archivo que contiene las conexiones necesarias a la base de datos
include_once "conexion.php";

//Se crea una clase Datos extendiendo de la conexion para acceder a sus metodos.
class Datos extends Database{
    
  
  //--------------------------------USUARIO ADMINISTRADOR--------------------------------------    
    //se verifica el ingreso al sistema.
    public function ingresaUsuarioModel($datos,$tabla){
        $con = new Database();
        $data = $datos["email"];
        $stm = $con->select("SELECT email,contrasena,nombre,id_admin FROM $tabla WHERE email = '$data'; ");
        return $stm;
    }
  //--------------------------USUARIOS CLIENTE------------------------------------------
    //Agregar nuevos usuario a la bd
    public function agregarUsuariosModel($datos,$tabla){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite.
        $con = new Database();
      //se obtienen los datos recibidos del arreglo asociativo.
        $u = $datos["tipo_cliente"];
        $d = $datos["telefono"];
        $c = $datos["nombre"];
        $ci = $datos["ap_paterno"];
        $s = $datos["ap_materno"];
      //Se insertan los datos con una sentencia y trabajando con los metodos de la base de datos.
        $stm = $con->insert("INSERT INTO $tabla (id_tipo_cliente,telefono,nombre,ap_paterno,ap_materno) VALUES ('$u','$d','$c','$ci','$s');");
      //Se regresa segun los resultados esperados
        return $stm;
    }

    //Visualizar todas los usuarios registrados
    public function vistaUsuariosModel(){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite. 
        $con = new Database();
      //Se realiza un select para traeer a todos los usuarios registrados.
        $stm = $con->select("select id_cliente,c.nombre as nombre,ap_paterno,ap_materno,telefono,tc.nombre as tipo from clientes c inner join tipos_cliente tc on (c.id_tipo_cliente = tc.id_tipo_cliente);");
      //Se retorna para que estos puedan ser mostrados.
        return $stm;
    }

    //Editar usuario
    public function editarUsuarioModel($id){
        $con = new Database();
        $stm = $con->select("select nombre,telefono,id_tipo_cliente as tipo,ap_paterno,ap_materno,id_cliente from clientes WHERE id_cliente = $id;");
        return $stm;

    }
    
    //Actualizar informacion
    public function actualizarUsuarioModel($datos){
        $d = $datos["telefono"];
        $t = $datos["id_tipo_cliente"];
        $c = $datos["nombre"];
        $ci = $datos["ap_paterno"];
        $s = $datos["ap_materno"];
        $id=$datos["id_cliente"];


		$con = new Database();
        $stm = $con->update("UPDATE clientes SET telefono='$d',id_tipo_cliente='$t',nombre='$c',ap_paterno='$ci',ap_materno='$s' WHERE id_cliente = '$id'");
        return $stm;

    }
   
  //Borrar un usuario
    public function borrarUsuarioModel($id,$tabla){
      //Se habla a la clase database
        $con = new Database();
      //se utiliza el metodo delete para enviar la solicitud con el id indicado
        $stm = $con->delete("DELETE FROM $tabla WHERE id_cliente= $id");
        //se regresa una respuesta
        if($stm){
            return "correcto";
        }else{
            return "error";
        }

    }

//--------------------------HABITACIONES------------------------------------------
    //Agregar nuevas habitaciones a la bd
    public function agregarHabitacionModel($datos,$tabla){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite.
        $con = new Database();
      //se obtienen los datos recibidos del arreglo asociativo.
        $u = $datos["tipo_hab"];
        $d = $datos["file_name"];
       
      //Se insertan los datos con una sentencia y trabajando con los metodos de la base de datos.
        $stm = $con->insert("INSERT INTO $tabla (id_tipos_hab,imagen) VALUES ('$u','$d');");
     
      //Se regresa segun los resultados esperados
        return $stm;
    }
    //*******************************
	//Visualizar todas las habitaciones registrados
    public function vistaHabitacionesModel(){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite. 
        $con = new Database();
      //Se realiza un select para traeer a todos los usuarios registrados.
        $stm = $con->select("SELECT id_habitacion,
(SELECT precio from tipos_hab tb where tb.id = h.id_tipos_hab) as precio, 
(SELECT nombre from tipos_hab tb where tb.id = h.id_tipos_hab) as tipo,
(SELECT tamano from tipos_hab tb where tb.id = h.id_tipos_hab) as tamano,
(SELECT cantcamas from tipos_hab tb where tb.id = h.id_tipos_hab) as cantcamas,imagen
FROM habitaciones h;
");
      //Se retorna para que estos puedan ser mostrados.
        return $stm;
    }
	
	 //Editar habitacion
    public function editarHabitacionModel($id){
        $con = new Database();
        $stm = $con->select("select id_habitacion,id_tipos_hab,imagen from habitaciones WHERE id_habitacion = $id;");
        return $stm;

    }
    
	 //Actualizar informacion
    public function actualizarHabitacionModel($datos){
        //se obtienen los datos recibidos del arreglo asociativo.
        $u = $datos["tipo_hab"];
        $d = $datos["file_name"];
				$c = $datos["id_habitacion"];


		    $con = new Database();
        $stm = $con->update("UPDATE habitaciones SET id_tipos_hab='$u',imagen='$d' WHERE id_habitacion = '$c'");
        return $stm;

    }///fin funcion

	//Borrar un habitacion
    public function borrarHabitacionModel($id,$tabla){
      //Se habla a la clase database
        $con = new Database();
      //se utiliza el metodo delete para enviar la solicitud con el id indicado
        $stm = $con->delete("DELETE FROM $tabla WHERE id_habitacion= $id");
			echo " ". "DELETE FROM $tabla WHERE id_habitacion= $id";
        //se regresa una respuesta
        if($stm){
            return "correcto";
        }else{
            return "error";
        }

    }

    
	
	//*****************************
	  //--------------------------RESERVAS------------------------------------------
    //Agregar nuevos usuario a la bd
    public function agregarReservaModel($datos,$tabla){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite.
        $con = new Database();
      //se obtienen los datos recibidos del arreglo asociativo.
        $u = $datos["id_habitacion"];
        $d = $datos["id_cliente"];
        $c = $datos["fecha_entrada"];
        $ci = $datos["fecha_salida"];
			//se le da un formato a las fechas para que puedan ser ingresadas a la bd.
			$entrada= date("y/m/d", strtotime($c));
			$salida= date("y/m/d", strtotime($ci));
      //Se insertan los datos con una sentencia y trabajando con los metodos de la base de datos.
        $stm = $con->insert("INSERT INTO $tabla (id_habitacion,id_cliente,fecha_entrada,fecha_salida,finalizadas) VALUES ('$u','$d','$entrada','$salida',0);");
			//una vez que se inserto al sistema la reserva se actualiza la tabla de habitaciones para indicar que esta esta ocupada.
			$up = $con->update("UPDATE habitaciones SET ocupada = 1 WHERE id_habitacion = '$u';");
      //Se regresa segun los resultados esperados
        return $stm;
    }
	
//Visualizar todas las reservacioes registrados
    public function vistaReservasModel(){
      //Se accede a la clase conexion para acceder a sus metodos segun se necesite. 
        $con = new Database();
      //Se realiza un select para traeer a todos los usuarios registrados.
        $stm = $con->select("select id_reservacion,id_habitacion as numhabitacion,c.nombre as nombre, fecha_entrada, fecha_salida from reservaciones r inner join clientes c on (r.id_cliente = c.id_cliente) WHERE finalizadas = 0;");
      //Se retorna para que estos puedan ser mostrados.
        return $stm;
    }
	
 //Editar usuario
    public function editarReservaModel($id){
        $con = new Database();
        $stm = $con->select("select r.id_reservacion, r.id_habitacion, r.id_cliente, c.nombre,tc.nombre as tipo,tb.precio, tb.nombre as tipohab, r.fecha_entrada, r.fecha_salida from reservaciones r INNER JOIN habitaciones h on (r.id_habitacion = h.id_habitacion) INNER JOIN clientes c on (r.id_cliente = c.id_cliente) INNER JOIN tipos_cliente tc on (c.id_tipo_cliente = tc.id_tipo_cliente) INNER JOIN tipos_hab tb on (h.id_tipos_hab = tb.id) where id_reservacion = $id;");
        return $stm;

    }
   
	  //Actualizar informacion
    public function actualizarReservaModel($datos){
       //se obtienen los datos recibidos del arreglo asociativo.
        $u = $datos["id_habitacion"];
        $d = $datos["id_cliente"];
        $c = $datos["fecha_entrada"];
        $ci = $datos["fecha_salida"];
			  $id = $datos["id"];
			 	$f= $datos["fina"];
			if($f == "on"){
				$f=1;
			}else{
				$f=0;
			}
			//se le da un formato a las fechas para que puedan ser ingresadas a la bd.
			$entrada= date("y/m/d", strtotime($c));
			$salida= date("y/m/d", strtotime($ci));
	

		$con = new Database();
			$stc = $con->update("UPDATE habitaciones SET ocupada = 0 WHERE id_habitacion = '$u';");
        $stm = $con->update("UPDATE reservaciones SET id_habitacion='$u',id_cliente='$d',fecha_entrada='$entrada',fecha_salida='$salida', finalizadas='$f' where id_reservacion= '$id'");
			
        return $stm;

    }
   
  //Borrar una reserva
    public function borrarReservaModel($id,$u,$tabla){
      //Se habla a la clase database
        $con = new Database();
      //se utiliza el metodo delete para enviar la solicitud con el id indicado
        $stm = $con->delete("DELETE FROM $tabla WHERE id_reservacion= $id");
				$stup = $con->update("UPDATE habitaciones SET ocupada = 0 WHERE id_habitacion = '$u';");
        //se regresa una respuesta
        if($stm){
            return "correcto";
        }else{
            return "error";
        }

    }

 


}

?>