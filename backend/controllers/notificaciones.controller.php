<?php

Class ControllerNotificaciones{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function ctrMostrarNotificaciones(){

		$tabla = "notificaciones";

		$respuesta = ModeloNotificaciones::mdlMostrarNotificaciones($tabla);

		return $respuesta;

	}

}