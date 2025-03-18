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

<?php 
$id_ubicacion_ubicaciones=$_POST["id"];


 $var_consulta2= "SELECT * FROM ubicaciones WHERE id='$id_ubicacion_ubicaciones' ";
                          $respuesta = $con->query($var_consulta2);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {
                                    $id_eliminar=$row["id"];
                                    $ubicacion=utf8_encode($row["ubicacion"]);
       
                          }
                      }
 ?>





</script>
    <div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">
<button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="desplegables_ubicaciones();">Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Ubicación <?php echo $ubicacion; ?></strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-2  mx-auto ">
    <form class="needs-validation"  enctype="multipart/form-data"  onsubmit="add_punto_de_ubicacion('addcaten'); return false" id="addcaten" novalidate>
                <div class="input-group input-group-sm mb-3">
       <span class="input-group-text sombra"><i class="far fa-list-alt me-1 text-md"></i>Puntos</span>
        <input class="form-control form-control-sm sombra"  placeholder="Punto..." type="text" name="punto" autocomplete="off"  required>
        <input type="number" name="id_ubicaciones" value="<?php echo $id_ubicacion_ubicaciones; ?>" hidden>
          <button class="btn btn-success btn-sm input-group-button sombra" type="submit" form="addcaten"  ><i class="fas fa-plus-circle me-1 text-md"></i>Agregar</button>
          <div class="invalid-feedback">Ingrese un punto.</div>
      </div>
    </form>
          </div>
        </div>
        <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
              <div class="dentro-noti-over-scroll">
                <div class="table-responsive">

                  <table class=" table table-sm table-bordered table-hover sombra align-middle">
                    <tr>
                      <th width="50px">º</th>
                      <th>Punto</th>
                      <th class="text-center">*</th>
                    </tr>

                    <?php 
                          $var_consulta= "SELECT * FROM ubicacion_de_ubicaciones WHERE id_ubicaciones='$id_ubicacion_ubicaciones' ORDER BY nombre_ubicacion ASC ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                  $num = 1;
                                   while ($row=$respuesta->fetch_array())
                                  {
                                    $id_eliminar=$row["id"];
                                    $nombre_ubicacion=utf8_encode($row["nombre_ubicacion"]);
       
                      ?>
                                <tr class="ar-cursor-pointer">
                                 <td> <?php echo $num; ?></td>
                                 <td> <?php echo $nombre_ubicacion; ?></td>
                                 <td class="text-center">
                                   <a href="#" class="btn btn-sm btn-danger sombra" onclick="admin_eliminar_punto_de_ubicacion('<?php echo $id_eliminar; ?>','<?php echo $id_ubicacion_ubicaciones; ?>');"><i class="bi bi-trash "></i></a>
                                 </td>
                               </tr>
                      <?php
                      $num++;
                      }
                    }
                      ?>


                  </table>
                </div>
              </div>
          </div>
        </div>
        </div>