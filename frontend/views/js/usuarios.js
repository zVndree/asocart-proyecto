/*============================
    CAPTURA RUTA ACTUAL
    =============================*/

var ruta_actual = location.href;
$(".btn_login, #btn_regis_face").click(function () {
	localStorage.setItem("ruta_actual", ruta_actual);
});

/*======================
    VER / OCULTAR PASSWORD
    =======================*/
$("#imgContrasena").click(function () {
	var control = $(this);
	var estatus = control.data("activo");

	var image = control.find("img");
	if (estatus == false) {
		control.data("activo", true);
		$(image).attr(
			"src",
			"https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-10-256.png"
		);
		$("#regis_pass").attr("type", "text");
	} else {
		control.data("activo", false);
		$(image).attr(
			"src",
			"https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png"
		);
		$("#regis_pass").attr("type", "password");
	}
});

/*============================
    Formatear inputs-alert
    =============================*/

$("input").focus(function () {
	$(".alert").remove();
});

/*============================
    VALIDAR CORREO REPETIDO
    =============================*/

var val_email_duplicado = false;
$("#regis_email").change(function () {
	var email = $("#regis_email").val();
	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url: rutaOculta + "ajax/usuarios_ajax.php",
		type: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			if (respuesta == "false") {
				$(".alert").remove();

				val_email_duplicado = false;
			} else {
                var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
				}
				if($(".alert").length){

					$(".alert").remove();
				}
				$("#regis_email")
					.parent()
					.after(
						
						'<div class="alert alert-danger"><strong><i class="fa fa-exclamation-circle"> ¡ERORR! </i></strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>'
					);
				val_email_duplicado = true;
			}
		},
	});
});

/*============================
VALIDACIONES USUARIOS REGISTRO
=============================*/

function registro_user() {
	/* $(".alerta_nombre_vacio").css('display', 'none');
    $(".alerta_nombre_invalido").css('display', 'none');

    $(".alerta_correo_vacio").css('display', 'none');
	$(".alerta_correo_invalido").css('display', 'none');

    $(".alerta_password_invalido").css('display', 'none');

    $('.alerta_nocheck').css('display','none');

	$('.alerta_correcto').css('display','none');
	$('.alerta_incorrecto').css('display','none'); */

	/* var valido = 1; */

	/*============================
    VALIDAR Nombre
    =============================*/

	var nombre = $("#regis_user").val();

	if (nombre != "") {
		var exp_nombre = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if ($(".alert").length) {
			$(".alert").remove();
		}
		if (!exp_nombre.test(nombre)) {
			$("#regis_user")
				.parent()
				.after(
					'<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" ></i></strong> No se permiten números ni caracteres especiales</div>'
				);
			return false;
		}
	} else {
		$("#regis_user")
			.parent()
			.after(
				'<div class="alert alert-danger"><strong><i class="fa fa-exclamation-circle" ></i></strong> Por favor llene este campo</div>'
			);
		return false;
	}

	/*============================
    VALIDAR EMAIL
    =============================*/

	var correo = $("#regis_email").val();

	if (correo != "") {
		var exp_correo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if ($(".alert").length) {
			$(".alert").remove();
		}
		if (!exp_correo.test(correo)) {
			$("#regis_email")
				.parent()
				.before(
					'<div class="alert alert-danger"><strong><i class="fa fa-exclamation-circle"></i></strong> Escriba un correo valido</div>'
				);
			return false;
		}

		if (val_email_duplicado) {
			$("#regis_email")
				.parent()
				.after(
					'<div class="alert alert-danger"><strong><i class="fa fa-exclamation-circle"> ¡ERORR! </i></strong> El correo electrónico ya existe en la base de datos</div>'
				);
			return false;
		}
	} else {
		$("#regis_email")
			.parent()
			.before(
				'<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Debe llenar este campo</div>'
			);
		return false;
	}

	/*============================
    VALIDAR CONTRASEÑA
    =============================*/
	var password = $("#regis_pass").val();
	if (password != "") {
		var exp_password =
		/^(?=.*[a-záéíóúñ])(?=.*[A-ZÁÉÍÓÚÑ])(?=.*[0-9])(?=.*[$@$!%,;:*?&#.$($)$-$-_])[A-Za-z\d$@$!%,;:*?&#.$($)$-$-_]\S{8,15}$/;

		if ($(".alert").length) {
			$(".alert").remove();
		}
		if (!exp_password.test(password)) {
			$("#regis_pass")
				.parent()
				.after(
					'<div class="alert alert-danger"><strong><i class="fa fa-exclamation-circle" ></i></strong> Contraseña Invalida. Debe contener: <br><span class="fa fa-asterisk"> 8 o mas caracteres</span><br><span class="fa fa-asterisk"> Letras mayúsculas y minúsculas</span><br><span class="fa fa-asterisk"> al menos un número</span><br><span class="fa fa-asterisk"> al menos un caracter especial ($@!%*-_?&#.)</span><br><span class="fa fa-asterisk"> Ejemplo: mariaPerez1.</span><br></div>'
				);
			return false;
		}
	} else {
		$("#regis_pass")
			.parent()
			.after(
				'<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle"></i></strong> Debe llenar este campo</div>'
			);
		return false;
	}

	/*============================
    VALIDAR TERMINOS Y POLITICAS 
    =============================*/

	var politicas = $("#reg_politicas:checked").val();
	if (politicas != "on") {
		if ($(".alert").length) {
			$(".alert").remove();
		}

		$("#regPoliticas")
			.parent()
			.before(
				'<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Debe aceptar nuestras condiciones y politicas de privacidad</div>'
			);
		return false;
	}
	return true;

	/*  return true; */

	/* if (valido == 1) {
        alert("entro 1 condicion");
		var datos = 'regis_user=' + regis_user + '&regis_email=' + regis_email +  '&regis_pass=' + regis_pass;
        alert("entro ajax datos condicion");
        $.ajax({
            
			type: "POST",
			url: "controllers/usuarios.controller.php",
			data: datos,
			success: function(res) {
                alert("entro 2 condicion");
				if (parseInt(res) == 1) {
                    
					$('.alerta_correcto').css('display','block');
				}else{
					$('.alerta_incorrecto').css('display','block');
					
				}
			},
			error: function(res) {
                alert("entro 3 condicion");
				$('.alerta_incorrecto').css('display','block');
			}
		});
	}

 */
}
