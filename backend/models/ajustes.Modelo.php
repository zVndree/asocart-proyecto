<?php

/**
 * Modelo Comercio
 */

require_once "conexion.php";

class ModeloAjustes
{
	
	/*=============================================
	SELECCIONAR LA PLANTILLA
	=============================================*/

	static public function mdlSeleccionarPlantilla($tabla) 
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();

		return $stmt-> fetch();
		$stmt -> close();
		$stmt = null;

		
	}

	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

	static public function mdlActualizarLogoicono($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR COLORES
	=============================================*/

	static public function mdlActualizarColores($tabla, $id, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET barTop = :barTop, bar_down = :bar_down, textoSuperior = :textoSuperior, colorFondo = :colorFondo, colorTexto = :colorTexto  WHERE id = :id");

		$stmt->bindParam(":barTop", $datos["barTop"], PDO::PARAM_STR);
		$stmt->bindParam(":bar_down", $datos["bar_down"], PDO::PARAM_STR);
		$stmt->bindParam(":textoSuperior", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":colorFondo", $datos["colorFondo"], PDO::PARAM_STR);
		$stmt->bindParam(":colorTexto", $datos["colorTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
}