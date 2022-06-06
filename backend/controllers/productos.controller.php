<?php
    
class ControllerProductos{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR TOTAL PRODUCTOS
	=============================================*/

	static public function ctrMostrarTotalProductos($orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);

		return $respuesta;

	}

	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	static public function ctrSubirMultimedia($datos, $ruta){
		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["tmp_name"]);	
			$nuevoAncho = 1000;
			$nuevoAlto = 1000;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA MULTIMEDIA
			=============================================*/

			$directorio = "../views/img/multimedia/".$ruta;

			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA
			=============================================*/

			if (!file_exists($directorio)){
				mkdir($directorio, 0755);
			
			}

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];
				$origen = imagecreatefromjpeg($datos["tmp_name"]);						
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagejpeg($destino, $rutaMultimedia);

			}

			if($datos["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];
				$origen = imagecreatefrompng($datos["tmp_name"]);						
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				imagealphablending($destino, FALSE);		
				imagesavealpha($destino, TRUE);
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagepng($destino, $rutaMultimedia);
			}
			return $rutaMultimedia;	
		}
	}
	
	/*=============================================
	CREAR PRODUCTOS
	=============================================*/

	static public function ctrCrearProducto($datos){

		if(isset($datos["tituloProducto"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloProducto"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\?\¿\!\¡\ ]+$/', $_POST["descripcionProducto"]) ){

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../views/img/products/default/default.jpg";
				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	
					$nuevoAncho = 400;
					$nuevoAlto = 450;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutaFotoPrincipal = "../views/img/products/".$datos["rutaProducto"].".jpg";
						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutaFotoPrincipal = "../views/img/products/".$datos["rutaProducto"].".png";
						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);	
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = "";

				if(isset($datos["fotoOferta"]["tmp_name"]) && !empty($datos["fotoOferta"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoOferta"]["tmp_name"]);
					$nuevoAncho = 640;
					$nuevoAlto = 430;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "../views/img/ofertas/".$datos["rutaProducto"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaOferta);

					}

					if($datos["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaOferta = "../views/img/ofertas/".$datos["rutaProducto"].".png";

						$origen = imagecreatefrompng($datos["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);			
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaOferta);

					}
				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTA EN CAMINO
				=============================================*/

				if($datos["selActivarOferta"] == "oferta"){

					$datosProducto = array(
						"titulo"=>$datos["tituloProducto"],
						"idCategoria"=>$datos["categoria"],
						"idSubCategoria"=>$datos["subCategoria"],
						"multimedia"=>$datos["multimedia"],
						"ruta"=>$datos["rutaProducto"],
						"estado"=> 1,
						/* "titular"=> substr($datos["descripcionProducto"], 0, 225)."...", */
						"descripcion"=> $datos["descripcionProducto"],
						"precio"=> $datos["precio"],
						"peso"=> $datos["peso"],
						"entrega"=> $datos["entrega"],  
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						"oferta"=>1,
						"precioOferta"=>$datos["precioOferta"],
						"descuentoOferta"=>$datos["descuentoOferta"],
						"imgOferta"=>substr($rutaOferta,3),
						"finOferta"=>$datos["finOferta"]
					);


				}else{

					$datosProducto = array(
						"titulo"=>$datos["tituloProducto"],
						"idCategoria"=>$datos["categoria"],
						"idSubCategoria"=>$datos["subCategoria"],
						"multimedia"=>$datos["multimedia"],
						"ruta"=>$datos["rutaProducto"],
						"estado"=> 1,
						/* "titular"=> substr($datos["descripcionProducto"], 0, 225)."...", */
						"descripcion"=> $datos["descripcionProducto"],
						"precio"=> $datos["precio"],
						"peso"=> $datos["peso"],
						"entrega"=> $datos["entrega"],  
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						"oferta"=>0,
						"precioOferta"=>0,
						"descuentoOferta"=>0,
						"imgOferta"=>"",
						"finOferta"=>""
					);

				}

				$respuesta = ModeloProductos::mdlIngresarProducto("productos", $datosProducto);

				return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';



			}
		
		}

	}

}
    
