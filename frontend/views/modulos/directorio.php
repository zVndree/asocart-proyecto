<?php
$server = Ruta::ctr_ruta_servidor();
$plantila = ControllerPlantilla::ctrEstiloPlantilla();
?>
<!-----------BANNER DIRECTORIO--------------->
<figure class="banner">
    <img style="filter: blur(1px);" src="<?php echo $server ?>views/img/banner/banner.png" class="img-responsive" width="100%">
    <div class="text_banner text_center">
        <h1 style="color:#eee; font-weight: 900; font-size: 50px;">Directorio de Artesanos</h1>
        <!--             <h3 style="color: #a87d57; font-weight: bold;">Encuentra a los mejores maestros artesanos de Girardot</h3> -->
    </div>
</figure>
<div class="container-fluid">

    <div class="container">
        <div class="row">
            <ul class="list_artesanos">
                <?php

                $ordenar = "id_artesano";
                $artesano = ControladorDirectorio::ctrListarArtesanos($ordenar);


                foreach ($artesano as $key => $value) {

                    echo '
                    <li class="col-md-4 col-sm-6 col-xs-12" id="card_artesano">
                        <figure>
                            <a href="' . $value["ruta"] . '">
                                <img src="' . $server . $value["portada"] . '" class="img-responsive">
                            </a>
                        </figure>
                    </li>';
                }



                ?>


            </ul>

        </div>
    </div>
</div>