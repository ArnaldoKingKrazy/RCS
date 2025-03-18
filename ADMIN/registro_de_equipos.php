<?php include "../INCLUDES/CONEXION.php" ?>
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

<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_equipo_general('registro_produ'); return false" id="registro_produ" novalidate>
<div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">

            <button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="lista_de_equipos();">Lista de Equipos</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Registro de Nuevo Equipo</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            
<!--
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Producto:</b></span>
                      <select class="form-select form-control form-control-sm sombra" onchange="load(this.value);" name="tipo_producto_select" required>
                        <option value="" disabled selected>Seleccione un Tipo de Producto</option>
                        <option value="Producto_Agricola" >Producto Agricola</option>
                        <option value="Equipos_en_General" >Equipos en General</option>
                      </select>
                    <div class="invalid-feedback">Ingrese un Tipo de Usuario Valido</div>
                  </div>
                -->
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  "></div>
        </div>
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Proveedor:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="id_proveedor" required>
                        <option value="" disabled selected>Seleccione un Proveedor</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM proveedores";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_proveedor=$row['id'];
                                      $proveedor=$row['nombre'];
                                      $rif_proveedor=$row['rif'];
                                      echo '<option value="'.utf8_encode($id_proveedor).'">'.utf8_encode($proveedor).' ( ' .$rif_proveedor.' )</option>';
                                    }
                                  }

                                     ?>
                      </select>


                    <div class="invalid-feedback">Seleccione un Proveedor.</div>
                  </div> 


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre del Producto o Equipo:</b></span>
                    <input class="form-control form-control-sm sombra" name="nombre_producto" placeholder="Nombre de Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Serial:</b></span>
                    <input class="form-control form-control-sm sombra" name="serial" placeholder="Serial" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un Serial.</div>
                  </div>      
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Modelo:</b></span>
                    <input class="form-control form-control-sm sombra" name="modelo" placeholder="Modelo" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un Modelo.</div>
                  </div>  
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Observaciones:</b></span>
                    <textarea class="form-control form-control-sm sombra" name="observaciones" placeholder="Observaciones" rows="2" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Ingrese una observación.</div>
                  </div>
                      <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha de Compra:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha_de_compra"  type="date"  autocomplete="off" required>
                            <div class="invalid-feedback">Ingrese una Fecha.</div>

                        </div>

                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Costo de Compra:</b></span>
                          <input class="form-control form-control-sm sombra" name="costo" step="0.01" placeholder="0.0" type="number"  autocomplete="off" required>
                            <div class="invalid-feedback">Ingrese un costo.</div>

                        </div>

</div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="registro_produ"><i class="bi bi-plus me-1 text-md"></i>Registrar Equipo</button>
            </div>
    </div>









   </form>

