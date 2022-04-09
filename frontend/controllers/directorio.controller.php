<?php

class ControladorDirectorio
{

    static public function ctrListarArtesanos($ordenar)
    {

        $tabla = "artesanos";
        $respuesta = modeloArtesanos::mdlListarArtesanos($tabla, $ordenar);
        return $respuesta;
    }
}