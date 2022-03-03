<?php
    class controller_Evento{

        static public function ctr_mostrar_evento()
        {
            $tabla = "eventos";
            $respuesta = modeloEvento::mdl_mostrar_evento($tabla);

            return $respuesta;
        }
    }