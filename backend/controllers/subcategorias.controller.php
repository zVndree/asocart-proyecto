<?php
class ControllerSubcategorias{

    /*=============================================
	MOSTRAR SUBCATEGORIAS
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){

		$tabla = "subcategorias";

		$respuesta = ModeloSubCategorias::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CREAR SUBCATEGORIA
	=============================================*/

	static public function ctrCrearSubCategoria(){

		if(isset($_POST["tituloSubCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloSubCategoria"])){

				
				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = "";

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "views/img/ofertas/".$_POST["rutaSubCategoria"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "views/img/ofertas/".$_POST["rutaSubCategoria"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaOferta);

					}

				}			

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($_POST["selActivarOferta"] == "oferta"){

					$datos = array("nombre"=>$_POST["tituloSubCategoria"],
								"idCategoria"=>$_POST["seleccionarCategoria"],
								"ruta"=>$_POST["rutaSubCategoria"],
								"estado"=> 1,
								"oferta"=>1,
								"precioOferta"=>$_POST["precioOferta"],
								"descuentoOferta"=>$_POST["descuentoOferta"],
								"imgOferta"=>$rutaOferta,
								"finOferta"=>$_POST["finOferta"]);

				}else{

					$datos = array("nombre"=>$_POST["tituloSubCategoria"],
								"idCategoria"=>$_POST["seleccionarCategoria"],
								"ruta"=>$_POST["rutaSubCategoria"],
								"estado"=> 1,
								"oferta"=>0,
								"precioOferta"=>0,
								"descuentoOferta"=>0,
								"imgOferta"=>"",								   
								"finOferta"=>"");

				}

				$respuesta = ModeloSubCategorias::mdlIngresarSubCategoria("subcategorias", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

	static public function ctrEditarSubCategoria(){

		if(isset($_POST["editarTituloSubCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloSubCategoria"])){

				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = $_POST["antiguaFotoOferta"];

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO OFERTA
					=============================================*/

					unlink($_POST["antiguaFotoOferta"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);
					$nuevoAncho = 640;
					$nuevoAlto = 430;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "views/img/ofertas/".$_POST["rutaSubCategoria"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "views/img/ofertas/".$_POST["rutaSubCategoria"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);  			
    					imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaOferta);

					}

				}			

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($_POST["selActivarOferta"] == "oferta"){

					$datos = array("id"=>$_POST["editarIdSubCategoria"],
								"nombre"=>$_POST["editarTituloSubCategoria"],
								"idCategoria"=>$_POST["seleccionarCategoria"],
								"ruta"=>$_POST["rutaSubCategoria"],
								"estado"=> 1,
								"oferta"=>1,
								"precioOferta"=>$_POST["precioOferta"],
								"descuentoOferta"=>$_POST["descuentoOferta"],
								"imgOferta"=>$rutaOferta,
								"finOferta"=>$_POST["finOferta"]);

				}else{

					$datos = array("id"=>$_POST["editarIdSubCategoria"],
								"nombre"=>$_POST["editarTituloSubCategoria"],
								"idCategoria"=>$_POST["seleccionarCategoria"],
								"ruta"=>$_POST["rutaSubCategoria"],
								"estado"=> 1,
								"oferta"=>0,
								"precioOferta"=>0,
								"descuentoOferta"=>0,
								"imgOferta"=>"",								   
								"finOferta"=>"");	

					if($_POST["antiguaFotoOferta"] != ""){

						unlink($_POST["antiguaFotoOferta"]);

					}

				}

				$traerProductos = ModeloProductos::mdlMostrarProductos("productos", "id_subcategoria", $datos["id"]);

				foreach ($traerProductos as $key => $value) {

					if($datos["oferta"] != 0 && $datos["precioOferta"] == 0){

						$precioOfertaActualizado = $value["precio"]-($value["precio"]*$datos["descuentoOferta"]/100);
						$descuentoOfertaActualizado = $datos["descuentoOferta"];
				
					}

					if($datos["oferta"] != 0 && $datos["descuentoOferta"] == 0){	

						$precioOfertaActualizado = $datos["precioOferta"];
						$descuentoOfertaActualizado = 100 - ($datos["precioOferta"]*100/$value["precio"]);
				
					}

					ModeloProductos::mdlActualizarOfertaProductos("productos", $datos, "ofertadoPorSubCategoria", $precioOfertaActualizado, $descuentoOfertaActualizado, $value["id"]);
				
				}
			

				$respuesta = ModeloSubCategorias::mdlEditarSubCategoria("subcategorias", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR SUBCATEGORIA
	=============================================*/

	static public function ctrEliminarSubCategoria(){

		if(isset($_GET["idSubCategoria"])){

			$datos = $_GET["idSubCategoria"];

			/*=============================================
			ELIMINAR IMAGEN OFERTA
			=============================================*/

			if($_GET["imgOferta"] != ""){

				unlink($_GET["imgOferta"]);		

			}

			/*=============================================
			QUITAR LAS SUBATEGORIAS DE LOS PRODUCTOS
			=============================================*/

			$traerProductos = ModeloProductos::mdlMostrarProductos("productos", "id_subcategoria", $_GET["idSubCategoria"]);

			foreach ($traerProductos as $key => $value) {

				$item1 = "id_subcategoria";
				$valor1 = 0;
				$item2 = "id";
				$valor2 = $value["id"];

				ModeloProductos::mdlActualizarProductos("productos", $item1, $valor1, $item2, $valor2);	
				
			}

			$respuesta = ModeloSubCategorias::mdlEliminarSubCategoria("subcategorias", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La subcategoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategorias";

								}
							})

				</script>';

			}		

		}

	}

}
