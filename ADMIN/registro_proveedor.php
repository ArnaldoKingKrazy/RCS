<?php include "../../INCLUDES/CONEXION.php" ?>
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

<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_prove('registro_prove'); return false" id="registro_prove" novalidate>
<div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">
            <button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="lista_de_proveedores();">Lista de Proveedores</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Registro de Nuevo Proveedor</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <h5 class="mt-2 text-center">Datos del Proveedor</h5>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre o Denominación:</b></span>
                    <input class="form-control form-control-sm sombra" name="nombre" placeholder="Nombre" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Rif:</b></span>
                    <input class="form-control form-control-sm sombra" name="rif" placeholder="Rif..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un rif valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Dirección Fisica:</b></span>
                    <input class="form-control form-control-sm sombra" name="direccion_fisica" placeholder="Dirección..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una direccion valida.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Dirección Fiscal:</b></span>
                    <input class="form-control form-control-sm sombra" name="direccion_fiscal" placeholder="Dirección..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una direccion valida.</div>
                  </div>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Telefono:</b></span>
                    <input class="form-control form-control-sm sombra" name="telefono"   placeholder="00000000000" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un número valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="correo" placeholder="correo@correo.com" type="email"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Pagina Web:</b></span>
                    <input class="form-control form-control-sm sombra" name="web" placeholder="Página Web..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una página Web.</div>
                  </div>
<!--
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Metodo de Recepción:</b></span>
                    <input class="form-control form-control-sm sombra" name="metodo_recepcion" placeholder="Metodo de Recepción..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un metodo de Recepción.</div>
                  </div>
                  
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Producto que Provee:</b></span>
                    <input class="form-control form-control-sm sombra" name="producto" placeholder="Prodcuto que Provee..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un Producto.</div>
                  </div>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Costo de Envio:</b></span>
                    <input class="form-control form-control-sm sombra" name="costo_envio" step="0.01"  placeholder="0$" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un numero  valido.</div>
                  </div>
                -->
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <h5 class="mt-2 text-center">Datos del Contacto</h5>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Contacto:</b></span>
                    <input class="form-control form-control-sm sombra" name="contacto" placeholder="Contacto..." type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un contacto.</div>
                  </div>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Telefono:</b></span>
                    <input class="form-control form-control-sm sombra" name="telefono_contacto"   placeholder="00000000000" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un número valido.</div>
                  </div>
                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="correo_contacto" placeholder="correo@correo.com" type="email"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>
      </div>

       </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
        <button class="btn btn-success btn-sm sombra" type="submit" form="registro_prove">Registrar Proveedor</button>
        <br><br>
      </div>
       </div>
   </form>