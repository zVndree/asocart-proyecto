/*=============================================
FORMATO PARA LA Moneda
=============================================*/

/* function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    const n = !isFinite(+number) ? 0 : +number
    const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    let s = ''
    const toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            const arr = ('' + n).split('e')
            let sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }
    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }
    return s.join(dec)
}
 */

/*=============================================
VISUALIZAR LA CESTA DEL CARRITO DE COMPRAS
=============================================*/

if (localStorage.getItem("cantidadCesta") != null) {
    $(".cantidadCesta").html(localStorage.getItem("cantidadCesta"));
    $(".sumaCesta").html(localStorage.getItem("sumaCesta"));
    console.log(localStorage.getItem("sumaCesta"));
} else {
    $(".cantidadCesta").html("0");
    $(".sumaCesta").html("0");
}

/*=============================================
VISUALIZAR LOS PRODUCTOS EN LA PÁGINA CARRITO DE COMPRAS
=============================================*/

if (localStorage.getItem("listaProductos") != null) {
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    listaCarrito.forEach(funcionForEach);

    function funcionForEach(item, index) {
        /* console.log("item", item.titulo); */

        $(".cuerpoCarrito").append(
            '<div clas="row itemCarrito">' +
                '<div class="col-sm-1 col-xs-12">' +
                    "<figure>" +
                        '<img src="' +item.imagen + '" class="img-thumbnail">' +
                    "</figure>" +
                "</div>" +
                '<div class="col-sm-4 col-xs-12">' +
                    "<br>" +
                    '<p class="tituloCarritoCompra text-center">' + item.titulo +"</p>" +
                "</div>" +
                '<div class="col-md-2 col-sm-1 col-xs-12">' +
                    "<br>" +
                    '<p class="precioCarritoCompra text-center"> $<span>' + item.precio + "</span></p>" +
                "</div>" +
                '<div class="col-md-2 col-sm-3 col-xs-8">' +
                    "<br>" +
                    '<div class="col-xs-8">' +
                        "<center>" +
                            '<input id="inputCantidad" type="number" class="form-control cantidadItem" min="1" pattern="^[0-9]+" onkeyup="validarNumero(this)" value="' + item.cantidad +'" precio="' + item.precio + '" idProducto="' + item.idProducto + '" item="' + index +'">' +
                        "</center>" +
                    "</div>" +
                "</div>" +
                '<div class="col-md-2 col-sm-1 col-xs-4 text-center">' +
                    "<br>" +
                    '<p class="subTotal' + index + ' subtotales">' + "<strong>COP $<span>" + item.precio + "</span></strong>" + "</p>" +
                "</div>" +
                '<div class="col-sm-1 col-xs-12">' +
                    "<br>" +
                    "<center>" +
                        '<button class="btn btn-default bar_top quitarItemCarrito " idProducto="' + item.idProducto + '" peso="' + item.peso + '">' +'<i class="fa fa-times"></i> Quitar' +"</button>" +
                    "</center>" +
                "</div>" +
            "</div>" +
            '<div class="clearfix"></div>'+'<hr style=width:100%>'
        );

        /*=============================================
                // ACTUALIZAR SUBTOTAL
                // =============================================*/
        /* var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
                var cantidadItem = $(".cuerpoCarrito .cantidadItem");
    
                for (var i = 0; i < precioCarritoCompra.length; i++) {
    
                    var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
                    var cantidadItemArray = $(cantidadItem[i]).val();
                    var idProductoArray = $(cantidadItem[i]).attr("idProducto");
    
                    $(".subTotal"+i).html('<strong>COP $<span>'+(precioCarritoCompraArray*cantidadItemArray)+'</span></strong>')
                } */

        /* cestaCarrito(precioCarritoCompra.length); */

        /* sumaSubtotales(); */
    }
} else {
    $(".cuerpoCarrito").html(
        '<div style="margin-top: 25px;" class="well">Aún no hay productos en el carrito de compras.</div>'
    );
    $(".sumaCarrito").hide();
    $(".cabeceraCheckout").hide();
}

/*=============================================
VALIDAR INPUT CARRITO SOLO NUM +
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
AGREGAR AL CARRITO
=============================================*/

