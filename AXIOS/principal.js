
// Validar los Forms
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, true)
    })
})()

// Validar los forms

function logueo_admin(){
window.location.reload();

}

function logueo_administrador(){

var url="NAVEGADOR/inicio_admin.php";
var url2="NAVEGADOR/menu.php";
var url3="NAVEGADOR/top_barra_admin.php";

$.post(url,function(response){
    $('#axios-container').html(response);

});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response3){
    $('#axios-barra').html(response3);
});

} 

function logueo_capataz(){

var url="capataz/inicio_capataz.php";
var url2="capataz/menu_capataz.php";
var url3="capataz/top_barra_capataz.php";

$.post(url,function(response){
    $('#axios-container').html(response);

});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response3){
    $('#axios-barra').html(response3);
});

} 



function registrar_prove(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "ADMIN/add_registro_proveedor.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}











function pag_inicio(){

var url="NAVEGADOR/inicio.php";
var url3="NAVEGADOR/top_barra_navegador.php";
$('#contractor_de_menu').empty();
$('#axios-menu').empty();
$.post(url,function(response){
    $('#axios-container').html(response);

});

$.post(url3,function(response3){
    $('#axios-barra').html(response3);
});
    document.body.classList.toggle('sb-sidenav-toggled');
    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
} 



function imagen_loading(){
var url="NAVEGADOR/imagen_loading.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 


function pag_login(){
var url="MODULOS/LOGIN/login.php";
$.post(url,function(response){
    $('#axios-container').html(response);
    $('#boton_iniciar_sesion').empty();
});
} 


function check_login(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/LOGIN/check_login.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}

















function cambiar_imagen_perfil(id_usuario,imagen){
var url= "MODULOS/CONFIGS/cambiar_imagen_perfil.php";
$.post(url,{id_usuario:id_usuario,imagen:imagen},function(response){
   $('#alertas').html(response);
});
}
function admin_modulos(){
var url="ADMIN/Modulos.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function Activar_desactivar_modulos(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "ADMIN/suiche_de_modulos.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}

function pag_perfiles(){
var url="MODULOS/CONFIGS/perfiles.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 


function recargar_css_inicial(){
var url="CORE/CHANGER_VERSIONS.php";
$.post(url,function(response){

});
}
function indexar(){
    window.location.href='index.php';
}
function recargar_css(){
var url="CORE/CHANGER_VERSIONS.php";
$.post(url,function(response){
    location.reload();
});
}




function recargar_menu_admin(){
var url="ADMIN/menu.php";
$.post(url,function(response){
    $('#axios-menu').html(response);
});
} 

function recargar_menu_user(){
var url="NAVEGADOR/menu.php";
$.post(url,function(response){
    $('#axios-menu').html(response);
});
} 



function logueo_usuario(){
var url="USER/inicio.php";
var url2="USER/menu.php";
var url3="MODULOS/CHAT/modulo_chat.php";
var url4="MODULOS/CHAT/chat.php";

$.post(url,function(response){
    $('#axios-container').html(response);
});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response2){
    $('#modulo_chat').html(response2);
});
$.post(url4,function(response3){
    $('#chat-users').html(response3);
});
$('#chat-users').addClass('chat-content radio-esquinas-arriba is-hidden sombra');

} 

function logueo_adminffff(){
hacerbackup_and_zip();
var url="ADMIN/inicio.php";
var url2="ADMIN/menu.php";
var url3="MODULOS/CHAT/modulo_chat.php";
var url4="MODULOS/CHAT/chat.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response2){
    $('#modulo_chat').html(response2);
});
$.post(url4,function(response3){
    $('#chat-users').html(response3);
});
$('#chat-users').addClass('chat-content radio-esquinas-arriba is-hidden sombra');

} 

function update_modulos(){
var url="ADMIN/Modulos.php";
var url2="ADMIN/menu.php";
var url3="MODULOS/CHAT/modulo_chat.php";
var url4="MODULOS/CHAT/chat.php";
var url5="MODULOS/SOCIALBAR/llenado_de_barra.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response2){
    $('#modulo_chat').html(response2);
});
$.post(url4,function(response3){
    $('#chat-users').html(response3);
});

$.post(url5,function(response){
   $('#social_bar').html(response);
});

$('#chat-users').addClass('chat-content radio-esquinas-arriba is-hidden sombra');
} 

function registro_proveedor(){
var url="ADMIN/registro_proveedor.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function lista_de_proveedores(){
var url="ADMIN/lista_de_proveedores.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}
function lista_de_productos_agricolas(){
var url="ADMIN/lista_de_productos.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function lista_de_equipos(){
var url="ADMIN/lista_de_equipos.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function suiche_de_status(estatus){
var url="MODULOS/LOGIN/estatus_sesion.php";
$.post(url,{estatus:estatus},function(response){
    $('#no_respose').html(response);
});
} 





function pag_registro(){
var url="MODULOS/LOGIN/register.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function registrarme(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/LOGIN/add_registro.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}

function actualizar_registrado(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/LOGIN/update_registro.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}


function update_informacion(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/CONFIGS/actualizar_informacion_perfil.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}






function cambio_de_claves(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/CONFIGS/config_cambiar_clave.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#alertas').html(res);
});
}


function alerta_login(alerta){
    if (alerta=="registro") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Registro Exitoso!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(pag_login, 2100)
    }
    if (alerta=="registro_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Registro Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(admin_lista_de_registrados, 2100)
    }
    if (alerta=="error"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Error',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
    }

        if (alerta=="datos_erroneos"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Datos Incorrectos',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
    }
    if (alerta=="clave_no_coincide"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'La Contraseña Actual es Incorrecta.',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
    }
    if (alerta=="clave_desiguales"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'La Contraseñas Nuevas No Coinciden.',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
    }
    if (alerta=="clave_cambiada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Cambio de Contraseña Exitoso!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(pag_perfiles, 2100)
    }
    if (alerta=="actualizacion_exitosa") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Actualización Exitosa!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(pag_perfiles, 2100)
    }
}

function alertas(alerta){
    if (alerta=="registro") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Registro Exitoso!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(admin_lista_de_registrados, 2100)
    }


    if (alerta=="prove_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Registro Exitoso!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_proveedores, 2100)
    }
}