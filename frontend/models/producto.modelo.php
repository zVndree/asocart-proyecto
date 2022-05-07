<?php

require_once "conexion.php";
class modeloProductos
{

    /*=============================================
        Consulta para Mostrar Categorias
        =============================================*/

    static public function mdlListarCategorias($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
        Mostrar Sub categorias
        =============================================*/

    static public function mdlListarSubcategorias($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt-> execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
        Consulta para Mostrar Servicios
    =============================================*/

    static public function mdlListarServicios($tabla_ser)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla_ser");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
        Consulta para Mostrar Productos
    =============================================*/

    static public function mdl_mostrar_productos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");
            $stmt->execute();
            return $stmt->fetchAll();

        }
        $stmt -> close();
        $stmt = null;


    }

    /*=============================================
        Consulta para Listar Productos
    =============================================*/

    static public function mdl_listar_productos($tabla, $ordenar, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt ->execute();
            return $stmt -> fetchAll();

        }else{


            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");
            $stmt ->execute();
            return $stmt -> fetchAll();


        }

        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
        Consulta para Mostrar La Info Producto
    =============================================*/

    static public function mdl_mostrar_info_productos($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt-> execute();
        return $stmt->fetch();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    BUSCADOR
    =============================================*/

    static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");
        $stmt-> execute();
        return $stmt->fetchAll();
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    Listar Productos BUSCADOR
    =============================================*/

    static public function mdlListarProductos($tabla, $busqueda){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR descripcion like '%$busqueda%'");
        $stmt-> execute();
        return $stmt->fetchAll();
        $stmt -> close();
        $stmt = null;
    }

}
