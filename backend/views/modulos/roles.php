<div class="content-wrapper">
    <section class="content-header">
        <h1>Roles Usuarios</h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Roles Usuarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRol">
                    <i class="fa fa-plus-circle"></i> Nuevo rol
                </button>
            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaRoles" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $roles = controllerAdmin::ctrMostrarRoles($item, $valor);


            foreach ($roles as $key => $value){

                echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["descripcion"].'</td>';

                        if($value["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idRol="'.$value["idrol"].'" estadoRol="0">Activado</button></td>';

                        }else{

                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idRol="'.$value["idrol"].'" estadoRol="1">Desactivado</button></td>';

                        } 

                        echo '
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btnPermisosRol" idRol="'.$value["idrol"].'" data-toggle="modal" data-target="#modalPermisosRol"><i class="fa fa-key"></i></button>
                                <button class="btn btn-warning btnEditarRol" idRol="'.$value["idrol"].'" data-toggle="modal" data-target="#modalEditarRol"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btnEliminarRol" idRol="'.$value["idrol"].'"><i class="fa fa-times"></i></button>
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
MODAL AGREGAR ROL
======================================-->

<div id="modalAgregarRol" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#7D6D61; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:#fff;" class="modal-title">Agregar Rol</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoRol"
                                    placeholder="Nombre del Rol" required>
                            </div>
                        </div>

                        <!--=====================================
                        AGREGAR DESCRIPCIÓN
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <textarea type="text" maxlength="320" rows="3"
                                    class="form-control input-lg descripcionRol" name="descripcionRol"
                                    placeholder="Descripción del Rol"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Rol</button>
                </div>

                <?php

                    $crearRol = new controllerAdmin();
                    $crearRol -> ctrCrearRol();

                ?>

            </form>
        </div>
    </div>
</div>


<!--=====================================
MODAL PERMISOS ROL
======================================-->

<div id="modalPermisosRol" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                
                <div class="modal-header" style="background:#7D6D61; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:#fff;" class="modal-title">Permisos Rol </h4>
                </div>

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tablaRoles" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Modulo</th>
                                    <th>Ver</th>
                                    <th>Crear</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    
                                    $item = null;
                                    $valor = null;
                                    $modulo = controllerAdmin::ctrMostrarModulo($item, $valor);
                                    $item = null;
                                    $valor = null;
                                    $permiso = controllerAdmin::ctrMostrarPermiso($item, $valor);

                                    foreach ($modulo as $key => $valm){
                                        echo ' <tr>
                                                <td>'.($key+1).'</td>
                                                <td>'.$valm["titulo"].'</td>
                                                ';
                                        foreach ($permiso as $key => $value) {
                                            
                                            echo'
                                                
                                                <td>'.$value["r"].'</td>
                                                <td>'.$value["u"].'</td>
                                                <td>'.$value["w"].'</td>
                                                <td>'.$value["d"].'</td>
                                            </tr>
                                        '; 
                                        
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
        </div>
    </div>
</div>