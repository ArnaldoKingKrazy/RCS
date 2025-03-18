function modulo_galeria_admin(){

var url="MODULOS/GALERIA/administrador_galeria_inicio.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function modulo_galeria_user(){
var url="MODULOS/GALERIA/user_galeria_inicio.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function modulo_galeria_crear_carpeta(idform){
 $("#nuevacarpeta").modal("hide");
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/crear_carpeta.php",
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
function modulo_galeria_descargar_carpetas(carpeta){
var url= "MODULOS/descargar_carpeta.php";
$.post(url,{carpeta:carpeta},function(response){
    $('#pruebas_id').html(response);
});
}
function modulo_galeria_descargar_carpeta(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/descargar_carpeta.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#pruebas_id').html(res);
});
}

function muestra_texto_descarga(texto_recibido){
    $('#texto_compresion').html(texto_recibido);
}

function modulo_galeria_eliminar_carpeta(id){
Swal.fire({
  title: '¿Seguro de Eliminar esta Carpeta?',
  text: "Este cambio puede ser Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   eliminar_carpeta_galeria(id);
  }
})
}

function eliminar_carpeta_galeria(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/eliminar_carpeta.php",
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

function modulo_galeria_ver_carpeta_id(carpeta){
var url= "MODULOS/GALERIA/ver_carpeta_administrador.php";
$.post(url,{carpeta:carpeta},function(response){
    $('#axios-container').html(response);
});
}

function admin_reset_galeria(){
Swal.fire({
  title: '¿Seguro de Resetear el Modulo de Galeria?',
  text: "Este cambio Es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Resetear',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   reset_galeria();
  }
})
}
function reset_galeria(){
var url="MODULOS/GALERIA/reset.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}


function modulo_galeria_ver_carpeta(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/ver_carpeta_administrador.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#axios-container').html(res);
});
}
function modulo_galeria_ver_carpeta_user(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/ver_carpeta_user.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(res){
$('#axios-container').html(res);
});
}


function modulo_galeria_cargar_fotos_carpeta(idform){
 $("#cargarmas").modal("hide");
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/cargar_fotos_carpeta.php",
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

function modulo_galeria_eliminar_imagen_carpeta(idform){

Swal.fire({
  title: '¿Seguro de Eliminar Esta Imagen?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_imagen_res(idform);
  }
})
}

function eliminar_imagen_res(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/GALERIA/eliminar_imagen_carpeta.php",
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



function modulo_galeria_alerta(alerta){
    if (alerta=="imagen_subida") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Imagen(es) Subida(s) con Exito',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
    }

    if (alerta=="error"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Error',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
    }


	if (alerta=="proceso_terminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Proceso Terminado',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(modulo_galeria_admin, 2100)
    }

	if (alerta=="existe"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Ya existe una Carpeta con ese Nombre',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
    }

    if (alerta=="carpeta_eliminada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'La Carpeta se Elimino  Correctamente',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
        setTimeout(modulo_galeria_admin, 2100)
    }
}