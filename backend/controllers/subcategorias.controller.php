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

    }
?>