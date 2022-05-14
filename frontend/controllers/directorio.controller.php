<?php

class ControladorDirectorio
{
    /*=============================================
    Mostrar Artesanos
    =============================================*/

    static public function ctrListarArtesanos($item, $valor)
    {

        $tabla = "artesanos";
        $respuesta = modeloDirectorio::mdlListarArtesanos($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrListarEspecialidades($item2, $valor2){

        $tabla = "especialidad";
        $respuesta = modeloDirectorio::mdlListarEspecialidades($tabla, $item2, $valor2);
        return $respuesta;
    }

    static public function ctrListarArt_Espe(){

        $tabla = "artesanos";
        $respuesta = modeloDirectorio::mdlListarArt_Espe($tabla);
        return $respuesta;
    }

    
}