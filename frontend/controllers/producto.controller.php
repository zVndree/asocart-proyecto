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

    /*========================
    Mostrar Productos
    ========================*/

    static public function ctr_mostrar_productos($ordenar, $item, $valor, $base, $tope){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_mostrar_productos($tabla, $ordenar, $item, $valor, $base, $tope);
        return $respuesta;
    }

    
    /*========================
    Listar Productos
    ========================*/

    static public function ctr_listar_productos($ordenar, $item, $valor){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_listar_productos($tabla, $ordenar, $item, $valor);
        return $respuesta;
    }

    /*========================
    Mostrar Info Producto
    ========================*/

    static public function ctr_mostrar_info_productos($item, $valor){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_mostrar_info_productos($tabla, $item, $valor);
        return $respuesta;

    }
}
