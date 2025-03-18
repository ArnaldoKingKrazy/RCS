<?php include "../INCLUDES/CONEXION.php";
    $id = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';
include("funciones_para_llenar_siembras.php");


	$var_consulta= "SELECT * FROM siembra WHERE id='$id'";
    $respuesta = $con->query($var_consulta);
     if($respuesta->num_rows>0)
      {
       while ($row=$respuesta->fetch_array())
       {
                   $id_eliminar=$row["id"];
                   $id_unico=$row["id_unico"];
                   $titulo=$row["titulo"];
                   $id_tipo_de_siembra=$row["id_tipo_de_siembra"];
                   $id_tipo_de_semilla=$row["id_tipo_de_semilla"];
                   $id_estatus=$row["id_estatus"];
                   $id_usuario_responsable=$row["id_usuario_responsable"];
                   $id_ubicacion=$row["id_ubicacion"];
                   $id_punto=$row["id_punto"];
                   $foto_google_earth="REGISTROS_DE_SIEMBRA/".$row["foto_google_earth"];
                   $numero_de_matas=$row["numero_de_matas"];
                   $area=$row["area"];
                   $foto="REGISTROS_DE_SIEMBRA/".$row["foto"];
        }
       }



	$var_consulta2= "SELECT * FROM fechas_de_siembra WHERE id_unico_siembra='$id_unico'";
    $respuesta2 = $con->query($var_consulta2);
     if($respuesta2->num_rows>0)
      {
       while ($row2=$respuesta2->fetch_array())
       {

       }
   }



function _puntos_local($id_unico){
      include("../INCLUDES/CONEXION.php");
                            $void="";
                          $var_consulta= "SELECT * FROM ubicacion_de_ubicaciones WHERE id_unico_siembra='$id_unico' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $id_latitudes=$row["id"];
                                    $nombre_ubicacion=utf8_encode($row["nombre_ubicacion"]);
                                    $latitud=round($row["latitud"],4);
                                    $longitud=round($row["longitud"],4);

                       $void=$void.'<div style="font-size: 12px;" class="card sombra mb-3"><div class="card-tittle">
<button type="button"  data-bs-toggle="modal" data-bs-target="#modalpunto1" onclick="muestramapa('.$latitud.','.$longitud.'); acomodar_mapa();" style="margin:0px;" class="btn btn-sm btn-primary sombra"><i class="bi bi-geo-alt-fill "></i></button>
                           Punto:<b class="ms-1 me-2" style="font-size: 11px;">'.$nombre_ubicacion.'</b> Lat: <b  style="font-size: 11px;" class="ms-1 me-2" id="latitud_dms'.$id_latitudes.'"></b> Long: <b  style="font-size: 11px;" class="ms-1 me-2" id="longitud_dms'.$id_latitudes.'"></b></div></div> ';
                       echo "<script>lat_dms_html(".$id_latitudes.",".$latitud.");lon_dms_html(".$id_latitudes.",".$longitud.");</script>";
                      }
                    }
                       
                   $respuesta= $void;
  return $respuesta;
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

        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">
<button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="siembras_admin();">Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Información Siembra <?php echo $titulo;?></strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">

            
          </div>
        </div>
        <div class="row pt-3" style="background: linear-gradient(rgba(255,255,255,0.70),rgba(255,255,255,0.70)),url(<?php echo $foto; ?>); background-size: cover; height:100vh; background-attachment: fixed;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1  ">
        <div class="row">
      <div class="col-5">
        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Tipo de Siembra:</span ><b> <?php echo _tipo_de_siembra($id_tipo_de_siembra); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Semilla:</span ><b> <?php echo _tipo_de_semilla($id_tipo_de_semilla); ?></b>
          </div>
        </div>


        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Estatus:</span ><b> <?php echo _estatus($id_estatus); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Encargado:</span ><b> <?php echo _encargado($id_usuario_responsable); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Nº Semillas:</span ><b> <?php echo $numero_de_matas; ?></b>
          </div>
        </div>

      <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Área:</span ><b> <?php echo $area; ?> (Ha)</b>
          </div>
        </div>
      </div>
     
      <div class="col-5">
        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Ubicación:</span ><b> <?php echo _ubicacion($id_ubicacion); ?></b>
          </div>
        </div>
        <div class="card sombra mb-2">
           <span class="fondo_span sombra">Punto(s):</span >
        </div>

        <?php 

                          $var_consulta= "SELECT * FROM ubicacion_de_ubicaciones WHERE id_unico_siembra='$id_unico' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                	$counter = 1;
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $id_latitudes=$row["id"];
                                    $nombre_ubicacion=utf8_encode($row["nombre_ubicacion"]);
                                    $latitud=round($row["latitud"],4);
                                    $longitud=round($row["longitud"],4);

 ?>	
    <div style="font-size: 12px;" class="card sombra mb-3"><div class="card-tittle">
