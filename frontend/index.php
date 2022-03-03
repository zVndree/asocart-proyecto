<?php
/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "C:/xampp/htdocs/Art_Gir/frontend/php_error_log");

date_default_timezone_set("America/Bogota");

include_once "controllers/plantilla.Controller.php";
include_once "controllers/producto.controller.php";
include_once "controllers/slide.Controller.php";
include_once "controllers/evento.controller.php";
include_once "controllers/usuarios.controller.php";

include_once "models/plantilla.modelo.php";
include_once "models/producto.modelo.php";
include_once "models/slide.modelo.php";
include_once "models/evento.modelo.php";
include_once "models/usuarios.modelo.php";
include_once "models/rutas.php";



$plantilla = new ControllerPlantilla();
$plantilla->plantilla();