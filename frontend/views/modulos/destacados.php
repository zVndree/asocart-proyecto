<?php
$server = Ruta::ctr_ruta_servidor();
$plantilla = ControllerPlantilla::ctrEstiloPlantilla();

?>
<!--======================
    Informacion servicios
=======================-->
<main class="et-main">
    <div class="services_inline_home">
        <div class="row">
            <div class="container">
                <?php
                    $servicios = controladorProductos::ctrListarServicios();

                    foreach ($servicios as $key => $value) {
                        echo '
                        <div class="col-lg-3 col-md-6 ">
                            <div class="item_service bar_service"  style="'.$plantilla["colorFondo"].'"> 
                                <div class="sv_icon">
                                    <img src="'.$server.$value["icono"].'">
                                </div>
                                <div class="info">
                                    <h2>'.$value["titulo"].'</h2>
                                    <p>'.$value["descripcion"].'</p>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>
                
            </div>
        </div>
    </div>
    <!--======================
    Banner publicitario
=======================-->
    <section id="section2">
        <figure class="banner">
            <img src="<?php echo $server ?>views/img/banner/default.jpg" class="img-responsive" width="100%">
            <div class="text_banner text_der">
                <h1 style="color:#eeeeee">Ofertas Especiales</h1>
                <h2 style="color:#eeee"><strong>50% off</strong></h2>
                <h3 style="color: #d1d1d1">Termina el 31 de marzo</h3>
            </div>
        </figure>
    </section>
    <!--======================
    Barra Ofertas Productos
=======================-->
    <section id="tienda">
        <div class="container-fluid well well-sm bar_product">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 org_products">
                        <div class="btn-group pull-right">
                            <!--BOTON VER EN CUADRICULA -->
                            <button type="button" class="btn btn-default btn_grid" id="btn_grid0">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                <span class="col-xs-0 pull-right">GRID</span>
                            </button>
                            <!--BOTON VER EN LISTA -->
                            <button type="button" class="btn btn-default btn_list" id="btn_list0">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span class="col-xs-0 pull-right">LISTA</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--======================
    productos en oferta
=======================-->

    <div class="container-fluid products">
        <div class="container">
            <div class="row">
                <!--======================
            barra de titulo
            =======================-->
                <a href="articulos-ofertas">
                    <button class="btn btn-default back_color pull-right">
                        Ver mas <span class="fa fa-chevron-right"></span>
                    </button>
                </a>
                <div class="col-xs-12 titulo">

                    <h1>Articulos en Oferta</h1>
                    <hr class="back_color">
                </div>

                
            </div>
            
            <!--======================
        vista productos en cuadricula
        =======================-->
            <ul class="grid0">
                <!--producto 1 -->
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#" class="pixel_producto">
                            <img src="<?php echo $server ?>views/img/products/accesorios/1.jpg" class="img-responsive">
                        </a>
                    </figure>
                    <h4>
                        <small>
                            <a href="" class="pixel_producto">
                                Manilla artesanal <br>
                            </a>
                        </small>
                    </h4>
                    <div class="col-xs-6 precio">
                        <h2><small>DESCUENTO</small></h2>
                    </div>
                    <div class="col-xs-6 enlaces">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos_product" id_producto="470" data-toggle="tooltip" title="Agregar a la lista de deseos">
                                <i class="fa fa-heart"></i>
                            </button>
                            <a href="#" class="pixel_producto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#" class="pixel_producto">
                            <img src="http://localhost/Art_Gir/backend/views/img/products/accesorios/1.jpg" class="img-responsive">
                        </a>
                    </figure>
                    <h4>
                        <small>
                            <a href="" class="pixel_producto">
                                Manilla artesanal <br>
                            </a>
                        </small>
                    </h4>
                    <div class="col-xs-6 precio">
                        <h2><small>DESCUENTO</small></h2>
                    </div>
                    <div class="col-xs-6 enlaces">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos_product" id_producto="470" data-toggle="tooltip" title="Agregar a la lista de deseos">
                                <i class="fa fa-heart"></i>
                            </button>
                            <a href="#" class="pixel_producto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#" class="pixel_producto">
                            <img src="http://localhost/Art_Gir/backend/views/img/products/accesorios/1.jpg" class="img-responsive">
                        </a>
                    </figure>
                    <h4>
                        <small>
                            <a href="" class="pixel_producto">
                                Manilla artesanal <br>
                            </a>
                        </small>
                    </h4>
                    <div class="col-xs-6 precio">
                        <h2><small>DESCUENTO</small></h2>
                    </div>
                    <div class="col-xs-6 enlaces">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos_product" id_producto="470" data-toggle="tooltip" title="Agregar a la lista de deseos">
                                <i class="fa fa-heart"></i>
                            </button>
                            <a href="#" class="pixel_producto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#" class="pixel_producto">
                            <img src="http://localhost/Art_Gir/backend/views/img/products/accesorios/1.jpg" class="img-responsive">
                        </a>
                    </figure>
                    <h4>
                        <small>
                            <a href="" class="pixel_producto">
                                Manilla artesanal <br>
                            </a>
                        </small>
                    </h4>
                    <div class="col-xs-6 precio">
                        <h2><small>DESCUENTO</small></h2>
                    </div>
                    <div class="col-xs-6 enlaces">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos_product" id_producto="470" data-toggle="tooltip" title="Agregar a la lista de deseos">
                                <i class="fa fa-heart"></i>
                            </button>
                            <a href="#" class="pixel_producto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>