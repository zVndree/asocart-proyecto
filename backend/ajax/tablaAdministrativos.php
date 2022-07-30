<?php

require_once "../controllers/admin_controller.php";
require_once "../models/admin_model.php";

class TablaAdministrativos{

    /*=============================================
	MOSTRAR LA TABLA USUARIOS ADMINISTRATIVOS
	=============================================*/

    public function mostrarTabla(){

        $item = null;
        $valor = null;

        $usuarios = controllerAdmin::ctrMostrarAdministradores($item, $valor);

        $datosJson = '{

        "data": [ ';

        for ($i=0; $i < count($usuarios); $i++) { 

            /*=============================================
            TRAER LOS ROLES
            =============================================*/

            $item = "idrol";
            $valor = $usuarios[$i]["id_rol"];

            $roles = controllerAdmin::ctrMostrarRoles($item, $valor);

            if($roles["nombre"] == ""){

                $rol = "SIN ROL POR ASIGNAR";
            
            }else{

                $rol = $roles["nombre"];
            }

            /*=============================================
            TRAER FOTO DEL USUARIO ADMINISTRATIVO
            =============================================*/

            if($usuarios[$i]["foto"] != "" ){

				$foto = "<img class='img-circle' src='".$usuarios[$i]["foto"]."' width=50px'>";

			}else{

				$foto = "<img class='img-circle' src='views/img/usuarios/default/default.png' width='60px'>";
			}

            /*=============================================
            REVISAR ESTADO
            =============================================*/

            if($usuarios[$i]["estado"] == 0){

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoUsuario = 1;

            }else{

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoUsuario = 0;

            }
            $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idPerfil='". $usuarios[$i]["id"]."' estadoPerfil='".$estadoUsuario."'>".$textoEstado."</button>";

            
            /*=============================================
            DEVOLVER DATOS JSON
            =============================================*/

            /*=============================================
            CREAR LAS ACCIONES
            =============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPerfil' idPerfil='".$usuarios[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPerfil'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPerfil' idPerfil='".$usuarios[$i]["id"]."' nombreUsuario='".$usuarios[$i]["name"]."'  fotoPerfil='".$usuarios[$i]["foto"]."'><i class='fa fa-times'></i></button></div>";


            $datosJson	 .= '[
                "'.($i+1).'",
                "'.$usuarios[$i]["name"].'",
                "'.$usuarios[$i]["email"].'",
                "'.$foto.'",
                "'.$rol.'",
                "'.$estado.'",
                "'.$usuarios[$i]["ultimo_login"].'",
                "'.$acciones.'"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']
        }';

        echo $datosJson;



    }
}

/*=============================================
ACTIVAR LA TABLA USUARIOS ADMINISTRATIVOS
=============================================*/

$activar =  new TablaAdministrativos();
$activar-> mostrarTabla();