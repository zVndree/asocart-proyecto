<?php
    class ControllerSubcategorias{

        static public function ctrMostrarSubcategorias($item, $valor){
            $respuesta = ModeloSubcategorias::mdlMostrarSubcategorias($item, $valor);
        }

    }
?>