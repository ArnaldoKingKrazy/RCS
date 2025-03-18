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

<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_producto_agricola('registro_produ'); return false" id="registro_produ" novalidate>
<div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">

            <button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="lista_de_productos_agricolas();">Lista de Productos</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Registro de Nuevo Producto Agricola</strong>
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
                    <span class="input-group-text sombra"><b>Nombre:</b></span>
                    <input class="form-control form-control-sm sombra" name="nombre_producto" placeholder="Nombre de Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre Cientifico:</b></span>
                    <input class="form-control form-control-sm sombra" name="nombre_cientifico" placeholder="Nombre Cientifico" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Descripción de Uso:</b></span>
                    <textarea class="form-control form-control-sm sombra" name="descripcion_de_uso" placeholder="Descripción de Uso" rows="3" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Ingrese una descripcion valida.</div>
                  </div>


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Presentación:</b></span>
                    <input class="form-control form-control-sm sombra" name="presentacion" placeholder="Precentacion del Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una presentación.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Laboratorio:</b></span>
                    <input class="form-control form-control-sm sombra" name="laboratorio" placeholder="Laboratorio del Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un Laboratorio.</div>
                  </div>
             </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Posología:</b></span>
                    <input class="form-control form-control-sm sombra" name="posologia" placeholder="posología del Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un posología.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipos de Cultivos:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="tipo_de_cultivo" required>
                        <option value="" disabled selected>Seleccione un Tipo</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM tipos_de_cultivos";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_tipo=$row['id'];
                                      $tipo_de_cultivo=$row['tipo_de_cultivo'];
                                      echo '<option value="'.utf8_encode($id_tipo).'">'.utf8_encode($tipo_de_cultivo).'</option>';
                                    }
                                  }

                                     ?>
                      </select>


                    <div class="invalid-feedback">Ingrese un tipo.</div>
                  </div>   

                 <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Restricciones:</b></span>
                    <input class="form-control form-control-sm sombra" name="restricciones" placeholder="Restricciones del Producto" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un Restricciones.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Observaciones:</b></span>
                    <textarea class="form-control form-control-sm sombra" name="observaciones" placeholder="Observaciones" rows="3" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Ingrese una observación.</div>
                  </div>
              </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="registro_produ"><i class="bi bi-plus me-1 text-md"></i>Registrar Producto</button>
            </div>

</div>





   </form>



