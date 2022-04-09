<?php
    require_once "conexion.php";

class ModeloUsuarios{

    /*=============================================
    Registro Usuarios
    =============================================*/

    static public function mdlRegistroUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, foto, password, modo, verificacion, email_encriptado) VALUES (:nombre, :email, :foto, :password, :modo, :verificacion, :email_encriptado) ");
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
        $stmt -> bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
        $stmt -> bindParam(":email_encriptado", $datos["email_encriptado"], PDO::PARAM_STR);

        
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

    /*=============================================
    Mostrar Usuarios
    =============================================*/

    static public function mdlMostrarUsuario($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt ->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    Actualizar Usuarios
    =============================================*/

    static public function mdlActualizarUsuario($tabla, $id, $item, $valor){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt-> close();
		$stmt = null;
    }

    

}