<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="title" content="Artesanias-Girardot">
	<meta name="description" content="Tienda virtual para la organizacion de artesanos de la ciudad de Girardot. ">
	<meta name="keyword" content="artesanias,Tienda,e-commerce,productos,Girardot">
	<title>Artesanias-Girardot</title>

	<!--=====================================
	Icono
	======================================-->

	<?php

	/*=============================================
	Ruta fija del proyecto(estatica) LADO SERVER
	=============================================*/
	session_start();

	$server = Ruta::ctr_ruta_servidor();

	$plantilla = ControllerPlantilla::ctrEstiloPlantilla();
	echo '<link rel="icon" href="' . $server . $plantilla["icono"] . '" >';

	/*=============================================
	Ruta fija del proyecto(estatica) LADO CLIENTE
	=============================================*/

	$url = Ruta::ctrRuta();
	/* var_dump($url); */



	?>

	<!--=====================================
	Plugins de css
	======================================-->

	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/sweetalert.css">
	<link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/flexslider.css">

	<!--=====================================
	Google Fonts  
	======================================-->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

	<!--=====================================
	Estilos personalizadas  
	======================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plantilla.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/cabezote.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/slide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/productos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/evento.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/perfil.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/info-producto.css">



	<!--=====================================
	Plugins Javascript
	======================================-->

	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/jquery.scrollUp.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/jquery.flexslider.js"></script>


</head>

<body>

	<div class="preloader"></div>


	<?php

	/*=============================================
	Cabezote
	=============================================*/

	include "modulos/cabezote.php";

	/*=============================================
	Contenido Dinamico
	=============================================*/

	$rutas = array();
	$ruta = null;
	$info_producto  = null;

	if (isset($_GET["ruta"])) {

		$rutas = explode("/", $_GET["ruta"]);

		$item = "ruta";
		$valor = $rutas[0];

		/* var_dump($rutas); */

		/*=============================================
		URL'S AMIGABLES DE CATEGOR??AS
		=============================================*/

		$ruta_categorias = controladorProductos::ctrListarCategorias($item, $valor);

		if (is_array($ruta_categorias) && $rutas[0] == $ruta_categorias["ruta"]) {

			$ruta = $rutas[0];
		}

		/*=============================================
		URL'S AMIGABLES DE SUBCATEGORIAS
		=============================================*/
		$ruta_subcategoria = controladorProductos::ctrListarSubcategorias($item, $valor);

		foreach ($ruta_subcategoria as $key => $value) {

			if ($rutas[0] == $value["ruta"]) {
				$ruta = $rutas[0];
			}
		}

		/*=============================================
		URL'S AMIGABLES DE PRODUCTOS
		=============================================*/

		$ruta_productos = controladorProductos::ctr_mostrar_info_productos($item, $valor);

		if (is_array($ruta_productos) && $rutas[0] == $ruta_productos["ruta"]) {
			$info_producto = $rutas[0];
		}


		/*=============================================
		Lista Blanca de URL amigables
		=============================================*/

		if ($ruta != null || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto") {
			include "modulos/productos.php";
		} else if ($info_producto != null) {

			include "modulos/info_product.php";
		} else if ($rutas[0] == "buscador" || $rutas[0] == "verificar" || $rutas[0] == "salir" || $rutas[0] == "perfil" || $rutas[0] == "about" || $rutas[0] == "directorio" || $rutas[0] == "todas-las-categorias") {

			include "modulos/" . $rutas[0] . ".php";

		} else if ($rutas[0] == "inicio") {

			include "modulos/slide.php";

			include "modulos/destacados.php";
		} else {

			include "modulos/error404.php";
		}
		/* } else {
			include "modulos/error404.php";
		} */
	} else {
		include "modulos/slide.php";
		include "modulos/destacados.php";
		include "modulos/eventos.php";
	}


	?>

	<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

	<!--=====================================
	JAVASCRIPT PERSONALIZADO
	======================================-->

	<script src="<?php echo $url; ?>views/js/cabezote.js"></script>
	<script src="<?php echo $url; ?>views/js/plantilla.js"></script>
	<script src="<?php echo $url; ?>views/js/slide.js"></script>
	<script src="<?php echo $url; ?>views/js/usuarios.js"></script>
	<script src="<?php echo $url; ?>views/js/productos.js"></script>
	<script src="<?php echo $url; ?>views/js/registro_fb.js"></script>
	<script src="<?php echo $url; ?>views/js/buscador.js"></script>
	<script src="<?php echo $url; ?>views/js/info-producto.js"></script>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<!--=====================================
	API DE FACEBOOK FB-LOGIN
	======================================-->

	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId: '471644254701291',
				cookie: true,
				xfbml: true,
				version: 'v13.0'
			});

			FB.AppEvents.logPageView();

		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

</body>

</html>