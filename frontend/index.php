<?php
/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "C:/xampp/htdocs/asocart-proyecto/frontend/php_error_log");

date_default_timezone_set("America/Bogota");

require_once "controllers/plantilla.Controller.php";
require_once "controllers/producto.controller.php";
require_once "controllers/slide.Controller.php";
require_once "controllers/evento.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/directorio.controller.php";
require_once "controllers/notificaciones.controller.php";

require_once "models/plantilla.modelo.php";
require_once "models/producto.modelo.php";
require_once "models/slide.modelo.php";
require_once "models/evento.modelo.php";
require_once "models/usuarios.modelo.php";
require_once "models/directorio.modelo.php";
require_once "models/rutas.php";
require_once "models/notificaciones.modelo.php";


require_once "include/PHPMailer/PHPMailerAutoload.php";
require_once "include/vendor/autoload.php";




$plantilla = new ControllerPlantilla();
$plantilla->plantilla();