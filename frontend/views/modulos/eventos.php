<?php
$url = Ruta::ctrRuta();
?>

<section id="eventos">
    <section class="seccion contenedor">
        <h1>Sesion de eventos</h1>
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
                    <h2>Programa del Evento</h2>
                    <nav class="menu-programa">
                        <a href="#talleres"><i class="fa fa-code"></i> Talleres</a>
                        <a href="#conferencias"><i class="fa fa-comment"></i> Conferencias</a>
                        <a href="#seminarios"><i class="fa fa-university"></i> Seminarios</a>
                    </nav>
                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Costura a mano</h3>
                            <p><i class="fa fa-clock-o"></i> 14:00:00 pm</p>
                            <p><i class="fa fa-calendar"></i> 10 de dic</p>
                            <p><i class="fa fa-user"></i> Juan Carlos Segura</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>La importancia de las artesanias</h3>
                            <p><i class="fa fa-clock-o"></i> 18:00:00 pm</p>
                            <p><i class="fa fa-calendar"></i> 10 de dic</p>
                            <p><i class="fa fa-user"></i> Alejandro Magno</p>
                        </div>
                        <!-- <a href="#" class="back_color">Ver mas</a> -->
                        <button class="btn btn-default back_color pull-right">
                            Ver mas <span class="fa fa-chevron-right"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion">
        <h1>Faltan</h1>
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
</section>