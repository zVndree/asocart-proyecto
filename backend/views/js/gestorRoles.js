/*=============================================
ACTIVAR Rol
=============================================*/
$(".tablaRoles").on("click", ".btnActivar", function () {

    var idRol = $(this).attr("idRol");
    var estadoRol = $(this).attr("estadoRol");

    var datos = new FormData();
    datos.append("activarId", idRol);
    datos.append("activarRol", estadoRol);

    $.ajax({

        url: "ajax/roles.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log("respuesta", respuesta);
        }

    })

    if (estadoRol == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoRol', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoRol', 0);

    }

})