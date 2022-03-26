<?php
    
session_destroy();

$ruta = Ruta::ctrRuta();
echo'
    <script>
        window.location = "'.$url.'";
    </script';