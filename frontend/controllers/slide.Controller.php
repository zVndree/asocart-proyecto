<?php
    class Controller_slide{
        static public function ctr_mostrar_slide(){

            $tabla = "slides";
            $respuesta = modelo_slide::mld_mostrar_slide($tabla);
            return $respuesta;    
        }
    }