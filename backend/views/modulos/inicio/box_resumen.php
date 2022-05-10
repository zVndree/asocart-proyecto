<?php
    $clientes = ControllerUsuarios::ctrMostrarTotalUsuarios("id");
    $total_clientes = count($clientes);
?>

<div class="col-lg-3 col-xs-6">
    <!-- box 1 ORDENES -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>150</h3>

            <p>New Orders</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./box 1 -->
<div class="col-lg-3 col-xs-6">
    <!-- box 2  -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./box 2 -->
<div class="col-lg-3 col-xs-6">
    <!-- box 3 USER -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo $total_clientes?></h3>

            <p>Clientes</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./box 3 -->
<div class="col-lg-3 col-xs-6">
    <!-- box 4 VISITAS -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./box 4 -->