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
		var verde = JSON.parse(respuesta).verde;
		var verde_claro = JSON.parse(respuesta).verde_claro;
		var rojo_claro = JSON.parse(respuesta).rojo_claro;


		$(".back_color, .back_color  a").css({
			background: colorFondo,
			color: colorTexto,
		});

		$(".verde").css({
			background: verde,
			color: bar_down,
		})

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

		$(".add-to-cart").hover(function () {
				
				$(this).css({background: verde});
				$(this).css({color: bar_down});
				
			}, function () {
				$(this).css({background: bar_down});
				$(this).css({color: verde});
				
			}
		);

		$(".add_cart").hover(function () {
				
			$(this).css({background: verde_claro});
			$(this).css({color: bar_down});
			
		}, function () {
			$(this).css({background: verde});
			$(this).css({color: bar_down});
			
		}
		);

		$(".btn_comprar").hover(function () {
				
			$(this).css({background: rojo_claro});
			$(this).css({color: bar_down});
			
		}, function () {
			$(this).css({background: barTop});
			$(this).css({color: bar_down});
			
		}
		);

		$(".btn-up-top").hover(function () {
				
			$(this).css({background: colorFondo});
			$(this).css({color: bar_down});
			
		}, function () {
			$(this).css({background: barTop});
			$(this).css({color: bar_down});
			
		}
		);
	},
});

/*===========================
	SCROLL UP
============================*/

/* $(function(){
	$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
	});
   }); */

const toTop = document.querySelector(".btn-up-top");
window.addEventListener("scroll", () =>{

	if (window.pageYOffset > 500) {
		toTop.classList.add("active");
		
		
	}else{
		toTop.classList.remove("active");
	}
})
/*=============================================
LIMPIA EL FORMULARIO 
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



