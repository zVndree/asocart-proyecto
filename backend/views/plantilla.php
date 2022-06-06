<?php 

session_start();
$plantilla = ControllerAjustes::ctrSeleccionarPlantilla();


?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administración | Asocart</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--=================
  PLUGINS CSS 
  ================== -->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="views/bower_components/morris.js/morris.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="views/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!----DROPZONE----->
  <link rel="stylesheet" href="views/plugins/dropzone/dropzone.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--=======================
  ESTILOS PERSONALIZADOS 
  ========================-->
  <link rel="stylesheet" href="views/dist/css/style.css">
  <link rel="stylesheet" href="views/css/plantilla.css">
  <!--=======================
  PLUGINS DE JAVASCRIPT
  ========================-->
  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="views/plugins/iCheck/icheck.min.js"></script>
  <!------Plugins graficos------->
  <script src="views/bower_components/morris.js/morris.min.js"></script>
  <script src="views/bower_components/raphael/raphael.min.js"></script>
    <!-- jQuery Knob Chart -->
  <script src="views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <script src="views/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
  <script src="views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- DataTables https://datatables.net/-->
  <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!----DROPZONE----->
  <script src="views/plugins/dropzone/dropzone.js"></script>
</head>

<body  style="background-color: #d9cab0" class="hold-transition sidebar-collapse sidebar-mini">

  <!-------------------------------
    Modulo Login
    -------------------------------->

  <?php

  if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {

    echo '<div class="wrapper">';

    /*==============================
      =            HEADER            =
      ==============================*/

    include "modulos/cabezote.php";

    /*==============================
      =         SIDEBAR MENU       =
      ==============================*/

    include "modulos/sidebar.php";

    /*=================================
      =            CONTENIDO            =
      =================================*/

    if (isset($_GET["ruta"])) {
      if ($_GET["ruta"] == "inicio"
        || $_GET["ruta"] == "clientes"
        || $_GET["ruta"] == "artesanos"
        || $_GET["ruta"] == "categorias"
        || $_GET["ruta"] == "subcategorias"
        || $_GET["ruta"] == "productos"
        || $_GET["ruta"] == "ajustes"
        || $_GET["ruta"] == "perfiles"
        || $_GET["ruta"] == "salir") {

        include "modulos/" . $_GET["ruta"] . ".php";
      }else{
        include "modulos/404.php";
      }
    }else{
      include "modulos/inicio.php";
    }

    /*==============================
      =            FOOTER            =
      ==============================*/

    include "modulos/footer.php";

    echo '</div>';
  } else {
    include "modulos/login.php";
  }
  ?>

  <!--=======================
  JS PERSONALIZADOS 
  ========================-->

  <script src="views/js/plantilla.js"></script>
  <script src="views/js/gestorAjustes.js"></script>
  <script src="views/js/gestorProductos.js"></script>
  <script src="views/js/gestorCategorias.js"></script>
  <script src="views/js/gestorSubcategorias.js"></script>
  <script src="views/js/gestorUsuarios.js"></script>
  <script src="views/js/gestorArtesanos.js"></script>
  <script src="views/js/gestorAdministradores.js"></script>


</body>

</html>