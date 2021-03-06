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

            <!--=====================================
			VISOR DE PRODUCTOS
			======================================-->

            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                <figure class="visor">
                    <img id="lupa1" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png"
                        alt="">
                    <img id="lupa2" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png"
                        alt="">
                    <img id="lupa3" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png"
                        alt="">
                    <img id="lupa4" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png"
                        alt="">
                    <img id="lupa5" class="img-thumbnail" src="<?php echo $server ?>views/img/info-products/navidad.png"
                        alt="">

                </figure>

                <!--=====================================
				CAROUSEL DE PRODUCTOS
				======================================-->

                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img value="1" class="img-thumbnail"
                                src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="2" class="img-thumbnail"
                                src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="3" class="img-thumbnail"
                                src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="4" class="img-thumbnail"
                                src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>
                        <li>
                            <img value="5" class="img-thumbnail"
                                src="<?php echo $server ?>views/img/info-products/navidad.png" alt="">
                        </li>

                    </ul>
                </div>

            </div>

            <!--=====================================
            PRODUCTO
            ======================================-->

            <div class="col-md-7 col-sm-6 col-xs-12">

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