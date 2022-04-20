<?php

/**
 * Ajustes Controller
 */

class ControllerAjustes
{

	/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/
	
	static public function ctrSeleccionarPlantilla()
	{
		$tabla = "plantilla";
		$respuesta = ModeloAjustes::mdlSeleccionarPlantilla($tabla);
		return $respuesta;
	}

	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function ctrActualizarlogoicono($item, $valor){

		$tabla = "plantilla";
		$id = 1;
		$plantilla = ModeloAjustes::mdlSeleccionarPlantilla($tabla);

		/*=============================================
		CAMBIANDO LOGOTIPO O ICONO
		=============================================*/

		$valorNuevo = $valor;

		if (isset($valor["tmp_name"])) {

			list($ancho, $alto) = getimagesize($valor["tmp_name"]);
			
			/*=============================================
			CAMBIANDO LOGOTIPO 
			=============================================*/

			if ($item == "logo") {

				unlink("../".$plantilla["logo"]);

				$nuevoAncho = 500;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if ($valor["type"] == "image/jpeg") {
					
					$ruta = "../views/img/plantilla/logo.jpg";
					$origen = imagecreatefromjpeg($valor["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				}

				if ($valor["type"] == "image/png") {
					
					$ruta = "../views/img/plantilla/logo.png";
					$origen = imagecreatefrompng($valor["tmp_name"]);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}

				
			}

			/*=============================================
			CAMBIANDO ICONO
			=============================================*/

			if ($item == "icono") {
				
				unlink("../".$plantilla["icono"]);

				$nuevoAncho = 100;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){

					$ruta = "../views/img/plantilla/icono.jpg";

					$origen = imagecreatefromjpeg($valor["tmp_name"]);					

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($valor["type"] == "image/png"){

					$ruta = "../views/img/plantilla/icono.png";

					$origen = imagecreatefrompng($valor["tmp_name"]);

					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}
			}

			$valorNuevo = substr($ruta, 3);
		}
		$respuesta = ModeloAjustes::mdlActualizarlogoicono($tabla, $id, $item, $valorNuevo);
		return $respuesta;
	}

	/*=============================================
	ACTUALIZAR COLORES
	=============================================*/

	static public function ctrActualizarColores($datos){

		$tabla = "plantilla";
		$id = 1;

		$respuesta = ModeloAjustes::mdlActualizarColores($tabla, $id, $datos);

		return $respuesta;


	}
}