<button type="button"  data-bs-toggle="modal" data-bs-target="#modalpunto1<?php echo $counter;?>" onclick="muestramapa('<?php echo $latitud; ?>','<?php echo $longitud; ?>'); acomodar_mapa();" style="margin:0px;" class="btn btn-sm btn-primary sombra"><i class="bi bi-geo-alt-fill "></i></button>

          Punto:<b class="ms-1 me-2" style="font-size: 11px;"><?php echo $nombre_ubicacion;?></b> Lat: <b  style="font-size: 11px;" class="ms-1 me-2" id="latitud_dms<?php echo $id_latitudes;?>"></b> Long: <b  style="font-size: 11px;" class="ms-1 me-2" id="longitud_dms<?php echo $id_latitudes;?>"></b></div></div>

                      <script>lat_dms_html("<?php echo $id_latitudes;?>","<?php echo $latitud;?>");lon_dms_html("<?php echo $id_latitudes;?>","<?php echo $longitud;?>");</script>
                 
    <div class='modal fade text-center modal_a_cerrar modalar' id='modalpunto1<?php echo $counter;?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered modal-lg'>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>


                      <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Latitud:</b></span>
                      <input type="text"readonly="readonly" class="form-control form-control-sm sombra" name="latitud_oculta_dms" id="latitud_oculta_dms<?php echo $counter;?>" value="1" >

                          <span class="input-group-text sombra"><b>Longitud:</b></span>



                      <input type="text" readonly="readonly" class="form-control form-control-sm sombra"  name="longitud_oculta_dms" id="longitud_oculta_dms<?php echo $counter;?>" value="1" >
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
                  #map1<?php echo $counter;?>{
                    width: 100%;
                     height: 450px; 
                     box-shadow: 0px 2px 2px 2px rgba(0, 0, 0, 0.5);
                    position: flex;
                     border-radius: 10px;
                  }
                </style>
                  <div id="map1<?php echo $counter;?>"></div>
                  <script type="text/javascript">
	
						$('#modalpunto1<?php echo $counter;?>').on('shown.bs.modal', function(){
						    map1<?php echo $counter;?>.invalidateSize();
						});

						var latitud=<?php echo $latitud; ?>;
						var longitud=<?php echo $longitud; ?>;

						 var map1<?php echo $counter;?> = L.map('map1<?php echo $counter;?>').setView([latitud, longitud], 14); 
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
						googleHybrid.addTo(map1<?php echo $counter;?>);
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



						var lat = latitud;
						var lng = longitud;
						marker1 = new L.Marker([lat, lng],{draggable: false}).addTo(map1<?php echo $counter;?>);

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
						}).addTo(map1<?php echo $counter;?>);

						   $("#latitud_oculta_dms<?php echo $counter;?>").val(lat2dms(lat));
						   $("#longitud_oculta_dms<?php echo $counter;?>").val(lon2dms(lng));



						</script>
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
                       $counter++;
                      }
                    }
                    ?>































      </div>


      <div class="col-2">      
        <table width="100%" style=" height:80px; border-collapse: separate; border-spacing: 0px 5px;">
          <tr>
            <td style="height: 100%;" width="100%">
           <a href="<?php echo $foto_google_earth; ?>" data-lightbox="imagen-<?php echo $id_unico; ?>" data-title="Foto de Google Earth sombra">
           <img src="<?php echo $foto_google_earth; ?>" width="100%" height="100%" class="img-google-earth">
            </a>
            </td>
             </tr>
             <tr>
            
            <td style="height: 100%;" width="100%">
              <a href="<?php echo $foto; ?>" data-lightbox="image-<?php echo $id_unico; ?>" data-title="Foto">
              <img src="<?php echo $foto; ?>" width="100%" height="100%" class="img-google-earth">
              </a>
             
            </td>
          </tr>
        </table>
      </div>

    </div>



	      <div class="row">
	      	<div class="col-lg-4 col-md-4 col-sm-12 col-12">
	      		<div class="card sombra mb-1">
					<span class="fondo_span sombra">Fecha(s) de Siembra:</span >
				 </div>
							     	
					<?php 

							$var_consulta2= "SELECT * FROM fechas_de_siembra WHERE id_unico_siembra='$id_unico'";
						    $respuesta2 = $con->query($var_consulta2);
						    $numero_fechas = 1;
						     if($respuesta2->num_rows>0)
						      {
						       while ($row2=$respuesta2->fetch_array())
						       {
                  				 $fechas=$row2["fecha"];

							?>
			  					<div class="card sombra mb-2">
						          <div class="card-tittle ms-3">
						         
						          <i>fecha<?php echo $numero_fechas; ?>:</i><b> <?php echo $fechas; ?></b>
						          </div>
						      </div>
						      
							<?php
							$numero_fechas++;
						       }
						   }

					 ?>
  					






		      </div>

	
	      	<div class="col-lg-4 col-md-4 col-sm-12 col-12">
	      		<div class="card sombra mb-1">
	      			<span class="fondo_span sombra">Fecha(s) de Transplante:</span >
				</div>
							     	
					<?php 

							$var_consulta3= "SELECT * FROM fechas_de_transplante WHERE id_unico_siembra='$id_unico'";
						    $respuesta3 = $con->query($var_consulta3);
						    $numero_fecha3 = 1;
						     if($respuesta2->num_rows>0)
						      {
						       while ($row3=$respuesta3->fetch_array())
						       {
                  				 $fechas_t=$row3["fecha"];

							?>
			  					<div class="card sombra mb-2">
						          <div class="card-tittle ms-3">
						         
						          <i>fecha<?php echo $numero_fecha3; ?>:</i><b> <?php echo $fechas_t; ?></b>
						          </div>
						      </div>
						      
							<?php
							$numero_fechas++;
						       }
						   }

					 ?>



	      	</div>
	      	<div class="col-lg-4 col-md-4 col-sm-12 col-12"></div>




        	</div>
        </div>











