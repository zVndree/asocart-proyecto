<?php
    
    require_once "../controllers/productos.controller.php";
    require_once "../models/productos.modelo.php";
    
    require_once "../controllers/categorias.controller.php";
    require_once "../models/categorias.modelo.php";
    
    require_once "../controllers/subcategorias.controller.php";
    require_once "../models/subcategorias.modelo.php";
    
    require_once "../controllers/cabeceras.controller.php";
    require_once "../models/cabeceras.modelo.php";

class TablaProductos{

    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/

    
    public function mostrarTablaProductos(){	
            
    $item = null;
    $valor = null;

    $productos = ControllerProductos::ctrMostrarProductos($item, $valor);

  
    }

}