<?php
    if ($_SESSION["id_rol"] != 1) {
        return;
    }

    $notificaciones = ControllerNotificaciones::ctrMostrarNotificaciones();
    /* var_dump($notificaciones); */
    $totalNotificaciones = $notificaciones["newUsers"] + $notificaciones["newSales"] + $notificaciones["newVisits"];


?>



<!-- Notificacion menu-->

<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning"><?php echo $totalNotificaciones;?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">tu tienes <?php echo $totalNotificaciones;?> notificaciones</li>

        <li>
            <ul class="menu">
                <!-----USUARIOS----->
                <li>
                    <a href="" class="actualizarNotificaciones" item="newUsers">
                        <i class="fa fa-users text-aqua"></i><?php echo $notificaciones["newUsers"]?> nuevos miembros registrados
                    </a>
                </li>
                <!-----VENTAS----->
                <li>
                    <a href="" class="actualizarNotificaciones" item="newSales">
                        <i class="fa fa-shopping-cart text-green"></i><?php echo $notificaciones["newSales"]?> nuevas ventas
                    </a>
                </li>
                <!-----VISITAS----->
                <li>
                    <a href="" class="actualizarNotificaciones" item="newVisits">
                        <i class="fa fa-map-marker text-aqua"></i><?php echo $notificaciones["newVisits"]?> nuevas visitas
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>