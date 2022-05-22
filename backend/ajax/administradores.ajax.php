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
