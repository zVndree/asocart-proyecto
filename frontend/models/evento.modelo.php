<?php

require_once "conexion.php";

class modeloEvento{
    
    static public function mdl_mostrar_evento($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt ->execute();
        return $stmt->fetchAll();
        $stmt -> close();
		$stmt = null;
    }
}