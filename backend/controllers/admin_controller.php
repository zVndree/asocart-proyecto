<?php
class controllerAdmin
{

    /*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

    public function ctr_ingreso_admin()
    {

        if (isset($_POST["email"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["contra"])
            ) {

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["email"];

                $respuesta = model_admin::mdl_mostrar_admin($tabla, $item, $valor);
                /* var_dump($respuesta); */

                if (is_array($respuesta) && $respuesta["email"] == $_POST["email"] && $respuesta["password"] == $_POST["contra"]) {

                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["password"] = $respuesta["password"];
                    $_SESSION["perfil"] = $respuesta["perfil"];

                    echo '<script>

							window.location = "inicio";

						</script>';
                } else {

                    echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';
                }
            }
        }
    }
}
