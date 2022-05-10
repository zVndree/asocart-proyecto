<?php
    $server = Ruta::ctr_ruta_servidor();
    $url = Ruta::ctrRuta();
?>
<div class="container error_404" >

        <img class="img-responsive center-block" src="<?php echo $server?>views/img/error/sold-out.png" >

        <div class="col-xs-12">
            
            <h3 style="color: #474747;"> <strong>¡AÚN NO HAY PRODUCTOS EN ESTA SECCIÓN!</strong></h3>
        </div>
        <div class="col-xs-12 text-center">
            <a href="<?php echo $url?>tienda" class="btn btn-default back_color"><i class="fa fa-home"></i> <strong>Encontrar mas Productos</strong></a>
        </div>
    </div>
