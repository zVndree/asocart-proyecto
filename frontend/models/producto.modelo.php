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

    static public function mdl_mostrar_productos($tabla, $ordenar){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
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

}
