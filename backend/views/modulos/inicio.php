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
            include "inicio/box_resumen.php";
        ?>

        </div>
        <!------Fila contenido dash------>
        <div class="row">
            <div class="col-lg-6">
            <?php
                include "inicio/grf_ventas.php";
                include "inicio/prod_mas_vendido.php"
            ?>
            </div>

            <div class="col-lg-6">
            <?php
                include "inicio/grf_visitas.php";
                include "inicio/last_user_add.php"
            ?>
            </div>

            <div class="col-lg-12">
            <?php
                include "inicio/prod_add.php";
            ?>
            </div>

        </div>
    </section>
</div>    