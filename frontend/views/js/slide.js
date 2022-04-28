/*=============================================
Variables globales
=============================================*/

var item = 0;
var all_items = $("#paginacion li");
var interrumpir_ciclo = false;
var img_producto = $(".img_producto");

$("#slide ul li").css({"width":100/all_items.length + "%"})
$("#slide ul").css({"width":all_items.length*100 + "%"})

/*=============================================
Paginacion
=============================================*/

/* detectar item seleccionado */

$("#paginacion li").click(function () {
	item = $(this).attr("item") - 1;
	desplazamiento(item);
});

/*=============================================
Siguiente ->
=============================================*/

function siguiente() {
	if (item == $("#slide ul li").length -1) {
		item = 0;
	} else {
		item++;
	}
	interrumpir_ciclo = true;
	desplazamiento(item);
}

/* detectar flecha */

$("#slide #siguiente").click(function () {
	siguiente();
});

function anterior() {
	if (item == 0) {
		item = $("#slide ul li").length -1;
	} else {
		item--;
	}
	desplazamiento(item);
}

/*=============================================
anterior ->
=============================================*/

/* detectar flecha */

$("#slide #anterior").click(function () {
	anterior();
});

/* Desplazamiento items slide */

function desplazamiento(item) {
	$("#slide ul").animate({ left: item * -100 + "%" }, 1000);
	$("#paginacion li").css({ opacity: 0.5 });
	$(all_items[item]).css({ opacity: 1 });
	interrumpir_ciclo = true;
}

/*=============================================
Desplazamiento automatico
=============================================*/

setInterval(function () {
	if (interrumpir_ciclo) {
		interrumpir_ciclo = false;
	} else {

		siguiente();
	}
}, 4000);

/*========================
Desplazamiento scroll-down
=========================*/
$(document).ready(function () {
	$("a").on("click", function (event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			$("html, body").animate(
				{
					scrollTop: $(hash).offset().top,
				},
				800,
				function () {
					window.location.hash = hash;
				}
			);
		}
	});
});

/*=============================
	TOOLTIPS
	=============================*/

/* $(function () {
	$('[data-toggle="tooltip"]').tooltip();
});
 */
/*=============================
	BOTON SUBIR
	=============================*/

/* const toTop = document.querySelector(".btn-up-top");
window.addEventListener("scroll", () =>{

	if (window.pageYOffset > 500) {
		toTop.classList.add("active");
		
		
	}else{
		toTop.classList.remove("active");
	}
}) */
