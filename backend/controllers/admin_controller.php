<?php
class controllerAdmin
{

    /*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

    public function ctr_ingreso_admin(){

        if (isset($_POST["email"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["contra"])
            ) {

                $encriptar = crypt($_POST["contra"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["email"];

                $respuesta = model_admin::mdl_mostrar_admin($tabla, $item, $valor);
                /* var_dump($respuesta); */

                if (is_array($respuesta) && $respuesta["email"] == $_POST["email"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["validarSesionBackend"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["name"] = $respuesta["name"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["id_rol"] = $respuesta["id_rol"];

                        /*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = model_admin::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}

                        echo '<script>

							window.location = "inicio";

						</script>';
                    } else {
                        echo '<br>
						<div class="alert alert-warning">Este usuario aún no está activado</div>';
                    }
                } else {

                    echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';
                }
            }
        }
    }

    /*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/

    static public function ctrMostrarAdministradores($item, $valor)
    {

        $tabla = "administradores";

        $respuesta = model_admin::mdl_mostrar_admin($tabla, $item, $valor);

        return $respuesta;
    }

    
    /*=============================================
	MOSTRAR Roles
	=============================================*/

    static public function ctrMostrarRoles($item, $valor)
    {

        $tabla = "rol";

        $respuesta = model_admin::mdlMostrarRol($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR MODULOS
	=============================================*/

    static public function ctrMostrarModulo($item, $valor)
    {

        $tabla = "modulo";

        $respuesta = model_admin::mdlMostrarModulo($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR PERMISOS
	=============================================*/

    static public function ctrMostrarPermiso($item, $valor)
    {

        $tabla = "permisos";

        $respuesta = model_admin::mdlMostrarPermiso($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

    static public function ctrCrearPerfil()
    {

        if (isset($_POST["rolUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreUsuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑ]+$/', $_POST["passwordUsuario"] && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailUsuario"]))
            ) {

                /*=============================================
				VALIDAR IMAGEN
				=============================================*/

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;


                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/perfiles/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/perfiles/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "administradores";

                $encriptar = crypt($_POST["passwordUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "name" => $_POST["nombreUsuario"],
                    "email" => $_POST["emailUsuario"],
                    "password" => $encriptar,
                    "id_rol" => $_POST["rolUsuario"],
                    "foto" => $ruta,
                    "estado" => 1
                );

                $respuesta = model_admin::mdlIngresarPerfil($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El Usuario ha sido creado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
            }
        }
    }

    /*=============================================
	REGISTRO DE ROL
	=============================================*/

    static public function ctrCrearRol(){

        if (isset($_POST["nuevoRol"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRol"])) {


                $tabla = "rol";

                $datos = array(
                    "nombre" => $_POST["nuevoRol"],
                    "descripcion" => $_POST["descripcionRol"],
                    "estado" => 1
                );

                $respuesta = model_admin::mdlIngresarRol($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El rol ha sido creado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});
				

					</script>';
                }
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del rol no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});
				

				</script>';
            }
        }
    }

    /*=============================================
	EDITAR USUARIO 
	=============================================*/

    static public function ctrEditarPerfil(){

        if(isset($_POST["editarNombreUsuario"])){
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreUsuario"]) 
            && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailUsuario"])) {

                /*=============================================
				VALIDAR IMAGEN
				=============================================*/

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}

                    
                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/perfiles/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/perfiles/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "administradores";

                if ($_POST["editarPassword"] != "") {
                    if(preg_match('/^[a-zA-Z0-9ñÑ]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{
                        echo'<script>

								swal({
                                    type: "error",
                                    title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

                            </script>';
                            return;
                    }
                }else{
                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array("id" => $_POST["editarIdUsuario"],
                            "name" => $_POST["editarNombreUsuario"],
                            "email" => $_POST["emailUsuario"],
                            "password" => $encriptar,
                            "id_rol" => $_POST["seleccionarRol"],
                            "foto" => $ruta);

				$respuesta = model_admin::mdlEditarPerfil($tabla, $datos);

                if($respuesta == "ok"){

					echo'<script>

					swal({
                        type: "success",
                        title: "El usuario ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result) {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}

            }else{

				echo'<script>

					swal({
                        type: "error",
                        title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}
        }
    }

    /*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrEliminarPerfil(){

		if(isset($_GET["idPerfil"])){

			$tabla ="administradores";
			$datos = $_GET["idPerfil"];

			if($_GET["fotoPerfil"] != ""){

				unlink($_GET["fotoPerfil"]);
			
			}

			$respuesta = model_admin::mdlEliminarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
                    type: "success",
                    title: "El Usuario '.$_GET["nombreUsuario"].' ha sido borrado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}
}
