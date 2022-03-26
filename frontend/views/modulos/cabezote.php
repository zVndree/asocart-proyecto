<?php
$server = Ruta::ctr_ruta_servidor();
$url = Ruta::ctrRuta();

/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/

if(isset($_SESSION["validar_sesion"])){

	if($_SESSION["validar_sesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}
?>



<section class="et-hero-tabs">
	<!--=====================================
Top
======================================-->

	<div class="container-fluid bar_top" id="top">
		<div class="container">
			<div class="row">

				<!--======================
			Redes Sociales
			=======================-->

				<div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 social">

					<ul>

						<?php
						$social = ControllerPlantilla::ctrEstiloPlantilla();
						$jsonRedesSociales = json_decode($social["redesSociales"], true);

						foreach ($jsonRedesSociales as $key => $value) {
							/* var_dump($key,$value["red"]); */

							echo '<li>
								<a href="' . $value["url"] . '" target="_blank">
									<i class="fa ' . $value["red"] . ' red_social ' . $value["estilo"] . '" aria-hidden="true"></i>
								</a>
							</li>';
						}

						?>
						<li>
							<a href="#" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i> <span id="telefono"><?php echo  $social["celular"]; ?></span> </a>
						</li>
						<li>
							<a href="#" target="_blank"><i class="fa fa-envelope" aria-hidden="true" ></i> <span id="correo"><?php echo  $social["correo"];  ?></span> </a>
						</li>
					</ul>
				</div>

				<!--=====================================
			Registro
			======================================-->

				<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 registro">
					<ul>
						<!--=====================================
					Idioma
					======================================-->

						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo $server ?>views/img/template/en.png" alt="">English <span class="caret"></span>
								<ul class="dropdown-menu">
									<li>
										<a class="btn" onclick="changeLang('es')">
											<img src="<?php echo $server ?>views/img/template/es.png" alt=""> Spanish</a>
									</li>
								</ul>
						</li> -->
						<?php
							if (isset($_SESSION["validar_sesion"])) {
								if ($_SESSION["validar_sesion"] == "ok") {
									if ($_SESSION["modo"] == "directo") {
										if ($_SESSION["foto"] != "") {
											echo '<li>
											<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">
											</li>';
											
										}else{
											echo '
											<li><img class="img-circle" src="'.$server.'views/img/usuarios/default/user_icon.png" width="9%">
											</li>';
										}

										echo '<li>|</li>
											<li><a href="'.$url.'perfil">Ver perfil</a></li>
											<li>|</li>
											<li><a href="'.$url.'salir">Salir</a></li>
											';
									}
								}
							}else{
								echo '<li><a href="#modal_ingreso" data-toggle="modal">Ingresar</a></li>
									<li>|</li>
									<li><a href="#modal_registro" data-toggle="modal">Registrarse</a></li>';
							}
						?>
	
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!--=====================================
Header
======================================-->

	<header class="container-fluid bar_down">

		<div class="row" id="cabezote">
			<!--=====================================
			Logotipo
			======================================-->
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="logotipo">
				<a href="#">
					<img src="<?php echo $server . $social["logo"]; ?>" class="img-responsive" style="width:500px;height:100px">
				</a>
			</div>
			<!--=====================================
			Categorias y Buscador
			======================================-->

			<div class="col-lg-5 col-md-6 col-sm-6 col-xs-10">
				<!--=====================================
				Btn Categorias
				======================================-->

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-1 back_color" id="btn_categorias">
					<h4 id="catalogo">CÁTALOGO</h4>
					<span class="pull-right">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</span>
					
				</div>

				<!--=====================================
				Buscador
				======================================-->

				<div class="input-group col-lg-8 col-md-8 col-sm-7 col-xs-10" id="buscador">
					<input type="search" name="buscar" class="form-control" placeholder="¿Qué estás buscando?">
					<span class="input-group-btn">
						<a href="#">
							<button class="btn btn-default back_color" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</a>
					</span>
				</div>
			</div>

			<!--=====================================
			Lista de deseos
			======================================-->
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 text-center" id="deseos">
				<a href="#">
					<i style="color:<?php echo $social["barTop"] ?>" class="fa fa-heart">
						<strong id="favoritos">Mis favoritos</strong>
							<!-- <span class="cantidad_deseos"></span> -->
					</i>
				</a>
			</div>
			<!--=====================================
			Carrito de compras 
			======================================-->
			<div class="col-lg-2 col-md-1 col-sm-1 col-xs-1 text-center" id="carrito">
				<a href="#">
					<i style="color:<?php echo $social["barTop"]?>" class="fa fa-shopping-basket" aria-hidden="true"><strong id="items"> Items</strong><span class="cantidad_cesta"></span> <span class="suma_cesta"></span></i>
				</a>

			</div>
		</div>

		<!--=====================================
		Secion Categorias
		======================================-->
		<div class="col-xs-12 back_color" id="categorias">
			<?php

			$item = null;
			$valor = null;
			$categorias = controladorProductos::ctrListarCategorias($item, $valor);

			foreach ($categorias as $key => $value) {
				/* $icon_categoria = controladorProductos::ctrListarCategorias($item, $valor);
				$json_icon_categoria = json_decode($icon_categoria["icono"], true); */

				echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
									<h4>
										<img src="' . $server . $value["icono"] . '" class="img-responsive">
										<a href="' . $value["ruta"] . '" class="pixel_categorias">' . $value["nombre"] . '
										</a>
									</h4>
									<br>
									<ul>';
				$item = "id_categoria";
				$valor = $value["id"];
				$subcategorias = controladorProductos::ctrListarSubcategorias($item, $valor);

				/* var_dump($subcategorias); */
				foreach ($subcategorias as $key => $value) {
					echo '<li>
						<i class="fa fa-caret-right"></i> <a href=' . $value["ruta"] . ' class="pixel_sub_categorias">' . $value["nombre"] . '
						</a>
						
					</li>';
				}
				echo '</ul>
							
						</div>';
			}
			?>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 all_categorias">
				<h5>
					<a href="views/allCategorias.php">Ver mas categorias...</a>
				</h5>
			</div>
		</div>


	</header>
	<!-------BARRA DE NAVEGACION ----------->

    <!-- <div class="nav_bar_down bar_down">
        <ul id="nav-list" class="nav-menu">
            <li class="menu-item">
                <a href="<?php echo $url ?>"><i class="fa fa-home"></i></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url ?>#about">Sobre Nosotros</a>
            </li>
			<li class="menu-item">
                <a href="<?php echo $url ?>#tienda">Tienda</a>
            </li>
			<li class="menu-item">
                <a href="<?php echo $url ?>#eventos">Eventos</a>
            </li>
			<li class="menu-item">
                <a  href="directorio">Directorio</a>
            </li>
			<li class="menu-item">
                <a href="<?php echo $url ?>#contacto">Contacto</a>
            </li>
        </ul>
        <div id="nav-toggle" class="menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div> -->

	<!--------BTN RESPONSIVE MENu------------->
	<div class="navbar-header" id="btn_menu">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="myNavbar">
		<div class="et-hero-tabs-container bar_down" id="menu" style="<?php echo $social["colorFondo"] ?>">

			<a class=" et-hero-tab" href="<?php echo $url ?>"><i class="fa fa-home"></i></a>
			<a class="et-hero-tab" href="<?php echo $url ?>#about">Sobre Nosotros </a>
			<a class="et-hero-tab" href="<?php echo $url ?>#tienda">Tienda</a>
			<a class="et-hero-tab" href="<?php echo $url ?>#eventos">Eventos</a>
			<a class="et-hero-tab" href="directorio">Directorio</a>
			<a class="et-hero-tab" href="<?php echo $url ?>#contacto">Contacto</a>
			<!-- 			<a class="et-hero-tab" href="#registro_modal"><span class="glyphicon glyphicon-user" data-toggle="modal"></span> Sign Up</a>
 -->
			<!-- 			<a class="et-hero-tab" href="#ingreso_modal"><span class="glyphicon glyphicon-log-in" data-toggle="modal"></span> Login</a>
		-->
			<span class="et-hero-tab-slider"></span>
		</div>
	</div>



	<!----=================----
BOTON SUBIR
------=================--->

</section>

<!----=================----
VENTANA MODAL REGISTRO
------=================--->

<!-- Modal -->
<div class="modal fade modal_formulario" id="modal_registro" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body modal_titulo">
				<h3 class="back_color">REGÍSTRATE</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<!----=================----
				Registro con Facebook
				------=================--->
				<div class="col-sm-6 col-xs-12 regis_face" id="btn_regis_face">
					<p>
						<i class="fa fa-facebook"></i>
						Regístrate con Facebook
					</p>
				</div>
				<!----=====================
				Registro con Google
				========================--->
				<div class="col-sm-6 col-xs-12 regis_google" id="btn_regis_google">
					<p>
						<i class="fa fa-google"></i>
						Regístrate con Google
					</p>
				</div>

				<!----=====================
				Registro con correo
				========================--->

				<form method="post" onsubmit="return registro_user()">
					<!-----INPUT NOMBRE------>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
							<input type="text" class="form-control" name="regis_user" id="regis_user" placeholder="Nombre Completo" required="required">

						</div>
					</div>
					<!-----INPUT CORREO------>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope"></i>
							</span>
							<input type="email" class="form-control" name="regis_email" id="regis_email" placeholder="Correo Electronico" required="required">
						</div>
					</div>
					<!-----INPUT CONTRASEÑA------>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-lock"></i>
							</span>
							<input type="password" class="form-control" name="regis_pass" id="regis_pass" placeholder="Contraseña" required="required">
							<span id="imgContrasena" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icono-pass"></span>

						</div>
					</div>


					<!----==========================
					POLITICAS TERMINOS Y CONDICIONES
					============================--->
					<div class="checkbox">
						<label>
							<input type="checkbox" id="reg_politicas" required="required">
							<small>Haciendo clic en Enviar aceptas nuestras condiciones de uso y politicas de privacidad <a href="https://www.iubenda.com/privacy-policy/34165403" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Política de Privacidad ">Leer más</a>
								<script type="text/javascript">
									(function(w, d) {
										var loader = function() {
											var s = d.createElement("script"),
												tag = d.getElementsByTagName("script")[0];
											s.src = "https://cdn.iubenda.com/iubenda.js";
											tag.parentNode.insertBefore(s, tag);
										};
										if (w.addEventListener) {
											w.addEventListener("load", loader, false);
										} else if (w.attachEvent) {
											w.attachEvent("onload", loader);
										} else {
											w.onload = loader;
										}
									})(window, document);
								</script>
							</small>

						</label>
					</div>
					<?php
					$registro = new controller_usuarios();
					$registro->ctr_registro_usuarios();
					?>

					<input type="submit" class="btn btn-default btn-block back_color" value="ENVIAR" style="font-weight: bold;">
					<!-- <div class="col-xs-12">
						<a href="#modal_registro" class="btn btn-default btn-block back_color" style="margin: 8px 0px;" role="button" aria-pressed="true" onclick="registro_user();"><strong>ENVIAR</strong></a>
					</div> -->
				</form>
			</div>
			<div class="modal-footer">
				<p>¿Ya tienes una cuenta? | <strong><a href="#modal_ingreso" data-dismiss="modal" data-toggle="modal"><span> | Ingresar</span></a></strong> </p>
			</div>
		</div>
	</div>
</div>

<!----=================----
VENTANA MODAL LOGIN
------=================--->

<!-- Modal -->
<div class="modal fade modal_formulario" id="modal_ingreso" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body modal_titulo">
				<h3 class="back_color">INICIAR SESIÓN</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<!----=================----
				Ingreso con Facebook
				------=================--->
				<div class="col-sm-6 col-xs-12 regis_face" id="btn_regis_face">
					<p>
						<i class="fa fa-facebook"></i>
						Ingreso con Facebook
					</p>
				</div>
				<!----=====================
				Ingreso con Google
				========================--->
				<div class="col-sm-6 col-xs-12 regis_google" id="btn_regis_google">
					<p>
						<i class="fa fa-google"></i>
						Ingreso con Google
					</p>
				</div>

				<!----=====================
				INGRESO CON CORREO
				========================--->

				<form method="post">

					<!----=====================
					INPUT CORREO
					========================--->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope"></i>
							</span>
							<input type="email" class="form-control" name="ing_email" id="ing_email" placeholder="Correo Electronico" required="required">
						</div>
					</div>

					<!----=====================
					INPUT CONTRASEÑA
					========================--->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-lock"></i>
							</span>
							<input type="password" class="form-control" name="ing_pass" id="ing_pass" placeholder="Contraseña" required="required">
<!-- 							<span id="imgContrasena" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icono-pass"></span>
-->
						</div>
					</div>

				

					<?php
					$ingreso = new controller_usuarios();
					$ingreso ->ctr_ingreso_usuarios();
					?>

					<input type="submit" class="btn btn-default btn-block back_color btn_login" value="ENVIAR" style="font-weight: bold;">
					<!-- <div class="col-xs-12">
						<a href="#modal_registro" class="btn btn-default btn-block back_color" style="margin: 8px 0px;" role="button" aria-pressed="true" onclick="registro_user();"><strong>ENVIAR</strong></a>
					</div> -->
				</form>
			</div>
			<div class="modal-footer">
				<p>¿No tienes una cuenta? <a href="#modal_registro" data-dismiss="modal" data-toggle="modal"><span><strong>| Regístrate</strong> </span></a></p>
			</div>
		</div>
	</div>
</div>