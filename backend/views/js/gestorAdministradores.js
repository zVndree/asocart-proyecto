/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS ADMINISTRATIVOS
=============================================*/

/* $.ajax({
  url: "ajax/tablaAdministrativos.php",
  success: function (respuesta) {
	console.log("respuesta", respuesta);
  },
}); */

$(".tablaUsuarios").DataTable({
	"ajax": "ajax/tablaAdministrativos.php",
	deferRender: true,
	retrieve: true,
	processing: true,
    stateSave: true,
    stripHtml: false,
	language: {
		sProcessing: "Procesando...",
		sLengthMenu: "Mostrar _MENU_ registros",
		sZeroRecords: "No se encontraron resultados",
		sEmptyTable: "Ningún dato disponible en esta tabla",
		sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
		sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
		sInfoPostFix: "",
		sSearch: "Buscar:",
		sUrl: "",
		sInfoThousands: ",",
		sLoadingRecords: "Cargando...",
		oPaginate: {
			sFirst: "Primero",
			sLast: "Último",
			sNext: "Siguiente",
			sPrevious: "Anterior",
		},
		oAria: {
			sSortAscending: ": Activar para ordenar la columna de manera ascendente",
			sSortDescending:
				": Activar para ordenar la columna de manera descendente",
		},
        
	},
    'dom': 'lfBrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<span><i style='color:#212121'; class='fa fa-copy'></i><strong> Copiar</strong> </span>",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<span style='color:#fff'><i  class='fa fa-file-excel-o'></i> </span>",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<span style='color:#fff'><i  class='fa fa-file-pdf-o'></i> </span>",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                footer: true
            },{
                "extend": "csvHtml5",
                "text": "<img src='http://localhost/asocart-proyecto/backend/views/img/plantilla/csv.png'>",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            },{
                "extend": "print",
                "text": "<span style='color:#fff'><i  class='fa fa-print'></i></span>",
                "titleAttr":"Imprimir",
                "className": "btn btn-primary"
        
                 /* Aquí indicamos que no se eliminen las imágenes */
            }
            
        ]
});

/*======================
VER / OCULTAR PASSWORD
=======================*/
    $(".imgContrasena").click(function () {
        var control = $(this);
        var estatus = control.data("activo");
    
        var image = control.find("img");
        if (estatus == false) {
            control.data("activo", true);
            $(image).attr(
                "src",
                "https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-10-256.png"
            );
            $(".passwordUsuario").attr("type", "text");
        } else {
            control.data("activo", false);
            $(image).attr(
                "src",
                "https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png"
            );
            $(".passwordUsuario").attr("type", "password");
        }
    });



/*=============================================
ACTIVAR PERFIL
=============================================*/
$(".tablaUsuarios").on("click", ".btnActivar", function () {

    var idPerfil = $(this).attr("idPerfil");
    var estadoPerfil = $(this).attr("estadoPerfil");

    var datos = new FormData();
    datos.append("activarId", idPerfil);
    datos.append("activarPerfil", estadoPerfil);

    $.ajax({

        url: "ajax/administradores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            /* console.log("respuesta", respuesta); */
        }

    })

    if (estadoPerfil == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoPerfil', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoPerfil', 0);

    }

})

$('.modal').on('hidden.bs.modal', function () {

	$(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.

	$(".alert").remove();  //lo utilice para borrar la clase alert de mensaje de duplicidad

})


/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
$(".nuevaFoto").change(function () {

    var imagen = this.files[0];

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})


/*=============================================
EDITAR PERFIL
=============================================*/
$(".tablaUsuarios tbody").on("click", ".btnEditarPerfil", function () {

    var idPerfil = $(this).attr("idPerfil");
    var datos = new FormData();
    datos.append("idPerfil", idPerfil);

    $.ajax({

        url: "ajax/administradores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            
            $("#modalEditarPerfil .editarIdUsuario").val(respuesta["id"]);
            $("#modalEditarPerfil .nombreUsuario").val(respuesta["name"]);
            $("#modalEditarPerfil .emailUsuario").val(respuesta["email"]);
        
            $("#modalEditarPerfil .fotoActual").val(respuesta["foto"]);
            $("#modalEditarPerfil .passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);
                

            } 

            /*=============================================
			TRAEMOS EL ROL
			=============================================*/

			if(respuesta["id_rol"] != 0){
			
				var datosRol = new FormData();
				datosRol.append("idRol", respuesta["id_rol"]);
				

				$.ajax({

						url:"ajax/administradores.ajax.php",
						method: "POST",
						data: datosRol,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta){

							$("#modalEditarPerfil .seleccionarRol").val(respuesta["id_rol"]);
							$("#modalEditarPerfil .optionEditarPerfil").html(respuesta["nombre"]);
						}

					})

			}else{

				$("#modalEditarPerfil .optionEditarPerfil").html("SIN ROL");

			}

        }
    })
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablaUsuarios").on("click", ".btnEliminarPerfil", function () {

    var idPerfil = $(this).attr("idPerfil");
    var fotoPerfil = $(this).attr("fotoPerfil");
    var nombreUsuario = $(this).attr("nombreUsuario");


    swal({
        title: '¿Está seguro de borrar el usuario '+ nombreUsuario +'?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Usuario!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=usuarios&idPerfil=" + idPerfil +  "&nombreUsuario=" + nombreUsuario + "&fotoPerfil=" + fotoPerfil;

        }

    })

})
