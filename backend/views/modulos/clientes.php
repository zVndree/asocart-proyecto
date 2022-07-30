<?php
    if ($_SESSION["id_rol"] != 1) {
        echo '<script>
            window.location = "inicio";
        </script>';

        return;
    }
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestor Clientes
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Clientes</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div class="box-tools">
                    <a href="views/modulos/reportes.php?reporte=clientes">
                        <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>
                    </a>
                </div>

                <br>

                <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%">
                    <thead>

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Modo de Registro</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>