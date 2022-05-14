<?php

require_once "conexion.php";
class modeloDirectorio
{

    /*=============================================
    Consulta para Mostrar Artesanos
    =============================================*/

    static public function mdlListarArtesanos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            
            $stmt->execute();
            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    Consulta para Mostrar Especialidad
    =============================================*/

    static public function mdlListarEspecialidades($tabla, $item2, $valor2)
    {

        if ($item2 != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 = :$item2");
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
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
    

    static public function mdlListarArt_Espe($tabla)
    {
/* 
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
            $stmt-> execute();
            return $stmt->fetchAll();
        } else { */
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN artesano_especialidad ON artesano_especialidad.id_artesano = artesanos.id INNER JOIN especialidad ON artesano_especialidad.id_especialidad = especialidad.id WHERE especialidad.nombre = nombre");
        $stmt->execute();
        return $stmt->fetchAll();
        /* } */

        $stmt -> close();
        $stmt = null;
    }

}
