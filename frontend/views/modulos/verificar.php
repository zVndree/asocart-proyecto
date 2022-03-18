    <!--=====================================
	Verificacion correo
	======================================-->

    <?php

    if (!isset($rutas[1]) || empty($rutas[1])) {
        echo '<script>window.location = "' . $url . '"</script>';
        
    }

        $user_verificado = false;

        $item = "email_encriptado";
        $valor = $rutas[1];
        $respuesta = controller_usuarios::ctrMostrarUsuario($item, $valor);

        if (is_array($respuesta) && $valor == $respuesta["email_encriptado"]) {
            $id = $respuesta["id"];
            $item2 = "verificacion";
            $valor2 = 0;
    
            $respuesta2 = controller_usuarios::ctrActualizarUsuario($id, $item2, $valor2);
    
            if ($respuesta2 == "ok") {
                $user_verificado = true;
            }
        }
    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center verificar">
                <?php
                    
                    if ($user_verificado) {
                        echo '<h3>Verificación completada</h3>
                        <h2><small>¡Hemos  verificado su correo electronico, ya puede ingresar al sistema!</small></h2><br>

                        <a href="#modal_ingreso" data-toggle="modal"><button class="btn btn-default back_color btn-lg">INGRESAR</button></a>';
                    }else{
                        echo '<h3>Error</h3>

					<h2><small>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</small></h2><br>
                    <a href="#modal_registro" data-toggle="modal"><button class="btn btn-default back_color btn-lg">REGISTRO</button></a>';
                    }
                ?>
            </div>
        </div>
    </div>