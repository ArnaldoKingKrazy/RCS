           <?php include_once("../INCLUDES/CONEXION.php"); ?>
    <script type="text/javascript">
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
</script>

<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_siembra('registro_siembras'); return false" id="registro_siembras" novalidate>
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">

          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Registro de Siembra</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Titulo:</b></span>
                    <input class="form-control form-control-sm sombra" name="titulo" id="titulo_guardar" placeholder="Nombre para la siembra" type="text"  autocomplete="off" required hidden>
                    <input class="form-control form-control-sm sombra" name="titulo_mostrar"  id="titulo_mostrar" placeholder="Automatico" type="text"  autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese un Titulo</div>
                  </div>

                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Responsable:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra"  name="agronomo_id"  required>
                        <option value="" disabled selected>Seleccione un Agronomo</option>
                                    <?php      
                                   $var_consulta= "SELECT * FROM usuarios WHERE tipo='4' ORDER BY nombre";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_usuario=$row['id'];
                                      $nombre=$row['nombre'];
                                      $apellido=$row['apellido'];
                                      echo '<option value="'.utf8_encode($id_usuario).'">'.utf8_encode($nombre).' '.utf8_encode($apellido).'</option>';
                                    }
                                  }

                                     ?>


                      </select>
                    <div class="invalid-feedback">Seleccione un Responsable.</div>
                  </div>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Siembra:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="tipo_de_siembra" required>
                        <option value="" disabled selected>Seleccione un Tipo de Siembra</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM tipo_de_siembra";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_tipo_de_siembra=$row['id'];
                                      $tipo_de_siembra=$row['tipo_de_siembra'];
                                      echo '<option value="'.utf8_encode($id_tipo_de_siembra).'">'.utf8_encode($tipo_de_siembra).'</option>';
                                    }
                                  }

                                     ?>
                      </select>
                    <div class="invalid-feedback">Seleccione un Tipo de Siembra.</div>
                  </div>  
          

                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Proveedor:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" onchange="load(this.value);" name="proveedor" required>
                        <option value="" disabled selected>Seleccione un Proveedor</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM proveedores";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_proveedor=$row['id'];
                                      $nombre=$row['nombre'];
                                      echo '<option value="'.utf8_encode($id_proveedor).'">'.utf8_encode($nombre).'</option>';
                                    }
                                  }

                                     ?>
                      </select>
                    <div class="invalid-feedback">Seleccione un Proveedor.</div>
                  </div>  

                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Semilla:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" onchange="cambiar_titulo();" name="tipo_semilla" id="select_tipo_semilla" required>
                        <option value="" disabled selected>Seleccione una Semilla</option>

                      </select>
                    <div class="invalid-feedback">Seleccione una Semilla.</div>
                  </div> 

                     <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Cant. de Producto:</b></span>
                    <input class="form-control form-control-sm sombra" name="cantidad_restar" min="1"  placeholder="cantidad de producto a usar" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un numero.</div>
                  </div>


                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Estatus:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra"  name="estatus" required>
                        <option value="" disabled selected>Seleccione un Estatus</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM estatus_de_la_siembra";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_estatus=$row['id'];
                                      $estatus=$row['estatus'];
                                      echo '<option value="'.utf8_encode($id_estatus).'">'.utf8_encode($estatus).'</option>';
                                    }
                                  }

                                     ?>
                      </select>
                    <div class="invalid-feedback">Seleccione un Estatus.</div>
                  </div>  


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Semillas Sembradas:</b></span>
                    <input class="form-control form-control-sm sombra" name="numero_de_matas" placeholder="Numero de semillas" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un numero.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Área:</b></span>
                    <input class="form-control form-control-sm sombra" name="area" placeholder="Área" type="text"  autocomplete="off" required>
                    <span class="input-group-text sombra"><b>(Ha):</b></span>

                    <div class="invalid-feedback">Ingrese un area.</div>
                  </div>




       </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-12">


                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Ubicación:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="ubicacion"  required>
                        <option value="" disabled selected>Seleccione una Ubicación</option>
                                    <?php      
                                   $var_consulta= "SELECT * FROM ubicaciones ORDER BY ubicacion";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_ubicacion=$row['id'];
                                      $ubicacion=$row['ubicacion'];
                                      echo '<option value="'.utf8_encode($id_ubicacion).'">'.utf8_encode($ubicacion).'</option>';
                                    }
                                  }

                                     ?>


                      </select>
                    <div class="invalid-feedback">Seleccione una Ubicación.</div>
                  </div>





                    <table width="100%" class="mt-2">
                      <tr>
                        <td width="10%"><a href="#" id="btn0" class="btn btn-sm btn-danger sombra" onclick="desactivar_btns(); restar_punto();"><i class="bi bi-dash-circle sombra-b"></i></a></td>
                    
                        <td width="80%"><span class="input-group-text sombra mb-2"> <b class="text-center">Punto(s):</b>  </span> </td>
                        <td width="10%"><a href="#" id="btn1" class="btn btn-sm btn-success sombra" onclick="desactivar_btns(); sumar_punto();"><i class="bi bi-plus-circle sombra-b"></i></a></td>
                      </tr>
                    </table>

                    <div id="puntos_puntos" class="mb-3">
                      <input type="number" name="contador_punto" id="contador_punto" value="1" hidden>



                      <span class="input-group-text sombra"><b>Punto:</b></span>
                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">

                          <span class="input-group-text sombra"></span>

                        <input style="min-width: 80px;" class="form-control form-control-sm sombra" style="font-size: 11px;" placeholder="Punto" name="punto_1"  type="text"  autocomplete="off" required>

                          <span class="input-group-text sombra"></span>

                          <input class="form-control form-control-sm sombra"  readonly="readonly" style="font-size: 11px;" placeholder="Latitud" name="latitud_1_mostrar" id="latitud_mostrar1" type="text"  autocomplete="off" required>
                          <input class="form-control form-control-sm sombra" placeholder="Latitud" name="latitud_1" id="latitud1" type="text"  autocomplete="off" required hidden>

                          <span class="input-group-text sombra"><button type="button" data-bs-toggle='modal' onclick="selector_de_punto('1');" data-bs-target='#modalpunto1' class="btn btn-sm btn-primary sombra"><i class="bi bi-geo-alt-fill "></i></button></span>

                          <input class="form-control form-control-sm sombra" readonly="readonly"  placeholder="Longitud" style="font-size: 11px;" name="longitud_1_mostrar" id="longitud_mostrar1"  type="text"  autocomplete="off" required>
                          <input class="form-control form-control-sm sombra" placeholder="Longitud" name="longitud_1" id="longitud1"  type="text"  autocomplete="off" required hidden>
                        </div>




