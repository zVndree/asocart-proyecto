<?php

require_once "../controllers/productos.controller.php";
require_once "../models/productos.modelo.php";

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

require_once "../controllers/subcategorias.controller.php";
require_once "../models/subcategorias.modelo.php";


class AjaxProductos{

    /*=============================================
    ACTIVAR PRODUCTOS
    =============================================*/	

    public $activarProducto;
	public $activarId;

	public function ajaxActivarProducto(){

		$tabla = "productos";

		$item1 = "estado";
		$valor1 = $this->activarProducto;

		$item2 = "id";
		$valor2 = $this->activarId;	

		$respuesta = ModeloProductos::mdlActualizarProductos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

    /*=============================================
	VALIDAR NO REPETIR PRODUCTO
	=============================================*/	

	public $validarProducto;

	public function ajaxValidarProducto(){

		$item = "titulo";
		$valor = $this->validarProducto;

		$respuesta = ControllerProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	RECIBIR MULTIMEDIA
	=============================================*/

	public $imagenMultimedia;
	public $rutaMultimedia;	

	public function  ajaxRecibirMultimedia(){

		$datos = $this->imagenMultimedia;
		$ruta = $this->rutaMultimedia;

		$respuesta = ControllerProductos::ctrSubirMultimedia($datos, $ruta);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR PRODUCTO Y EDITAR PRODUCTO
	=============================================*/	

	public $tituloProducto;
	public $rutaProducto;		
	public $seleccionarCategoria;
	public $seleccionarSubCategoria;
	public $descripcionProducto;
	public $precio;
	public $peso;
	public $entrega;
	public $multimedia;
	public $fotoPrincipal;
	public $selActivarOferta;
	public $precioOferta;
	public $descuentoOferta;
	public $finOferta;
	public $fotoOferta;

	public $id;
	public $antiguaFotoPrincipal;
	public $antiguaFotoOferta;
	/* public $idCabecera; */

	public function  ajaxCrearProducto(){

		$datos = array(
			"tituloProducto"=>$this->tituloProducto,
			"rutaProducto"=>$this->rutaProducto,			
			"categoria"=>$this->seleccionarCategoria,
			"subCategoria"=>$this->seleccionarSubCategoria,
			"descripcionProducto"=>$this->descripcionProducto,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"entrega"=>$this->entrega,
			"multimedia"=>$this->multimedia,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			"fotoOferta"=>$this->fotoOferta,
			"finOferta"=>$this->finOferta
			);

		$respuesta = ControllerProductos::ctrCrearProducto($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER PRODUCTOS
	=============================================*/	

	public $idProducto;

	public function ajaxTraerProducto(){

		$item = "id";
		$valor = $this->idProducto;

		$respuesta = ControllerProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
ACTIVAR PRODUCTOS
=============================================*/	

if(isset($_POST["activarProducto"])){

	$activarProducto = new AjaxProductos();
	$activarProducto -> activarProducto = $_POST["activarProducto"];
	$activarProducto -> activarId = $_POST["activarId"];
	$activarProducto -> ajaxActivarProducto();

}

/*=============================================
VALIDAR NO REPETIR PRODUCTO
=============================================*/

if(isset($_POST["validarProducto"])){

	$valProducto = new AjaxProductos();
	$valProducto -> validarProducto = $_POST["validarProducto"];
	$valProducto -> ajaxValidarProducto();

}

#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
if(isset($_FILES["file"])){

	$multimedia = new AjaxProductos();
	$multimedia -> imagenMultimedia = $_FILES["file"];
	$multimedia -> rutaMultimedia = $_POST["ruta"];
	$multimedia -> ajaxRecibirMultimedia();

}

#CREAR PRODUCTO
#-----------------------------------------------------------
if(isset($_POST["tituloProducto"])){

	$producto = new AjaxProductos();
	$producto -> tituloProducto = $_POST["tituloProducto"];
	$producto -> rutaProducto = $_POST["rutaProducto"];
	$producto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$producto -> seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
	$producto -> descripcionProducto = $_POST["descripcionProducto"];
	$producto -> precio = $_POST["precio"];
	$producto -> peso = $_POST["peso"];
	$producto -> entrega = $_POST["entrega"];
	$producto -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPrincipal"])){

		$producto -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$producto -> fotoPrincipal = null;

	}	

	$producto -> selActivarOferta = $_POST["selActivarOferta"];
	$producto -> precioOferta = $_POST["precioOferta"];
	$producto -> descuentoOferta = $_POST["descuentoOferta"];	

	if(isset($_FILES["fotoOferta"])){

		$producto -> fotoOferta = $_FILES["fotoOferta"];

	}else{

		$producto -> fotoOferta = null;

	}	

	$producto -> finOferta = $_POST["finOferta"];

	$producto -> ajaxCrearProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["idProducto"])){

	$traerProducto = new AjaxProductos();
	$traerProducto -> idProducto = $_POST["idProducto"];
	$traerProducto -> ajaxTraerProducto();

}


