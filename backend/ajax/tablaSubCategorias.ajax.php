<?php

require_once "../controllers/subcategorias.controller.php";
require_once "../models/subcategorias.modelo.php";

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

/* require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php"; */

class TablaSubCategorias{

    /*=============================================
    MOSTRAR LA TABLA DE SUBCATEGORÍAS
    =============================================*/ 

    public function mostrarTablaSubCategoria(){	

    $item = null;
    $valor = null;

    $subcategorias = ControllerSubcategorias::ctrMostrarSubCategorias($item, $valor);

    $datosJson = '{

    "data": [ ';

        for($i = 0; $i < count($subcategorias); $i++){

            /*=============================================
            TRAER LAS CATEGORÍAS
            =============================================*/

            $item = "id";
            $valor = $subcategorias[$i]["id_categoria"];

            $categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);

            if($categorias["nombre"] == ""){

                $categoria = "SIN CATEGORÍA";
            
            }else{

                $categoria = $categorias["nombre"];
            }

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if( $subcategorias[$i]["estado"] == 0){

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoSubCategoria = 1;

            }else{

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoSubCategoria = 0;

            }

            $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idSubCategoria='". $subcategorias[$i]["id"]."' estadoSubCategoria='".$estadoSubCategoria."'>".$textoEstado."</button>";

            /*=============================================
            REVISAR OFERTAS
            =============================================*/

            if($subcategorias[$i]["oferta"] != 0){

                if($subcategorias[$i]["precioOferta"] != 0){	

                    $tipoOferta = "PRECIO";
                    $valorOferta = "$ ".number_format($subcategorias[$i]["precioOferta"],0, '.', '.');

                }else{

                    $tipoOferta = "DESCUENTO";
                    $valorOferta = $subcategorias[$i]["descuentoOferta"]." %";	

                }	

            }else{

                $tipoOferta = "No tiene oferta";
                $valorOferta = 0;
                
            }

            if($subcategorias[$i]["imgOferta"] != ""){

                $imgOferta = "<img src='".$subcategorias[$i]["imgOferta"]."' class='img-thumbnail imgTablaSubCategorias' width='100px'>";

            }else{

                $imgOferta = "<img src='views/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaSubCategorias' width='100px'>";

            }

            /*=============================================
            CREAR LAS ACCIONES
            =============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubCategoria' idSubCategoria='".$subcategorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubCategoria' idSubCategoria='".$subcategorias[$i]["id"]."' nombreSubCategoria='".$subcategorias[$i]["nombre"]."' imgOferta='".$subcategorias[$i]["imgOferta"]."' rutaCabecera='".$subcategorias[$i]["ruta"]."'><i class='fa fa-times'></i></button></div>";


            $datosJson .=  '
            [
            "'.($i+1).'",
            "'.$subcategorias[$i]["nombre"].'",
            "'.$categoria.'",
            "'.$subcategorias[$i]["ruta"].'",
            "'.$estado.'",
            "'.$tipoOferta.'",
            "'.$valorOferta.'",
            "'.$imgOferta.'",
            "'.$subcategorias[$i]["finOferta"].'",			
            "'.$acciones.'"
            ],';
                                    
            }

            $datosJson =  substr($datosJson, 0, -1);
            $datosJson .=  '
            
        ]
        }';

    echo $datosJson;    

    }

}

/*=============================================
ACTIVAR TABLA DE SUBCATEGORÍAS
=============================================*/ 
$activarSubcategoria = new TablaSubCategorias();
$activarSubcategoria -> mostrarTablaSubCategoria();


