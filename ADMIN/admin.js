function ver_informacion_de_(id){
var url="ADMIN/informacion_de_usuario.php";
$.post(url,{id:id},function(response){
     $('#axios-container').html(response);
});

}

function admin_lista_de_registrados(){
var url="ADMIN/usuarios_registrados.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});

}

function admin_temas(){
var url="ADMIN/temas.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});

} 
function admin_respaldo(){
var url="MODULOS/RESPALDOS/Home.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 



function admin_hacerbackup(){
var url="MODULOS/RESPALDOS/Backup.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}


function Guardar_nombre_de_tema(tema){
var url="ADMIN/Changer_Tema.php";
$.post(url,{tema:tema},function(response){
    recargar_css();
});

}

function admin_registro_unico(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/REGISTRO_MODULOS.php",
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
function admin_eliminarcopia(copia){
Swal.fire({
  title: '¿Seguro de Eliminar esta Copia de Seguridad?',
  text: "Este cambio puede ser Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
   eliminarbackup(copia);
  }
})
}
function eliminarbackup(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/RESPALDOS/Delete.php",
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

function admin_retaurarcopia(copia){
Swal.fire({
  title: '¿Seguro de restaurar esta Copia de Seguridad?',
  text: "Este cambio puede ser Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Restaurar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    restaurarbackup(copia);
  }
})
}

function hacerbackup_and_zip(){
var url="MODULOS/RESPALDOS/Backup_and_zip.php";
$.post(url,function(response){
    $('#alertas').html(response);
});
}

function restaurarbackup(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "MODULOS/RESPALDOS/Restore.php",
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


function modulo_admin_alerta(alerta){
    if (alerta=="registro_unico_exito") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Noticia Publicada con Exito',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
            setTimeout(modulo_noticias_admin, 2100)

    }
    if (alerta=="error_datos_server"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Error en los datos myslq',
            showConfirmButton: true,
            timer: 2000,
            backdrop: false
                });
    }
    if (alerta=="db_existe"){
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'parece que existe una base de datos con ese Nombre',
            showConfirmButton: true,
            timer: 2000,
            backdrop: false
                });
    }
    if (alerta=="backup_creado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Backup Creado Correctamente',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
        setTimeout(admin_respaldo, 2100)
    }
    if (alerta=="error"){
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Ocurrio un Error al Guardar',
                showConfirmButton: false,
                timer: 2000,
                backdrop: false
                    });
        }
    if (alerta=="eliminado_exitoso") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Eliminación Exitosa',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
        setTimeout(admin_respaldo, 2100);
    }
    if (alerta=="rastaurar_exitoso") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Restaurada Correctamente',
            showConfirmButton: false,
            timer: 2000,
            backdrop: false
                });
         setTimeout(admin_respaldo, 2100)
    }
 }