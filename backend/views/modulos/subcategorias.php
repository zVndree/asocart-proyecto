<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestor Subcategorías
        </h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Subcategorías</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSubCategoria">
                <i class="fa fa-plus-circle"></i> Agregar subcategoría
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaSubCategorias" width="100%">
                    <thead>
                        <tr>

                            <th style="width:10px">#</th>
                            <th>Subcategoria</th>
                            <th>Categoria</th>
                            <th>Ruta</th>
                            <th>Estado</th>
                            <!-- <th>Descripción</th>
                            <th>Palabras claves</th>
                            <th>Portada</th> -->
                            <th>Tipo de Oferta</th>
                            <th>Valor Oferta</th>
                            <th>Imagen Oferta</th>
                            <th>Fin Oferta</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR SUBCATEGORÍA
======================================-->

<div id="modalAgregarSubCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background: #7D6D61" color=#fff>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Agregar subcategoría</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">

                        <!--=====================================
                        ENTRADA PARA EL NOMBRE DE LA SUBCATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg validarSubCategoria tituloSubCategoria"
                                    name="tituloSubCategoria" placeholder="Ingresar subcategoría" required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA LA RUTA DE LA SUBCATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" class="form-control input-lg rutaSubCategoria"
                                    name="rutaSubCategoria" placeholder="Ruta url de la subcategoría" readonly required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA SELECCIONAR LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg seleccionarCategoria" name="seleccionarCategoria"
                                    required>
                                    <option value="">Selecionar categoría</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        if ($value["estado"] != 0) {
                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                        }
                                        
                                        
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>


                        <!--=====================================
                        ENTRADA PARA LA OFERTA
                        ======================================-->

                        <div class="form-group">
                            <select class="form-control input-lg selActivarOferta" name="selActivarOferta">
                                <option value="">No tiene oferta</option>
                                <option value="oferta">Activar oferta</option>
                            </select>
                        </div>
                        <div class="datosOferta" style="display:none">

                            <!--=====================================
                            VALOR DE LA OFERTA
                            ======================================-->

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                        <input class="form-control input-lg valorOferta" type="number" value="0"
                                            id="precioOferta" name="precioOferta" min="0" placeholder="Precio">
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <input class="form-control input-lg valorOferta" type="number" value="0"
                                            id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            FECHA DE LA OFERTA
                            ======================================-->

                            <div class="form-group">
                                <div class="input-group date">
                                    <input type='text' class="form-control datepicker input-lg valorOferta"
                                        name="finOferta">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA LA FOTO DE LA OFERTA
                            ======================================-->

                            <div class="form-group">
                                <div class="panel">SUBIR FOTO OFERTA</div>
                                <input type="file" class="fotoOferta valorOferta" name="fotoOferta">
                                <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB
                                </p>
                                <img src="views/img/ofertas/default/default.jpg"
                                    class="img-thumbnail previsualizarOferta" width="100px">
                            </div>
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar subcategoría</button>
                </div>

                <?php

                $crearSubCategoria = new ControllerSubcategorias();
                $crearSubCategoria -> ctrCrearSubCategoria();

                ?>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR SUBCATEGORÍA
======================================-->

<div id="modalEditarSubCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header"  style="background:#7D6D61; color:#fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Editar subcategoría</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">
                    <div class="box-body">

                        <!--=====================================
                        ENTRADA PARA EDITAR EL TITULO DE LA SUBCATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg validarSubCategoria tituloSubCategoria"
                                    name="editarTituloSubCategoria" required>
                                <input type="hidden" class="editarIdSubCategoria" name="editarIdSubCategoria">
                                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA EDITAR LA RUTA DE LA SUBCATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" class="form-control input-lg rutaSubCategoria"
                                    name="rutaSubCategoria" readonly required>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA EDITAR LA SELECCIÓN DE LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg seleccionarCategoria" name="seleccionarCategoria"
                                    required>

                                    <option class="optionEditarCategoria"></option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        if ($value["estado"] != 0) {
                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                        }
                                    
                                    
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA EDITAR LA OFERTA
                        ======================================-->

                        <div class="form-group">
                            <select class="form-control input-lg selActivarOferta" name="selActivarOferta">
                                <option value="">No tiene oferta</option>
                                <option value="oferta">Activar oferta</option>
                            </select>
                        </div>
                        <div class="datosOferta" style="display:none">

                            <!--=====================================
                            ENTRADA PARA EDITAR EL TIPO DE OFERTA
                            ======================================-->

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                        <input class="form-control input-lg valorOferta" type="text" value="0"
                                            id="precioOferta" name="precioOferta" min="0" placeholder="Precio">
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <input class="form-control input-lg valorOferta" type="number" value="0"
                                            id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA EDITAR LA FECHA DE LA OFERTA
                            ======================================-->

                            <div class="form-group">
                                <div class="input-group date">
                                    <input type='text' class="form-control datepicker input-lg valorOferta finOferta"
                                        name="finOferta">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA EDITAR LA FOTO DE LA OFERTA
                            ======================================-->

                            <div class="form-group">
                                <div class="panel">SUBIR FOTO OFERTA</div>
                                <input type="file" class="fotoOferta" name="fotoOferta">
                                <input type="hidden" class="antiguaFotoOferta" name="antiguaFotoOferta">
                                <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB
                                </p>
                                <img src="vistas/img/ofertas/default/default.jpg"
                                    class="img-thumbnail previsualizarOferta" width="100px">
                            </div>
                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer" style="background-color: #f7f7f7;">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

                <?php

                $crearCategoria = new ControllerSubcategorias();
                $crearCategoria -> ctrEditarSubCategoria();

                ?>

            </form>
        </div>
    </div>
</div>

    <?php

        $eliminarCategoria = new ControllerSubcategorias();
        $eliminarCategoria -> ctrEliminarSubCategoria();

    ?>

<script>

$(document).keydown(function(e){

if(e.keyCode == 13){

    e.preventDefault();

}

})

</script>