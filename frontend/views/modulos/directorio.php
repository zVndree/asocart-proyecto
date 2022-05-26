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
<!-----------END BANNER DIRECTORIO--------------->

<!-----------BUSCADOR DIRECTORIO--------------->

<div class="container-fluid">
    <div class="row">
        <div class="container">

            <h4 class="text-center text-banner-gremio">En esta página podrás filtrar, encontrar y conocer a nuestros
                artesanos de la
                ciudad de Girardot.</h4>

            <!--=====================================
                    Buscador
                    ======================================-->

            <div class="col-md-8 col-xs-12 buscador-content">
                <div class="col-md-8">
                    <div class="input-group">
                        <input  id="buscador" type="search" name="buscar" class="form-control" placeholder="Buscar Palabra Clave">
                        <span class="input-group-btn">
                            <a href="<?php echo $url; ?>buscador/1/recientes">
                                <button class="btn btn-default back_color" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </a>
                        </span>
                    </div>
                </div>


                <div class="col-md-2 filtro">

                    <div class="btn-group">
                        <button type="button"
                            class="btn dropdown-toggle verde" data-toggle="dropdown">
                            Especialidad <span class="caret"></span>
                        </button>
                        <ul style="background-color:<?php echo $plantilla["colorFondo"]?>" class="dropdown-menu"
                            role="menu">
                            <!-- <li class="dropdown-header"><strong>Oferta</strong></li> -->
                            <li><a href="'.$url.$rutas[0].'/1/desde-5">Desde 5% OFF</a></li>
                            <li><a href="'.$url.$rutas[0].'/1/desde-30">Desde 30% OFF</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list_artesanos">
            <?php

                $item = null;
                $valor = null;
                $artesano = ControladorDirectorio::ctrListarArtesanos($item, $valor);
                
                foreach ($artesano as $key => $value) {

                    if ($value["estado"] == 0) {
                        
                    
                    /* $item2 = null;
                    $valor2 = null;
                    $especialidad = ControladorDirectorio::ctrListarEspecialidades($item2, $valor2);
                    
                    foreach ($especialidad as $key => $especialidad) { */
                        # code...
                    

                        echo '
                        
                                <li class="col-md-4 col-sm-6 col-xs-12 card">

                                    <div class="additional" style="background-color: #d9cab0;">
                                    
                                        <div class="user-card">
                                    
                                            <img src="'.$server. $value["foto_portada"] . '" alt="'.$value["nombre"].'">
                                        </div>
                                            
                                        <div class="more-info">
                                            
                                            <h1> '.$value["nombre"].' </h1>
                                            
                                            <!----
                                            <div class="coords">
                                                <span>Joined January 2019</span>
                                            </div>

                                            <div class="coords">
                                                <span>Position/Role</span>
                                                <span>City, Country</span>
                                            </div>

                                            <div class="stats">
                                                <div>
                                                    <div class="title">Awards</div>
                                                    <i class="fa fa-trophy"></i>
                                                    <div class="value">2</div>
                                                </div>
                                                <div>
                                                        <div class="title">Matches</div>
                                                        <i class="fa fa-gamepad"></i>
                                                        <div class="value">27</div>
                                                </div>
                                                <div>
                                                    <div class="title">Pals</div>
                                                    <i class="fa fa-group"></i>
                                                    <div class="value">123</div>
                                                </div>
                                                <div>
                                                    <div class="title">Coffee</div>
                                                    <i class="fa fa-coffee"></i>
                                                    <div class="value infinity">∞</div>
                                                </div>
                                            </div>--->
                                        </div>
                        
                                    </div>

                                    <div class="general">
                                        <h1>'.$value["nombre"].'</h1>
                                        <p>'.$value["reseña"].'</p>
                                        <!---<span class="more">Mouse over the card for more info</span>--->
                                    </div>
                            

                                <!--   <figure>
                                            <a href="' . $value["ruta"] . '">
                                                <img src="' . $server . $value["foto_portada"] . '" class="img-responsive">
                                            </a>
                                        </figure> -->
                            </li>
                        ';
                   /*  } */


                    /* $item = "id_artesano";
                    $valor = $value["id"] ;
                    $item2 = "id_especialidad";
                    $valor2 = $especialidad["id"] ;
                    var_dump($valor,$item,$valor2,$item2);*/
                    
                    
                /*     $art_espe = ControladorDirectorio::ctrListarArt_Espe();
                    var_dump($art_espe); */

                    }
                    
                }

                ?>


        </ul>
    </div>
</div>
