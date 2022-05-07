/*-------cambiar color corazon --------*/

$(document).ready(function () {
    $(".wish-icon i").click(function () {
        $(this).toggleClass("fa-heart fa-heart-o");
    });
});

/*==============================
Carrousel Productos
===============================*/

$('.carousel[data-type="multi"] .item').each(function () {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < 4; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(":first");
        }

        next.children(":first-child").clone().appendTo($(this));
    }
});