$(".agregarCarrito").click(function () {
    var idProducto = $(this).attr("idProducto");
    /* console.log("idProducto", idProducto); */
    var imagen = $(this).attr("imagen");
    /* console.log("imagen", imagen);  */
    var titulo = $(this).attr("titulo");
    /* console.log("titulo", titulo); */
    var precio = $(this).attr("precio");
    /* console.log("precio", precio); */
    var peso = $(this).attr("peso");

    var agregarAlCarrito = true;

    /*=============================================
    ALMACENAR EN EL LOCALSTARGE LOS PRODUCTOS AGREGADOS AL CARRITO
    =============================================*/

    if (agregarAlCarrito) {
        /*=============================================
            RECUPERAR ALMACENAMIENTO DEL LOCALSTORAGE
            =============================================*/

        if (localStorage.getItem("listaProductos") == null) {
            listaCarrito = [];
        } else {
            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));

            for (var i = 0; i < listaProductos.length; i++) {
                if (listaProductos[i]["idProducto"] == idProducto) {
                    
                    swal({
                        title: "El producto ya está agregado al carrito de compras",
                        text: "",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "¡Volver!",
                        closeOnConfirm: false,
                    });

                    return;
                }
            }

            listaCarrito.concat(localStorage.getItem("listaProductos"));
            listaCarrito.concat(localStorage.getItem("listaProductos"));
            /*       console.log("listaCarrito",listaCarrito); */
        }

        listaCarrito.push({
            idProducto: idProducto,
            imagen: imagen,
            titulo: titulo,
            precio: precio,
            peso: peso,
            cantidad: "1",
        });

        /* console.log("listaCarrito", listaCarrito); */
        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

        /*=============================================
            ACTUALIZAR LA CESTA
            =============================================*/

        /* function maskDinero(numero) {
                    return "" + parseFloat(numero).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                }   */

        var cantidadCesta = Number($(".cantidadCesta").html()) + 1;

        /* function formato(num, dec){
                String.prototype.replaceAt= function(index, replacement){
                    return this.substring(0, index) + replacement + this.substr(index +replacement.length);
                }
    
                const formatterPeso = new Intl.NumberFormat('es-CO', {
                    
                    currency: 'COP',
                    maximumFractionDigits: dec
                });
    
                var number = formatterPeso.format(num);
                var long = number.length;
                var f=[".",".",".",".",".",".","."];
                var fi=0;
                for (let i=long-1; i >=0; i--){
                    if (number[i]=='.') {
                        number = number.replaceAt(i,f[fi]);
                        fi++;
                        
                    }
                }
                return number;
            }; */
    
        /* function formatCurrency(locales, currency, fractionDigits, number) {
            var formatted = new Intl.NumberFormat(locales, {
                style: "currency",
                currency: currency,
                minimumFractionDigits: fractionDigits,
            }).format(number);
            return formatted;
        } */

        var sumaCesta = parseFloat($(".sumaCesta").html()) + parseFloat(precio);

        /* console.log(sumaCesta);
            var probar = sumaCesta*1000;
            console.log("probar: ", probar);
            var sumaCarrito = formatCurrency("es-CO", "COP", 0, probar);
            console.log(sumaCarrito); */
        var sumaCarrito = numeral(sumaCesta).format("0,0.000");
        $(".cantidadCesta").html(cantidadCesta);
        $(".sumaCesta").html(sumaCarrito);

        localStorage.setItem("cantidadCesta", cantidadCesta);
        localStorage.setItem("sumaCesta", sumaCarrito);
    }

    /*=============================================
    MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
    =============================================*/

    swal(
        {
            title: "",
            text: "¡Se ha agregado un nuevo producto al carrito de compras!",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "¡Continuar comprando!",
            confirmButtonText: "¡Ir a mi carrito de compras!",
            closeOnConfirm: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                window.location = rutaOculta + "carrito-de-compras";
            }
        }
    );
});

/*=============================================
/*=============================================
QUITAR PRODUCTOS DEL CARRITO
=============================================*/

$(document).on("click", ".quitarItemCarrito", function () {
    $(this).parent().parent().parent().remove();
    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");

    /*=============================================
    SI AÚN QUEDAN PRODUCTOS VOLVERLOS AGREGAR AL CARRITO (LOCALSTORAGE)
    =============================================*/

    listaCarrito = [];

    if (idProducto.length != 0) {
        for (var i = 0; i < idProducto.length; i++) {
            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var imagenArray = $(imagen[i]).attr("src");
            var tituloArray = $(titulo[i]).html();
            var precioArray = $(precio[i]).html();
            var pesoArray = $(idProducto[i]).attr("peso");
            var cantidadArray = $(cantidad[i]).val();

            listaCarrito.push({
                idProducto: idProductoArray,
                imagen: imagenArray,
                titulo: tituloArray,
                precio: precioArray,
                peso: pesoArray,
                cantidad: cantidadArray,
            });
        }

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

        sumaSubtotales();
        cestaCarrito(listaCarrito.length);
    } else {
        /*=============================================
            SI YA NO QUEDAN PRODUCTOS HAY QUE REMOVER TODO
            =============================================*/

        localStorage.removeItem("listaProductos");

        localStorage.setItem("cantidadCesta", "0");

        localStorage.setItem("sumaCesta", "0");

        $(".cantidadCesta").html("0");
        $(".sumaCesta").html("0");

        $(".cuerpoCarrito").html(
            '<div style="margin-top: 25px;" class="well">Aún no hay productos en el carrito de compras.</div>'
        );
        $(".sumaCarrito").hide();
        $(".cabeceraCheckout").hide();
    }
});

