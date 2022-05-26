<?php
	$plantilla = ControllerPlantilla::ctrEstiloPlantilla();
?>
<!--=====================================
BREADCRUMB CARRITO DE COMPRAS
======================================-->

<div class="container-fluid well well-sm">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
TABLA CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">
	<div class="container">
		<div class="panel panel-default">

			<!--=====================================
			CABECERA CARRITO DE COMPRAS
			======================================-->

			<div class="back_color panel-heading cabeceraCarrito">
				<h4 class="panel-title"><strong>Tu carrito de compras</strong></h4><br>
				<div class="col-md-6 col-sm-7 col-xs-12 text-center">
					<h5>
						<strong>PRODUCTO</strong>
					</h5>
				</div>

				<div class="col-md-2 col-sm-1 col-xs-0 text-left">
					
					<h5>
						
						<strong>PRECIO</strong>
					</h5>

				</div>

				<div class="col-sm-2 col-xs-0 text-left">		
					<h5>
						<strong>CANTIDAD</strong>
					</h5>
				</div>

				<div class="col-sm-2 col-xs-0 text-left">		
					<h5>
						<strong>SUBTOTAL</strong>
					</h5>
				</div>

				
			</div>

			<!--=====================================
			CUERPO CARRITO DE COMPRAS
			======================================-->

			<div class="panel-body cuerpoCarrito">

				
			</div>

			<!--=====================================
			SUMA DEL TOTAL DE PRODUCTOS
			======================================-->

			<div class="panel-body sumaCarrito">
				<div class="col-md-4 col-sm-6 col-xs-12 pull-right well">				
					<div class="col-xs-6">
						
						<h4>TOTAL:</h4>
					</div>

					<div class="col-xs-6">
						<h4 class="sumaSubTotal">
							
							
						</h4>
					</div>
				</div>
			</div>

			<!--=====================================
			BOTÓN CHECKOUT
			======================================-->

			<div class="panel-heading cabeceraCheckout">
				
				<button style="color: <?php echo $plantilla["bar_down"]; ?>; background: <?php echo $plantilla["verde"];?>;" class="add_cart btn btn-default btn-lg pull-right">Realizar Pago</button>

			</div>
		</div>
	</div>
</div>