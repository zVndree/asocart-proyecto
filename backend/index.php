<?php

/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "C:/xampp/htdocs/asocart-proyecto/backend/php_error_log");



date_default_timezone_set("America/Bogota");


require_once "controllers/admin_controller.php";
require_once "controllers/plantilla.Controller.php";
require_once "controllers/ajustes.Controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/subcategorias.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/artesanos.controller.php";
require_once "controllers/notificaciones.controller.php";


require_once "models/admin_model.php";
require_once "models/rutas.php";
require_once "models/ajustes.Modelo.php";
require_once "models/productos.modelo.php";
require_once "models/subcategorias.modelo.php";
require_once "models/categorias.modelo.php";
require_once "models/usuarios.modelo.php";
require_once "models/artesanos.modelo.php";
require_once "models/notificaciones.modelo.php";


$plantilla = new ControllerPlantilla();
$plantilla->plantilla();