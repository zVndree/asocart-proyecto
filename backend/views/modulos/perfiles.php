<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Perfiles</h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Perfiles</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
                    Agregar perfil
                </button>
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php

            $item = null;
            $valor = null;

            $perfiles = controllerAdmin::ctrMostrarAdministradores($item, $valor);

            foreach ($perfiles as $key => $value){

                echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["name"].'</td>
                        <td>'.$value["email"].'</td>';

                        if($value["foto"] != ""){

                        echo '<td><img src="'.$value["foto"].'" class="img-circle" width="40px"></td>';

                        }else{

                            echo '<td><img src="views/img/usuarios/default/default.png" class="img-thumbnail" width="40px"></td>';

                        }

                        echo '<td>'.$value["perfil"].'</td>
                        ';

                        if($value["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="0">Activado</button></td>';

                        }else{

                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="1">Desactivado</button></td>';

                        } 

                        echo '
                        <td>'.$value['ultimo_login'].'</td>
                        <td>

                        <div class="btn-group">
                            
                            <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["id"].'" fotoPerfil="'.$value["foto"].'"><i class="fa fa-times"></i></button>

                        </div>  

                        </td>

                    </tr>';            
            }


            ?>

                    </tbody>
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

                    <h4 style="color:#fff;" class="modal-title">Agregar Perfil</h4>

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

                                <input type="text" class="form-control input-lg" name="nuevoNombre"
                                    placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control input-lg" name="nuevoEmail"
                                    placeholder="Ingresar Email" id="nuevoEmail" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lg" name="nuevoPassword"
                                    placeholder="Ingresar contraseña" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoPerfil">

                                    <option value="">Selecionar perfil</option>

                                    <option value="administrador">Administrador</option>

                                    <option value="supervisor">Supervisor</option>
                                    <option value="artesano">Artesano</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="vews/img/perfiles/default/default.png" class="img-thumbnail previsualizar"
                                width="100px">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Perfil</button>

                </div>

                <?php

        $crearPerfil = new controllerAdmin();
        $crearPerfil -> ctrCrearPerfil();

        ?>

            </form>

        </div>

    </div>

</div>