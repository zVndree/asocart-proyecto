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

}
