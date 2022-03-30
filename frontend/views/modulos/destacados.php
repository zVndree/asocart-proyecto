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

    <?php

        $titulos_modulos = array("LO MÁS VENDIDO", "LO MÁS VISTO");
        $ruta_modulos = array("lo-mas-vendido", "lo-mas-visto");
        if ($titulos_modulos[0] == "LO MÁS VENDIDO") {
            $ordenar = "ventas";
            $ventas = controladorProductos::ctr_mostrar_productos($ordenar);
        }

        if ($titulos_modulos[1] == "LO MÁS VISTO") {
            $ordenar = "vistas";
            $vistas = controladorProductos::ctr_mostrar_productos($ordenar);
        }
        
        /* var_dump($productos); */

        $modulos = array($ventas, $vistas);
        for ($i=0; $i < count($titulos_modulos) ; $i++) { 
            echo '
            <div class="container-fluid productos">
                <div class="container">
                    <div class="row">

                        <!--=====================================
                        BARRA TÍTULO
                        ======================================-->

                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                <a href="'.$ruta_modulos[$i].'">
                                    <button class="btn btn-default back_color pull-right">
                                        VER MÁS <span class="fa fa-chevron-right"></span>
                                    </button>
                                </a>
                            </div>

                            <div class="col-xs-12 titulo">
                                <h1>'.$titulos_modulos[$i].'</h1>
                                <hr class="back_color">
                            </div>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <!--=====================================
                    VITRINA DE PRODUCTOS EN CUADRÍCULA
                    ======================================-->

                    <ul class="list_product">';

                        foreach ($modulos[$i] as $key => $value) {
                            
                            echo '
                            <li class="col-md-3 col-sm-6 col-xs-12" id="card_product">
                                <figure>
                                    <a href="'.$value["ruta"].'" class="pixelProducto">
                                        <img src="'.$server.$value["img_producto"].'" class="img-responsive">
                                    </a>
                                </figure>

                                <div class="col-xs-12" id="info_down">
                                    <div class="product-grid">
                                        <h4>
                                            <small>
                                                <a href="'.$value["ruta"].'" class="pixelProducto">
                                                    <strong>'.$value["titulo"].'</strong><br>
                                                    <span style="color:rgba(0,0,0,0)">-</span>';

                                                    if ($value["nuevo"] != 0) {
                                                        echo '<span class="label label-warning fontSize">Nuevo</span> ';
                                                    }

                                                    if ($value["oferta"] != 0) {
                                                        echo '<span class="label label-warning fontSize">'.$value["descuento_oferta"].'% off</span> ';
                                                    }
                                                    
                                            echo '</a>
                                            </small>
                                        </h4>

                                        <div class="col-xs-6 precio">';

                                        if($value["oferta"] != 0){

                                            echo '
                                            <h3>
                                                <small>
                                                    <strong class="oferta">COP $'.$value["precio"].'</strong>
                                                </small><br>

                                                <small><strong  style="color:#474747;">$'.$value["precio_oferta"].'</strong></small>
                                            </h3>';
                                        }else{
                                            echo '<h3><small><strong  style="color:#474747;">COP $'.$value["precio"].'</strong></samll></h3><br>';
                                        }

                                            
                                        echo'</div>

                                        <div class="col-xs-6 enlaces">
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>';
                                                if ($value["precio"] != 0) {
                                                    if ($value["oferta"] != 0) {
                                                        echo'
                                                        <div class="product-content">
                                                            <a href="'.$value["ruta"].'" class="add-to-cart agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$server.$value["img_producto"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio_oferta"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
                                                            <i class="fa fa-shopping-cart"></i></a>
                                                        </div>';
                                                    }else{
                                                        echo'
                                                        <div class="product-content">
                                                            <a href="'.$value["ruta"].'" class="add-to-cart agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$server.$value["img_producto"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
                                                            <i class="fa fa-shopping-cart"></i></a>
                                                        </div>';

                                                    }
                                                }
                                                    
                                                echo'<a href="'.$value["ruta"].'" class="pixelProducto">
                                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>';
                        }
                
                echo '</ul>
                </div>
            </div>';
        }
    ?>

    </section>

</main>