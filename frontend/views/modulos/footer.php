<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid">
    <div class="container">
        <div class="row">

            <!--=====================================
            CATEGORIAS Y SUBCATEGORIAS DEL FOOTER
            ======================================-->

            <div class="col-lg-5 col-md-5 col-xs-12 footerCategorias">
                <?php

                $url = Ruta::ctrRuta();
                $item = null;
                $valor = null;
                $categorias = controladorProductos::ctrListarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                    if ($value["estado"] != 0) {
                
                        echo '<div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">

                                <h4><a href="'.$url.$value["ruta"].'">'.$value["nombre"].'</a> </h4>
                            
                                <ul>';

                        $item = "id_categoria";
                        $valor = $value["id"];
                        $subcategorias = controladorProductos::ctrListarSubcategorias($item, $valor);

                        /* var_dump($subcategorias); */
                        foreach ($subcategorias as $key => $value) {

                            if ($value["estado"] != 0) {
                                    echo'<li><a href="'. $url . $value["ruta"] . '">'.$value["nombre"].'</a></li>';
                            }
                        }
                            echo'</ul>
                        
                            </div>';
                    }
                }
            ?>


            </div>

            <!--=====================================
            DATOS CONTACTO
            ======================================-->

            <div class="col-md-3 col-sm-6 col-xs-12 text-left infoContacto">

                <h4><i class="fa fa-tty"></i> Lineas de Atención</h4><br>
                <h5>
                    <i class="fa fa-phone-square"> 3222256287</i><br>
                    <br>
                    <i class="fa fa-envelope"> soporte@artesanias-girardot.com</i>
                </h5>

            </div>

            <!--=====================================
            FORMULARIO DE CONTACTO
            ======================================-->

            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 formContacto">

                <h4>Resuelva su Inquietud</h4>

                <form role="form" method="post" onsubmit="return validarContactenos()">

                    <input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control"
                        placeholder="Escriba su nombre" required>

                    <br>

                    <input type="email" id="emailContactenos" name="emailContactenos" class="	form-control"
                        placeholder="Escriba su correo electrónico" required>

                    <br>

                    <textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control"
                        placeholder="Escriba su mensaje" rows="5" required></textarea>

                    <br>

                    <input style="background: #7D6D61;color: #fff" type="submit" value="Enviar"
                        class="btn btn-default pull-right" id="enviar">

                </form>

                <?php 

					$contactenos = new controller_usuarios();
					$contactenos -> ctrFormularioContactenos();

				?>

            </div>
        </div>
    </div>
</footer>

<!--=====================================
FINAL
======================================-->

<div class="container-fluid final">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 text-left" style="color: <?php echo $plantilla["bar_down"]?>">
                <h5>&copy; 2022 Todos los derechos reservados.</h5>
            </div>

            <div class="col-sm-6 col-xs-12 text-right social">
				
			<ul>

			<?php
				
			$social = ControllerPlantilla::ctrEstiloPlantilla();

				$jsonRedesSociales = json_decode($social["redesSociales"],true);		

				foreach ($jsonRedesSociales as $key => $value) {

					echo '<li>
							<a href="'.$value["url"].'" target="_blank">
								<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
							</a>
						</li>';
				}

			?>

			</ul>

			</div>
        </div>
    </div>
</div>