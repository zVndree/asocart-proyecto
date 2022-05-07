<?php

require_once "../../controllers/reportes.controller.php";
require_once "../../models/reportes.modelo.php";

require_once "../../controllers/productos.controller.php";
require_once "../../models/productos.modelo.php";

require_once "../../controllers/usuarios.controller.php";
require_once "../../models/usuarios.modelo.php";

$reporte = new ControladorReportes();
$reporte -> ctrDescargarReporte();
