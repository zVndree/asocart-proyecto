<?php
    
    require_once "../controllers/productos.controller.php";
    require_once "../models/productos.modelo.php";
    
    require_once "../controllers/categorias.controller.php";
    require_once "../models/categorias.modelo.php";
    
    require_once "../controllers/subcategorias.controller.php";
    require_once "../models/subcategorias.modelo.php";
    
/*     require_once "../controllers/cabeceras.controller.php";
    require_once "../models/cabeceras.modelo.php"; */

class TablaProductos{

    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/ 

public function mostrarTablaProductos(){	

    $item = null;
    $valor = null;

    $productos = ControllerProductos::ctrMostrarProductos($item, $valor);

    if(count($productos) == 0){

        $datosJson = '{ "data":[]}';
        echo $datosJson;
        return;

    }

    $datosJson = '

        {	
            "data":[';

    for($i = 0; $i < count($productos); $i++){

        /*=============================================
        TRAER LAS CATEGORÍAS
        =============================================*/

        $item = "id";
        $valor = $productos[$i]["id_categoria"];

        $categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);

        if(is_array($categorias) && $categorias["nombre"] == ""){

            $categoria = "SIN CATEGORÍA";
        
        }else{

            $categoria = $categorias["nombre"];
        }

        /*=============================================
        TRAER LAS SUBCATEGORÍAS
        =============================================*/

        $item2 = "id";
        $valor2 = $productos[$i]["id_subcategoria"];

        $subcategorias = ControllerSubcategorias::ctrMostrarSubCategorias($item2, $valor2);

        if (is_array($subcategorias) && $subcategorias[0]["nombre"] != "") {

            $subcategoria = $subcategorias[0]["nombre"];
        } else {
        
            $subcategoria = "SIN SUBCATEGORÍA";
        }

        /*=============================================
        AGREGAR ETIQUETAS DE ESTADO
        =============================================*/

            if($productos[$i]["estado"] == 0){

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoProducto = 1;

            }else{

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoProducto = 0;

            }

            $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idProducto='".$productos[$i]["id"]."' estadoProducto='".$estadoProducto."'>".$textoEstado."</button>";

            

            /*=============================================
            TRAER IMAGEN PRINCIPAL
            =============================================*/

            $imagenPrincipal = "<img src='".$productos[$i]["img_producto"]."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
            
            /*=============================================
			TRAER MULTIMEDIA
            =============================================*/

            if($productos[$i]["multimedia"] != null){

                $multimedia = json_decode($productos[$i]["multimedia"],true);

                if(is_array($multimedia) && $multimedia[0]["foto"] != ""){

                    $vistaMultimedia = "<img src='".$multimedia[0]["foto"]."' class='img-thumbnail imgTablaMultimedia' width='100px'>";

                }else{

/*                     $vistaMultimedia = "<img src='http://i3.ytimg.com/vi/".$productos[$i]["multimedia"]."/hqdefault.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";
 */
                }


            }else{

                $vistaMultimedia = "<img src='views/img/multimedia/default/default.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";

            }

            /*=============================================
            TRAER DESCRIPCION
            =============================================*/

            if($productos[$i]["descripcion"] != ""){
                $descripcion = $productos[$i]["descripcion"];
            }else{
                $descripcion = "Producto sin descripcion";
            }
            /*=============================================
            TRAER PRECIO
            =============================================*/

            if($productos[$i]["precio"] != 0){

                $precio = "$ ".number_format($productos[$i]["precio"],0, '.', '.');

            }

            /*=============================================
            TRAER ENTREGA
            =============================================*/

            if($productos[$i]["entrega"] == 0){

                $entrega = "Inmediata";
            
            }else{

                $entrega = $productos[$i]["entrega"]. " días hábiles";

            }

            /*=============================================
            REVISAR SI HAY OFERTAS
            =============================================*/
                
            if($productos[$i]["oferta"] != 0){

                if($productos[$i]["precioOferta"] != 0){	

                    $tipoOferta = "PRECIO";
                    $valorOferta = "$ ".number_format($productos[$i]["precioOferta"],0, '.', '.');

                }else{

                    $tipoOferta = "DESCUENTO";
                    $valorOferta = $productos[$i]["descuentoOferta"]." %";	

                }	

            }else{

                $tipoOferta = "No tiene oferta";
                $valorOferta = 0;
                
            }

            /*=============================================
            TRAER IMAGEN OFERTA
            =============================================*/

            if($productos[$i]["imgOferta"] != ""){

                $imgOferta = "<img src='".$productos[$i]["imgOferta"]."' class='img-thumbnail imgTablaProductos' width='100px'>";

            }else{

                $imgOferta = "<img src='views/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaProductos' width='100px'>";

            }

            /*=============================================
            TRAER LAS ACCIONES
            =============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' imgOferta='".$productos[$i]["imgOferta"]."' rutaCabecera='".$productos[$i]["ruta"]."' imgPrincipal='".$productos[$i]["img_producto"]."'><i class='fa fa-times'></i></button></div>";

            /*=============================================
            CONSTRUIR LOS DATOS JSON
            =============================================*/


        $datosJson .='[
                
                "'.($i+1).'",
                "'.$productos[$i]["titulo"].'",
                "'.$categoria.'",
                "'.$subcategoria.'",
                "'.$productos[$i]["ruta"].'",
                "'.$estado.'",
                "'.$descripcion.'",
                "'.$imagenPrincipal.'",
                "'.$vistaMultimedia.'",
                "'.$precio.'",
                "'.$productos[$i]["peso"].' kg",
                "'.$entrega.'",
                "'.$tipoOferta.'",
                "'.$valorOferta.'",
                "'.$imgOferta.'",
                "'.$productos[$i]["finOferta"].'",			
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
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

