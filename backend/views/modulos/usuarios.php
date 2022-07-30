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
        <h1>Administrar Usuarios</h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Usuarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
                    <i class="fa fa-plus-circle"></i> Agregar Usuario
                </button>
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR PERFIL
======================================-->

<div id="modalAgregarPerfil" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#7D6D61; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:#fff;" class="modal-title">Agregar Usuario</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg nombreUsuario" name="nombreUsuario"
                                    placeholder="Nombre del Usuario" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg emailUsuario" name="emailUsuario"
                                    placeholder="Email del Usuario" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg passwordUsuario" name="passwordUsuario"
                                    placeholder="Ingresar contraseña" required>
                                <span class="imgContrasena" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icono-pass"></span>

                            </div>
                        </div>

                        <!--=====================================
                        AGREGAR Rol
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg rolUsuario" name="rolUsuario">
                                    <option value="">Selecionar Rol</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $roles = controllerAdmin::ctrMostrarRoles($item, $valor);
                
                                    foreach ($roles as $key => $value) {
                                        if ($value["estado"] != 0) {
                                            echo '<option value="'.$value["idrol"].'">'.$value["nombre"].'</option>';

                                        }
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>


                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="views/img/perfiles/default/default.png" class="img-thumbnail previsualizar"
                                width="100px">
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>

                <?php

                $crearPerfil = new controllerAdmin();
                $crearPerfil -> ctrCrearPerfil();

                ?>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#7D6D61; color:#fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Editar Usuario</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg nombreUsuario" name="editarNombreUsuario"
                                    value="" required>
                                <input type="hidden" class="editarIdUsuario" name="editarIdUsuario">
                            
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg  emailUsuario" name="emailUsuario"
                                    value="" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg passwordUsuario" name="editarPassword"
                                    placeholder="Escriba la nueva contraseña">
                                    <span class="imgContrasena" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icono-pass"></span>
                                <input type="hidden" class="passwordActual" name="passwordActual">
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <!-- <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarPerfil">
                                    <option value="" id="editarPerfil"></option>
                                    <option value="administrador">Administrador</option>

                                    <option value="editor">Editor</option>
                                </select>
                            </div>
                        </div> -->

                        <!--=====================================
                        ENTRADA PARA EDITAR LA SELECCIÓN DEl ROL
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <select class="form-control input-lg seleccionarRol" name="seleccionarRol"
                                    required>

                                    <option class="optionEditarPerfil"></option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $roles = controllerAdmin::ctrMostrarRoles($item, $valor);
                
                                    foreach ($roles as $key => $value) {
                                        if ($value["estado"] != 0) {
                                            echo '<option value="'.$value["idrol"].'">'.$value["nombre"].'</option>';
                                        }
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="views/img/perfiles/default/default.png" class="img-thumbnail previsualizar"
                                width="100px">
                            <input type="hidden" name="fotoActual" class="fotoActual">
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer"  style="background-color: #f7f7f7;">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Salir</button>
                    <button type="submit" class="btn btn-primary">Modificar Usuario</button>
                </div>

                <?php

                $editarPerfil = new controllerAdmin();
                $editarPerfil -> ctrEditarPerfil();

                ?>

            </form>
        </div>
    </div>
</div>

<?php

$eliminarPerfil = new controllerAdmin();
$eliminarPerfil -> ctrEliminarPerfil();

?> 