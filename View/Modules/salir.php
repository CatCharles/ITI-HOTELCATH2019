<?php

session_start();
$_SESSION["usuario"] = "";
$_SESSION=array();
session_destroy();
session_unset();
 echo '<script>		
			              location.href= "index.php?action=index";
		                </script>';

?>

<h1>¡Haz salido de la aplicación!</h1>