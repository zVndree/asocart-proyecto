<?php

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";
    
class TablaCategorias{

    /*=============================================
    MOSTRAR LA TABLA DE CATEGORIAS
    =============================================*/
    
    public function mostrarTabla(){

    $item = null;
    $valor = null;

    $categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);
    
    $datosJson = '{

        "data": [ ';
        
    for ($i=0; $i < count($categorias); $i++) { 
                
            /*=============================================
            REVISAR EL ESTADO DE LA CATEGORIA
            =============================================*/ 
            
            if ($categorias[$i] ["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoCategoria = 1;
            }else{

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoCategoria = 0;
            }

            $estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoria='".$estadoCategoria."' idCategoria='".$categorias[$i]["id"]."'>".$textoEstado."</button>";

            /*=============================================
            REVISAR OFERTAS
            =============================================*/

            if($categorias[$i]["oferta"] != 0){

                if($categorias[$i]["precioOferta"] != 0){

                    $tipoOferta = "PRECIO";
                    $valorOferta = "$ ".number_format($categorias[$i]["precioOferta"],0, '.', '.');

                }else{

                    $tipoOferta = "DESCUENTO";
                    $valorOferta = $categorias[$i]["descuentoOferta"]." %";

                }


            }else{

                $tipoOferta = "No tiene oferta";
                $valorOferta = 0;

            }

            if($categorias[$i]["imgOferta"] != ""){

                $imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='".$categorias[$i]["imgOferta"]."' width='100px'>";

            }else{

                $imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='views/img/ofertas/default/default.jpg' width='100px'>";

            }

            /*=============================================
            CREAR LAS ACCIONES
            =============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categorias[$i]["id"]."' nombreCategoria='".$categorias[$i]["nombre"]."' rutaCabecera='".$categorias[$i]["ruta"]."' imgOferta='".$categorias[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
        
            $datosJson  .= '[
                    "'.($i+1).'",
                    "'.$categorias[$i]["nombre"].'",
                    "'.$categorias[$i]["ruta"].'",
                    "'. $estado.'",
                    "'.$tipoOferta.'",
                    "'.$valorOferta.'",
                    "'.$imgOfertas.'",
                    "'.$categorias[$i]["finOferta"].'",
                    "'.$acciones.'"
                ],';
    }
            
    $datosJson = substr($datosJson, 0, -1);
    $datosJson.=  ']

    }';
    echo $datosJson;

    }

}

/*=============================================
ACTIVAR TABLA DE CATEGORIAS
=============================================*/

$activar = new TablaCategorias();
$activar-> mostrarTabla();