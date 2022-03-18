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

	$server = Ruta::ctr_ruta_servidor();

	$icono = ControllerPlantilla::ctrEstiloPlantilla();
	echo '<link rel="icon" href="'. $server . $icono["icono"] . '" >';

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

	<!--=====================================
	Plugins Javascript
	======================================-->

	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/jquery.scrollUp.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $url; ?>views/js/plugins/sweetalert.min.js"></script>


</head>

<body>


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

	if (isset($_GET["ruta"])) {

		$rutas = explode("/", $_GET["ruta"]);

		$item = "ruta";
		$valor = $rutas[0];

		/* var_dump($rutas); */

		/*=============================================
		URL'S AMIGABLES DE CATEGORÍAS
		=============================================*/

		$ruta_categorias = controladorProductos::ctrListarCategorias($item, $valor);

		if (is_array($ruta_categorias)) {
			if ($rutas[0] == $ruta_categorias["ruta"]) {
				$ruta = $rutas[0];
			}
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
		Lista Blanca de URL amigables
		=============================================*/

		if ($ruta != null) {
			include "modulos/productos.php";
		}else if($rutas[0] == "verificar"){

			include "modulos/".$rutas[0].".php";
		}else if($rutas[0] == "inicio"){

			include "modulos/slide.php";
	
			include "modulos/destacados.php";
	
		}else{
	
			include "modulos/error404.php";
		}
		/* } else {
			include "modulos/error404.php";
		} */
	}else{
		include "modulos/slide.php";
		include "modulos/destacados.php";
		include "modulos/eventos.php";

	}


	?>
	
	<!--=====================================
	JAVASCRIPT PERSONALIZADO
	======================================-->

	<script src="<?php echo $url; ?>views/js/cabezote.js"></script>
	<script src="<?php echo $url; ?>views/js/plantilla.js"></script>
	<script src="<?php echo $url; ?>views/js/slide.js"></script>
	<script src="<?php echo $url; ?>views/js/usuarios.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>