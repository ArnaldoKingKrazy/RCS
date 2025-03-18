<?php 
 include("../INCLUDES/CONEXION.php");
  include("funciones_para_llenar_siembras.php");

    $id_unico_siembra = (isset($_REQUEST['id_unico_siembra'])&& $_REQUEST['id_unico_siembra'] !=NULL)?$_REQUEST['id_unico_siembra']:'';



                  $var_consulta= "SELECT * FROM siembra WHERE id_unico='$id_unico_siembra' ";
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

 ?>

<a href='#' data-bs-toggle='modal' data-bs-target='#modal_siembra_info_<?php echo $id_unico; ?>'><?php echo $titulo; ?></a>

 <div class='modal fade  modal_a_cerrar' id='modal_siembra_info_<?php echo $id_unico; ?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered modal-xl'>
    <div class='modal-content'>
      <div class='modal-header bg-4 fondo_verdecito'>
        <b class='modal-title titulo_modal' id='EditModalLabel '> <?php echo $titulo; ?> </b>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
     	<div class="card sombra">
     		<div class="card-body">
     			
     		
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
           <span class="fondo_span sombra">Área:</span ><b> <?php echo $area; ?> m2</b>
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

        <?php echo _puntos($id_unico); ?>


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
</div>
     	</div>




      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-sm btn-secondary sombra'  data-bs-dismiss='modal' >Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>



