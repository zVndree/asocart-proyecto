<?php

class controladorProductos
{

    /*========================
    Mostrar Categorias
    ========================*/

    static public function ctrListarCategorias($item, $valor)
    {

        $tabla = "categorias";
        $respuesta = modeloProductos::mdllistarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    /*========================
    Mostrar Sub categorias
    ========================*/

    static public function ctrListarSubcategorias($item, $valor)
    {

        $tabla = "subcategorias";
        $respuesta = modeloProductos::mdlListarSubcategorias($tabla,$item, $valor);
        return $respuesta;
    }

    /*========================
    Mostrar Servicios
    ========================*/

    static public function ctrListarServicios()
    {

        $tabla_ser = "servicios";
        $respuesta = modeloProductos::mdlListarServicios($tabla_ser);
        return $respuesta;
    }
}
