<?php
    
class controllerArtesanos{

    /*=============================================
    MOSTRAR ARTESANOS
    =============================================*/

    static public function ctrMostrarArtesanos($item, $valor){

        $tabla = "artesanos";
        $respuesta = modeloArtesanos::mdlMostrarArtesanos($tabla, $item, $valor);
		return $respuesta;

    }

    /*=============================================
    CREAR ARTESANOS
    =============================================*/

    static public function ctrCrearArtesano(){
        if (isset($_POST["nombreArtesano"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreArtesano"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordArtesano"]) ) {

                /*=============================================
				VALIDAR IMAGEN ARTESANO
				=============================================*/

				$rutaImagen = "";

                if(isset($_FILES["foto_portada"]["tmp_name"]) && !empty($_FILES["foto_portada"]["tmp_name"])){

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

                    list($ancho, $alto) = getimagesize($_FILES["foto_portada"]["tmp_name"]);
                    $nuevoAncho = 157;
					$nuevoAlto = 315;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

                    if($_FILES["foto_portada"]["type"] == "image/jpeg"){
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaImagen = "views/img/artesanos/".$_POST["nombreArtesano"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["foto_portada"]["tmp_name"]);	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaImagen);
                    }

                    if($_FILES["foto_portada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaImagen = "views/img/artesanos/".$_POST["nombreArtesano"].".png";

						$origen = imagecreatefrompng($_FILES["foto_portada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaImagen);

					}
                }

                /*=============================================
                AGREGAMOS AL ARRAY 
                =============================================*/

                $tabla = "artesanos";

                $encriptar = crypt($_POST["passwordArtesano"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre"=>$_POST["nombreArtesano"],
                                "estado"=> 0,
                                "email"=>$_POST["emailArtesano"],
                                "password" => $encriptar,
                                "foto_portada"=>$rutaImagen,
                                "reseña"=>$_POST["reseñaArtesano"],
                                "direccion"=>$_POST["direccionArtesano"],
                                "whatsapp" =>$_POST["celularArtesano"]
                                );
                
                $respuesta = modeloArtesanos::mdlIngresarArtesanoNuevo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡Artesano creado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "artesanos";

						}

					});
				

					</script>';
                }
            }
        }

    }
}