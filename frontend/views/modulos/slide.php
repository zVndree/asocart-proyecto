<!--======================
SLIDE
=======================-->
<div class="container-fluid" id="slide">
	<div class="row">
		<!--======================
        Items-Slide
        =======================-->
		<ul>

			<?php
			$server = Ruta::ctr_ruta_servidor();
			$slide = Controller_slide::ctr_mostrar_slide();
			/* var_dump($slide); */

			foreach ($slide as $key => $value) {
				# code...
				$style_img_producto = json_decode($value["style_img_producto"], true);
				$style_text_slide = json_decode($value["style_text_slide"], true);
				$titulo1 = json_decode($value["titulo1"], true);
				$titulo2 = json_decode($value["titulo2"], true);
				$titulo3 = json_decode($value["titulo3"], true);
				/* var_dump($style_img_producto); */

				# code...

				echo '	<li>

							<img src="'.$server . $value["img_fondo"] . '">
							<div class="slide_opciones ' . $value["tipo_slide"] . '">
								<img class="img_producto" src="'. $server . $value["img_producto"] . '" style="top:' . $style_img_producto["top"] . '; right: ' . $style_img_producto["right"] . '; width: ' . $style_img_producto["width"] . '; left:' . $style_img_producto["left"] . '">
								<div class="textos_slide" style="top:' . $style_text_slide["top"] . '; right:' . $style_text_slide["right"] . '; width:' . $style_text_slide["width"] . '; left:' . $style_text_slide["left"] . '">
									<h1 style="color: ' . $titulo1["color"] . '">' . $titulo1["texto"] . '</h1>
									<h3 style="color:' . $titulo2["color"] . '">' . $titulo2["texto"] . '</h3>
									<h4 style="color:' . $titulo3["color"] . '">' . $titulo3["texto"] . '</h4>
									<a href="' . $value["url"] . '">
										' . $value["boton"] . '
									
									</a>
								</div>
							</div>
						</li>';
			}
			?>


		</ul>

		<!-- flechas "anterior" <-  -> "siguiente" -->
		<div class="flechas " id="anterior"><span class="fa fa-chevron-left"></span></div>
		<div class="flechas " id="siguiente"><span class="fa fa-chevron-right"></span></div>
		<!----Scrow down------->
		<section class="company-heading intro-type" id="parallax-one">
			<div class="container">
				<div class="row product-title-info">
					<div class="col-md-12 icono">
						<a class="ct-btn-scroll ct-js-btn-scroll" href="#section2"><span class="fa fa-angle-double-down" aria-hidden="true"></span></a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- paginacion slides -->

	<ol id="paginacion">

		<?php
		for ($i=1; $i <= count($slide); $i++) { 
			echo '<li item="'.$i.'"><span class="fa fa-circle"></span></li>';
			
		}
		
		?>
	</ol>
</div>
</div>

<!----=================----
BOTON DE SUBIR 
------=================--->
<a href="#" class="btn-up-top" id="btn_up">
	<i class="fa fa-angle-double-up icono-up"></i>
</a>
<!----=================----
BOTON DE WHATSAPP
------=================--->

<a href="https://api.whatsapp.com/send?phone=+57 3222256287&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20producto." data-toggle="tooltip" data-placement="left" title="¿En que podemos ayudarte?" class="float" target="_blank">
	<i class="fa fa-whatsapp my-float"></i>
</a>