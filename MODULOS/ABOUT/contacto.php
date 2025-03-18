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
<div class="col-12 mt-2">
        <div class="row mx-auto">
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1">

          </div>
          <div class="col-lg-6 col-md-8 col-sm-10 col-12 mb-1 mt-1 ver-bordes border-secondary sombra fondo_verdecito">
            <header class="bg-dark sombra text-center pb-2 pt-2"><h4 class="text-white">Contactanos</h4></header>
            <div class="row">
              <div class="col-12 p-5">
                <form  class="needs-validation" enctype="multipart/form-data" onsubmit="envio_de_mensaje_contacto('contactor'); return false" id="contactor" novalidate>
                  <input type="text" name="donde" value="navegador" hidden>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre:</b></span>
                    <input class="form-control form-control-sm sombra" name="fname" placeholder="Nombre" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Apellido:</b></span>
                    <input class="form-control form-control-sm sombra" name="lname" placeholder="Apellido" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un apellido valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="email" placeholder="correo@correo.com" type="email"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>
                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <textarea class="form-control form-control-sm sombra" name="mensaje" required></textarea>
                    <div class="invalid-feedback">Debe LLenar este Campo.</div>
                  </div>
                  <div class="col text-center">
                    <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="contactor"><i class="bi bi-at me-1 text-md"></i>Enviar Mensaje</button>
                 
                  </div>
                  </div>
                      <div class="alert alert-warning sombra mx-auto" style="width: 70%">
      <strong>¡Tu Mensaje Sera Respondido a tu Correo!</strong>
    </div>
                </form>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1 ">
          </div>
        </div>

        
</div>