/*=============================================
CARGAR LA TABLA DINÁMICA DE ARTESANOS
=============================================*/

/* $.ajax({
  url: "ajax/tablaUsuarios.ajax.php",
  success: function (respuesta) {
	console.log("respuesta", respuesta);
  },
}); */

$(".tablaArtesanos").DataTable({
	"ajax": "ajax/tablaArtesanos.ajax.php",
	deferRender: true,
	retrieve: true,
	processing: true,
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
});

/*=============================================
ACTIVAR O DESACTIVAR ARTESANOS
=============================================*/

$(".tablaArtesanos tbody").on("click", ".btnActivar", function () {

	var idArtesano = $(this).attr("idArtesano");
	var estadoArtesano = $(this).attr("estadoArtesano");

	var datos = new FormData();
	datos.append("activarId", idArtesano);
	datos.append("activarArtesano", estadoArtesano);

	$.ajax({

		url: "ajax/artesanos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			// console.log("respuesta", respuesta);

		}

	});

	if (estadoArtesano == 1) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoArtesano', 0);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoArtesano', 1);

	}

})