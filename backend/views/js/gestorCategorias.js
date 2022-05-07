/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORIAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaCategorias.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$('.tablaCategorias').DataTable({

	"ajax":"ajax/tablaCategorias.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});

/*=============================================
ACTIVAR CATEGORIAS
=============================================*/

$(".tablaCategorias tbody").on("click", ".btnActivar", function() {

	var idCategoria = $(this).attr("idCategoria");
	/* console.log("click",idCategoria); */
	var estadoCategoria = $(this).attr("estadoCategoria");

	var datos = new FormData();
	datos.append("activarId", idCategoria);
	datos.append("activarCategoria", estadoCategoria);

	$.ajax({
		
		url: "ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			console.log("respuesta", respuesta);
			
		}
	});

	if (estadoCategoria == 0) {
		
		$(this).removeClass("btn-success");
		$(this).addClass("btn-danger");
		$(this).html('Desactivado');
		$(this).attr('estadoCategoria', 1);

	}else{

		$(this).addClass("btn-success");
		$(this).removeClass("btn-danger");
		$(this).html('Activado');
		$(this).attr('estadoCategoria', 0);

	}

})