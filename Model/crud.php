<?php 
//Aqui se realizara todas las operaciones necesarias para registros,CRUD etc.

//Llamando al archivo que contiene las conexiones necesarias a la base de datos
include_once "conexion.php";

//Se crea una clase Datos extendiendo de la conexion para acceder a sus metodos.
class Datos extends Database{
    
    //------------------------------VENTAS------------------------------------
    //Visualizar todas las ventas realizadas
    public function vistaVentasModel(){
        $con = new Database();
        $stm = $con->select("select v.id_venta as id ,u.nombre as vendedor, v.fecha,v.total,v.id_ticket from tda_ventas v inner join tda_usuarios u on (v.id_usuario = u.id_usuario) ORDER BY v.fecha desc;");
        return $stm;
    }
    ////Visualizar todas las ventas realizadas
    public function vistaVentasTicketModel(){
        $con = new Database();
        $stm = $con->select("select id_ticket,p.nombre as producto, cantidad,total from tda_ticket t inner join tda_productos p on (t.id_producto = p.id_producto);");
        return $stm;
    }
    //Eliminar una venta seleccionada
    public function borrarVentaModel($id,$tabla,$campo){
        $con = new Database();
        $stm = $con->delete("DELETE FROM $tabla WHERE $campo= $id");
        
        if($stm){
            return "correcto";
        }else{
            return "error";
        }
    }
    //Insertar nuevas ventas a la base de datos.
    public function ingregarVentasModel($ticket,$venta){
        $con = new Database();
        $id_producto = $ticket["idproducto"];
        $ttotal = $ticket["ptotal"];
        $tcantidad = $ticket["cantidad"];

        $id_usuario = $venta["idusuario"];

        $stm = $con->insert("INSERT INTO tda_ticket (id_producto,total,cantidad) VALUES ('$id_producto','$ttotal','$tcantidad');");
        $str = $con->select("select max(id_ticket) as mas from tda_ticket;");
        foreach($str as $s){ $id_ticket = $s["mas"];}
        $vtotal=$venta["ptotal"];
        $vfecha=$venta["fecha"];
        if($stm){
            echo "entroo "."INSERT INTO tda_ventas (id_usuario,id_ticket,total,fecha) VALUES ('$id_usuario','$id_ticket','$vtotal','$vfecha');";
        $stm1 = $con->insert("INSERT INTO tda_ventas (id_usuario,id_ticket,total,fecha) VALUES ('$id_usuario','$id_ticket','$vtotal','$vfecha');");
        echo " ". $stm1;
        return $stm1;
           
        }else{
            
            return false;
        }

        return $stm1;

    }

    //--------------------------USUARIOS------------------------------------------
    //se verifica el ingreso al sistema.
    public function ingresaUsuarioModel($datos,$tabla){
        $con = new Database();
        $data = $datos["email"];
        $stm = $con->select("SELECT email,contrasena,nombre,id_usuario FROM $tabla WHERE email = '$data'; ");
        return $stm;
    }
    //Agregar nuevos usuario a la bd
    public function agregarUsuariosModel($datos,$tabla){
        $con = new Database();
        $u = $datos["usuario"];
        $d = $datos["contrasena"];
        $t = $datos["email"];
        $c = $datos["nombre"];
        $ci = $datos["ap_paterno"];
        $s = $datos["ap_materno"];

        $stm = $con->insert("INSERT INTO tda_usuarios (usuario,contrasena,email,nombre,ap_paterno,ap_materno) VALUES ('$u','$d','$t','$c','$ci','$s');");

        return $stm;
    }

    //Visualizar todas los usuarios registrados
    public function vistaUsuariosModel(){
        $con = new Database();
        $stm = $con->select("select id_usuario,nombre,ap_paterno,ap_materno,email from tda_usuarios;");
        return $stm;
    }

    //Borrar un usuario
    public function borrarUsuarioModel($id,$tabla){
        $con = new Database();
        $stm = $con->delete("DELETE FROM $tabla WHERE id_usuario= $id");
        
        if($stm){
            return "correcto";
        }else{
            return "error";
        }

    }

    //Editar usuario
    public function editarUsuarioModel($id){
        $con = new Database();
        $stm = $con->select("select nombre,email,usuario,ap_paterno,ap_materno,contrasena,id_usuario from tda_usuarios WHERE id_usuario = $id;");
        return $stm;

    }
    
    //Actualizar informacion
    public function actualizarUsuarioModel($datos){
        $u = $datos["usuario"];
        $d = $datos["contrasena"];
        $t = $datos["email"];
        $c = $datos["nombre"];
        $ci = $datos["ap_paterno"];
        $s = $datos["ap_materno"];
        $id=$datos["id_usuario"];


		$con = new Database();
        $stm = $con->update("UPDATE tda_usuarios SET usuario = '$u', contrasena='$d',email='$t',nombre='$c',ap_paterno='$ci',ap_materno='$s' WHERE id_usuario = '$id'");
        return $stm;

    }
    //----------------------------------PRODUCTOS------------------------------------------------
    //Visualizar LOS PRODUCTOS
    public function vistaProductosModel(){
        $con = new Database();
        $stm = $con->select("SELECT id_producto,nombre,precio FROM tda_productos");
        return $stm;
    }

    //Agregar productos nuevos
    public function agregarProductosModel($datos){
        $con = new Database();
        $u = $datos["nombre"];
        $d = $datos["precio"];
        $stm = $con->insert("INSERT INTO tda_productos (nombre,precio) VALUES ('$u','$d');");

        return $stm;
    }

    //Editar producto
    public function editarProductoModel($id){
        $con = new Database();
        $stm = $con->select("select id_producto,nombre,precio from tda_productos WHERE id_producto = $id;");
        return $stm;

    }

    //Actualizar producto
    public function actualizarProductoModel($datos){
        $u = $datos["nombre"];
        $d = $datos["precio"];
        $id=$datos["id_producto"];


		$con = new Database();
        $stm = $con->update("UPDATE tda_productos SET nombre = '$u', precio='$d' WHERE id_producto = '$id'");
        
        return $stm;

    }

    //borrar producto
    public function borrarProductoModel($id,$tabla){
        $con = new Database();
        $stm = $con->delete("DELETE FROM $tabla WHERE id_producto= $id");
        
        if($stm){
            return "correcto";
        }else{
            return "error";
        }
    }


}

?>