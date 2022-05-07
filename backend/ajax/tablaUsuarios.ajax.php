<?php
    
require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.modelo.php";

class TablaUsuarios{

    /*=============================================
	MOSTRAR LA TABLA USUARIOS
	=============================================*/

    public function mostrarTabla(){

        $item = null;
        $valor = null;

        $usuarios = ControllerUsuarios::ctrMostrarUsuarios($item, $valor);

        $datosJson = '{

        "data": [ ';

        for ($i=0; $i < count($usuarios); $i++) { 

            /*=============================================
            TRAER FOTO DEL CLIENTE
            =============================================*/

            if($usuarios[$i]["foto"] != "" ){

				$foto = "<img class='img-circle' src='".$usuarios[$i]["foto"]."' width='60px'>";

			}else{

				$foto = "<img class='img-circle' src='views/img/usuarios/default/default.png' width='60px'>";
			}

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if($usuarios[$i]["modo"] == "directo"){

                if($usuarios[$i]["verificacion"] == 1){

                    $colorEstado = "btn-danger";
                    $textoEstado = "Desactivado";
                    $estadoUsuario = 0;

                }else{

                    $colorEstado = "btn-success";
                    $textoEstado = "Activado";
                    $estadoUsuario = 1;

                }

                $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idUsuario='". $usuarios[$i]["id"]."' estadoUsuario='".$estadoUsuario."'>".$textoEstado."</button>";

            }else{

                $estado = "<button class='btn btn-xs btn-dropbox'>Activado</button>";

            }
            
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            $datosJson	 .= '[
                "'.($i+1).'",
                "'.$usuarios[$i]["nombre"].'",
                "'.$usuarios[$i]["email"].'",
                "'.$usuarios[$i]["modo"].'",
                "'.$foto.'",
                "'.$estado.'",
                "'.$usuarios[$i]["fecha"].'"    
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']
        }';

        echo $datosJson;



    }


}

/*=============================================
ACTIVAR LA TABLA USUARIOS
=============================================*/

$activar =  new TablaUsuarios();
$activar-> mostrarTabla();