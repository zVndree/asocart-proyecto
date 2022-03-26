<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.modelo.php";

/**
 * ajax usuarios
 */
class ajaxUsuarios
{

	/*----------  Validar Email Existente  ----------*/

	public $validarEmail;
	
	public function ajaxValidarEmail()
	{
		$datos = $this->validarEmail;
		$respuesta = controller_usuarios::ctrMostrarUsuario("email", $datos);

		echo json_encode($respuesta);
	}
	
}

	/*===================================================
	=            Validacion correo existente            =
	===================================================*/
	
if(isset($_POST["validarEmail"])){
	$valEmail = new ajaxUsuarios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();
}