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
          <button class="btn btn-sm btn-primary sombra mx-auto" onclick="modulo_galeria_user();" ><i class="bi bi-arrow-left-circle me-1 text-md"></i>Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto text-white">
              <strong>Galería </strong><b> ( <i>Carpeta:</i> <?php echo $carpeta; ?> )</b>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1 ">
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
        <div class="card sombra" title="<?php echo $carpeta; ?> "  align="center" style="width:190px; min-width: 190px; height: 130px;max-height: 130px;">
                    <a  href="MODULOS/GALERIA/CARPETAS/<?php echo $carpeta;?>/<?php echo $imagen;?>" rel="lightbox" data-lightbox="roadtrip" >
                      <img width="98%" style="height: 120px;max-height: 120px" src="MODULOS/GALERIA/CARPETAS/<?php echo $carpeta;?>/<?php echo $imagen; ?>" alt="<?php echo $imagen; ?>"  title="<?php echo $imagen; ?>" class="mt-1 sombra">
                    </a>
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
      <div class='modal-header bg-color-principal text-center'>
        <h5 class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="nuevacarpeta_titulo_modal" class="text-center texto-blanco">Añadir Fotos a la Carpeta: <?php echo $carpeta; ?></center></h5>
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

              <button class="btn btn-primary btn-sm sombra" type="submit" form="cargmas"><i class="fas fa-upload me-1 text-md"></i>Añadir Imagen(es)</button>

</form>


        </div>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>