</div>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-12">

       


                    <span class="input-group-text sombra mb-2"><b>Foto de Google Earth:</b></span>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">

                         
                          <input class="form-select form-control form-control-sm sombra" type='file'  name='foto_earth' id="foto" accept="image/*" class='text-black form-control sombra-b'  required>
                    <div class="invalid-feedback">Ingrese una imagen.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Foto:</b></span>
                          
                          <input class="form-select form-control form-control-sm sombra" type='file'  name='foto' id="foto2" accept="image/*" class='text-black form-control sombra-b'  required>
                    
                    <div class="invalid-feedback">Ingrese una imagen.</div>
                  </div>
                    <table width="100%">
                      <tr>
                        <td width="10%"><a href="#" id="boton1" class="btn btn-sm btn-danger sombra" onclick="desactivar_botones(); restar_fecha();"><i class="bi bi-dash-circle sombra-b"></i></a></td>
                    
                        <td width="80%"><span class="input-group-text sombra mb-2"> <b class="text-center">Fechas de Siembra:</b>  </span> </td>
                        <td width="10%"><a href="#" id="boton2" class="btn btn-sm btn-success sombra" onclick="desactivar_botones(); sumar_fecha();"><i class="bi bi-plus-circle sombra-b"></i></a></td>
                      </tr>
                    </table>
                    <div id="fechas_siembra" class="mb-3">
                      <input type="number" name="contador" id="contador" value="1" hidden>
                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha:</b></span>
                          <input class="form-control form-control-sm sombra" id="fecha_title" onchange="cambiar_titulo();" name="fecha1"  type="date"  autocomplete="off" required>
                        </div>
                  </div>
                  <br><br>
                    <table width="100%" class="mt-2">
                      <tr>
                        <td width="10%"><a href="#" id="boton3" class="btn btn-sm btn-danger sombra" onclick="desactivar_botones(); restar_fecha_t();"><i class="bi bi-dash-circle sombra-b"></i></a></td>
                    
                        <td width="80%"><span class="input-group-text sombra mb-2"> <b class="text-center">Fechas de Transplante:</b>  </span> </td>
                        <td width="10%"><a href="#" id="boton4" class="btn btn-sm btn-success sombra" onclick="desactivar_botones(); sumar_fecha_t();"><i class="bi bi-plus-circle sombra-b"></i></a></td>
                      </tr>
                    </table>

                    <div id="fechas_transplante" class="mb-3">
                      <input type="number" name="contador_ft" id="contador_ft" value="1" hidden>
                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha_tansplante1"  type="date"  autocomplete="off" required>
                        </div>
                  </div>
          </div>
        </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
        <button class="btn btn-success btn-sm sombra" type="submit" form="registro_siembras">Registrar Siembra</button>
        <br><br>
      </div>
       </div>
     </form>
                      <input type="text" name="latitud_oculta" id="latitud_oculta" value="1" hidden>

                      <input type="text" name="longitud_oculta" id="longitud_oculta" value="1" hidden>
                      
                      <input type="number" name="punto_selected" id="punto_selected" value="0" hidden>
