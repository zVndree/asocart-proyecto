<?php

class ControladorDirectorio
{
    /*=============================================
    Mostrar Artesanos
    =============================================*/

    static public function ctrListarArtesanos()
    {

        $tabla = "artesanos";
        $respuesta = modeloDirectorio::mdlListarArtesanos($tabla);
        return $respuesta;
    }

    static public function ctrListarEspecialidades(){

        $tabla = "artesanos";
        $respuesta = modeloDirectorio::mdlListarEspecialidades($tabla);
        return $respuesta;
    }

    static public function ctrListarArt_Espe(){

        $tabla = "artesanos";
        $respuesta = modeloDirectorio::mdlListarArt_Espe($tabla);
        return $respuesta;
    }

    
}