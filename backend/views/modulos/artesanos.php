<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Gestor Artesanos
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Gestor Artesanos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArtesano">
                    Agregar Artesano
                </button>
            </div>

            <div class="box-body">

                <div class="box-tools">

                    <a href="views/modulos/reportes.php?reporte=artesanos">

                        <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

                    </a>

                </div>

                <br>

                <table class="table table-bordered table-striped dt-responsive tablaArtesanos" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <!-- <th>Nick</th> -->
                            <th>Estado</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Celular</th>
                            <th>Reseña</th>
                            <!-- <th>Dirección</th> -->

                            <!-- <th>Ciudad</th> -->
                            <!-- <th>Redes</th> -->
                            <!-- <th>Fecha</th> -->
                            <th>Acciones</th>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR ARTESANOS
======================================-->

<div id="modalAgregarArtesano" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                <!--=====================================
                HEADER
                ======================================-->
                <div class="modal-header" style="background: #7D6D61" color=#fff>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Agregar Artesano</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">

                        <!--=====================================
                        ENTRADA DEL NOMBRE DEL ARTESANO
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg validarArtesano nombreArtesano"
                                    placeholder="Ingresar Nombre" name="nombreArtesano" required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA DEL CORREO DEL ARTESANO
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg emailArtesano"
                                    placeholder="Ingresar Email" name="emailArtesano" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="passwordArtesano"
                                    placeholder="Ingresar contraseña" required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA DEL CELULAR DEL ARTESANO
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg celularArtesano"
                                    placeholder="Ingresar Número celular" name="celularArtesano">
                            </div>
                        </div>

                        <!--=====================================
                        AGREGAR RESEÑA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <textarea type="text" maxlength="320" rows="3"
                                    class="form-control input-lg reseñaArtesano"
                                    placeholder="Ingresar reseña para el artesano" name="reseñaArtesano"></textarea>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA DE LA DIRECCION DEL ARTESANO
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control input-lg direccionArtesano"
                                    placeholder="Ingresar Dirección" name="direccionArtesano" required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA SUBIR FOTO DE ARTESANO
                        ======================================-->

                        <div class="form-group">
                            <div class="panel">SUBIR FOTO ARTESANO</div>
                            <input type="file" class="fotoArtesano" name="fotoArtesano">
                            <p class="help-block">Tamaño recomendado 157px * 315px <br> Peso máximo de la foto 2MB
                            </p>
                            <img src="views/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta"
                                width="100px" required>
                        </div>

                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer" style="background-color: #f7f7f7;">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Agregar Artesano</button>

                </div>
            </form>

            <?php

            $crearArtesano = new controllerArtesanos();
            $crearArtesano -> ctrCrearArtesano();

            ?>
        </div>
    </div>

</div>