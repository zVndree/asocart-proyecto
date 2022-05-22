<?php

class controller_usuarios
{

    /*=============================================
        Registro Usuarios
        =============================================*/

    public function ctr_registro_usuarios()
    {
        if (isset($_POST["regis_user"])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["regis_user"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regis_email"]) &&
                preg_match('/^(?=.*[a-záéíóúñ])(?=.*[A-ZÁÉÍÓÚÑ])(?=.*[0-9])(?=.*[$@$!%,;:*?&#.$($)$-$-_])[A-Za-z\d$@$!%,;:*?&#.$($)$-$-_]\S{8,15}$/', $_POST["regis_pass"])
            ) {

                $encriptar = crypt($_POST["regis_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
                $2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');

                $encriptar_email = md5($_POST["regis_email"]);
                $datos = array(
                    "nombre" => $_POST["regis_user"],
                    "password" => $encriptar,
                    "email" => $_POST["regis_email"],
                    "foto" => "",
                    "modo" => "directo",
                    "verificacion" => 1,
                    "email_encriptado" => $encriptar_email
                );

                $tabla = "clientes";

                $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

                var_dump($respuesta);

                if ($respuesta == "ok") {


                    /*=============================================
                Verificacion del correo
                =============================================*/

                    date_default_timezone_set("America/Bogota");
                    $url = Ruta::ctrRuta();
                    $mail = new PHPMailer;
                    $mail->CharSet = 'UTF-8';
                    $mail->isMail();
                    $mail->setFrom('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                    $mail->addReplyTo('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                    $mail->Subject = "Verificacion correo electronico";
                    $mail->addAddress($_POST["regis_email"]);
                    $mail->msgHTML('<div style="width: 100%;background: #eee; position: relative;font-family: sans-serif; padding-bottom: 40px">

                        <center>
                            <img  style="width: 20%; padding: 20px;" src="https://i.imgur.com/z6ZQGP3.png">
                        </center>
                
                        <div style="position: relative; margin: auto; width: 600px;background: white; padding: 20px;">
                            <center>
                                <img style="padding: 20px; width: 15%;" src="https://i.imgur.com/GIldaqv.png">
                
                                <h3 style="font-weight: 100; color: #999; text-transform: uppercase;">Verifique su direccion de correo electronico</h3>
                                <hr style="border: 1px solid #ccc; width: 80%;">
                
                                <h4 style="font-weight: 100;color: #999; padding: 0 20px;">Bienvenido a Artesanias Girardot - tienda virtual.
                                    Para comenzar a usar su cuenta debes verificar tu correo electrónico para confirmar que eres tú.</h4>
                                <a href="' . $url . 'verificar/' . $encriptar_email . '" target="_blank" style="text-decoration: none;">
                                <div style="margin: 20px 0; border-radius: 5px; line-height: 60px; background: #8A5D25;width: 60%; color: white;">Click aqui para verificar</div>
                                </a>
                
                                <hr style="border: 1px solid #ccc; width: 80%;">
                
                                <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                    <i class="fa fa-facebook-official" style="color: #46639f; font-size: 24px; margin: 5px;"></i>
                                </a>
                                <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                    <i class="fa fa-instagram" style="color: transparent;
                                    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                                    background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                                    background-clip: text;
                                    -webkit-background-clip: text;;font-size: 24px; margin: 5px;"></i>
                                </a>
                                <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                    <i class="fa fa-pinterest-square" style="color: #DA0021; font-size: 24px; margin: 5px;"></i>
                                </a>
                
                                <h5 style="font-weight: 100; color: #999">Copyright Artesanias Girardot. All right reserved.</h5>
                
                                <img style="width: 8%;" src="https://i.imgur.com/bQFvw9o.png" alt="">
                                <h6 style="font-weight: 40; color: #212121;">Este correo electrónico fue enviado a <a href="">' . $_POST["regis_email"] . '</a></h6>
                            </center>
                
                        </div>
                        
                    </div> ');

                    $envio = $mail->Send();

                    if (!$envio) {
                        echo '<script>
                
                            swal({
                                    title: "¡ERROR!",
                                    text: "¡No se ha podido finalizar con el envio de la verificacion al correo electronico ' . $_POST["regis_user"] . $mail->ErrorInfo . '!. Vuelva a intentar",
                                    type: "error",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                },
                                function(isConfirm){
                                    if(isConfirm){
                                        history.back();
                                    }
                            });

                        </script>';
                    } else {
                        echo '<script>

							swal({
                                    title: "¡REGISTRO EXITOSO!",
                                    text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["regis_email"] . ' para verificar la cuenta!",
                                    type: "success",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                },

                                function(isConfirm){
                                    if (isConfirm) {	   
                                        history.back();
                                    } 
						    });

						</script>';
                    }
                }
            } else {

                echo '<script>
                
                        swal({
                            title: "¡ERROR!",
                            text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            },
                            function(isConfirm){
                                if(isConfirm){
									history.back();
								}
                        });
                </script>';
            }
        }
    }

    /*=============================================
    Mostrar usuarios
    =============================================*/

    static public function ctrMostrarUsuario($item, $valor)
    {
        $tabla = "clientes";
        $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    Actualizar usuarios
    =============================================*/

    static public function ctrActualizarUsuario($id, $item, $valor)
    {
        $tabla = "clientes";
        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    Ingreso de usuario al sistema
    =============================================*/

    static public function ctr_ingreso_usuarios()
    {

        if (isset($_POST["ing_email"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ing_email"]) &&
                preg_match('/^(?=.*[a-záéíóúñ])(?=.*[A-ZÁÉÍÓÚÑ])(?=.*[0-9])(?=.*[$@$!%,;:*?&#.$($)$-$-_])[A-Za-z\d$@$!%,;:*?&#.$($)$-$-_]\S{8,15}$/', $_POST["ing_pass"])
            ) {


                $encriptar = crypt($_POST["ing_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
                $2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');

                $tabla = "clientes";

                $item = "email";
                $valor = $_POST["ing_email"];


                $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

                if ($respuesta["email"] == $_POST["ing_email"] && $respuesta["password"] == $encriptar) {
                    if ($respuesta["verificacion"] == 1) {
                        echo '<script>

							swal({
								title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico ' . $respuesta["email"] . '!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							},

							function(isConfirm){
									if (isConfirm) {	   
									    history.back();
									} 
							});

							</script>';
                    } else {

                        $_SESSION["validar_sesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["modo"] = $respuesta["modo"];

                        /*------------FECHA LOGIN------------*/
                        /* 
                        date_default_timezone_set("America/Bogota");
                        $fecha = date("y-m-d");
                        $hora = date("H:i:s");
                        $fecha_actual = $fecha."".$hora;
                        $item1 = "ultimo_login";
                        $valor1 = $fecha_actual;
                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $actualizar_login = ModeloUsuarios::mdlActualizarFechaLogin($tabla, $item1, $valor1, $item2, $valor2);

                        if ($actualizar_login == "ok") {
                            echo '<script>
                            window.location="inicio";
                            </script>';
                        } */

                        echo '<script>

                            window.location = localStorage.getItem("ruta_actual");
                        
                        </script>';
                    }
                } else {

                    echo '<script>

                        swal({
                            title: "ERROR AL INGRESAR!",
                            text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },

                        function(isConfirm){
                                if (isConfirm) {	   
                                    window.location = localStorage.getItem("ruta_actual");
                                } 
                        });

                    </script>';
                }
            } else {
                echo '<script>
                
                        swal({
                            title: "¡ERROR!",
                            text: "¡Error al ingresar al sistema!",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            },
                            function(isConfirm){
                                if(isConfirm){
									history.back();
								}
                        });
                </script>';
            }
        }
    }

    /*=============================================
    Olvido de contraseña
    =============================================*/

    static public function ctr_olvido_password()
    {
        if (isset($_POST["pass_email"])) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["pass_email"])) {

                /*=============================================
                Generar contraseña aleatoria
                =============================================*/

                function  generar_password($longitud)
                {

                    $key = "";
                    $pattern = "1234567890abcdefglmnoprtuyzABCDEFGLMNOPRTUYZ@$;%:*?&#._-,";
                    $max = strlen($pattern) - 1;

                    for ($i = 0; $i < $longitud; $i++) {

                        $key .= $pattern[mt_rand(0, $max)];
                    }

                    return $key;
                }

                $nueva_pass = generar_password(15);
                $encriptar = crypt($nueva_pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
                $2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');

                $tabla = "clientes";

                $item1 = "email";
                $valor1 = $_POST["pass_email"];
                $respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

                if ($respuesta1) {

                    $id = $respuesta1["id"];
                    $item2 = "password";
                    $valor2 = $encriptar;

                    $respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

                    if ($respuesta1["verificacion"] == "0") {


                        if ($respuesta2 == "ok") {

                            /*=============================================
                            Cambio de contraseña
                            =============================================*/

                            date_default_timezone_set("America/Bogota");
                            $url = Ruta::ctrRuta();
                            $mail = new PHPMailer;
                            $mail->CharSet = 'UTF-8';
                            $mail->isMail();
                            $mail->setFrom('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                            $mail->addReplyTo('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                            $mail->Subject = "Solicitud nueva contraseña";
                            $mail->addAddress($_POST["pass_email"]);
                            $mail->msgHTML('<div style="width: 100%;background: #eee; position: relative;font-family: sans-serif; padding-bottom: 40px">

                                <center>
                                    <img  style="width: 20%; padding: 20px;" src="https://i.imgur.com/z6ZQGP3.png">
                                </center>
                        
                                <div style="position: relative; margin: auto; width: 600px;background: white; padding: 20px;">
                                    <center>
                                        <img style="padding: 20px; width: 15%;" src="https://imgur.com/h2kJX4I.png">
                        
                                        <h3 style="font-weight: 100; color: #999; text-transform: uppercase;">SOLICITUD DE NUEVA CONTRASEÑA</h3>
                                        <hr style="border: 1px solid #ccc; width: 80%;">
                        
                                        <h4 style="font-weight: 100;color: #999; padding: 0 20px;">Bienvenido a Artesanias Girardot - tienda virtual.
                                        Te hemos asignado una nueva clave temporal para que puedas acceder al sistema, la nueva clave temporal es: <strong>' . $nueva_pass . '</strong> </h4>
                                        <a href="' . $url . '#modal_ingreso' . '" target="_blank" style="text-decoration: none;">
                                        <div style="margin: 20px 0; border-radius: 5px; line-height: 60px; background: #8A5D25;width: 60%; color: white;">Ingrese nuevamente al sitio</div>
                                        </a>
                        
                                        <hr style="border: 1px solid #ccc; width: 80%;">
                        
                                        <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                            <i class="fa fa-facebook-official" style="color: #46639f; font-size: 24px; margin: 5px;"></i>
                                        </a>
                                        <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                            <i class="fa fa-instagram" style="color: transparent;
                                            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                                            background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                                            background-clip: text;
                                            -webkit-background-clip: text;;font-size: 24px; margin: 5px;"></i>
                                        </a>
                                        <a href="" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                                            <i class="fa fa-pinterest-square" style="color: #DA0021; font-size: 24px; margin: 5px;"></i>
                                        </a>
                        
                                        <h5 style="font-weight: 100; color: #999">Copyright Artesanias Girardot. All right reserved.</h5>
                        
                                        <img style="width: 8%;" src="https://i.imgur.com/bQFvw9o.png" alt="">
                                        <h6 style="font-weight: 40; color: #212121;">Este correo electrónico fue enviado a <a href="">' . $_POST["pass_email"] . '</a></h6>
                                    </center>
                        
                                </div>
                                
                            </div> ');

                            $envio = $mail->Send();

                            if (!$envio) {
                                echo '<script>

                                    swal({
                                        title: "¡ERROR!",
                                        text: "¡Ha ocurrido un problema enviando cambio de contraseña' . $_POST["pass_email"] . $mail->ErrorInfo . ' Vuelva a intentar!.",
                                        type: "error",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                    },

                                    function(isConfirm){
                                            if (isConfirm) {	   
                                                history.back();
                                            } 
                                    });

                                    </script>';
                            } else {
                                echo '<script> 

                                    swal({
                                        title: "¡ENVIO EXITOSO!",
                                        text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["pass_email"] . ' para su cambio de contraseña!",
                                        type:"success",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                    },

                                    function(isConfirm){
                                            if(isConfirm){
                                                history.back();
                                            }
                                    });

                                    </script>';
                            }
                        }
                    } else {
                        echo '<script>

							swal({
								title: "¡ESTA CUENTA NO ESTA VERIFICADA!",
								text: "¡Ingrese un correo que este verificado, si no lo has hecho por favor revise su correo ' . $respuesta1["email"] . ' y verifiquelo para que puedas continuar!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							},

							function(isConfirm){
									if (isConfirm) {	   
									    history.back();
									} 
							});

							</script>';
                    }
                } else {
                    echo '<script>

							swal({
								title: "¡ERROR: CORREO NO EXISTE",
								text: "¡El correo ingresado no existe en el sistema, por favor verifique que sea uno ya registrado!",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							},

							function(isConfirm){
									if (isConfirm) {	   
									    history.back();
									} 
							});

							</script>';
                }
            } else {
                echo '<script> 

						swal({
							title: "¡ERROR!",
							text: "¡Error al enviar el correo electrónico, está mal escrito!",
							type:"error",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						},

						function(isConfirm){
							    if(isConfirm){
								    history.back();
								}
						});

				        </script>';
            }
        }
    }


    /*=============================================
    Registro de usuario por redes sociales
    =============================================*/

    static public function ctr_registro_red_social($datos)
    {

        $tabla = "clientes";

        $item = "email";
        $valor = $datos["email"];
        $email_repetido = false;

        $respuesta0 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
        if ($respuesta0) {
            if ($respuesta0["modo"] != $datos["modo"]) {
                echo '<script> 

                swal({
                    title: "¡ERROR!",
                    text: "¡El correo electrónico ' . $datos["email"] . ', ya está registrado en el sistema con un método diferente a Google!",
                    type:"error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                },

                function(isConfirm){
                        if(isConfirm){
                            history.back();
                        }
                });

                </script>';


                $email_repetido = false;
            } else {
                $email_repetido = true;
            }
        } else {

            $respuesta1 = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
        }


        if ($email_repetido || $respuesta1 == "ok") {

            $item = "email";
            $valor = $datos["email"];

            $respuesta2 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

            if ($respuesta2["modo"] == "facebook") {

                session_start();

                $_SESSION["validar_sesion"] = "ok";
                $_SESSION["id"] = $respuesta2["id"];
                $_SESSION["nombre"] = $respuesta2["nombre"];
                $_SESSION["foto"] = $respuesta2["foto"];
                $_SESSION["email"] = $respuesta2["email"];
                $_SESSION["password"] = $respuesta2["password"];
                $_SESSION["modo"] = $respuesta2["modo"];

                echo "ok";
            } elseif ($respuesta2["modo"] == "google") {

                $_SESSION["validar_sesion"] = "ok";
                $_SESSION["id"] = $respuesta2["id"];
                $_SESSION["nombre"] = $respuesta2["nombre"];
                $_SESSION["foto"] = $respuesta2["foto"];
                $_SESSION["email"] = $respuesta2["email"];
                $_SESSION["password"] = $respuesta2["password"];
                $_SESSION["modo"] = $respuesta2["modo"];

                echo "<span style='color:white'>ok</span>";
            } else {

                echo "";
            }
        }
    }

    /*=============================================
    FORMULARIO CONTACTENOS
    =============================================*/

    public function ctrFormularioContactenos()
    {

        if (isset($_POST['mensajeContactenos'])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreContactenos"]) &&
                preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeContactenos"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailContactenos"])
            ) {


                /*=============================================
                ENVÍO CORREO ELECTRÓNICO
                =============================================*/

                date_default_timezone_set("America/Bogota");
                $url = Ruta::ctrRuta();
                $mail = new PHPMailer;
                $mail->CharSet = 'UTF-8';
                $mail->isMail();
                $mail->setFrom('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                $mail->addReplyTo('artesanias-girardot@gmail.com', 'Artesanias Girardot');
                $mail->Subject = ('nuevo mensaje del cliente:'.$_POST["emailContactenos"]);
                $mail->addAddress("contacto@tiendaenlinea.com");
                $mail->msgHTML('
                <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                    <center><img style="padding:20px; width:10%" src="http://www.tutorialesatualcance.com/tienda/logo.png"></center>

                    <div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

                        <center>

                        <img style="padding-top:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-email.png">


                        <h3 style="font-weight:100; color:#999;">HA RECIBIDO UNA CONSULTA</h3>

                        <hr style="width:80%; border:1px solid #ccc">

                        <h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].'</h4>

                        <h4 style="font-weight:100; color:#999; padding:0px 20px;">De: '.$_POST["emailContactenos"].'</h4>

                        <h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>

                        <hr style="width:80%; border:1px solid #ccc">

                        </center>

                    </div>

                </div>');

                $envio = $mail->Send();

                if (!$envio) {
                    echo '<script>

                        swal({
                            title: "¡ERROR!",
                            text: "¡Ha ocurrido un problema enviando enviando el mensaje!",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },

                        function(isConfirm){
                                if (isConfirm) {	   
                                    history.back();
                                } 
                        });

                        </script>';
                } else {
                    echo '<script> 

                        swal({
                            title: "¡ENVIO EXITOSO!",
                            text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",
                            type:"success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },

                        function(isConfirm){
                                if(isConfirm){
                                    history.back();
                                }
                        });

                        </script>';
                }
            } else {

                echo '<script>

					swal({
						  title: "¡ERROR!",
						  text: "¡Problemas al enviar el mensaje, revise que no tenga caracteres especiales!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							   	window.location =  history.back();
							  } 
					});

					</script>';
            }
        }
    }
}
