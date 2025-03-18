<?php include_once("Connet.php");?>
<div class="col-12">
        <div class="row radius bg-dark  mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center">
              <strong class="text-center text-white">Respado de Sistema y Base de Datos</strong>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center">
            <div class="card sombra border-success" >
              <div class="card-body" style="height: 250px;">
                <h6 class="card-title bg-success p-2 sombra">Crear Respaldo BD</h6>
                  <a href="#" onclick="admin_hacerbackup();" class="btn btn-success sombra mt-5"><i class="bi bi-database me-1 text-md me-1"></i>Crear Copia</a>
              </div>
            </div>

          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center">
            <div class="card sombra border-warning" >
              <div class="card-body" style="height: 250px;">
                <h6 class="card-title bg-warning p-2 sombra">Restaurar Respaldo BD</h6>
                <form class="needs-validation" enctype='multipart/form-data' onsubmit='admin_retaurarcopia("restau"); return false'id='restau' novalidate>
                  <div class="input-group mb-3 mt-5">
                        <span class="input-group-text sombra"><i class="bi bi-database me-1 text-md"></i></span>
                        <select name="restorePoint" class="form-control form-control-sm  sombra" required>
                            <option value="" disabled="" selected>Elija punto a restaurar</option>
                            <?php
                              $ruta=BACKUP_PATH;
                              if(is_dir($ruta)){
                                  if($aux=opendir($ruta)){
                                      while(($archivo = readdir($aux)) !== false){
                                          if($archivo!="."&&$archivo!=".."){
                                              $nombrearchivo=str_replace(".sql", "", $archivo);
                                              $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                              $ruta_completa=$ruta.$archivo;
                                              if(is_dir($ruta_completa)){
                                              }else{
                                                  echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                              }
                                          }
                                      }
                                      closedir($aux);
                                  }
                              }else{
                                  echo $ruta." No es ruta válida";
                              }
                            ?>
                        </select>
                          <button type="submit" class="btn btn-warning sombra" >Restaurar</button>
                      </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center">
            <div class="card sombra border-danger" >
              <div class="card-body" style="height: 250px;">
                <h6 class="card-title bg-danger p-2 sombra">Eliminar Respaldo BD</h6>
                <form class="needs-validation" enctype='multipart/form-data' onsubmit='admin_eliminarcopia("elimim"); return false'id='elimim' novalidate>
                  <div class="input-group mb-3 mt-5">
                        <span class="input-group-text sombra"><i class="bi bi-database me-1 text-md"></i></span>
                        <select name="restorePoint" class="form-control form-control-sm sombra" required >
                                <option value="" disabled="" selected>Elija punto a eliminar</option>
                                  <?php
                                    $ruta=BACKUP_PATH;
                                    if(is_dir($ruta)){
                                        if($aux=opendir($ruta)){
                                            while(($archivo = readdir($aux)) !== false){
                                                if($archivo!="."&&$archivo!=".."){
                                                    $nombrearchivo=str_replace(".sql", "", $archivo);
                                                    $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                                    $ruta_completa=$ruta.$archivo;
                                                    if(is_dir($ruta_completa)){
                                                    }else{
                                                        echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                                    }
                                                }
                                            }
                                            closedir($aux);
                                        }
                                    }else{
                                        echo $ruta." No es ruta válida";
                                    }
                                  ?>
                          </select>
                            <button type="submit" class="btn btn-danger sombra" >Eliminar</button>
                   </div>
                  </form>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center">
            <div class="card sombra border-secondary" >
              <div class="card-body" style="height: 250px;">
                <h6 class="card-title bg-secondary text-white ver-bordes border-info p-2 sombra mb-5"><b>Descargar Respaldo Completo del Sistema en Zip</b></h6>
                  <?php 
                      if (file_exists("zip/Backup_del_Sistema_RCS.zip")) {
                       ?>
                        <a href="MODULOS/RESPALDOS/zip/Backup_del_Sistema_RCS.zip" onclick="" class="btn btn-secondary sombra ver-bordes border-info"><i class="bi bi-download me-1 text-md"></i>Descargar Copia de Sistema Zip</a>
                      <?php 
                      }else{
                        ?>
                        <strong class="mt-5">El Servidor Esta Comprimiendo un Archivo Actualizado</strong>
                        <i>Vuelve en unos Minutos</i>
                        <?php
                      }


                       ?>
              </div>
            </div>

          </div>
      </div>
</div>
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