<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Inicio</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form method="post" class="frm-single">
		<div class="inside">
			<div class="title"><strong>Hotel</strong>GoodAvenue</div>
			<!-- /.title -->
			<div class="frm-title">Inicio</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" placeholder="Email" name = "usuario" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Contraseña" name="contrasena" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				
				<!-- /.pull-left -->
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" name="dale" id="dale" class="frm-submit">Iniciar sesión<i class="fa fa-arrow-circle-right"></i></button>
			
			<!-- /.row -->
			
			<div class="frm-footer">Hotel GoodAvenue © 2019.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
<?php
//Se cargan los archivos MVC 
include_once "Controller/controller.php";
include_once "Model/crud.php";
//Se llama a la clase MVC
$ingresa = new MvcController();
//Se solicita la verificacion del usuario recien ingresado.
$ingresa ->ingresaUsuarioController();
?>