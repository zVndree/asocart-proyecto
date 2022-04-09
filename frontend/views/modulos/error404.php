<!--=====================================
Error 404
======================================--->
<?php
    $server = Ruta::ctr_ruta_servidor();
    $url = Ruta::ctrRuta();
?>
<div class="container-fluid">

    <div class="container">

        <?php

        $error = ControllerPlantilla::ctrEstiloErrores();
        /* $Json_error = json_decode($error["fondo"],true);  */

        /* var_dump($error); */
        echo '
        <div class="container error_404" >

            <img class="img-responsive center-block" src="'.$server. $error["imagen"] . '" >

            <div class="col-xs-12">
                <h3 style="color:'.$error["color_mensaje"].';">' .'<strong>' . $error["mensaje"] . '</strong></h3>
            </div>
            <div class="col-xs-12 text-center">
                <a href="'.$url.'" class="btn btn-default back_color"><i class="fa fa-home"></i> <strong>Regresar al Inicio</strong></a>
            </div>
        </div>  
            ';
        
        ?>
    </div>
</div>

</div>