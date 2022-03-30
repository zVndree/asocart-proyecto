<?php
    $item1 = "ruta";
    $valor1 = $rutas[0];

    $categoria = controladorProductos::ctrListarCategorias($item1, $valor1);

    var_dump($categoria["id"]);
    
        if (!is_array($categoria)) {
            $sub_categoria = controladorProductos::ctrListarSubcategorias($item1, $valor1);
            $item2 = "id_categoria";
            $valor2 = $sub_categoria[0]["id"];

        }else{

            $item2 = "id_categoria";
            $valor2 = $categoria["id"];

        }

    $ordenar = "id";
    $productos = controladorProductos::ctr_mostrar_productos($ordenar, $item2, $valor2);

    var_dump($productos);

    if (!$productos) {
        echo '<h1>Aún no hay productos en esta seccion</h1>';
    }
?>
    