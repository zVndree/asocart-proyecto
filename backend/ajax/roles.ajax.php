<?php
require_once "../controllers/admin_controller.php";
require_once "../models/admin_model.php";

class AjaxRoles
{

    /*=============================================
    ACTIVAR Rol
    =============================================*/

    public $activarRol;
    public $activarId;

    public function ajaxActivarRol()
    {

        $tabla = "rol";

        $item1 = "estado";
        $valor1 = $this->activarRol;

        $item2 = "idrol";
        $valor2 = $this->activarId;

        $respuesta = model_admin::mdlActualizarRol($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }

    /*=============================================
        EDITAR PERFIL
        =============================================*/

    /* public $idPerfil;

    public function ajaxEditarPerfil()
    {

        $item = "id";
        $valor = $this->idPerfil;

        $respuesta = controllerAdmin::ctrMostrarAdministradores($item, $valor);

        echo json_encode($respuesta);
    } */
}

/*=============================================
    ACTIVAR PERFIL
    =============================================*/

if (isset($_POST["activarRol"])) {

    $activarPerfil = new AjaxRoles();
    $activarPerfil->activarRol = $_POST["activarRol"];
    $activarPerfil->activarId = $_POST["activarId"];
    $activarPerfil->ajaxActivarRol();
}

/*=============================================
    EDITAR PERFIL
    =============================================*/
/* if (isset($_POST["idPerfil"])) {

    $editar = new AjaxAdministradores();
    $editar->idPerfil = $_POST["idPerfil"];
    $editar->ajaxEditarPerfil();
} */
