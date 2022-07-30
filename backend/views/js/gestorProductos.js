/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

/* $.ajax({

	url:"ajax/tablaProductos.ajax.php",
	success:function(respuesta){
		
	console.log("respuesta", respuesta);

}

}) */

$(".tablaProductos").DataTable({
	ajax: "ajax/tablaProductos.ajax.php",
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
ACTIVAR PRODUCTO
=============================================*/
$(".tablaProductos tbody").on("click", ".btnActivar", function () {
	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");

	var datos = new FormData();
	datos.append("activarId", idProducto);
	datos.append("activarProducto", estadoProducto);

	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {
			// console.log("respuesta", respuesta);
		},
	});

	if (estadoProducto == 0) {
		$(this).removeClass("btn-success");
		$(this).addClass("btn-danger");
		$(this).html("Desactivado");
		$(this).attr("estadoProducto", 1);
	} else {
		$(this).addClass("btn-success");
		$(this).removeClass("btn-danger");
		$(this).html("Activado");
		$(this).attr("estadoProducto", 0);
	}
});

/* $('.modal').on('hidden.bs.modal', function () {

	$(this).find(".modal input").val(""); //para borrar todos los datos que tenga los input, textareas, select.

	$(".alert").remove();  //lo utilice para borrar la clase alert de mensaje de duplicidad

}) */

$('.modal').on('hidden.bs.modal', function (event) {
	$(this).find(".tituloProducto").val("");
	$(this).find(".rutaProducto").val("");
	$(".alert").remove();
});

/*=============================================
REVISAR SI EL TITULO DEL PRODUCTO YA EXISTE
=============================================*/

$(".validarProducto").change(function () {
	$(".alert").remove();

	var producto = $(this).val();

	var datos = new FormData();
	datos.append("validarProducto", producto);

	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			if (respuesta.length != 0) {
				$(".validarProducto")
					.parent()
					.after(
						'<div class="alert alert-warning">Este título de producto ya existe en la base de datos</div>'
					);

				$(".validarProducto").val("");
			}
		},
	});
});

/*=============================================
RUTA PRODUCTO
=============================================*/

function limpiarUrl(cadena) {
	// Definimos los caracteres que queremos eliminar
	var charEspeciales = "!@#$^&%*()+=-[]/{}|:<>?,.";

	// Los eliminamos todos
	for (var i = 0; i < charEspeciales.length; i++) {
		cadena = cadena.replace(new RegExp("\\" + charEspeciales[i], "gi"), "");
	}

	// Quitamos espacios y los sustituimos por -
	cadena = cadena.replace(/ /g, "-");
	cadena = cadena.toLowerCase();

	// Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
	cadena = cadena.replace(/á/gi, "a");
	cadena = cadena.replace(/é/gi, "e");
	cadena = cadena.replace(/í/gi, "i");
	cadena = cadena.replace(/ó/gi, "o");
	cadena = cadena.replace(/ú/gi, "u");
	cadena = cadena.replace(/ñ/gi, "n");
	return cadena;
}

$(".tituloProducto").change(function () {
	texto = $(".tituloProducto").val();

	$(".rutaProducto").val(limpiarUrl(texto));
});

$(".multimediaFisica").show();
$(".detallesFisicos").show();

/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaFisica").dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 6,
	maxFiles: 10,
	init: function () {
		this.on("addedfile", function (file) {
			arrayFiles.push(file);

			// console.log("arrayFiles", arrayFiles);
		});

		this.on("removedfile", function (file) {
			var index = arrayFiles.indexOf(file);
			arrayFiles.splice(index, 1);

			// console.log("arrayFiles", arrayFiles);
		});
	},
});

/*=============================================
SELECCIONAR SUBCATEGORÍA
=============================================*/

$(".seleccionarCategoria").change(function () {
	var categoria = $(this).val();

	//resetear select cada vez que se cambia de categoria
	$(".seleccionarSubCategoria").html("");

	$("#modalAgregarProducto .seleccionarSubCategoria").html("");

	var datos = new FormData();
	datos.append("idCategoria", categoria);

	$.ajax({
		url: "ajax/subCategorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			/* console.log("respuesta", respuesta); */

			$(".entradaSubcategoria").show();

			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index) {
				$(".seleccionarSubCategoria").append(
					'<option value="' +
					item["id"] +
					'">' +
					item["nombre"] +
					"</option>"
				);
			}
		},
	});
});

/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function () {

	imagenFotoPrincipal = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/

	if (imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png") {

		$(".fotoPrincipal").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagenFotoPrincipal["size"] > 2000000) {

		$(".fotoPrincipal").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenFotoPrincipal);

		$(datosImagen).on("load", function (event) {

			var rutaImagen = event.target.result;

			$(".previsualizarPrincipal").attr("src", rutaImagen);

		})

	}

})

/*=============================================
VALIDAR INPUT cantidad SOLO NUM +
=============================================*/

function validarNumero(value) {
    var valor = $(value).val();
    if (!isNaN(valor) && valor >= 1) {
        $(value).val(valor);
    } else {
        $(value).val("");
    }
}

/*=============================================
ACTIVAR OFERTA
=============================================*/

function activarOferta(event){
	if(event == "oferta"){

		$(".datosOferta").show();
		$(".valorOferta").prop("required",true);
		$(".valorOferta").val("");

	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required",false);
		$(".valorOferta").val("");
	}
}

$(".selActivarOferta").change(function(){
	activarOferta($(this).val())

})

