<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Hotel GoodAvenue</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/jquery.dataTables.min.css">
	<!-- Dropify -->
	<link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">

	<!-- Datepicker -->
	<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

	<!-- DateRangepicker -->
	<link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">
	
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">


</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.php" class="logo">Hotel GoodAvenue</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="index.php?action=perfil"><?php echo $_SESSION['usuario'];?></a></h5>
			<h5 class="position">Administrador</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="#"><i class="fa fa-user"></i> Perfil</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> Ajustes</a></div>
					<div class="control-item"><a href="index.php?action=salir"><i class="fa fa-sign-out"></i> Salir</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title" style="text-align: center;">Hotel administración</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect" href="index.php"><i class="menu-icon fa fa-home"></i><span>Inicio</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-credit-card-alt"></i><span>Reservas</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="index.php?action=administracion_reservas">Visualizar reservas</a></li>
						<li><a href="index.php?action=agregar_reserva">Reservar</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-hotel"></i><span>Habitaciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="index.php?action=habitacion">Visualizar habitaciónes</a></li>
						<li><a href="index.php?action=agregar_habitacion">Agregar habitaciónes</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user ico"></i><span>Clientes</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="index.php?action=cliente">Visualizar clientes</a></li>
						<li><a href="index.php?action=agregar_cliente">Agregar clientes</a></li>
						<li><a href="index.php?action=administrar_clientes">Adminstrar clientes</a></li>
						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				
			</ul>
			
			<!-- /.menu js__accordion -->
			
			<!-- /.title -->
			
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title" >Hotel</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		
		<!-- /.ico-item -->
		<!-- /.ico-item fa fa-fa-arrows-alt -->
		<!-- /.ico-item -->
		
		<a href="index.php?action=salir" class="ico-item fa fa-power-off"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


<!-- /#notification-popup -->


<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		
		<?php include "loadatemplete.php"; ?>

		<footer class="footer">
			<ul class="list-inline">
				<li>2019 © HotelAvenue - cathycharles.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div>

	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/editable-table/mindmup-editabletable.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>
	
	<!-- Dropify -->
	<script src="assets/plugin/dropify/js/dropify.min.js"></script>
	<script src="assets/scripts/fileUpload.demo.min.js"></script>
	
		<!-- Datepicker -->
	<script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

	<!-- Moment -->
	<script src="assets/plugin/moment/moment.js"></script>

	<!-- DateRangepicker -->
	<script src="assets/plugin/daterangepicker/daterangepicker.js"></script>

	<!-- Maxlength -->
	<script src="assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

	<!-- Demo Scripts -->
	<script src="assets/scripts/form.demo.min.js"></script>
	
		<!-- Chartist Chart -->
	<script src="assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="assets/scripts/chart.chartist.init.min.js"></script>
	
	
	<!-- Percent Circle -->
	<script src="assets/plugin/percircle/js/percircle.js"></script>


	<script src="assets/scripts/main.min.js"></script>


</body>
</html>