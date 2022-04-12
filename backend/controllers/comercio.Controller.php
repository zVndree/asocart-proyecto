<?php

/**
 * Comercio Controller
 */

class ControllerComercio
{

	/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/
	
	static public function ctrSeleccionarPlantilla()
	{
		$tabla = "plantilla";
		$respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);
		return $respuesta;
	}
}