/*=============================================
VALOR OFERTA
=============================================*/

$("#modalAgregarProducto .valorOferta").change(function(){

	if($(".precio").val()!= 0){
		if($(this).attr("tipo") == "oferta"){

			var descuento = 100 - (Number($(this).val())*100/Number($(".precio").val()));

			$(".precioOferta").prop("readonly",true);
			$(".descuentoOferta").prop("readonly",false);
			$(".descuentoOferta").val(Math.ceil(descuento));	
		}

		if($(this).attr("tipo") == "descuento"){

			var oferta = Number($(".precio").val())-(Number($(this).val())*Number($(".precio").val())/100);			
			$(".descuentoOferta").prop("readonly",true);
			$(".precioOferta").prop("readonly",false);
			$(".precioOferta").val(oferta);
		}
	}else{

	swal({
		title: "Error al agregar la oferta",
		text: "¡Primero agregue un precio al producto!",
		type: "error",
		confirmButtonText: "¡Cerrar!"
	});

	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);

	return;
	}
})


/*=============================================
SUBIENDO LA FOTO DE LA OFERTA
=============================================*/

var imagenOferta = null;
$(".fotoOferta").change(function () {

	imagenOferta = this.files[0];

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if (imagenOferta["type"] != "image/jpeg" && imagenOferta["type"] != "image/png") {
		$(".fotoOferta").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagenOferta["size"] > 2000000) {
		$(".fotoOferta").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenOferta);
		$(datosImagen).on("load", function (event) {
			var rutaImagen = event.target.result;
			$(".previsualizarOferta").attr("src", rutaImagen);

		})
	}
})

/*=============================================
CAMBIAR EL PRECIO
=============================================*/

$(".precio").change(function(){

	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);

})


/*=============================================
GUARDAR EL PRODUCTO
=============================================*/

var multimediaFisica = null;

$(".guardarProducto").click(function () {

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if ($(".tituloProducto").val() != "" &&
		$(".seleccionarCategoria").val() != "" &&
		$(".seleccionarSubCategoria").val() != "" &&
		$(".descripcionProducto").val() != "") {

		/*=============================================
		PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA 
		=============================================*/

		if (arrayFiles.length > 0 && $(".rutaProducto").val() != "") {

			var listaMultimedia = [];
			var finalFor = 0;

			for (var i = 0; i < arrayFiles.length; i++) {

				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
				datosMultimedia.append("ruta", $(".rutaProducto").val());

				$.ajax({
					url: "ajax/productos.ajax.php",
					method: "POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {

						$(".modal-footer .preload").html(`

							<center>
								<img src="views/img/plantilla/status.gif" id="status" />
								<br>
							</center>
						`);

					},
					success: function (respuesta) {

						$("#status").remove();

						listaMultimedia.push({ "foto": respuesta.substr(3) })
						multimediaFisica = JSON.stringify(listaMultimedia);

						if (multimediaFisica == null) {
							swal({
								title: "El campo de multimedia no debe estar vacío",
								type: "error",
								confirmButtonText: "¡Cerrar!"
							});
							return;
						}

						if ((finalFor + 1) == arrayFiles.length) {
							agregarMiProducto(multimediaFisica);
							finalFor = 0;
						}
						finalFor++;
					}
				})
			}
		}
		

	} else {

		swal({
			title: "Llenar todos los campos obligatorios",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;
	}

})

function agregarMiProducto(imagen){

	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
	=============================================*/

	var tituloProducto = $(".tituloProducto").val();
	var rutaProducto = $(".rutaProducto").val();
	var seleccionarCategoria = $(".seleccionarCategoria").val();
	var seleccionarSubCategoria = $(".seleccionarSubCategoria").val();
	var descripcionProducto = $(".descripcionProducto").val();
	/* var pClavesProducto = $(".pClavesProducto").val(); */
	var precio = $(".precio").val();
	var peso = $(".peso").val();
	var entrega = $(".entrega").val();
	var selActivarOferta = $(".selActivarOferta").val();
	var precioOferta = $(".precioOferta").val();
	var descuentoOferta = $(".descuentoOferta").val();
	var finOferta = $(".finOferta").val();


	var datosProducto = new FormData();
	datosProducto.append("tituloProducto", tituloProducto);
	datosProducto.append("rutaProducto", rutaProducto);
	datosProducto.append("seleccionarCategoria", seleccionarCategoria);
	datosProducto.append("seleccionarSubCategoria", seleccionarSubCategoria);
	datosProducto.append("descripcionProducto", descripcionProducto);
	datosProducto.append("precio", precio);
	datosProducto.append("peso", peso);
	datosProducto.append("entrega", entrega);	

	datosProducto.append("multimedia", imagen);

	datosProducto.append("fotoPrincipal", imagenFotoPrincipal);
	datosProducto.append("selActivarOferta", selActivarOferta);
	datosProducto.append("precioOferta", precioOferta);
	datosProducto.append("descuentoOferta", descuentoOferta);
	datosProducto.append("finOferta", finOferta);
	datosProducto.append("fotoOferta", imagenOferta);

	$.ajax({
			url:"ajax/productos.ajax.php",
			method: "POST",
			data: datosProducto,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				/* console.log("respuesta", respuesta); */

				if(respuesta == "ok"){

					swal({
					type: "success",
					title: "El producto ha sido guardado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {

						window.location = "productos";

						}
					})
				}

			}

	})

}
