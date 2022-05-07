<?php
    
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

/* require_once "../controllers/subcategorias.controller.php"; */
require_once "../models/subcategorias.modelo.php";
require_once "../models/productos.modelo.php";

class AjaxCategorias{

    /*=============================================
    ACTIVAR LA CATEGORIA
    =============================================*/

    public $activarCategoria;
    public $activarId;

    public function ajaxActivarCategoria(){

        ModeloSubcategorias::mdlActualizarSubCategorias("subcategorias", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

        ModeloProductos::mdlActualizarProductos("productos", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

        $respuesta = ModeloCategorias::mdlActualizarCategoria("categorias", "estado", $this->activarCategoria, "id", $this->activarId);
        echo $respuesta;
    }
}

    /*=============================================
    ACTIVAR LA CATEGORIA
    =============================================*/

    if (isset($_POST["activarCategoria"])) {
        
        $activarCategoria = new AjaxCategorias();
        $activarCategoria -> activarCategoria = $_POST["activarCategoria"];
        $activarCategoria -> activarId = $_POST["activarId"];
        $activarCategoria -> ajaxActivarCategoria();
    }