<?php

require_once "../controllers/artesanos.controller.php";
require_once "../models/artesanos.modelo.php";

class TablaArtesanos{

    /*=============================================
	MOSTRAR LA TABLA ARTESANOS
	=============================================*/

    public function mostrarTabla(){

        $item = null;
        $valor = null;

        $artesanos = controllerArtesanos::ctrMostrarArtesanos($item, $valor);

        $datosJson = '{

        "data": [ ';

        for ($i=0; $i < count($artesanos); $i++) { 

            /*=============================================
            TRAER FOTO DEL CLIENTE
            =============================================*/

            if($artesanos[$i]["foto_portada"] != "" ){

				$foto = "<img class='img-circle' src='".$artesanos[$i]["foto_portada"]."' width=50px'>";

			}else{

				$foto = "<img class='img-circle' src='views/img/usuarios/default/default.png' width='60px'>";
			}

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if($artesanos[$i]["estado"] == 1){

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoArtesano = 0;

            }else{

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoArtesano = 1;

            }
            $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idArtesano='". $artesanos[$i]["id"]."' estadoArtesano='".$estadoArtesano."'>".$textoEstado."</button>";

            
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            /*=============================================
            CREAR LAS ACCIONES
            =============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarArtesano' idArtesano='".$artesanos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarArtesano'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarArtesano' idArtesano='".$artesanos[$i]["id"]."' nombreArtesano='".$artesanos[$i]["nombre"]."' imgArtesano='".$artesanos[$i]["foto_portada"]."'><i class='fa fa-times'></i></button></div>";


            $datosJson	 .= '[
                "'.($i+1).'",
                "'.$artesanos[$i]["nombre"].'",
                "'.$estado.'",
                "'.$artesanos[$i]["email"].'",
                "'.$foto.'",
                "'.$artesanos[$i]["whatsapp"].'",
                "'.$artesanos[$i]["reseña"].'",
                "'.$acciones.'"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']
        }';

        echo $datosJson;



    }
}

/*=============================================
ACTIVAR LA TABLA Artesanos
=============================================*/

$activar =  new TablaArtesanos();
$activar-> mostrarTabla();