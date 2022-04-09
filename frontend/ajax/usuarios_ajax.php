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

	/*===================================================
		=           REGISTRO CON FACEBOOK            =
	===================================================*/

	public $email;
	public $nombre;
	public $foto;

	public function ajax_regis_fb(){

		$datos = array("nombre"=>$this->nombre,
						"email"=>$this->email,
						"foto"=>$this->foto,
						"password"=>"null",
						"modo"=>"facebook",
						"verificacion"=>0,
						"email_encriptado"=>"null");
		
		$respuesta = controller_usuarios::ctr_registro_red_social($datos);
		echo $respuesta;

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

	/*===================================================
		=           REGISTRO CON FACEBOOK            =
	===================================================*/

	if(isset($_POST["email"])){
		$reg_fb = new ajaxUsuarios();
		$reg_fb -> email = $_POST["email"];
		$reg_fb -> nombre = $_POST["nombre"];
		$reg_fb -> foto = $_POST["foto"];
		$reg_fb -> ajax_regis_fb();
	}