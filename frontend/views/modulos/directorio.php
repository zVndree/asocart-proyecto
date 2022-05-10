<?php
$server = Ruta::ctr_ruta_servidor();
$plantila = ControllerPlantilla::ctrEstiloPlantilla();

?>
<!-----------BANNER DIRECTORIO--------------->
<figure class="banner">
    <img style="filter: blur(1px);" src="<?php echo $server ?>views/img/banner/banner.png" class="img-responsive"
        width="100%">
    <div class="text_banner text_center">
        <h1 style="color:#eee; font-weight: 900; font-size: 50px;">Directorio de Artesanos</h1>
        <!--             <h3 style="color: #a87d57; font-weight: bold;">Encuentra a los mejores maestros artesanos de Girardot</h3> -->
    </div>
</figure>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <h3 class="text-center text-muted">En esta página podrás encontrar y conocer a nuestros artesanos de la
                    ciudad de Girardot.</h3>

                <!--=====================================
                Buscador
                ======================================-->

                <div class="input-group col-md-6 col-sm-7 col-xs-10" id="buscador">
                    <input type="search" name="buscar" class="form-control" placeholder="Buscar Palabra Clave">
                    <span class="input-group-btn">
                        <a href="<?php echo $url; ?>buscador/1/recientes">
                            <button class="btn btn-default back_color" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </a>
                    </span>
                </div>


            </div>


            <ul class="list_artesanos">
                <?php

                $ordenar = "id";
                $artesano = ControladorDirectorio::ctrListarArtesanos($ordenar);


                foreach ($artesano as $key => $value) {

                    echo '
                    <li class="col-md-4 col-sm-6 col-xs-12" id="card_artesano">
                        <figure>
                            <a href="' . $value["ruta"] . '">
                                <img src="' . $server . $value["foto_portada"] . '" class="img-responsive">
                            </a>
                        </figure>
                    </li>';
                }

                ?>

            </ul>
        </div>
    </div>
</div>