/*=============================================
/*=============================================
GENERAR SUBTOTAL DESPUES DE CAMBIAR CANTIDAD
=============================================*/

$(document).on("change", ".cantidadItem", function () {
    var cantidad = $(this).val();
    var precio = $(this).attr("precio");
    var idProducto = $(this).attr("idProducto");
    var item = $(this).attr("item");

    $(".subTotal" + item).html(
        '<strong>COP $<span>' + numeral(cantidad * precio).format("0.000") + '</span></strong>'
    );

    /*=============================================
    ACTUALIZAR LA CANTIDAD EN EL LOCALSTORAGE
    =============================================*/

    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");

    listaCarrito = [];

    for (var i = 0; i < idProducto.length; i++) {
        var idProductoArray = $(idProducto[i]).attr("idProducto");
        var imagenArray = $(imagen[i]).attr("src");
        var tituloArray = $(titulo[i]).html();
        var precioArray = $(precio[i]).html();
        var pesoArray = $(idProducto[i]).attr("peso");
        var cantidadArray = $(cantidad[i]).val();

        listaCarrito.push({
            idProducto: idProductoArray,
            imagen: imagenArray,
            titulo: tituloArray,
            precio: precioArray,
            peso: pesoArray,
            cantidad: cantidadArray,
        });
    }

    localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

    sumaSubtotales();
    cestaCarrito(listaCarrito.length);
});

/*=============================================
                ACTUALIZAR SUBTOTAL
=============================================*/


var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
var cantidadItem = $(".cuerpoCarrito .cantidadItem");

for (var i = 0; i < precioCarritoCompra.length; i++) {

    var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");

    $(".subTotal" + i).html('<strong>COP $<span>' + numeral(precioCarritoCompraArray * cantidadItemArray).format("0.000") + '</span></strong>')
    sumaSubtotales();
    cestaCarrito(cantidadProductos);
}

/*=============================================
/*=============================================
SUMA DE TODOS LOS SUBTOTALES
=============================================*/

function sumaSubtotales(){

    var subtotales = $(".subtotales span");
    /* console.log("sumaSubtotales", subtotales); */
    var arraySumaSubtotales = [];

    for(var i = 0; i < subtotales.length; i++){

		var subtotalesArray = $(subtotales[i]).html();
		arraySumaSubtotales.push(Number(subtotalesArray));
		
	}

    console.log("arraySumaSubtotales", arraySumaSubtotales);

    function sumaArraySubtotales(total, numero){
		return total + numero;
	}

    var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
    console.log("sumaTotal", sumaTotal);
    $(".sumaSubTotal").html('<strong>COP $<span>'+numeral(sumaTotal).format("0,0.000")+'</span></strong>');
    $(".sumaCesta").html(numeral(sumaTotal).format("0,0.000"));

	localStorage.setItem("sumaCesta", numeral(sumaTotal).format("0,0.000"));

}

/*=============================================
/*=============================================
ACTUALIZAR CESTA AL CAMBIAR CANTIDAD
=============================================*/

function cestaCarrito(cantidadProductos){

    /*=============================================
	SI HAY PRODUCTOS EN EL CARRITO
	=============================================*/

    if(cantidadProductos != 0){

        var cantidadItem = $(".cuerpoCarrito .cantidadItem");
        var arraySumaCantidades = [];

        for(var i = 0; i < cantidadItem .length; i++){

			var cantidadItemArray = $(cantidadItem[i]).val();
			arraySumaCantidades.push(Number(cantidadItemArray));
			
		}
	
		function sumaArrayCantidades(total, numero){

			return total + numero;

		}

		var sumaTotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);
		
		$(".cantidadCesta").html(sumaTotalCantidades );
		localStorage.setItem("cantidadCesta", sumaTotalCantidades);

    }

}
