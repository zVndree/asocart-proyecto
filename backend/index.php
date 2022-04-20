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
require_once "models/admin_model.php";
require_once "models/ajustes.Modelo.php";

$plantilla = new ControllerPlantilla();
$plantilla->plantilla();