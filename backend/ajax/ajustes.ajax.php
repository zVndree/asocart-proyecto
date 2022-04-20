<?php

require_once "../controllers/ajustes.Controller.php";
require_once "../models/ajustes.Modelo.php";

class AjaxAjustes
{

    /*===================================
    CAMBIAR LOGOTIPO
    ===================================*/

    public $imagenLogo;

    public function cambiarLogotipo()
    {

        $item = "logo";
        $valor = $this->imagenLogo;

        $respuesta = ControllerAjustes::ctrActualizarlogoicono($item, $valor);
        echo $respuesta;
    }

    /*=============================================
	CAMBIAR ICONO
	=============================================*/

    public $imagenIcono;

    public function CambiarIcono()
    {

        $item = "icono";
        $valor = $this->imagenIcono;

        $respuesta = ControllerAjustes::ctrActualizarlogoicono($item, $valor);

        echo $respuesta;
    }

    /*=============================================
	CAMBIAR COLORES
	=============================================*/

    public $barraSuperior;
    public $barraInferior;
    public $textoSuperior;
    public $colorFondo;
    public $colorTexto;

    public function ajaxCambiarColor()
    {

        $datos = array(
            "barTop" => $this->barraSuperior,
            "bar_down" => $this->barraInferior,
            "textoSuperior" => $this->textoSuperior,
            "colorFondo" => $this->colorFondo,
            "colorTexto" => $this->colorTexto
        );

        $respuesta = ControllerAjustes::ctrActualizarColores($datos);

        echo $respuesta;
    }

    /*=============================================
	CAMBIAR REDES SOCIALES
	=============================================*/

	public $redesSociales;

	public function ajaxCambiarRedes(){

		$item = "redesSociales";
		$valor = $this->redesSociales;
        
        if (!empty($valor)) {
            # code...
        
            $respuesta = ControllerAjustes::ctrActualizarLogoIcono($item, $valor);

            echo $respuesta;
        }
	}
}

/*=============================================
CAMBIAR LOGOTIPO
=============================================*/

if (isset($_FILES["imagenLogo"])) {

    $logotipo = new AjaxAjustes();
    $logotipo->imagenLogo = $_FILES["imagenLogo"];
    $logotipo->cambiarLogotipo();
}

/*=============================================
CAMBIAR ICONO
=============================================*/
if (isset($_FILES["imagenIcono"])) {

    $icono = new AjaxAjustes();
    $icono->imagenIcono = $_FILES["imagenIcono"];
    $icono->CambiarIcono();
}

/*=============================================
CAMBIAR COLORES
=============================================*/	

if(isset($_POST["barTop"])){

	$colores = new AjaxAjustes();
	$colores -> barraSuperior = $_POST["barTop"];
    $colores -> barraInferior = $_POST["bar_down"];
	$colores -> textoSuperior = $_POST["textoSuperior"];
	$colores -> colorFondo = $_POST["colorFondo"];
	$colores -> colorTexto = $_POST["colorTexto"];
	$colores -> ajaxCambiarColor();

}

/*=============================================
CAMBIAR REDES SOCIALES
=============================================*/	

if(isset($_POST["redesSociales"])){

	$redesSociales = new AjaxAjustes();
	$redesSociales -> redesSociales = $_POST["redesSociales"];
	$redesSociales -> ajaxCambiarRedes();

}
