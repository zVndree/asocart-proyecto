/*============================
VALIDACIONES USUARIOS REGISTRO
=============================*/

function registro_user() {

    $(".alerta_nombre").css('display', 'none');
	$(".alerta_correo").css('display', 'none');
    $(".alerta_password").css('display', 'none');
	$('.alerta_correcto').css('display','none');
	$('.alerta_incorrecto').css('display','none');
    var valido = 1;

    /*============================
    VALIDAR Nombre
    =============================*/

    var nombre =$("#regis_user").val();
    var val_nombre = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if(nombre.length <= 0 ){
		$(".alerta_nombre").css('display', 'block');
		valido = 0;
	}

    if (!val_nombre.test(nombre)) {
        $(".alerta_nombre").css('display', 'block');
		valido = 0;
    }

    /* if (nombre != "") {
        
        
        if (!expresion.test(nombre)) {
            $("#regis_user").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> No se permiten números ni caracteres especiales</div>')
            return false;
        }
    }else{
        $("#regis_user").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Debe llenar este campo</div>')
        return false;

    } */

    /*============================
    VALIDAR EMAIL
    =============================*/

    var correo =$("#regis_email").val();
    var validacion_correo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if(!validacion_correo.test(correo)){
		$(".alerta_correo").css('display', 'block');
		valido = 0;
	}
    /* if (correo != "") {
        
        
        if (!expresion.test(correo)) {
            $("#regis_email").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Escriba un correo valido</div>')
            return false;
        }
    }else{
        $("#regis_email").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Debe llenar este campo</div>')
        return false;

    } */

    /*============================
    VALIDAR CONTRASEÑA
    =============================*/

    var password =$("#regis_pass").val();
    var val_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

    if(password.length < 8 ){
		$(".alerta_password").css('display', 'block');
		valido = 0;
	}
    if(password.length > 15 ){
		$(".alerta_password").css('display', 'block');
		valido = 0;
	}

    if(!val_password.test(password)){
		$(".alerta_password").css('display', 'block');
		valido = 0;
	}
/*     if (password != "") {
        
        if (!expresion.test(password)) {
            $("#regis_pass").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Contraseña invalida pruebe otra</div>')
            return false;
        }
    }else{
        $("#regis_pass").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Debe llenar este campo</div>')
        return false;

    } */

    if (valido == 1) {
		var datos = 'nombre=' + nombre + '&correo=' + correo +  '&password=' + password;
        $.ajax({
			type: "POST",
			url: "../../controllers/usuarios.controller.php",
			data: datos,
			success: function(res) {
				if (parseInt(res) == 1) {
					$('.alerta_correcto').css('display','block');
				}else{
					$('.alerta_incorrecto').css('display','block');
					
				}
			},
			error: function(res) {
				$('.alerta_incorrecto').css('display','block');
			}
		});
	}

    /*============================
    VALIDAR TERMINOS Y POLITICAS 
    =============================*/

    var politicas = $("#reg_politicas:checked").val();
    
    if (politicas != "on") {
        $("#reg_politicas").parent().before('<div class="alert alert-warning"><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Debe aceptar nuestras condiciones y politicas de privacidad</div>')
        return false;
        
    }

    return true;
    
}