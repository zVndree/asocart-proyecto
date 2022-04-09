<!-------VALIDAR SI HAY UNA SESION--------->

<?php

$url = Ruta::ctrRuta();
$server = Ruta::ctr_ruta_servidor();

if (!isset($_SESSION["validar_sesion"])) {

    echo '<script>
            window.location = "' . $url . '";
        </script>';

    exit();
}

?>

<!-------BREADCRUMB PERFIL--------->

<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb fondoBreadcrumb text-uppercase">

                <li><a href="<?php echo $url;  ?>">INICIO</a></li>
                <li class="active pagActiva"><?php echo $rutas[0] ?></li>

            </ul>

        </div>

    </div>

</div>

<!-------APARTADO PERFIL--------->

<div class="container-fluid">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#compras"><i class="fa fa-shopping-basket"></i> Mis Compras</a>
            </li>
            <li>
                <a data-toggle="tab" href="#perfil"><i class="fa fa-user"></i> Editar Perfil</a>
            </li>
            <li>
                <a data-toggle="tab" href="#deseos"><i class="fa fa-gift"></i> Mi Lista de Deseos</a>
            </li>
            <li>
                <a href="<?php echo $url ?>ofertas"><i class="fa fa-star"></i> Ver Ofertas</a>
            </li>

        </ul>

        <div class="tab-content">

            <!-------PESTAÑA COMPRAS--------->

            <div id="compras" class="tab-pane fade in active">
                <h3>MIS COMPRAS</h3>
                <p>Some content.</p>
            </div>

            <!-------PESTAÑA PERFIL--------->

            <div id="perfil" class="tab-pane fade">
                <div class="row">
                    <form method="post" enctype="multipart/form-data">
                        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                            <br>

                            <figure id="img_perfil">

                                <?php
                                if ($_SESSION["modo"] == "directo") {

                                    if ($_SESSION["foto"] != "") {

                                        echo '<img src="' . $url . $_SESSION["foto"] . '" class="img-thumbnail">';
                                    } else {
                                        echo '<img src="' . $server . 'views/img/usuarios/default/user_icon.png" class="img-thumbnail"><br>
                                            <button class="btn btn-success" id="btn_cambiar_foto"><span class="glyphicon glyphicon-refresh"></span> Cambiar foto</button>
                                            ';
                                    }
                                } else {
                                    echo '<img src="' . $_SESSION["foto"] . '" class="img-thumbnail">';
                                }
                                ?>

                            </figure>

                        </div>

                        <div class="col-md-9 col-sm-8 col-xs-12">

                            <br>

                            <?php
                            if ($_SESSION["modo"] != "directo") {

                                echo '<label class="control-label text-muted text-uppercase">Nombre:</label>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" value="' . $_SESSION["nombre"] . '" readonly>
									</div>
                                    
                                    <br>

									<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" value="' . $_SESSION["email"] . '" readonly>
									</div>
                                    
                                    <br>

									<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-' . $_SESSION["modo"] . '"></i></span>
										<input type="text" class="form-control text-uppercase"  value="' . $_SESSION["modo"] . '" readonly>
									</div>

									<br>';
                            } else {

                                echo '<label class="control-label text-muted text-uppercase" for="edit_name">Cambiar Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" id="edit_name" name="edit_name" value="' . $_SESSION["nombre"] . '">

									</div>

                                    <br>
                                    
                                    <label class="control-label text-muted text-uppercase" for="edit_email">Cambiar Correo Electrónico:</label>

                                    <div class="input-group">
                                    
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="edit_email" name="edit_email" value="' . $_SESSION["email"] . '">

                                    </div>

                                    <br>
                                    
                                    <label class="control-label text-muted text-uppercase" for="edit_pass">Cambiar Contraseña:</label>

								    <div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="text" class="form-control" id="edit_pass" name="edit_pass" placeholder="Escribe la nueva contraseña">

									</div>

								    <br>
                                    
                                    <button type="submit" class="btn btn-default back_color btn-md pull-left">Actualizar Datos</button>';
                            }
                            ?>


                        </div>
                    </form>
                    <button class="btn btn-danger btn-md pull-right" id="delete_user">Eliminar cuenta</button>
                </div>
            </div>

            <!-------PESTAÑA DESEOS--------->

            <div id="deseos" class="tab-pane fade">
                <h3>MI LISTA DE DESEOS</h3>
                <p>Some content in menu 1.</p>
            </div>
        </div>

    </div>
</div>