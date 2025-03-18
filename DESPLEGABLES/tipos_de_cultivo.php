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
    <div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">

          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Tipos de Cultivos</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-2  mx-auto ">
    <form class="needs-validation"  enctype="multipart/form-data"  onsubmit="add_tipo_de_cultivo('addcaten'); return false" id="addcaten" novalidate>
                <div class="input-group input-group-sm mb-3">
       <span class="input-group-text sombra"><i class="far fa-list-alt me-1 text-md"></i> Tipo de Cultivo</span>
        <input class="form-control form-control-sm sombra"  placeholder="Tipo de Cultivo..." type="text" name="tipo_de_cultivo" autocomplete="off"  required>
          <button class="btn btn-success btn-sm input-group-button sombra" type="submit" form="addcaten"  ><i class="fas fa-plus-circle me-1 text-md"></i>Agregar</button>
          <div class="invalid-feedback">Ingrese un Tipo de Cultivo.</div>
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
                      <th>Cultivos</th>
                      <th class="text-center">*</th>
                    </tr>

                    <?php 
                          $var_consulta= "SELECT * FROM tipos_de_cultivos ORDER BY tipo_de_cultivo ASC ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                  $num = 1;
                                   while ($row=$respuesta->fetch_array())
                                  {
                                    $id_eliminar=$row["id"];
                                    $tipo_de_cultivo=utf8_encode($row["tipo_de_cultivo"]);
       
                      ?>
                                <tr class="ar-cursor-pointer">
                                 <td> <?php echo $num; ?></td>
                                 <td> <?php echo $tipo_de_cultivo; ?></td>
                                 <td class="text-center">
                                   <a href="#" class="btn btn-sm btn-danger sombra" onclick="admin_eliminar_tipo_cultivo('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>
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