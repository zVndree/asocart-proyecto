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
                preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/', $_POST["regis_pass"])
            )   {

                    $encriptar = crypt($_POST["regis_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$
                $2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe');

                $encriptar_email = md5($_POST["regis_email"]);
                $datos = array(
                    "nombre" => $_POST["regis_user"],
                    "password" => $encriptar,
                    "email" => $_POST["regis_email"],
                    "modo" => "directo",
                    "verificacion" => 1,
                    "email_encriptado" => $encriptar_email
                );

                $tabla = "usuarios";

                $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

                var_dump($respuesta);

                if ($respuesta == "ok") {


                /*=============================================
                Verificacion del correo
                =============================================*/

                    date_default_timezone_set("America/Bogota");
                    $url =Ruta::ctrRuta();
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
                                <a href="'.$url.'verificar/'.$encriptar_email.'" target="_blank" style="text-decoration: none;">
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
                                tittle: "¡ERROR!",
                                text: "¡No se ha podido finalizar con el envio de la verificacion al correo electronico ' . $_POST["regis_user"] .$mail->ErrorInfo.'!. Vuelva a intentar",
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
                                title: "¡Registro Exitoso!",
                                text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["regEmail"] . ' para verificar la cuenta!",
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
                            tittle: "¡ERROR!",
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

    static public function ctrMostrarUsuario($item, $valor){
        $tabla ="usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
        return $respuesta;

    }

    /*=============================================
    Actualizar usuarios
    =============================================*/

    static public function ctrActualizarUsuario($id, $item, $valor){
        $tabla ="usuarios";
        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);
        return $respuesta;

    }
}

