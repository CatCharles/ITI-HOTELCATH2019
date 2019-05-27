<?php 
    class EnlacesPaginas{

        public function enlacesPaginasModel($enlacesModel){
            //Dependiendo a lo que contenga el parametro es a donde nos enviara a la vista.
            //Seccion de clientes
            if($enlacesModel == "cliente" || $enlacesModel == "borrar_cliente" || $enlacesModel == "editar_cliente"  || $enlacesModel == "agregar_cliente" || $enlacesModel == "perfil" || $enlacesModel == "administrar_clientes") {
                $module = "View/Modules/".$enlacesModel.".php";
            } 
            
            //seccion de habitaciones
            else if($enlacesModel == "habitacion" || $enlacesModel == "borrar_habitacion" || $enlacesModel == "editar_habitacion"  || $enlacesModel == "agregar_habitacion") {
                $module = "View/Modules/".$enlacesModel.".php";

            } 

            //seccion de reservas
            else if($enlacesModel == "administracion_reservas" || $enlacesModel == "borrar_reserva" || $enlacesModel == "editar_reserva"  || $enlacesModel == "agregar_reserva") {
                $module = "View/Modules/".$enlacesModel.".php";

            }
          //seccion de salida
            else if($enlacesModel == "salir") {
                $module = "View/Modules/".$enlacesModel.".php";

            }

            else if($enlacesModel == "index"){//En caso de no tener nada lleva al inicio de sesion

                $module = "View/Modules/dashboard.php";
            }else{
                $module = "View/Modules/dashboard.php";
            }

            return $module;

        }
    }
?>