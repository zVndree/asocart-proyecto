<!-- ==================PAGINA DE INICIO======================= -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Contenido encabezado dash -->
    <section  class="content-header">
        <h1>
            DashBoard
            <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">DashBoard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!------Fila encabezado dash------>
        <div class="row">

        <?php
        if ($_SESSION["id_rol"] == 1) {
            include "inicio/box_resumen.php";
        }
            
        ?>

        </div>
        <!------Fila contenido dash------>
        <div class="row">
            
            <?php

            if ($_SESSION["id_rol"] == 1) {
                echo'<div class="col-lg-6">';
                    include "inicio/grf_ventas.php";
                    include "inicio/prod_mas_vendido.php";

                echo'</div>';
            }

            ?>
            
            <?php

            if ($_SESSION["id_rol"] == 1) {
                echo'<div class="col-lg-6">';
                    include "inicio/grf_visitas.php";
                    include "inicio/last_user_add.php";
                echo'</div>';
            }else{
                echo'<div class="col-lg-12">';
                    include "inicio/grf_visitas.php";
                    include "inicio/last_user_add.php";
                echo'</div>';
            }
            
            ?>

            <div class="col-lg-12">
            <?php
                include "inicio/prod_add.php";
            ?>
            </div>

        </div>
    </section>
</div>    