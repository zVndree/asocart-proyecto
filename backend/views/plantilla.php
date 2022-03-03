<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administración | Asocart</title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- ESTILOS PERSONALIZADOS -->
  <link rel="stylesheet" href="views/dist/css/style.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="views/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
      /* jQueryKnob */
      $('.knob').knob();
    });
  </script>

  <!------Plugins graficos------->
  <script src="views/bower_components/morris.js/morris.min.js"></script>
  <script src="views/bower_components/raphael/raphael.min.js"></script>
    <!-- jQuery Knob Chart -->
  <script src="views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini fondo">

  <!-------------------------------
    Modulo Login
    -------------------------------->

  <?php

  session_start();

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
      if ($_GET["ruta"] == "inicio") {

        include "modulos/" . $_GET["ruta"] . ".php";
      }
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

</body>

</html>