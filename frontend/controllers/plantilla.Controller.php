<?php

/**
 * controlador plantilla frontend 
 */
class ControllerPlantilla{

	/*=============================================
	Metodo que llama a la plantilla
	=============================================*/
	
	public function plantilla(){

		include "views/plantilla.php";

	}

	/*===================================================
	Metodo que trae los estilos dinamicos de la plantilla
	====================================================*/

	static public function ctrEstiloPlantilla(){

		$tabla = "plantilla";
		$respuesta = modeloPlantilla::mdlEstiloPlantilla($tabla);

		return $respuesta;

	}

	/*===================================================
	Metodo que trae la data de la la tabla errores
	====================================================*/

	static public function ctrEstiloErrores(){

		$tabla = "errores";
		$respuesta = modeloPlantilla::mdlEstiloErrores($tabla);
		return $respuesta;
	}

}

