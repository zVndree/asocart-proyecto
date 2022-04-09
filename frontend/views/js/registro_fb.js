    /*============================
    LLAMADO AL BOTON FACEBOOK
    =============================*/

$(".regis_face").click(function(){

    FB.login(function(response){
        validar_user();
    }, {scope: 'public_profile, email'});
});

    /*============================
    VALIDAR INGRESO
    =============================*/

    function validar_user() {

        FB.getLoginStatus(function(response){

            statusChangeCallback(response);
        });

    }

    /*==============================
    Validar cambio estado de facebook
    ===============================*/

    function statusChangeCallback(response) {
        
        if (response.status === 'connected') {

            testApi();
            
        }else{
            
            swal({
                title: "ERROR AL INGRESAR!",
                text: "¡Ocurrio un error al ingresar con Facebook, vuelva a intentar!",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            },

            function(isConfirm){
                    if (isConfirm) {	   
                        window.location = localStorage.getItem("ruta_actual");
                    } 
            });
        }
    }

    
    /*==============================
    Ingreso con la API de facebook
    ===============================*/

    function testApi() { 

        FB.api('/me?fields=id,name,email,picture',function(response){ 

            if (response.email == null) {
                
                swal({
                    title: "ERROR AL INGRESAR!",
                    text: "¡Para poder ingresar al sistema debe proporcionar la información del correo electronico!",
                    type: "error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                },
    
                function(isConfirm){
                        if (isConfirm) {	   
                            window.location = localStorage.getItem("ruta_actual");
                        } 
                });

            }else{

                var email = response.email;
                var nombre = response.name;
                var foto = "http://graph.facebook.com/"+response.id+"/picture?type=large";

                var datos = new FormData();
                datos.append("email", email);
                datos.append("nombre", nombre);
                datos.append("foto", foto);

                $.ajax({
                
                    url: rutaOculta + "ajax/usuarios_ajax.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success: function (respuesta) {

                        console.log("respuesta", respuesta);

                        if (respuesta == "ok") {
                            window.location = localStorage.getItem("ruta_actual");

                        }else{

                            swal({
                                title: "ERROR AL INGRESAR!",
                                text: "¡El correo electronico "+email+" ya está registrado con un método diferente a Facebook!",
                                type: "error",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            },
                
                            function(isConfirm){
                                if (isConfirm) {	
                                    
                                    FB.getLoginStatus(function(response){

                                        if (response.status === 'connected') {
                                            
                                            FB.logout(function(response){

                                                deleteCookie("fblo_471644254701291");

                                                setTimeout(function(){

                                                    window.location=rutaOculta+"salir";

                                                },500)

                                            });

                                            function deleteCookie(name){
                                                document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                            }
                                        }
                                    })
                                } 
                            });
                        }
                        
                    }
                });

            }
        })
    }

    /*==============================
    Salir de facebook
    ===============================*/

    $(".salir").click(function(e){

        e.preventDefault();

        FB.getLoginStatus(function(response){

            if (response.status === 'connected') {
                
                FB.logout(function(response){

                    deleteCookie("fblo_471644254701291");

                    setTimeout(function(){

                        window.location=rutaOculta+"salir";

                    },500)

                });

                function deleteCookie(name){
                    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                }
            }
        })
    })