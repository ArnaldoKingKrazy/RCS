function siembras_capataz(){
var url="CAPATAZ/siembras_capataz.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}


function admin_informacion_siembra(id){
var url= "REGISTROS_DE_SIEMBRA/informacion_de_siembra.php";
$.post(url,{id:id},function(response){
    $('#axios-container').html(response);
});
}
        // convert a latitude to deg and decimal minutes
          function lat2dm(input){
               if (input > 0){
                  return (deg2dm(input)+"N")
               }else{
                  return (deg2dm(input)+"S")
               }
            }


            // convert a latitude to deg and decimal minutes
            function lon2dm(input){
               if (input > 0){
                  return (deg2dm(input)+"E")
               }else{
                  return (deg2dm(input)+"O")
               }
            }

            // converts decimal degrees to degrees and decimal minutes
            // input is a float, return value a string
            function deg2dm(input) {
               var cdeg
               var cmin
               var deg = Math.floor(Math.abs(input))
               var min = (Math.abs(input) - deg)*60

               if (deg < 10) {
                    cdeg = "0"+deg 
                }else{
                    cdeg = ""+deg 
               }
 
               if (min < 10){ 
                    cmin = "0"+min.toFixed(3) 
               }else {
                    cmin = ""+min.toFixed(3) 
               }
               return(cdeg+"-"+cmin)
            }
 
            
        // convert a latitude to deg-min-sec
            function lat2dms(input){
               if (input > 0){
                  return (deg2dms(input)+"N")
               }else {
                  return (deg2dms(input)+"S")
               }
            }
 
             
 
            // convert a latitude to deg-min-sec
            function lon2dms(input){
               if (input > 0){
                  return (deg2dms(input)+"E")
               }else{
                  return (deg2dms(input)+"O")
               }
            }


 function deg2dms(input) {
               var cdeg
               var cmin    
               var csec 
               var temp = Math.abs(input)
               var deg = Math.floor(temp)
               var min = Math.floor((temp - deg)*60)
               var sec = (((temp-deg)*60)-min)*60
               if (deg < 10) { cdeg = "0"+deg }
               else {cdeg = ""+deg }

               if (min < 10) {
                    cmin = "0"+min
                 }else {
                    cmin = ""+min 
                 }
 
            
 
               if (sec < 10) { 
                    csec = "0"+sec.toFixed(1)
                     }else {
                     csec = ""+sec.toFixed(1) 
                    }
               return(cdeg+"º "+cmin+"' "+csec+"'' ")
            }





function lat_dms_html(id_latitudes,latitud){
    var latitud_respuesta = lat2dms(latitud);
$("#latitud_dms"+id_latitudes).html(latitud_respuesta);
}
function lon_dms_html(id_latitudes,longitud){
    var longitud_respuesta = lat2dms(longitud);
$("#longitud_dms"+id_latitudes).html(longitud_respuesta);
}


function registrar_orden(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "AGRONOMO/add_orden.php",
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

function ondenes_en_espera(){
var url="AGRONOMO/ordenes_en_espera.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function admin_ondenes_en_espera(){
var url="ADMIN/ordenes_en_espera.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}
function admin_ordenes_aprobadas(){
var url="ADMIN/ordenes_aprobadas.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function ordenes_aprobadas(){
var url="AGRONOMO/ordenes_aprobadas.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}


function admin_ubicacion(){
var url="ADMIN/ubicacion_fink.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}


function almacen_procutos_agricolas(){
var url="ALMACEN/procutos_agricolas.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function registro_y_control_de_siembra_admin(){
var url="REGISTROS_DE_SIEMBRA/registro_y_control_de_siembra.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
}

function siembras_admin(){
var url="REGISTROS_DE_SIEMBRA/siembras.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function ubicacion_es(id){
var url= "DESPLEGABLES/ubicacion_de_ubicaciones.php";
$.post(url,{id:id},function(response){
    $('#axios-container').html(response);
});
}

function updates_ordenes(update,id_orden){
var url= "ADMIN/update_ordenes.php";
$.post(url,{update:update,id_orden:id_orden},function(response){
    $('#alertas').html(response);
});
}




function update_ubicacion_fink(idform){
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "ADMIN/update_ubicacion.php",
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





function registrar_compra_agricola(idform){
   $(".modal_a_cerrar").modal("hide");
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "REGISTRO_DE_COMPRAS/compra_de_productos_agricolas.php",
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

function registrar_compra_equipo(idform){
   $(".modal_a_cerrar").modal("hide");
var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "REGISTRO_DE_COMPRAS/compra_de_equipo_en_general.php",
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



function add_punto_de_ubicacion(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
   url: "DESPLEGABLES/add_punto_de_ubicacion.php",
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


function add_tipo_de_siembra(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "DESPLEGABLES/add_tipo_de_siembra.php",
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

function add_ubicaciones(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "DESPLEGABLES/add_ubicaciones.php",
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

function desplegables_tipos_de_cultivo(){
var url="DESPLEGABLES/tipos_de_cultivo.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 
function desplegables_ubicaciones(){
var url="DESPLEGABLES/ubicaciones.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 
function desplegables_tipos_de_siembra(){
var url="DESPLEGABLES/tipos_de_siembra.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function registrar_producto_agricola(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "ADMIN/add_registro_producto_agricola.php",
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

function registrar_equipo_general(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "ADMIN/add_registro_equipo_general.php",
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




function registrar_siembra(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "REGISTROS_DE_SIEMBRA/add_siembra.php",
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





function add_tipo_de_cultivo(idform){

var formData = new FormData(document.getElementById(idform));
$.ajax({
    url: "DESPLEGABLES/add_tipo_de_cultivo.php",
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


function registro_producto_agricola(){
var url="ADMIN/registro_producto_agricola.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 
function registro_equipo(){
var url="ADMIN/registro_de_equipos.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function admin_eliminar_proveedor(id){
Swal.fire({
  title: '¿Seguro de Eliminar Este Proveedor?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_proveedor(id);
  }
})
}

function eliminar_proveedor(id){
var url= "ADMIN/eliminar_proveedor.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}



function eliminar_orden(id){
Swal.fire({
  title: '¿Seguro de Eliminar Esta Orden?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    elimina_ordn(id);
  }
})
}

function elimina_ordn(id){
var url= "AGRONOMO/eliminar_orden.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}









function admin_eliminar_siembra(id){
Swal.fire({
  title: '¿Seguro de Eliminar Esta Siembra?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_siembra(id);
  }
})
}

function eliminar_siembra(id){
var url= "REGISTROS_DE_SIEMBRA/eliminar_siembra.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}







function admin_eliminar_punto_de_ubicacion(id,id_ubicacion){
Swal.fire({
  title: '¿Seguro de Eliminar Este Punto?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {

    eliminar_punto_de_ubicacion(id,id_ubicacion);
  }
})
}

function eliminar_punto_de_ubicacion(id,id_ubicacion){
var url= "DESPLEGABLES/eliminar_punto_de_ubicacion.php";
$.post(url,{id:id,id_ubicacion:id_ubicacion},function(response){
    $('#alertas').html(response);
});
}


function admin_eliminar_tipo_cultivo(id){
Swal.fire({
  title: '¿Seguro de Eliminar Este Tipo de Cultivo?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_tipo_cultivo(id);
  }
})
}

function eliminar_tipo_cultivo(id){
var url= "DESPLEGABLES/eliminar_tipo_de_cultivo.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}

function admin_eliminar_tipo_siembra(id){
Swal.fire({
  title: '¿Seguro de Eliminar Este Tipo de Siembra?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_tipo_siembra(id);
  }
})
}

function eliminar_tipo_siembra(id){
var url= "DESPLEGABLES/eliminar_tipo_de_siembra.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}
function admin_eliminar_ubicaciones(id){
Swal.fire({
  title: '¿Seguro de Eliminar Esta Ubicación?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_ubicaciones(id);
  }
})
}

function eliminar_ubicaciones(id){
var url= "DESPLEGABLES/eliminar_ubicaciones.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}

function admin_eliminar_producto_agricola(id){
Swal.fire({
  title: '¿Seguro de Eliminar Este Producto?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_producto(id);
  }
})
}

function eliminar_producto(id){
var url= "ADMIN/eliminar_producto_agricola.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}



function admin_eliminar_equipos_en_general(id){
Swal.fire({
  title: '¿Seguro de Eliminar Este Equipo?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_equipo(id);
  }
})
}

function eliminar_equipo(id){
var url= "ADMIN/eliminar_equipo_en_general.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}





function seleccionar_productos_agricolas(){
  let valor ="Producto_Agricola";
  $("#tipo_producto_select option[value="+valor+"]").attr("selected",true);
  load(1);
}



function seleccionar_equipos_en_general(){
  let valor ="Equipos_en_General";
  $("#tipo_producto_select option[value="+valor+"]").attr("selected",true);
  load(1);
}



function alerta_srcs_id(alerta,id){

     if (alerta=="update") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Registro Actualizado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(ver_informacion_de_(id), 2100)
    }



      if (alerta=="ubicacion_registrada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Punto Registrado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(ubicacion_es(id), 2100)
    }
          if (alerta=="punto_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Punto Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(ubicacion_es(id), 2100)
    }
}
function modulo_admin_eliminar_registrado(id){
Swal.fire({
  title: '¿Seguro de Eliminar Esta Persona?',
  text: "Este cambio es Irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#ffc107',
  confirmButtonText: 'Si Eliminar',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    eliminar_registrados(id);
  }
})
}

function eliminar_registrados(id){
var url= "ADMIN/eliminar_registrado.php";
$.post(url,{id:id},function(response){
    $('#alertas').html(response);
});
}

function alerta_srcs(alerta){
      if (alerta=="orden_aceptada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Orden Aceptada!',
            showConfirmButton: false,
            timer: 1800,
            backdrop: false
                });
        setTimeout(admin_ondenes_en_espera, 2100);
    }
          if (alerta=="orden_declinada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Orden Declinada!',
            showConfirmButton: false,
            timer: 1800,
            backdrop: false
                });
        setTimeout(admin_ondenes_en_espera, 2100);
    }
      if (alerta=="orden_eliminada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Orden Eliminada!',
            showConfirmButton: false,
            timer: 1800,
            backdrop: false
                });
        setTimeout(ondenes_en_espera, 2100);
    }
      if (alerta=="orden_dada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Orden Emitida en Espera de Aprobación!',
            showConfirmButton: false,
            timer: 1800,
            backdrop: false
                });
        setTimeout(ondenes_en_espera, 2100);
    }

      if (alerta=="ubikcion_actualizada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Ubicación Actualizada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(admin_ubicacion, 2100)
    }

      if (alerta=="no_hay_suficiente_producto") {
        Swal.fire({
            position: 'top-center',
            icon: 'error',
             confirmButtonText: "Ok",
            title: '¡La cantidad de Producto que Posee es inferior a la que intenta utilizar!',
          
            backdrop: false
                });
    }


      if (alerta=="siembra_eliminada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Siembra Eliminada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(siembras_admin, 2100)
    }


      if (alerta=="tipo_siembra_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Tipo de Siembra Registrado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_tipos_de_siembra, 2100)
    }
      if (alerta=="ubicacion_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Ubicación Registrada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_ubicaciones, 2100)
    }
    if (alerta=="tipo_cultivo_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Tipo de Cultivo Registrado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_tipos_de_cultivo, 2100)
    }

    if (alerta=="proveedor_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Proveedor Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_proveedores, 2100)
    }


    if (alerta=="producto_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Producto Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_productos_agricolas, 2100);
    }

    if (alerta=="equipo_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Equipo Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_equipos, 2100);
     
    }




    if (alerta=="producto_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Producto Registrado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_productos_agricolas, 2100);

    }

        if (alerta=="equipo_registrado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Equipo Registrado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_equipos, 2100);
       

    }
    if (alerta=="ubicacion_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Ubicación Eliminada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_ubicaciones, 2100)
    }

    if (alerta=="tipo_de_cultivo_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Tipo de Cultivo Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_tipos_de_cultivo, 2100)
    }

    if (alerta=="tipo_de_siembra_eliminado") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Tipo de Siembra Eliminado!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(desplegables_tipos_de_siembra, 2100)
    }

    if (alerta=="siembra_registrada") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Siembra Registrada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(siembras_admin, 2100)
    }


        if (alerta=="compra_registrada_producto_agricola") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Compra Registrada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_productos_agricolas, 2100);

    }

            if (alerta=="compra_registrada_equipo_en_general") {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Compra Registrada!',
            showConfirmButton: false,
            timer: 1500,
            backdrop: false
                });
        setTimeout(lista_de_equipos, 2100);
       
    }
}

