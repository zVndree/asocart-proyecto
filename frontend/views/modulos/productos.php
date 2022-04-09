<?php
$server = Ruta::ctr_ruta_servidor();
$url = Ruta::ctrRuta();
$plantilla = ControllerPlantilla::ctrEstiloPlantilla();

?>

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
    Barra de productos
    =======================-->

<div class="container-fluid well well-sm barraProductos">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Ordenar Productos <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><strong>Más reciente</strong></a></li>
                        <li><a href="#"><strong>Más antiguo</strong></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<!--======================
Listar Productos
=======================-->

<div class="container-fluid productos">
    <div class="container">
        <div class="row">

            <!--======================
            Breadcrum migas de pan
            =======================-->

            <ul class="breadcrumb fondoBreadcrumb lead text-uppercase">
                <li><a href="<?php echo $url; ?>">INICIO</a></li>
                <li class="active pag_activa"><?php echo $rutas[0];?></li>
            </ul>


            <?php

            /*=============================================
                LLAMADO DE PRODUCTOS DE CATEGORÍAS, SUBCATEGORÍAS Y DESTACADOS
                =============================================*/

            if ($rutas[0] == "lo-mas-vendido") {

                $item2 = null;
                $valor2 = null;
                $ordenar = "ventas";
            } else if ($rutas[0] == "lo-mas-visto") {

                $item2 = null;
                $valor2 = null;
                $ordenar = "vistas";
            } else {

                $ordenar = "id";
                $item1 = "ruta";
                $valor1 = $rutas[0];

                $categoria = controladorProductos::ctrListarCategorias($item1, $valor1);

                if (is_array($categoria)) {
                    var_dump($categoria["id"]);
                }

                /*  var_dump(is_array($categoria["id"]));
                */
                if (!is_array($categoria)) {
                    $sub_categoria = controladorProductos::ctrListarSubcategorias($item1, $valor1);
                    $item2 = "id_subcategoria";
                    $valor2 = $sub_categoria[0]["id"];
                } else {

                    $item2 = "id_categoria";
                    $valor2 = $categoria["id"];
                }
            }



            $base = 0;
            $tope = 12;
            $productos = controladorProductos::ctr_mostrar_productos($ordenar, $item2, $valor2, $base, $tope);

            if (!$productos) {

                /*=============================================
                Sin productos
                =============================================*/
        
                include "sin_products.php";

                /* if (is_array($error)) {
                
                    echo '<div class="container error_404" >

                            <img class="img-responsive center-block" src="'.$server. $error["imagen"] . '" >

                            <div class="col-xs-12">
                                
                                <h3 style="color:'.$error["color_mensaje"].';">' .'<strong>' . $error["mensaje"] . '</strong></h3>
                            </div>
                        </div>';
                
                }else{
                    echo'<h1>no es array</h1>';
                } */
            }else{

                echo '<ul class="list_product">';    

                        foreach ($productos as $key => $value) {
                                    
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
                echo '</ul>';    
            }

            ?>
        </div>
    </div>

</div>
