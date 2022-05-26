<?php
    
require_once "../controllers/artesanos.controller.php";
require_once "../models/artesanos.modelo.php";

class AjaxArtesanos{

    /*=============================================
    ACTIVAR ARTESANOS
    =============================================*/

    public $activarArtesano;
    public $activarId;

    public function ajaxActivarArtesano()
    {

        $respuesta = modeloArtesanos::mdlActualizarArtesano("artesanos", "estado", $this->activarArtesano, "id", $this->activarId);

        echo $respuesta;

    }
}

/*=============================================
ACTIVAR ARTESANO
=============================================*/

if (isset($_POST["activarArtesano"])) {

    $activarUsuario = new AjaxArtesanos();
    $activarUsuario->activarArtesano = $_POST["activarArtesano"];
    $activarUsuario->activarId = $_POST["activarId"];
    $activarUsuario->ajaxActivarArtesano();
}
