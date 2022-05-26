<?php

require_once "conexion.php";
    
class modeloArtesanos{

    /*=============================================
	MOSTRAR ARTESANOS
	=============================================*/

	static public function mdlMostrarArtesanos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}

    /*=============================================
	ACTIVAR ARTESANO
	=============================================*/

	static public function mdlActualizarArtesano($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /*=============================================
	INGRESAR ARTESANO NUEVO
	=============================================*/

    static public function mdlIngresarArtesanoNuevo($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, estado, email, password, foto_portada, reseña, direccion, whatsapp) VALUES (:nombre, :estado, :email, :password, :foto_portada, :reseña, :direccion, :whatsapp)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":foto_portada", $datos["foto_portada"], PDO::PARAM_STR);
        $stmt->bindParam(":reseña", $datos["reseña"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":whatsapp", $datos["whatsapp"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

    }

}

