<?php
require_once "../controllers/admin_controller.php";
require_once "../models/admin_model.php";

class AjaxAdministradores
{

    /*=============================================
    ACTIVAR PERFIL
    =============================================*/

    public $activarPerfil;
    public $activarId;

    public function ajaxActivarPerfil()
    {

        $tabla = "administradores";

        $item1 = "estado";
        $valor1 = $this->activarPerfil;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = model_admin::mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }

    /*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "name";
		$valor = $this->validarUsuario;

		$respuesta = controllerAdmin::ctrMostrarAdministradores($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
	TRAER ROL DE ACUERDO A LA CATEGORÍA
	=============================================*/	

	public $idRol;

	public function ajaxTraerRol(){

		$item = "id_rol";
		$valor = $this->idRol;

		$respuesta = controllerAdmin::ctrMostrarAdministradores($item, $valor);

		echo json_encode($respuesta);

	}

    /*=============================================
    EDITAR PERFIL
    =============================================*/

    public $idPerfil;

    public function ajaxEditarPerfil()
    {

        $item = "id";
        $valor = $this->idPerfil;

        $respuesta = controllerAdmin::ctrMostrarAdministradores($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
    ACTIVAR PERFIL
    =============================================*/

if (isset($_POST["activarPerfil"])) {

    $activarPerfil = new AjaxAdministradores();
    $activarPerfil->activarPerfil = $_POST["activarPerfil"];
    $activarPerfil->activarId = $_POST["activarId"];
    $activarPerfil->ajaxActivarPerfil();
}

/*=============================================
    EDITAR PERFIL
    =============================================*/
if (isset($_POST["idPerfil"])) {

    $editar = new AjaxAdministradores();
    $editar->idPerfil = $_POST["idPerfil"];
    $editar->ajaxEditarPerfil();
}

/*=============================================
TRAER SUBCATEGORIAS DE ACUERDO A LA CATEGORÍA
=============================================*/
if(isset($_POST["idRol"])){

	$traerRoles = new AjaxAdministradores();
	$traerRoles -> idRol = $_POST["idRol"];
	$traerRoles -> ajaxTraerRol();

}
