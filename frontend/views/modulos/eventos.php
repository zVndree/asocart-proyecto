<?php
$url = Ruta::ctrRuta();
$plantilla = ControllerPlantilla::ctrEstiloPlantilla();
?>

<section id="eventos">
    <section class="seccion contenedor" >
        <h1 >Sesion de eventos</h1>
        <hr class="back_color">
        <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.
        </p>
    </section>

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="<?php echo $url ?>views/img/plantilla/bg-talleres.jpg" muted>
                <source src="<?php echo $url ?>views/video/plantilla/video.mp4" type="video/mp4">
                <source src="<?php echo $url ?>video/plantilla/video.webm" type="video/webm">
                <source src="<?php echo $url ?>video/plantilla/video.ogv" type="video/ogv">
            </video>
        </div>

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2 style="color:<?php echo $plantilla["barTop"]?>">Programación Eventos</h2>
                    <nav class="menu-programa" style="border-bottom: 1px solid <?php echo $plantilla["colorFondo"]?>">

                    <div class="myBox">      

                <?php 
                
                $eventos = controller_Evento::ctr_mostrar_evento();
                    foreach ($eventos as $key => $value) {
                            /* $currentDateTime = '08/04/2010 22:15:00'; 
                            $newDateTime = date('h:i A', strtotime($currentDateTime)); */
                    $key = $key +1;

                            $hora = new DateTime($value["fecha_inicio"]);
                        
                            echo'
                            
                                <div id="eventos" class="info-curso ocultar clearfix">
                                    <div class="detalle-evento">
                                        <h3 style="color:'.$plantilla["colorFondo"].'">'.$key. '. ' .$value["titulo"].'</h3>
                                        <p>'.$value["descripcion"].'</p>
                                        <p><i class="fa fa-calendar" style="color:'.$plantilla["colorFondo"].'"></i>'.$hora->format("j/m/Y").'</p>
                                        <p><i class="fa fa-clock-o"  style="color:'.$plantilla["colorFondo"].'"></i>'.$hora->format("g:i A").'</p>
                                        <p><i class="fa fa-map-marker"  style="color:'.$plantilla["colorFondo"].'"></i>'.$value["lugar"].'</p>
                                    </div>
                                </div>
                            
                            
                            ';

                            $key ++;
                    
                    
                    }
                    
                
                ?>
                    </div>
                
                </div>
            </div>
        </div>
    </section>

<!--     <section class="seccion">
        <h1>Faltan</h1>
        <hr class="back_color">
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero bar_down">80</p> días
                </li>
                <li>
                    <p id="horas" class="numero bar_down">2</p> horas
                </li>
                <li>
                    <p id="minutos" class="numero bar_down">30</p> minutos
                </li>
                <li>
                    <p id="segundos" class="numero bar_down">30</p> segundos
                </li>
            </ul>
        </div>
    </section>
</section> -->