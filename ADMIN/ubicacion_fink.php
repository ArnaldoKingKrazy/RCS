<?php include_once("../INCLUDES/CONEXION.php"); 

  
                                   $var_consulta= "SELECT * FROM ubicacion_fink";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_ubicacion_fink=$row['id'];
                                      $latitud_ubicacion_fink=$row['latitud'];
                                      $longitud_ubicacion_fink=$row['longitud'];
                                      echo '<option value="'.utf8_encode($id_ubicacion).'">'.utf8_encode($ubicacion).'</option>';
                                    }
                                  }

 ?>
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
        <div class="row bg-dark alinear-centro centrar ver-bordes sombra ">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1   ">
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1  ">
               <strong class=" text-white">Registro de Ubicación</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-lg-1 col-md-1 col-sm-1 col-1"></div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-12">
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

          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-12 pt-5">
            <form  class="needs-validation" enctype="multipart/form-data" onsubmit="update_ubicacion_fink('update_ubikcion'); return false" id="update_ubikcion" novalidate>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Latitud:</b></span>
                    <input class="form-control form-control-sm sombra" id="latitud_mostrar"  readonly="readonly" name="latitud_solo_mostrar" value="<?php echo $latitud_ubicacion_fink;?>" type="text"  autocomplete="off" required>
                               <input class="form-control form-control-sm sombra" id="latitud_oculta"  readonly="readonly" name="latitud" value="<?php echo $latitud_ubicacion_fink;?>" type="text"  autocomplete="off" required hidden>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Longitud:</b></span>
                    <input class="form-control form-control-sm sombra" id="longitud_mostrar"  readonly="readonly" name="longitud_solo_mostrar" value="<?php echo $longitud_ubicacion_fink;?>" type="text"  autocomplete="off" required>
                    <input class="form-control form-control-sm sombra" id="longitud_oculta"  readonly="readonly" name="longitud" value="<?php echo $longitud_ubicacion_fink;?>" type="text"  autocomplete="off" required hidden>
                  </div> 
                  <center>
                  <button class="btn btn-sm btn-success sombra" type="submit" form="update_ubikcion" id="btn_confimar1" disabled>Actualizar Ubicación</button>
                </center>
              </form>




          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <table>
              <tr>
                <td>

                </td>
                <td>
 
                </td>
              </tr>
            </table>
          </div>
          
        </div>
<!--
10.2183
-67.6291
-->
        <script type="text/javascript">
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



   $("#latitud_mostrar").val(lat2dms(lat));
   $("#longitud_mostrar").val(lon2dms(lng));




 marker1.on('dragend', function(event) {
  var latlng = event.target.getLatLng();
   $("#latitud_mostrar").val(lat2dms(latlng.lat));
   $("#latitud_oculta").val(latlng.lat);
   $("#longitud_mostrar").val(lon2dms(latlng.lng));
   $("#longitud_oculta").val(latlng.lng);
   $("#btn_confimar1").removeAttr("disabled");
});

        </script>