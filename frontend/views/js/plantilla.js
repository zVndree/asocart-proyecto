/* PLANTILLA */

/*==================
	PRELOADER
==================*/

$(document).ready(function () {
	$(".preloader").fadeOut("fast");
});

var rutaOculta = $("#rutaOculta").val();

/* Herramienta TOOLTIP */

/*=============================
TOOLTIPS
=============================*/

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

$.ajax({
	url: rutaOculta + "ajax/plantilla.ajax.php",
	success: function (respuesta) {
		var colorFondo = JSON.parse(respuesta).colorFondo;
		var colorTexto = JSON.parse(respuesta).colorTexto;
		var barTop = JSON.parse(respuesta).barTop;
		var bar_down = JSON.parse(respuesta).bar_down;
		var textoSuperior = JSON.parse(respuesta).textoSuperior;

		$(".back_color, .back_color  a").css({
			background: colorFondo,
			color: colorTexto,
		});

		/* $("a").hover(function(){
			$(this).css({color: colorFondo,});
		}, function() {
			$( this ).css( {color: colorFondo} ).last().remove();
		}
		); */

		/* $("a").hover(function(){
			$(this).css({color: colorFondo,});
		}, function() {
			$( this ).removeClass( "a" );
		}
		); */

		/* $("a").on("mouseover", function () {
			$(this).css({color: colorFondo,});
		}); */

		/*$("a").on({
			mouseenter: function () {
				$(this).css({color: colorFondo,});
			},
			mouseleave: function () {
				/* $(this).removeAttr("color"); 
				$("a").val("");
			}
		});*/
		/* 
				$("a").on({
					mouseenter: function () {
						$(this).css({color: colorFondo,});
					},
					mouseleave: function () {
						$(this).remove(color); 
					
					}
				}) */

/*=============================
Efecto HOVER 
=============================*/
		
		$(".lineas").hover(function () {
			$(this).css({color: colorTexto,});
		}, function () {
			$(this).css({color: bar_down});
		});

		$("#ing").hover(function () {
			$(this).css({color: colorTexto,});
		}, function () {
			$(this).css({color: bar_down});
		});

		$("#reg").hover(function () {
			$(this).css({color: colorTexto,});
		}, function () {
			$(this).css({color: bar_down});
		});

		$("#catalogo").hover(function () {
			$(this).css({color: bar_down,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$("#favoritos").hover(function () {
			$(this).css({color: colorFondo,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$("#items").hover(function () {
			$(this).css({color: colorFondo,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$(".fa-bars").hover(function () {
			$(this).css({color: bar_down,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$(".fa-search").hover(function () {
			$(this).css({color: bar_down,});
		}, function () {
			$(this).css({color: colorTexto});
		});

	/* 	$(".fa-phone").hover(function () {
			$(this).css({color: colorTexto,});
		}, function () {
			$(this).css({color: bar_down});
		}); */

		$(".color-categoria").hover(function () {
			$(this).css({color: bar_down,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$(".color-subcategorias").hover(function () {
			$(this).css({color: bar_down,});
		}, function () {
			$(this).css({color: colorTexto});
		});

		$(".bar_top, .bar_top a").css({
			background: barTop,
			color: textoSuperior,
		});

		$(".bar_down, .bar_down p").css({
			background: bar_down,
			color: colorFondo,
		});

		$(".bar_service").css({
			background: colorFondo,
			color: colorTexto,
		});
	},
});

/*=============================================
LIMPIA EL FORMULARIO DE INGRESO DE PARQUES MEMORIALES
=============================================*/

$(".modal").on("hidden.bs.modal", function () {
	$(this).find("form")[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.

	/* $(".alert").remove();  */ //lo utilice para borrar la clase alert de mensaje de duplicidad
});

/*===========================
	Migas de pan BREADCRUMBS
============================*/

var pag_activa = $(".pag_activa").html();

if (pag_activa != null) {
	var reg_pag_activa = pag_activa.replace(/-/g, " ");
	$(".pag_activa").html(reg_pag_activa);
}

/*===========================
	ENLACES PAGINACION
============================*/

var url = window.location.href;

var indice = url.split("/");

$("#item" + indice.pop()).addClass("active");
