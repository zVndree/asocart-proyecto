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

    static public function ctr_mostrar_productos($ordenar, $item, $valor, $base, $tope, $modo){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_mostrar_productos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);
        return $respuesta;
    }

    /*========================
    Mostrar todos los Productos
    ========================*/

    static public function ctr_mostrar_all_productos($ordenar, $base, $tope, $modo){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_mostrar_all_productos($tabla, $ordenar, $base, $tope, $modo);
        return $respuesta;
    }

    /*=============================================
	MOSTRAR TOTAL PRODUCTOS
	=============================================*/

	static public function ctrMostrarTotalProductos($orden){

		$tabla = "productos";

		$respuesta = modeloProductos::mdlMostrarTotalProductos($tabla, $orden);

		return $respuesta;

	}

    /*========================
    Listar todos los Productos
    ========================*/

    static public function ctr_listar_all_productos($ordenar){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_listar_all_productos($tabla, $ordenar);
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

    /*========================
    Buscador
    ========================*/

    static public function ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope){

        $tabla = "productos";

        $respuesta = modeloProductos::mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope);
        return $respuesta;

    }

    /*========================
    Listar Productos Buscador
    ========================*/

    static public function ctrListarProductosBusqueda($busqueda){

        $tabla = "productos";
        $respuesta = modeloProductos::mdlListarProductos($tabla, $busqueda);
        return $respuesta;
    }

    /*========================
    Mostrar Ofertas
    ========================*/

    static public function ctr_mostrar_ofertas($ordenar, $item, $valor, $base, $tope, $modo, $rango){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_mostrar_ofertas($tabla, $ordenar, $item, $valor, $base, $tope, $modo, $rango);
        return $respuesta;
    }

    /*========================
    Listar Ofertas
    ========================*/

    static public function ctr_listar_ofertas($ordenar, $item, $valor){

        $tabla = "productos";
        $respuesta = modeloProductos::mdl_listar_ofertas($tabla, $ordenar, $item, $valor);
        return $respuesta;
    }
}