<div class='modal fade text-center modal_a_cerrar' id='modalpunto1' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered modal-lg'>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>


                      <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Latitud:</b></span>
                      <input type="text"readonly="readonly" class="form-control form-control-sm sombra" name="latitud_oculta_dms" id="latitud_oculta_dms" value="1" >

                          <span class="input-group-text sombra"><b>Longitud:</b></span>



                      <input type="text" readonly="readonly" class="form-control form-control-sm sombra"  name="longitud_oculta_dms" id="longitud_oculta_dms" value="1" >
                      </div>

        <b class='modal-title titulo_modal' id='EditModalLabel text-center'></b>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container'>
           <center>
          <table width="600px" style="height: 450px;">
            <tr>
              <td width="100%">
                <style type="text/css">
                  #map1{
                    width: 100%;
                     height: 450px; 
                     box-shadow: 0px 2px 2px 2px rgba(0, 0, 0, 0.5);
                    position: flex;
                     border-radius: 10px;
                  }
                </style>
                  <div id="map1"></div>
              </td>
            </tr>
          </table>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-success sombra" id="btn_confimar1" onclick="llenar_lat_long();" data-bs-dismiss="modal" disabled>Confirmar</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php 
  
                                   $var_consulta= "SELECT * FROM ubicacion_fink";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_ubicacion_fink=$row['id'];
                                      $latitud_ubicacion_fink=$row['latitud'];
                                      $longitud_ubicacion_fink=$row['longitud'];
                                      
                                    }
                                  }

                          
 ?>

        <script type="text/javascript">
          



            function load(id_proveedor){
              var parametros = {"action":"ajax","id_proveedor":id_proveedor};
              $.ajax({
                url:'REGISTROS_DE_SIEMBRA/llenar_select_semilla.php',
                data: parametros,
                success:function(data){
                  $("#select_tipo_semilla").html(data);
                }
              })

            }



            function restar_fecha(){
              var contador =$("#contador").val();
              if (contador >=2) {
                $('#input_fecha_'+contador).remove();
                $("#contador").val(parseInt(contador)-1);
              }
            }

            function sumar_fecha(){
              var contador =$("#contador").val();

            var parametros = {"action":"ajax","contador":contador};
              $.ajax({
                url:'REGISTROS_DE_SIEMBRA/sumar_input_fecha.php',
                data: parametros,
                success:function(data){
                  $("#fechas_siembra").append(data);
                $("#contador").val(parseInt(contador)+1);

                }
              })
            }



            function restar_fecha_t(){
              var contador_ft =$("#contador_ft").val();
              if (contador_ft >=2) {
                $('#input_fecha_t_'+contador_ft).remove();
                $("#contador_ft").val(parseInt(contador_ft)-1);

              }
            }

            function sumar_fecha_t(){
              var contador_ft =$("#contador_ft").val();

            var parametros = {"action":"ajax","contador_ft":contador_ft};
              $.ajax({
                url:'REGISTROS_DE_SIEMBRA/sumar_input_fecha_transplante.php',
                data: parametros,
                success:function(data){
                  $("#fechas_transplante").append(data);
                $("#contador_ft").val(parseInt(contador_ft)+1);
                }
              })
            }

            function desactivar_botones(){
              $("#boton1").addClass('disabled');
              $("#boton2").addClass('disabled');
              $("#boton3").addClass('disabled');
              $("#boton4").addClass('disabled');
              setTimeout(activar_botones, 500);
            }

            function activar_botones(){
              $("#boton1").removeClass('disabled');
              $("#boton2").removeClass('disabled');
              $("#boton3").removeClass('disabled');
              $("#boton4").removeClass('disabled');
            }

            function desactivar_btns(){
              $("#btn0").addClass('disabled');
              $("#btn1").addClass('disabled');
              setTimeout(activar_btns, 500);
            }

            function activar_btns(){
              $("#btn0").removeClass('disabled');
              $("#btn1").removeClass('disabled');

            }



            function restar_punto(){
              var contador_punto =$("#contador_punto").val();
              if (contador_punto >=2) {
                $('#input_puntos'+contador_punto).remove();
                $('#span_puntos'+contador_punto).remove();
                $("#contador_punto").val(parseInt(contador_punto)-1);

              }
            }

            function sumar_punto(){
              var contador_punto =$("#contador_punto").val();

            var parametros = {"action":"ajax","contador_punto":contador_punto};
              $.ajax({
                url:'REGISTROS_DE_SIEMBRA/sumar_punto.php',
                data: parametros,
                success:function(data){
                  $("#puntos_puntos").append(data);
                $("#contador_punto").val(parseInt(contador_punto)+1);
                }
              })
            }



