<?php
$con = new Database();
$val =  $con->select("select sum(tb.precio) as total from habitaciones h INNER join tipos_hab tb on(h.id_tipos_hab = tb.id) inner JOIN reservaciones r on (r.id_habitacion = h.id_habitacion) where MONTH(r.fecha_entrada) = 5;");
foreach($val as $v){
	$total= $v["total"];
	$por = round($total/30);
}
?>

<div class="box-content card">

<div class="box-content" style="float:left;">
					<h4 class="box-title">Ganancias por mes</h4>
					<!-- /.box-title -->
				
					<div class="content widget-stat-chart">
						<div class="c100 p94 small green js__circle">
							<span><?php echo $por.' %';?></span>
							<div class="slice">
								<div class="bar" style="transform: rotate(338.4deg);"></div>
								<div class="fill"></div>
							</div>
						</div>
						<!-- /.c100 p58 -->
						<div class="right-content">
							<h2 class="counter"><?php echo "$ ".$total;?></h2>
							<!-- /.counter -->
							<p class="text">Ganancia</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
					</div>
					<!-- /.content -->
				</div>
	<div class="box-content" style="float:right;">
					<h4 class="box-title">Seleccione un mes del año</h4>

<input type="month" name="mes" value="2019-05" class="box-content" >
					<!-- /.box-title -->
	<button type="button" name="calcula" class="btn btn-primary waves-effect waves-light">Calcular</button>
				
					
					<!-- /.content -->
				</div>
</div>

