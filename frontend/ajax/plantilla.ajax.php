<?php

require_once "../controllers/plantilla.Controller.php";
require_once "../models/plantilla.modelo.php";

/**
 * Ajax.Plantilla
 */
class AjaxPlantilla
{

    public function ajaxEstiloPlantilla()
    {

        $respuesta = ControllerPlantilla::ctrEstiloPlantilla();
        echo json_encode($respuesta);
    }
}

$objeto = new AjaxPlantilla;
$objeto->ajaxEstiloPlantilla();
