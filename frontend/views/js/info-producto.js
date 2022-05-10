/* -------------------------------------------------------------------------- */
/*                                info producto                               */
/* -------------------------------------------------------------------------- */

/* ----------------- carrusel ----------------- */

$(".flexslider").flexslider({

    animation: "slide",
    controlNav: true,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5
})

/* ------------- captura de indice ------------ */

$(".flexslider ul li img").click(function(){

	var capturaIndice = $(this).attr("value");

	$(".infoproducto figure.visor img").hide();

	$("#lupa"+capturaIndice).show();
})

/* ---------------- efecto zoom --------------- */

$(".infoproducto figure.visor img").mouseover(function (event) { 

    var capturaImg = $(this).attr("src");
    $(".lupa img").attr("src", capturaImg);
    $(".lupa").fadeIn("fast");

    $(".lupa").css({

		"height":$(".visorImg").height()+"px",
		"background":"#eee",
		"width":"100%"

	})
    
});

/* --------------- ocultar zomm --------------- */

$(".infoproducto figure.visor img").mouseout(function(event){

	$(".lupa").fadeOut("fast");

})

/* ------ capturar la pocicion del mouse ------ */

$(".infoproducto figure.visor img").mousemove(function(event){

	var posX = event.offsetX;
	var posY = event.offsetY;

	$(".lupa img").css({

		"margin-left":-posX+"px",
		"margin-top":-posY+"px"

	})

})


/*----------- SELECT 2 --------------*/

