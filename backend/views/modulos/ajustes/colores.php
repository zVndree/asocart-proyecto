<?php
    $plantilla = ControllerAjustes::ctrSeleccionarPlantilla();
    /* var_dump($plantilla); */
?>

<div class="box box-warning">
    <div class="box-header with-border">

        <h3 class="box-title">Paleta de Color</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">

                <i class="fa fa-minus"></i>

            </button>

        </div>

    </div>

    <div class="box-body">

        <div class="form-group">

            <label>Color Barra Superior</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior"
                    value="<?php echo $plantilla["barTop"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>

        <div class="form-group">

            <label>Color Barra Inferior</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraInferior"
                    value="<?php echo $plantilla["bar_down"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>

        <div class="form-group">

            <label>Color Texto Superior:</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="textoSuperior"
                    value="<?php echo $plantilla["textoSuperior"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>

        <div class="form-group">

            <label>Color Fondo:</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="colorFondo"
                    value="<?php echo $plantilla["colorFondo"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>

        <div class="form-group">

            <label>Color Texto:</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="colorTexto"
                    value="<?php echo $plantilla["colorTexto"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>

    </div>

    <div class="box-footer">

        <button type="button" id="guardarColores" class="btn btn-primary pull-right">Guardar Colores</button>

    </div>


</div>

<?php 
    
    $jsonContacto = json_decode($plantilla["contacto"], true);
    
?>

<div class="box box-dark">

    <div class="box-header with-border">

        <h3 class="box-title">Lineas de atención</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">

                <i class="fa fa-minus"></i>

            </button>

        </div>

    </div>

    <div class="box-body">

        

            <?php 
            
            foreach ($jsonContacto as $key => $value) {
                
                echo '<div class="form-group row">
                
                        
                        <div class="col-xs-10">
                            <label>' . $value["nombre"] . '</label>
                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa '.$value["icono"].' "></i></span>

                                <input type="text" class="form-control input-lg cambiarContacto" value="'.$value["contacto"].'">

                            </div>

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-link "></i></span>

                                <input type="text" class="form-control input-lg cambiarUrlContacto" value="'.$value["url"].'">

                            </div>

                            
                        
                        </div>

                        <div class="col-xs-2">
                        <br></br>';
                        
                        echo '<input type="checkbox" class="seleccionarContacto" nombre=" ' . $value["nombre"] . '" icono=" ' . $value["icono"] . '" ruta="'.$value["url"].'" contacto="'.$value["contacto"].'"  validarContacto="'.$value["contacto"].'" checked>';

                        echo '</div>';
                echo'</div>';
            }
            
            ?>

    

    </div>

    <div class="box-footer">

        <button type="button" id="guardarContacto" class="btn btn-primary pull-right">Guardar</button>

    </div>



</div>