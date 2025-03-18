function admin_quienes_somos(){
var url="MODULOS/ABOUT/quienes_somos_form.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function about_quienes_somos(){
var url="MODULOS/ABOUT/quienes_somos.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 
function admin_about_contacto(){
var url="MODULOS/ABOUT/mensajes.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function about_contacto(){
var url="MODULOS/ABOUT/contacto.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function about_contacto_user(){
var url="MODULOS/ABOUT/contacto_user.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 


function guardar_quienes_somos(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/ABOUT/add_quienes_somos.php",
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
function envio_de_mensaje_contacto(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/ABOUT/add_contacto.php",
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

function respuesta_al_correo(idform){
     $(".modal_a_cerrar").modal("hide");
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/ABOUT/respuesta_a_mensaje.php",
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


function modulo_about_eliminar_mensaje(id){
Swal.fire({
  title: '¿Seguro de Eliminar este mensaje?',
  text: "no podra recuperarlo",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   about_eliminar_mensaje(id);
  }
})
}

function about_eliminar_mensaje(id){
var url="MODULOS/ABOUT/eliminar_mensaje.php";
$.post(url,{id:id},function(response){
   $('#alertas').html(response); 
});

}


function admin_reset_quienes_about(){
Swal.fire({
  title: '¿Seguro de Resetear Quienes Somos?',
  text: "Este cambio Es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Resetear',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   reset_quienes_about();
  }
})
}
function reset_quienes_about(){
var url="MODULOS/ABOUT/reset_quienes.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}

function admin_reset_contacto_about(){
Swal.fire({
  title: '¿Seguro de Resetear Contacto?',
  text: "Este cambio Es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Resetear',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   reset_contacto_about();
  }
})
}
function reset_contacto_about(){
var url="MODULOS/ABOUT/reset_contacto.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}

function admin_reset_about(){
Swal.fire({
  title: '¿Seguro de Resetear modulo about?',
  text: "(Contacto , Quienes somos)",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Resetear',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   reset_about();
  }
})
}


function admin_vaciar_mensajes_about(){
Swal.fire({
  title: '¿Seguro Borrar Todos los mensajes?',
  text: "Este cambio Es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Borrar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   vaciar_mensajes();
  }
})
}

function vaciar_mensajes(){
var url="MODULOS/ABOUT/vacia_mensajes.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}

function reset_about(){
var url="MODULOS/ABOUT/reset.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}

function alerta_about(alerta){
    if (alerta=="add_correcto") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Información actualizada con exito',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(admin_quienes_somos, 2100)

    }
    if (alerta=="error"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Ocurrio un error al actualizar',
            showConfirmButton: true,
            timer: 2000,
            backdrop: false
                });
    }

    if (alerta=="contacto_exitoso") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Mensaje Enviado con exito',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(about_contacto, 2100)

    }
    if (alerta=="contacto_exito_2") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Mensaje Enviado con exito',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(about_contacto_user, 2100)

    }
    if (alerta=="borrado_exitoso") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Borrado exitoso',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(admin_about_contacto, 2100)

    }
        if (alerta=="update_mensajes") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Respuesta Enviada',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(admin_about_contacto, 2100)

    }
}