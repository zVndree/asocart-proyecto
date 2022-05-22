<?php
$server = Ruta::ctr_ruta_servidor();
$url = Ruta::ctrRuta();
?>

<!--=====================================
BREADCRUMB INFOPRODUCTOS
======================================-->
<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb fondoBreadcrumb text-uppercase">

                <li><a href="<?php echo $url; ?>">INICIO</a></li>
                <li class="active pag_activa"><?php echo $rutas[0] ?></li>

            </ul>

        </div>

    </div>

</div>

<!--=====================================
INFOPRODUCTOS
======================================-->

<div class="container-fluid infoproducto">
    <div class="container">
        <div class="row">

            <?php

            $item = "ruta";
            $valor = $rutas[0];
            $infoproducto = controladorProductos::ctr_mostrar_info_productos($item, $valor);
            /* var_dump($infoproducto); */
            ?>

            <!--=====================================
			VISOR DE PRODUCTOS
			======================================-->

            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                <figure class="visor">
                    <img id="lupa1" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                    <img id="lupa2" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                    <img id="lupa3" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                    <img id="lupa4" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                    <img id="lupa5" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">

                </figure>

                <!--=====================================
				CAROUSEL DE PRODUCTOS
				======================================-->

                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img value="1" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="2" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="3" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="4" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="5" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>

                    </ul>
                </div>

            </div>

            <!--=====================================
            PRODUCTO
            ======================================-->

            <div class="col-md-7 col-sm-6 col-xs-12 product-area">

                <!--=====================================
                REGRESAR A LA TIENDA
                ======================================-->

                <div class="col-xs-6">
                    <h6>
                        <a href="javascript:history.back()" class="text-muted">
                            <i class="fa fa-reply"></i> Continuar comprando
                        </a>
                    </h6>
                </div>

                <!--=====================================
                COMPARTIR RED SOCIAL FACEBOOK
                ======================================-->
                <div class="col-xs-6">
                    <a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">

                        <i class="fa fa-plus"></i> Compartir
                    </a>

                    <ul class="dropdown-menu pull-right compartirRedes">
                        <p class="btnFacebook">
                            <i class="fa fa-facebook"></i>
                            Facebook
                        </p>

                    </ul>
                </div>

                <div class="clearfix"></div>


                <!--=====================================
                Espacio para el prodcto
                ======================================-->



                <?php

                /*=====================================
                    FORMATEAR EL PRECIO A PESOS COLOMBIANOS
                    ======================================*/

                $precioOferta = $infoproducto["precioOferta"];
                $moneyPrecioOferta = number_format($precioOferta, 0, '.', '.');
                $price = $infoproducto["precio"];
                require_once("moneda.php");

                /*=====================================
                    TITULO DEL PRODUCTO
                    ======================================*/

                if ($infoproducto["oferta"] == 0) {

                    if ($infoproducto["nuevo"] == 0) {

                        echo '<h1 class="text-muted">' . $infoproducto["titulo"] . '</h1>';
                    } else {

                        echo '<h1 class="text-muted">' . $infoproducto["titulo"] . '
                            <br>

                            <small>
                                <span class="label label-warning">Nuevo</span>
                            </small>
                            
                            </h1>';
                    }
                } else {

                    if ($infoproducto["nuevo"] == 0) {

                        echo '<h1 class="text-muted">' . $infoproducto["titulo"] . '
                        
                            <br>
    
                            <small>
                                <span class="label label-warning">' . $infoproducto["descuentoOferta"] . '% off</span>
                            </small>
                            
                            </h1>';
                    } else {

                        echo '<h1 class="text-muted">' . $infoproducto["titulo"] . '
                        
                            <br>
    
                            <small>
                                <span class="label label-warning">' . $infoproducto["descuentoOferta"] . '% off</span>
                                <span class="label label-warning">Nuevo</span>
                            </small>
                            
                            </h1>';
                    }
                }

                /*=====================================
                    PRECIO DEL PRODUCTO
                    ======================================*/

                if ($infoproducto["precio"] == 0) {
                } else {

                    if ($infoproducto["oferta"] == 0) {

                        echo '<h3 >$' . $money . ' COP</h3>';
                    } else {
                        echo '<h2 class="text-muted">
                            <span>

                                <strong class="oferta">$' . $money . ' COP</strong>

                            </span>

                            <span>
                                
                                $' . $moneyPrecioOferta . '

                            </span>
                            
                            </h2>';
                    }


                    /* echo $money;

                    $infoproducto["precio"] = "COP $" .number_format(2, ','.$infoproducto["precio"].'.'); */

                    /* $precio_cop = $infoproducto["precio"];
                        setlocale(LC_MONETARY, "es_CO");
                        money_format("%.2n", $precio_cop) . "\n"; */

                    /*  echo '<h2 class="text-muted">'.$infoproducto["precio"].'</h2>';*/
                }

                /*=====================================
                    DESCRIPCION DEL PRODUCTO
                    ======================================*/

                echo '<p>' . $infoproducto["descripcion"] . '</p>';

                ?>

                <!--=====================================
                CARACTERISTICAS DEL PRODUCTO
                ======================================-->

                <div class="form-group row">

                    <?php

                    if ($infoproducto["detalles"] != null) {

                        $detalles = json_decode($infoproducto["detalles"], true);

                        /* var_dump($detalles); */

                        if ($detalles["Color"] != null) {

                            echo '<div class="col-md-3 col-xs-12">
                            
                                <select class="form-control seleccionarDetalle" id="seleccionarColor">
                                
                                    <option value="">Color</option>';

                            for ($i = 0; $i <= count($detalles["Color"]); $i++) {

                                echo '<option value="' . $detalles["Color"][$i] . '">' . $detalles["Color"][$i] . '</option>';
                            }
                            echo '</select><br>
                            </div>';
                        }
                    }


                    /*=====================================
                    INFORMACION DE ENTREGA
                    ======================================*/

                    if ($infoproducto["entrega"] == 0) {
                        echo '<h4 class="col-xs-12">

                        <span class="label label-default">
                            <i class="fa fa-clock-o"  style="margin-right: 5px"></i>
                            Entrega Inmediata |
                            <i class="fa fa-shopping-cart" style="margin: 0px 5px"></i>
                            ' . $infoproducto["ventas"] . ' vendidos |
                            <i class="fa fa-eye" style="margin: 0px 5px"></i>
                            visto por ' . $infoproducto["vistas"] . ' personas
                        
                        </span>

                        </h4>';
                    } else {
                        echo '<h4 class="col-xs-12">

                        <span class="label label-default">
                            <i class="fa fa-clock-o"  style="margin-right: 5px"></i>
                            ' . $infoproducto["entrega"] . ' Días hábiles para la entrega
                            <i class="fa fa-shopping-cart" style="margin: 0px 5px"></i>
                            ' . $infoproducto["ventas"] . ' vendidos |
                            <i class="fa fa-eye" style="margin: 0px 5px"></i>
                            visto por ' . $infoproducto["vistas"] . ' personas
                        
                        </span>

                        </h4>';
                    }
                    ?>

                </div>

                <!--=====================================
                BOTONES DE COMPRA
                ======================================-->

                <div class="row ">

                    <?php
                    if ($infoproducto["precio"] != 0 || $infoproducto["precio"] != null) {

                        echo '<div class="col-md-5 col-xs-12" style="margin: 10px 20px;">
                            <button style="color:' . $plantilla["bar_down"] . ';background: ' . $plantilla["barTop"] . '" class="btn_comprar btn btn-default btn-block btn-lg">COMPRAR AHORA</button>
                        </div>
                        
                        <div class="col-md-5 col-xs-12" style="margin: 10px 20px;">
                            <button style="color:' . $plantilla["bar_down"] . ';background: ' . $plantilla["verde"] . '" class="add_cart btn btn-default btn-block btn-lg ">AÑADIR AL CARRITO <i class="fa fa-cart-plus"></i></button>
                        </div>';
                    }
                    ?>


                </div>

                <!--=====================================
                ZONA DE LUPA
                ======================================-->

                <figure class="lupa">

                    <img src="">

                </figure>


            </div>


        </div>
    </div>


</div>