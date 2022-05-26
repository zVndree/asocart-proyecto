<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestor categorías
        </h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor categorías</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                    Agregar categoría
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Categoría</th>
                            <th>Ruta</th>
                            <th>Estado</th>
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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <div class="model-content">
            <form method="post" enctype="multipart/form-data">

                <!--=====================================
                HEADER
                ======================================-->
                <div class="modal-header" style="background: #7D6D61" color=#fff>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Agregar Categoría</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body" style="background: #f7f7f7;">
                    <div class="box-body">

                        <!--=====================================
                        ENTRADA DEL TITULO DE LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg validarCategoria tituloCategoria"
                                    placeholder="Ingresar Categoria" name="tituloCategoria" required>

                            </div>

                        </div>

                        <!--=====================================
                        ENTRADA PARA LA RUTA DE LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                                <input type="text" class="form-control input-lg rutaCategoria"
                                    placeholder="Ruta url para la categoría" name="rutaCategoria" readonly required>

                            </div>

                        </div>

                        <!--=====================================
                        ENTRADA PARA TIPO DE OFERTA
                        ======================================-->

                        <div class="form-group">

                            <select name="selActivarOferta" class="form-control input-lg selActivarOferta">

                                <option value="">No tiene oferta</option>
                                <option value="oferta">Activar oferta</option>

                            </select>

                        </div>

                        <div class="datosOferta" style="display:none">

                            <!--=====================================
                            ENTRADA PARA EL VALOR DE LA OFERTA
                            ======================================-->

                            <div class="form-group row">

                                <!--=====================================
                                PRECIO
                                ======================================-->
                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                        <input type="number" class="form-control input-lg valorOferta" id="precioOferta"
                                            name="precioOferta" min="0" step="any" placeholder="Precio">

                                    </div>

                                </div>

                                <!--=====================================
                                DESCUENTO
                                ======================================-->

                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <input type="number" class="form-control input-lg valorOferta"
                                            id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento">

                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                    </div>

                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA LA FECHA FIN OFERTA
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
                            ENTRADA PARA SUBIR FOTO DE OFERTA
                            ======================================-->

                            <div class="form-group">

                                <div class="panel">SUBIR FOTO OFERTA</div>

                                <input type="file" class="fotoOferta" name="fotoOferta">

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

                    <button type="submit" class="btn btn-primary">Guardar categoría</button>

                </div>
            </form>

            <?php

            $crearCategoria = new ControllerCategorias();
            $crearCategoria -> ctrCrearCategoria();

            ?>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#7D6D61; color:#fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color: #fff;" class="modal-title">Editar categoría</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body"style="background: #f7f7f7;">

                    <div class="box-body">

                        <!--=====================================
                        ENTRADA DEL TITULO DE LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg validarCategoria tituloCategoria"
                                    placeholder="Ingresar Categoria" name="editarTituloCategoria" required>
                                <input type="hidden" class="editarIdCategoria" name="editarIdCategoria">
                                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">
                            </div>
                        </div>

                        <!--=====================================
                        ENTRADA PARA LA RUTA DE LA CATEGORÍA
                        ======================================-->

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" class="form-control input-lg rutaCategoria"
                                    placeholder="Ruta url para la categoría" name="rutaCategoria" readonly required>
                            </div>
                        </div>

                    

                        <!--  <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg pClavesCategoria tagsInput" data-role="tagsinput" placeholder="Ingresar palabras claves" name="pClavesCategoria" required> 

              </div> 

            </div> -->

                        <!--=====================================
                        ENTRADA PARA TIPO DE OFERTA
                        ======================================-->

                        <div class="form-group">
                            <select name="selActivarOferta" class="form-control input-lg selActivarOferta">
                                <option value="">No tiene oferta</option>
                                <option value="oferta">Activar oferta</option>
                            </select>
                        </div>
                        <div class="datosOferta" style="display:none">

                            <!--=====================================
                            ENTRADA PARA EL VALOR DE LA OFERTA
                            ======================================-->

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                        <input type="text" class="form-control input-lg valorOferta" id="precioOferta"
                                            name="precioOferta" min="0" step="any" placeholder="Precio">
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg valorOferta"
                                            id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>

                            <!--=====================================
                            ENTRADA PARA LA FECHA FIN OFERTA
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
                            ENTRADA PARA SUBIR FOTO DE OFERTA
                            ======================================-->

                            <div class="form-group">
                                <div class="panel">SUBIR FOTO OFERTA</div>
                                <input type="file" class="fotoOferta" name="fotoOferta">
                                <input type="hidden" class="antiguaFotoOferta" name="antiguaFotoOferta">
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios categoría</button>
                </div>

            </form>

            <?php

        
            $editarCategoria = new ControllerCategorias();
            $editarCategoria -> ctrEditarCategoria(); 

            ?>

        </div>

    </div>

</div>

<?php
    
$eliminarCategoria = new ControllerCategorias();
$eliminarCategoria -> ctrEliminarCategoria(); 

?>