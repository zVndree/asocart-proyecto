<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.modelo.php";

class AjaxUsuarios
{

/*=============================================
ACTIVAR USUARIOS
=============================================*/

    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario()
    {

        $respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", "verificacion", $this->activarUsuario, "id", $this->activarId);

        echo $respuesta;
    }
}

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

if (isset($_POST["activarUsuario"])) {

    $activarUsuario = new AjaxUsuarios();
    $activarUsuario->activarUsuario = $_POST["activarUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];
    $activarUsuario->ajaxActivarUsuario();
}
