<?php 
/*
AUTOR: CATHERINE ALESSANDRA TORRES CHARLES

TECNOLOGIAS Y APLICACIONES WEB 2019.
*/
//El index muestra la salida de las vistas al usuario tambien atravez de el enviaremos las distintas acciones que el usuario envie al controlador
//Se inicia una sesion de php
session_start();
//se verifica si la variable de sesion usuario existe para poder acceder o en su defecto esta lo enviara al archivo
//inicio.php donde se encuentra el inicio de sesion.
if (!isset($_SESSION['usuario'])) {
   header('Location: inicio.php');
    exit;
}else{ //En caso de haber accedido se cargaran los archivos necesarios con arquitectura MVC.
    require_once "Controller/controller.php";
    require_once "Model/model.php";
    require_once "Model/crud.php";
//Se llama a la clase Mvc..
  //Se carga el metodo que contiene el templete completo.
    $mvc = new MvcController();
    $mvc -> plantilla();
}
?>