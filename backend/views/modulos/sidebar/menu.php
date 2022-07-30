
<!-----==============================
=                MENU               =
================================---->

<ul class="sidebar-menu sidebar_menu">
    <li class="active"><a href="inicio"><i class="fa fa-home"></i><span>Inicio</span></a></li>
    <?php
        if ($_SESSION["id_rol"] == 1){
            echo'    <li><a href="clientes"><i class="fa fa-users"></i><span>Gestor Clientes</span></a></li>
            ';
        }
    ?>
    <li><a href="artesanos"><img src="http://localhost/asocart-proyecto/backend/views/img/plantilla/florero.png"><span> Gestor Artesanos</span></a></li>

    <li class="treeview">
        <a href="">
            <i class="fa fa-list-ul"></i>
            <span>Categorias</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="categorias"><i class="fa fa-circle-o"></i>Categorias</a></li>
            <li><a href="subcategorias"><i class="fa fa-circle-o"></i>Subcategorias</a></li>
        </ul>
    </li>

    <li><a href="productos"><i class="fa fa-cubes"></i><span> Gestor Productos</span></a></li>
    <!-- <li><a href="banner"><i class="fa fa-map-o"></i><span>Gestor Banners</span></a></li> -->
    <li><a href="ventas"><i class="fa fa-money"></i><span>Gestor Ventas</span></a></li>
    <!-- <li><a href="visitas"><i class="fa fa-map-marker"></i><span>Gestor Visitas</span></a></li> -->
    <!-- <li><a href="mensajes"><i class="fa fa-envelope"></i><span>Gestor Mensajes</span></a></li> -->

    <?php
        if ($_SESSION["id_rol"] == 1) {
            echo'<li class="treeview">
            <a href="">
                <i class="fa fa-user-plus"></i>
                <span>Usuarios</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="usuarios"><i class="fa fa-circle-o"></i>Gestor de Usuarios</a></li>
                <li><a href="roles"><i class="fa fa-circle-o"></i>Roles de Usuarios</a></li>
            </ul>
        </li>';
        }
    ?>
    
<!--     <li><a href="usuarios"><i class="fa fa-key"></i><span>Gestor Usuarios</span></a></li>
 -->    <!-- <li><a href="slide"><i class="fa fa-edit"></i><span>Gestor Slide</span></a></li> -->

<?php
    if ($_SESSION["id_rol"] == 1 || $_SESSION["id_rol"] == 4) {
        echo'    
        <li><a href="ajustes"><i class="fa fa-cogs"></i><span>Ajustes</span></a></li>
        ';
    }
?>
</ul>