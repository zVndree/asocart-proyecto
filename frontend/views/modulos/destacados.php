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
                            <div class="item_service bar_service"  style="' . $plantilla["colorFondo"] . '"> 
                                <div class="sv_icon">
                                    <img src="' . $server . $value["icono"] . '">
                                </div>
                                <div class="info">
                                    <h2>' . $value["titulo"] . '</h2>
                                    <p>' . $value["descripcion"] . '</p>
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

    <section id="tienda">

        <!--=====================================
        VITRINA DE PRODUCTOS MÁS VENDIDOS
        ======================================-->

        <div class="container-fluid productos">
            <div class="container">
                <div class="row">

                    <!--=====================================
                    BARRA TÍTULO
                    ======================================-->

                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <a href="lo-mas-vendido">
                                <button class="btn btn-default back_color pull-right">
                                    VER MÁS <span class="fa fa-chevron-right"></span>
                                </button>
                            </a>
                        </div>

                        <div class="col-xs-12 titulo">
                            <h1>Lo más vendido </h1>
                            <hr class="back_color">
                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

                <!--=====================================
                VITRINA DE PRODUCTOS EN CUADRÍCULA
                ======================================-->

                <ul class="list_product">

                    <!-- Producto 1 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/pozo.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <div class="col-xs-12" id="info_down">
                            <h4>

                                <small>

                                    <a href="#" class="pixelProducto">

                                        Estanque<br>

                                        <span class="label label-warning fontSize">Nuevo</span>

                                        <span class="label label-warning fontSize">40% off</span>

                                    </a>

                                </small>

                            </h4>

                            <!--===============================================-->

                            <div class="col-xs-6 precio">

                                <h2>

                                    <small>

                                        <strong class="oferta">USD $29</strong>

                                    </small>

                                    <small>$11</small>

                                </h2>

                            </div>

                            <!--===============================================-->

                            <div class="col-xs-6 enlaces">

                                <div class="btn-group pull-right">

                                    <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                        <i class="fa fa-heart" aria-hidden="true"></i>

                                    </button>

                                    <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                    </button>

                                    <a href="#" class="pixelProducto">

                                        <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                            <i class="fa fa-eye" aria-hidden="true"></i>

                                        </button>

                                    </a>

                                </div>

                            </div>
                        </div>



                    </li>

                    <!-- Producto 2 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/mariposa.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Mariposa pincelada<br>

                                    <span class="label label-warning fontSize">40% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $29</strong>

                                </small>

                                <small>$11</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>
                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                    <!-- Producto 3 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/cruz.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Cruz pincelada<br>

                                    <span class="label label-warning fontSize">40% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $29</strong>

                                </small>

                                <small>$11</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                    <!-- Producto 4 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/paisaje.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Cuadro pecebre

                                    <br>
                                    <br>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>USD $29</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                </ul>

                <!------------PRODUCTOS MAS VISTOS----------->

                <div class="row">

                    <!--=====================================
                    BARRA TÍTULO
                    ======================================-->

                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <a href="lo-mas-vendido">
                                <button class="btn btn-default back_color pull-right">
                                    VER MÁS <span class="fa fa-chevron-right"></span>
                                </button>
                            </a>
                        </div>

                        <div class="col-xs-12 titulo">
                            <h1>Productos mas vistos </h1>
                            <hr class="back_color">
                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

                <ul>

                    <!-- Producto 1 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/pozo.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Curso de Bootstrap <br>

                                    <span class="label label-warning fontSize">90% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $100</strong>

                                </small>

                                <small>$10</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso05.jpg" titulo="Curso de Bootstrap" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                    <!-- Producto 2 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/paisaje.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Curso de Canvas y Javascript <br>

                                    <span class="label label-warning fontSize">90% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $100</strong>

                                </small>

                                <small>$10</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso04.jpg" titulo="Curso de Canvas y Javascript" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                    <!-- Producto 3 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/cruz.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Aprende Javascript desde cero <br>

                                    <span class="label label-warning fontSize">90% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $100</strong>

                                </small>

                                <small>$10</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso02.jpg" titulo="Aprende Javascript desde cero" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                    <!-- Producto 4 -->

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--===============================================-->

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $server ?>views/img/products/decoracion/mariposa.png" class="img-responsive">

                            </a>

                        </figure>

                        <!--===============================================-->

                        <h4>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Curso de jQuery <br>

                                    <span class="label label-warning fontSize">90% off</span>

                                </a>

                            </small>

                        </h4>

                        <!--===============================================-->

                        <div class="col-xs-6 precio">

                            <h2>

                                <small>

                                    <strong class="oferta">USD $100</strong>

                                </small>

                                <small>$10</small>

                            </h2>

                        </div>

                        <!--===============================================-->

                        <div class="col-xs-6 enlaces">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                            </div>

                        </div>

                    </li>

                </ul>
    </section>

</main>