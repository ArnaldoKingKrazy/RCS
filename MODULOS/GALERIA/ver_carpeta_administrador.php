<?php 
include_once("../../INCLUDES/CONEXION.php");
$carpeta = $_POST["carpeta"];
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

<div class="col-12">
        <div class="row radius ancho100 bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  ">
          <button class="btn btn-sm btn-primary sombra mx-auto" onclick="modulo_galeria_admin();" ><i class="bi bi-arrow-left-circle me-1 text-md"></i>Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto text-white">
            <div id="pruebas_id"></div>
              <strong>Administrador de Galería </strong><b> ( <i>Carpeta:</i> <?php echo $carpeta; ?> )</b>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1 ">
            <table class="mx-auto">
              <tr>
                <td>
                   <button class="btn btn-sm btn-success sombra mx-auto" data-bs-toggle='modal' data-bs-target='#cargarmas'><i class="bi bi-plus-circle me-1 text-md"></i>Añadir<i class="bi bi-images ms-1 text-md"></i></button>
                </td>
                <td>
                  <form enctype="multipart/form-data" onsubmit="modulo_galeria_eliminar_carpeta('elimina_carpeta<?php echo $carpeta;?>'); return false" id="elimina_carpeta<?php echo $carpeta;?>">
                    <input type="text" name="id" value="<?php echo $carpeta;?>" hidden>
                    <div class="d-grid">
                      <button type="submit"  form="elimina_carpeta<?php echo $carpeta;?>" class="btn btn-sm btn-danger ms-2 sombra" ><i class="bi bi-trash mt-1 me-2 ms-2"></i></button>
                    </div>
                  </form>
                </td>
                <td>
                  <form enctype="multipart/form-data" onsubmit="modulo_galeria_descargar_carpeta('descarga<?php echo $carpeta;?>'); return false" id="descarga<?php echo $carpeta;?>">
                    <input type="text" name="carpeta" value="<?php echo $carpeta;?>" hidden>
                    <div class="d-grid">
                      <button type="submit"  form="descarga<?php echo $carpeta;?>" data-bs-toggle='modal' data-bs-target='#descarga_modal' class="btn btn-sm btn-success ms-2 sombra" ><i class="bi bi-download mt-1 me-2 ms-2"></i></button>
                    </div>
                  </form>
                </td>
              </tr>
            </table>

          </div>
      </div>


    <div class="row mt-3">

                    <?php 
                    $var_consulta2= "SELECT * FROM modulo_galeria  WHERE carpeta ='$carpeta' ORDER BY fecha ASC ";
                                  $respuesta2 = $con->query($var_consulta2);
                                    if($respuesta2->num_rows>0)
                                        {
                                     $filas = 0;
                                           while ($row2=$respuesta2->fetch_array())
                                          {
                                            $id=$row2["id"];
                                            $imagen=$row2["imagen"];
                                            $carpeta=$row2["carpeta"];
                                            ?>   
      <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
        <div class="card sombra" title="<?php echo $carpeta; ?> "  align="center" style="width:180px; min-width: 180px; height: 160px;max-height: 160px;">
                    <a  href="MODULOS/GALERIA/CARPETAS/<?php echo $carpeta;?>/<?php echo $imagen;?>" rel="lightbox" data-lightbox="roadtrip" >
                      <img width="98%" style="height: 115px;max-height: 115px" src="MODULOS/GALERIA/CARPETAS/<?php echo $carpeta;?>/<?php echo $imagen; ?>" alt="<?php echo $imagen; ?>"  title="<?php echo $imagen; ?>" class="mt-1 sombra">
                    </a>
                    <form enctype="multipart/form-data" onsubmit="modulo_galeria_eliminar_imagen_carpeta('elimina<?php echo $carpeta;?><?php echo $id;?>'); return false" id="elimina<?php echo $carpeta;?><?php echo $id;?>">
                      <input type="text" name="carpeta" value="<?php echo $carpeta;?>" hidden>
                      <input type="text" name="id_img" value="<?php echo $id;?>" hidden>
                      <button type="submit" form="elimina<?php echo $carpeta;?><?php echo $id;?>" class="btn btn-danger btn-sm ancho100 sombra mt-1" ><i class="bi bi-trash text-md"></i>Eliminar</button>
                   </form>
  
        </div>
      </div>

                    <?php 

                              }

                            }
                      ?>


      </div>
  </div>





<div class='modal fade text-center' id='cargarmas' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='modal-header bg-dark sombra text-center'>
        <h5 class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="nuevacarpeta_titulo_modal" class="text-center text-white">Añadir Fotos a la Carpeta: <?php echo $carpeta; ?></center></h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="nuevacarpeta_contenido_de_modal text-center">
            
<form class="needs-validation" enctype="multipart/form-data"  onsubmit="modulo_galeria_cargar_fotos_carpeta('cargmas'); return false" id="cargmas" novalidate>
  <input value="<?php echo $carpeta; ?>" type="text" name="nombre_carpeta" hidden>

      <div class="input-group input-group-sm mb-3 sombra radius">
            <span class="input-group-text sombra"><b>Añadir Imagen(es):</b></span>
  <input class="form-control form-control-sm form-control-danger" id="formFileSm" type="file" name="imagen[]" value=""  multiple required>

      </div>

              <button class="btn btn-success btn-sm sombra" type="submit" form="cargmas"><i class="fas fa-upload me-1 text-md"></i>Añadir Imagen(es)</button>

</form>


        </div>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>

<div class='modal fade text-center' id='descarga_modal' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='modal-header bg-info sombra text-center'>
        <h5 class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="titulo_modal" class="text-center texto-blanco">Comprimiendo Archivos en Zip Espere...</center></h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="contenido_de_modal text-center">
            
          <div id="texto_compresion" class="mt-5 mb-5"></div>


        </div>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>