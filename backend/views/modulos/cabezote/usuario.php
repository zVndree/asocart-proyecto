
<!-----==============================
=               USUARIOS            =
================================---->

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php

    if($_SESSION["foto"] == ""){

        echo '<img src="views/img/usuarios/default/default.png" class="user-image" alt="User Image">';

    }else{

        echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

    }

    ?>

    <span class="hidden-xs"><strong><?php echo $_SESSION["name"]; ?></strong></span>
    
    </a>

    <!-- dropdown-menu -->
    <ul class="dropdown-menu" style="background-color: #d9cab0;">

        <li class="user-header">

            <?php

    if($_SESSION["foto"] == ""){

        echo '<img src="views/img/usuarios/default/default.png" class="user-image" alt="User Image">';

    }else{

        echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

    }


    ?>

        <p style="text-transform: uppercase; color:#212121; text-align: center"><strong>
                <?php echo $_SESSION["name"]; 
                
                if ($_SESSION["id_rol"] == 1) {
                    echo'<h4 class="hidden-xs rolTitle">Usuario Administrador</h4>';
                
                }

                if ($_SESSION["id_rol"] == 2) {
                    echo'<h4 class="hidden-xs rolTitle">Usuario Artesano</h4>';
                
                }
                if ($_SESSION["id_rol"] == 3) {
                    echo'<h4 class="hidden-xs rolTitle">Usuario Supervisor</h4>';
                
                }
                if ($_SESSION["id_rol"] == 4) {
                    echo'<h4 class="hidden-xs rolTitle">Usuario FrontManager</h4>';
                
                }
                if ($_SESSION["id_rol"] == 6) {
                    echo'<h4 class="hidden-xs rolTitle">Usuario Demo</h4>';
                
                }?>

        <!--  <h4 style="color:white"><?php echo $_SESSION["rol"]; ?></h4> -->
        </strong></p>

        </li>

        <li class="user-footer" style="background-color:#895C25;">
            <div class="pull-right">
                <a href="salir" class="btn btn-default btn-flat">Salir</a>
            </div>
        </li>
    </ul>
    <!-- dropdown-menu -->
</li>