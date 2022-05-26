<?php
    
class ControllerCategorias{

    /*=============================================
    MOSTRAR CATEGORIAS
    =============================================*/


    static public function ctrMostrarCategorias($item, $valor){

        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;

    }

    /*=============================================
	CREAR CATEGORIAS
	=============================================*/

    static public function ctrCrearCategoria(){

		if(isset($_POST["tituloCategoria"])){

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloCategoria"]) ) {

                /*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = "";

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "views/img/ofertas/".$_POST["rutaCategoria"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "views/img/ofertas/".$_POST["rutaCategoria"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaOferta);

					}

                
                }

                /*=============================================
                PREGUNTAMOS SI VIENE OFERTA EN CAMINO
                =============================================*/

                if($_POST["selActivarOferta"] == "oferta"){

                    $datos = array("nombre"=>$_POST["tituloCategoria"],
                                "ruta"=>$_POST["rutaCategoria"],
                                "estado"=> 1,
                                "oferta"=>1,
                                "precioOferta"=>$_POST["precioOferta"],
                                "descuentoOferta"=>$_POST["descuentoOferta"],
                                "imgOferta"=>$rutaOferta,								   
                                "finOferta"=>$_POST["finOferta"]);

                }else{

                    $datos = array("nombre"=>$_POST["tituloCategoria"],
                                "ruta"=>$_POST["rutaCategoria"],
                                "estado"=> 1,
                                "oferta"=>0,
                                "precioOferta"=>0,
                                "descuentoOferta"=>0,
                                "imgOferta"=>"",								   
                                "finOferta"=>"");
                    
                    

                }

                $respuesta = ModeloCategorias::mdlIngresarCategoria("categorias", $datos);
            

                if($respuesta == "ok"){

					echo'<script>

					swal({
                        type: "success",
                        title: "La categoría ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';

				}

                
            }else{

                echo'<script>

					swal({
                        type: "error",
                        title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        })

                </script>';

                return;

            }
        }
    }
    
    /*=============================================
	EDITAR CATEGORIAS
	=============================================*/

    static public function ctrEditarCategoria(){

		if(isset($_POST["editarTituloCategoria"])){

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloCategoria"]) ) {

                /*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = $_POST["antiguaFotoOferta"];
				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

                    /*=============================================
					BORRAMOS ANTIGUA FOTO OFERTA
					=============================================*/

					unlink($_POST["antiguaFotoOferta"]);

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "views/img/ofertas/".$_POST["rutaCategoria"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "views/img/ofertas/".$_POST["rutaCategoria"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaOferta);

					}

                
                }

                /*=============================================
                PREGUNTAMOS SI VIENE OFERTA EN CAMINO
                =============================================*/

                if($_POST["selActivarOferta"] == "oferta"){

                    $datos = array("id"=>$_POST["editarIdCategoria"],
                                "nombre"=>$_POST["editarTituloCategoria"],
                                "ruta"=>$_POST["rutaCategoria"],
                                "estado"=> 1,
                                "oferta"=>1,
                                "precioOferta"=>$_POST["precioOferta"],
                                "descuentoOferta"=>$_POST["descuentoOferta"],
                                "imgOferta"=>$rutaOferta,								   
                                "finOferta"=>$_POST["finOferta"]);

                

                }else{

                    $datos = array("id"=>$_POST["editarIdCategoria"],
                                "nombre"=>$_POST["editarTituloCategoria"],
                                "ruta"=>$_POST["rutaCategoria"],
                                "estado"=> 1,
                                "oferta"=>0,
                                "precioOferta"=>0,
                                "descuentoOferta"=>0,
                                "imgOferta"=>"",								   
                                "finOferta"=>"");
                    
                    if($_POST["antiguaFotoOferta"] != ""){

                        unlink($_POST["antiguaFotoOferta"]);

                    }
                    
                }
/* 
                print_r($datos);
                return; */

                ModeloSubcategorias::mdlActualizarOfertaSubcategorias("subcategorias", $datos, "ofertadoPorCategoria");
                $traerProductos = modeloProductos::mdlMostrarProductos("productos", "id_categoria", $datos["id"]);

                foreach ($traerProductos as $key => $value) {
                    
                    if ($datos["oferta"] != 0 && $datos["precioOferta"] == 0) {

                        $precioOfertaActualizado = $value["precio"] - ($value["precio"]*$datos["descuentoOferta"]/100);
                        $descuentoOfertaActualizado = $datos["descuentoOferta"];
                    }

                    if ($datos["oferta"] != 0 && $datos["descuentoOferta"] == 0) {

                        $precioOfertaActualizado = $datos["precioOferta"];
                        $descuentoOfertaActualizado = 100 - ($datos["precioOferta"]*100/$value["precio"]);
                    }

                    modeloProductos::mdlActualizarOfertaProductos("productos", $datos, "ofertadoPorCategoria", $precioOfertaActualizado, $descuentoOfertaActualizado, "id", $value["id"]);

                }



                $respuesta = ModeloCategorias::mdlEditarCategoria("categorias", $datos);
                        

                

                if($respuesta == "ok"){

					echo'<script>

					swal({
                        type: "success",
                        title: "La categoría ha sido editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';

				}

                
            }else{

                echo'<script>

					swal({
                        type: "error",
                        title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        })

                </script>';

                return;

            }
        }
    }

    /*=============================================
	ELIMINAR CATEGORIA
	=============================================*/

	static public function ctrEliminarCategoria(){
        if(isset($_GET["idCategoria"])){

            /*=============================================
			ELIMINAR IMAGEN OFERTA
			=============================================*/

			if($_GET["imgOferta"] != ""){

				unlink($_GET["imgOferta"]);		

			}

            /*=============================================
			QUITAR LAS CATEGORIAS DE LAS SUBCATEGORIAS
			=============================================*/

			$traerSubCategorias = ModeloSubcategorias::mdlMostrarSubCategorias("subcategorias",  "id_categoria", $_GET["idCategoria"]);

            if($traerSubCategorias){

				foreach ($traerSubCategorias as $key => $value) {

					$item1 = "id_categoria";
					$valor1 = 0;
					$item2 = "id";
					$valor2 = $value["id"];

					ModeloSubCategorias::mdlActualizarSubCategorias("subcategorias", $item1, $valor1, $item2, $valor2);

				}

			}

            /*=============================================
			QUITAR LAS CATEGORIAS DE LOS PRODUCTOS
			=============================================*/

			$traerProductos = ModeloProductos::mdlMostrarProductos("productos", "id_categoria", $_GET["idCategoria"]);

			if($traerProductos){

				foreach ($traerProductos as $key => $value) {

					$item1 = "id_categoria";
					$valor1 = 0;
					$item2 = "id";
					$valor2 = $value["id"];

					ModeloProductos::mdlActualizarProductos("productos", $item1, $valor1, $item2, $valor2);	
				
				}

			}

            $respuesta = ModeloCategorias::mdlEliminarCategoria("categorias", $_GET["idCategoria"]);
            
            if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La categoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';

			}
        }

    }

}