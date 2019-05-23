<?php

session_start();
$_SESSION["validar"] = false;
$_SESSION=array();
session_destroy();
session_unset();

header("location:index.php?action=inicio");

?>

<h1>¡Haz salido de la aplicación!</h1>