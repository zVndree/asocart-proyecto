<?php

require_once "conexion.php";
class modeloArtesanos{

    /*=============================================
    Consulta para Mostrar Artesanos
    =============================================*/

    static public function mdlListarArtesanos($tabla, $ordenar){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt -> close();
        $stmt = null;
    }
}