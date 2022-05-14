<?php
$server = Ruta::ctr_ruta_servidor();
$url = Ruta::ctrRuta();
$plantilla = ControllerPlantilla::ctrEstiloPlantilla();
$all_productos = controladorProductos::ctrMostrarTotalProductos("id");

/* $arrayRange = range(1,max($all_productos)); */
$total_productos = count($all_productos);

/* var_dump($total_productos); */

?>

<!--======================
Barra de productos
=======================-->

<div class="container-fluid well well-sm barraProductos">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-xs-12 text-left">
                <?php

                if (isset($rutas[1])) {
                    $tope = 12;
                    $indice =  $tope * $rutas[1];

                    for ($i =0; $i < $total_productos ; $i++) {
                        
                        $tope ++;
                        
                    }
                    $suma = $i - $indice;
                    $suma_total = $indice + $suma;

                    if ($indice >= $i) {
                        echo '<h3 class="text-muted">Mostrando '.$suma_total.' de '.$total_productos.' productos</h3>
                        ';
                    }else{
                        echo '<h3 class="text-muted">Mostrando '.$indice.' de '.$total_productos.' productos</h3>
                    ';
                    }
                    
                }else {

                    $tope = 12;
                    echo '<h3 class="text-muted">Mostrando '.$tope.' de '.$total_productos.' productos</h3>
                    ';

                }
                

            /*  var_dump($rutas[1]);
                var_dump("indice",$indice); */
                
                ?>
            </div>
            <div class="col-md-6 col-xs-12 text-right">
                <div class="btn-group">
                    <button type="button" style="margin-top: 10px;" class="btn btn-default dropdown-toggle verde" data-toggle="dropdown">
                        Ordenar Productos <span class="caret"></span>
                    </button>
                    <ul style="background-color:<?php echo $plantilla["colorFondo"]?>" class="dropdown-menu" role="menu">
                    <?php
					
						echo '<!----<li><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							<li><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>--->
                            <li class="dropdown-header"><strong>Precio</strong></li>
                            <li><a href="'.$url.$rutas[0].'/1/mas-caro">Más Caro</a></li>
                            <li><a href="'.$url.$rutas[0].'/1/mas-barato">Más Barato</a></li>';

						?>
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
            Breadcrumb migas de pan
            =======================-->
            

            <?php
                if(isset($rutas[2]) != ""){

                    echo'
                    
                    <ul class="breadcrumb fondoBreadcrumb text-uppercase">
                        <li><a href="'.$url.'">INICIO</a></li>
                        <li style="color:'.$plantilla["colorFondo"].'" class="active pag_activa">'.$rutas[0].' / '.$rutas[2].'</li>
                    </ul>
                    ';
                }else{

                    echo'
                    <ul class="breadcrumb fondoBreadcrumb text-uppercase">
                        <li><a href="'.$url.'">INICIO</a></li>
                        <li style="color:'.$plantilla["colorFondo"].'" class="active pag_activa">'.$rutas[0].'</li>
                    </ul>
                    ';
                }
            ?>

            


            <?php

            /*=============================================
            LLAMADO DE PAGINACIÓN
            =============================================*/

            if(isset($rutas[1])){

				if(isset($rutas[2])){

                    if($rutas[2] == "mas-caro"){

						$modo = "DESC";
						$_SESSION["ordenar"] = "DESC";
                        $ordenar = "precio";
                        

                    }if($rutas[2] == "mas-barato"){
                        
                        $modo = "ASC";
						$_SESSION["ordenar"] = "ASC";
                        $ordenar = "precio";

                    }
/* 
					if($rutas[2] == "antiguos"){

						$modo = "ASC";
						$_SESSION["ordenar"] = "ASC";
                        $ordenar = "id";

                    }elseif($rutas[2] == "recientes"){

                        $modo = "DESC";
                        $_SESSION["ordenar"] = "DESC";
                        $ordenar = "id";

					}elseif($rutas[2] == "mascaro"){
                        $modo = "DESC";
                        $_SESSION["ordenar"] = "DESC";
                        $ordenar = "precio";
                    } else{

                        $modo = "ASC";
						
						$_SESSION["ordenar"] = "ASC";
                        $ordenar = "precio";

					}
 */
				}else{

					$modo = $_SESSION["ordenar"];

				}

				$base = ($rutas[1] - 1)*12;
				$tope = 12;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 12;
				$modo = "DESC";
				$_SESSION["ordenar"] = "DESC";
            

			}
            $ordenar = "precio";

            /* var_dump($modo);
            var_dump($ordenar); */
                
            $productos = controladorProductos::ctr_mostrar_all_productos($ordenar, $base, $tope, $modo);
            $list_products = controladorProductos::ctr_listar_all_productos($ordenar);

            if (!$productos) {

                /*=============================================
                Sin productos
                =============================================*/

                include "sin_products.php";
            } else {

                echo '<ul class="list_product">';

                foreach ($productos as $key => $value) {

                    $price = $value["precio"];
                    /* include_once("moneda.php"); */
                    $money_buscador = number_format($price, 0, '.', '.');

                    echo '
                            <li class="col-md-3 col-sm-6 col-xs-6" id="card_product">
                                <figure>
                                    <a href="' . $url.$value["ruta"] . '" class="pixelProducto">
                                        <img src="' . $server . $value["img_producto"] . '" class="img-responsive" alt="productos">
                                    </a>
                                </figure>

                                <!-- ' . $value["id"] . ' ---->

                                <div class="col-xs-12" id="info_down">
                                    <div class="product-grid">
                                        <h4>
                                            <small>
                                                <a href="' . $value["ruta"] . '" class="pixelProducto">
                                                    <strong>' . $value["titulo"] . '</strong><br>
                                                    <span style="color:rgba(0,0,0,0)">-</span>';

                    if ($value["nuevo"] != 0) {
                        echo '<span class="label label-warning fontSize">Nuevo</span> ';
                    }

                    if ($value["oferta"] != 0) {
                        echo '<span class="label label-warning fontSize">' . $value["descuento_oferta"] . '% off</span> ';
                    }

                    echo '</a>
                                            </small>
                                        </h4>

                                        <div class="col-xs-6 precio">';

                    if ($value["oferta"] != 0) {

                        echo '
                                                    <h3>
                                                        <small>
                                                            <strong class="oferta">COP $' . $money_buscador. '</strong>
                                                        </small><br>

                                                        <small><strong  style="color:#474747;">$' . $value["precio_oferta"] . '</strong></small>
                                                    </h3>';
                    } else {
                        echo '<h3><small><strong  style="color:#474747;">COP $' . $money_buscador . '</strong></samll></h3><br>';
                    }

                    echo '</div>

                                        <div class="col-xs-6 enlaces">
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-default btn-xs deseos" idProducto="' . $value["id"] . '" data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>';

                    if ($value["precio"] != 0) {
                        if ($value["oferta"] != 0) {
                            echo '
                                                            <div class="product-content">
                                                                <a href="' . $value["ruta"] . '" class="add-to-cart agregarCarrito" idProducto="' . $value["id"] . '" imagen="' . $server . $value["img_producto"] . '" titulo="' . $value["titulo"] . '" precio="' . $value["precio_oferta"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">
                                                                <i class="fa fa-shopping-cart"></i></a>
                                                            </div>';
                        } else {
                            echo '
                                                            <div class="product-content">
                                                                <a href="' . $value["ruta"] . '" class="add-to-cart agregarCarrito" idProducto="' . $value["id"] . '" imagen="' . $server . $value["img_producto"] . '" titulo="' . $value["titulo"] . '" precio="' . $money_buscador . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">
                                                                <i class="fa fa-shopping-cart"></i></a>
                                                            </div>';
                        }
                    }

                    echo '<a href="' . $value["ruta"] . '" class="pixelProducto">
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

            /* var_dump(count($list_products)); */

            ?>

            <!--======================
            Paginación
            =======================-->

            <div class="clearfix"></div>

            <center>

                <?php

                if (count($list_products) != 0) {
                    $pag_products = ceil(count($list_products) / 12);

                    /* var_dump($pag_products); */

                    if ($pag_products > 4) {

                        /*================================================
                        LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
                        =================================================*/

                        if ($rutas[1] == 1) {

                            echo '<ul class="pagination">';

                            for ($i = 1; $i <= 4; $i++) {
                                echo '<li class="';
                                if ($rutas[1] == $i) {
                                    echo 'active"';
                                }
                                echo 'id="item' . $i . '"><a href="' . $url . $rutas[0] . '/' . $i . '">' . $i . '</a></li>';
                            }

                            echo '<li class="disabled"><a>...</a></li>
                                <li id="item' . $pag_products . '"><a href="' . $url . $rutas[0] . '/' . $pag_products . '">' . $pag_products . '</a></li>
                                <li><a href="' . $url . $rutas[0] . '/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            </ul>';
                        }

                        /*================================================
                        LOS BOTONES DE LA MITAD DE PAGINAS HACIA ADELANTE
                        =================================================*/ 

                        else if (
                            $rutas[1] != $pag_products && $rutas[1] != 1
                            && $rutas[1] < ($pag_products / 2)
                            && $rutas[1] < ($pag_products - 3)
                        ) {

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination">
                                    <li><a href="' . $url . $rutas[0] . '/' . ($numPagActual - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                ';

                            for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) {
                                echo '<li class="';
                                if ($rutas[1] == $i) {
                                    echo 'active"';
                                }
                                echo 'id="item' . $i . '"><a href="' . $url . $rutas[0] . '/' . $i . '">' . $i . '</a></li>';
                            }

                            echo '<li class="disabled"><a>...</a></li>
                                <li id="item' . $pag_products . '"><a href="' . $url . $rutas[0] . '/' . $pag_products . '">' . $pag_products . '</a></li>
                                <li><a href="' . $url . $rutas[0] . '/' . ($numPagActual + 1) . '"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            </ul>';
                        }

                        /*================================================
                        LOS BOTONES DE LA MITAD DE PAGINAS HACIA ATRAS
                        =================================================*/

                        else if (
                            $rutas[1] != $pag_products && $rutas[1] != 1
                            && $rutas[1] >= ($pag_products / 2)
                            && $rutas[1] < ($pag_products - 3)
                        ) {

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination">
                                        <li><a href="' . $url . $rutas[0] . '/' . ($numPagActual - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                        <li id="item1"><a href="' . $url . $rutas[0] . '/1">1</a></li>
                                        <li class="disabled"><a>...</a></li>
                                    ';

                            for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) {

                                echo '<li class="';
                                if ($rutas[1] == $i) {
                                    echo 'active"';
                                }

                                echo 'id="item' . $i . '"><a href="' . $url . $rutas[0] . '/' . $i . '">' . $i . '</a></li>';
                            }

                            echo '<li><a href="' . $url . $rutas[0] . '/' . ($numPagActual + 1) . '"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>';
                        }

                        /*================================================
                        LOS BOTONES DE LAS ULTIMAS 4 PÁGINAS Y LA FIRST PÁG
                        =================================================*/ 

                        else {

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination">
                                    <li><a href="' . $url . $rutas[0] . '/' . ($numPagActual - 1) . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    <li id="item1"><a href="' . $url . $rutas[0] . '/1">1</a></li>
                                    <li class="disabled"><a>...</a></li>
                                ';

                            for ($i = ($pag_products - 3); $i <= $pag_products; $i++) {

                                echo '<li class="';
                                if ($rutas[1] == $i) {
                                    echo 'active"';
                                }

                                echo 'id="item' . $i . '"><a href="' . $url . $rutas[0] . '/' . $i . '">' . $i . '</a></li>';
                            }

                            echo '</ul>';
                        }
                    } else {

                        echo '
                        <ul class="pagination">';

                        for ($i = 1; $i <= $pag_products; $i++) {

                            echo '<li class="';
                            if ($rutas[1] == $i) {
                                echo 'active"';
                            }

                            echo 'id="item' . $i . '"><a href="' . $url . $rutas[0] . '/' . $i . '">' . $i . '</a></li>';
                        }

                        echo '
                        </ul>';
                    }
                }

                ?>

            </center>

        </div>
    </div>
</div>