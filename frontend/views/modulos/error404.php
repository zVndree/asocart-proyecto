<!--=====================================
Error 404
======================================-->
<div class="container-fluid">

    <div class="container">

        <?php

        $error = ControllerPlantilla::ctrEstiloErrores();
        /* $Json_error = json_decode($error["fondo"],true);  */

        /* var_dump($error); */
        echo '
        <div class="row error_404" >

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-0 img-responsive img_error"  >
                <img src="http://localhost/Art_Gir/backend/' . $error["imagen"] . '" >
                </div>

            <div class="col-xs-12">
                <h1 style="color:'.$error["color_error"].';">' . $error["error"] . '</h1>
                <h3 style="color:'.$error["color_mensaje"].';">' . $error["mensaje"] . '</h3>
            </div>
        </div>  
            ';
        
        ?>
    </div>
</div>

</div>