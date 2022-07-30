<?php
    if (!$_SESSION["id_rol"] == 1 || !$_SESSION["id_rol"] == 4) {
        echo '<script>
            window.location = "inicio";
        </script>';
    }
?>
<div class="content-wrapper">
    <section class="content-header">

        <h1>Ajustes</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Ajustes</li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">

            <!-- =========== BLOQUE 1 ============ -->

            <?php 

            /*=============================================
            ADMINISTRACION LOGO
            =============================================*/
            
            include "ajustes/logotipo.php";

            /*=============================================
            ADMINISTRACION DE COLORES
            =============================================*/
            
            include "ajustes/colores.php";

            /*=============================================
            ADMINISTRACION DE REDES SOCIALES
            =============================================*/

            include "ajustes/redSocial.php";
            
            
            ?>

            </div>

            <div class="col-md-6">

            <!-- =========== BLOQUE 2 ============ -->

            <h1>Bloque 2</h1>
                
            </div>
        </div>

    </section>
</div>