$('#modalpunto1').on('shown.bs.modal', function(){
    map1.invalidateSize();
});

           var map1 = L.map('map1')
  .setView([<?php echo $latitud_ubicacion_fink;?>, <?php echo $longitud_ubicacion_fink;?>], 11); 
/*
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map1);
*/
// Capas base

// Streets
googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

// Hybrid
googleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
googleHybrid.addTo(map1);
// Satellite
googleSat = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

// Terrain
googleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});



var lat = <?php echo $latitud_ubicacion_fink;?>;
var lng = <?php echo $longitud_ubicacion_fink;?>;
marker1 = new L.Marker([lat, lng],{draggable: true}).addTo(map1);

var baseMaps = {
    "Hybrid": googleHybrid,
    "Streets": googleStreets,
    "Satellite":googleSat,
    "Terrain":googleTerrain

};

var overlayMaps = {
    
};

L.control.layers(baseMaps, overlayMaps,{
    position: 'topright', // 'topleft', 'bottomleft', 'bottomright'
    collapsed: true // true
}).addTo(map1);


var lat = <?php echo $latitud_ubicacion_fink;?>;
var lng = <?php echo $longitud_ubicacion_fink;?>;
   $("#latitud_oculta_dms").val(lat2dms(lat));
   $("#longitud_oculta_dms").val(lon2dms(lng));





 marker1.on('dragend', function(event) {
  var latlng = event.target.getLatLng();
   $("#latitud_oculta_dms").val(lat2dms(latlng.lat));
   $("#latitud_oculta").val(latlng.lat);
   $("#longitud_oculta_dms").val(lon2dms(latlng.lng));
   $("#longitud_oculta").val(latlng.lng);
   $("#btn_confimar1").removeAttr("disabled");
});


          function selector_de_punto(punto){
            $("#punto_selected").val(punto);
          }
          
function llenar_lat_long(){
var longi_dms=$("#longitud_oculta_dms").val();
var longi=$("#longitud_oculta").val();
var lati=$("#latitud_oculta").val();
var lati_dms=$("#latitud_oculta_dms").val();
var punto=$("#punto_selected").val();
$("#longitud"+punto).val(longi);
$("#longitud_mostrar"+punto).val(longi_dms);
$("#latitud"+punto).val(lati);
$("#latitud_mostrar"+punto).val(lati_dms);

}

function consultar_el_name(consulta){

var url= "REGISTROS_DE_SIEMBRA/consultar_nombre_siembras.php";
$.post(url,{consulta:consulta},function(response){
    $('#titulo_mostrar').val(response);
    $('#titulo_guardar').val(response);
});
}

function cambiar_titulo(){
  
let selectValue = $("#select_tipo_semilla").find("option:selected").attr('id');
let fechaValue=$("#fecha_title").val();

  var mes;
 var pieces = fechaValue.split("-");


if (selectValue==null) {
  selectValue="";
}

if (fechaValue!="") {

  if (parseInt(pieces[1])==1) {mes="ENERO";}
  if (parseInt(pieces[1])==2) {mes="FEBRERO";}
  if (parseInt(pieces[1])==3) {mes="MARZO";}
  if (parseInt(pieces[1])==4) {mes="ABRIL";}
  if (parseInt(pieces[1])==5) {mes="MAYO";}
  if (parseInt(pieces[1])==6) {mes="JUNIO";}
  if (parseInt(pieces[1])==7) {mes="JULIO";}
  if (parseInt(pieces[1])==8) {mes="AGOSTO";}
  if (parseInt(pieces[1])==9) {mes="SEPTIEMBRE";}
  if (parseInt(pieces[1])==10) {mes="OCTUBRE";}
  if (parseInt(pieces[1])==11) {mes="NOVIEMBRE";}
  if (parseInt(pieces[1])==12) {mes="DICIEMBRE";}

}else{
  mes ="";
}


  $("#titulo_mostrar").val(selectValue+mes+pieces[0]);
  $("#titulo_guardar").val(selectValue+mes+pieces[0]);


var consulta=selectValue+mes+pieces[0];


if (selectValue!="" && mes!=""){
  consultar_el_name(consulta);
}



}




</script>