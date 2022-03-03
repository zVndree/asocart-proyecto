<?php
    require_once "conexion.php";
    class modelo_slide{
        static public function mld_mostrar_slide($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt-> fetchAll();
            $stmt->close();
            $stmt = null;

        }
    }

