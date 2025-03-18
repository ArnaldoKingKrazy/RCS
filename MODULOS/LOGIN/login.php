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

// ver contaseñas
$("#imgContrasena").click(function () {

  var control = $(this);
  var estatus = control.data('activo');
  
  var icon = $("#ojo");
  if (estatus == false) {
  
    control.data('activo', true);
    $(icon).removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    $("#txtPassword").attr('type', 'text');
  }
  else {
  
    control.data('activo', false);
    $(icon).removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    $("#txtPassword").attr('type', 'password');
  }
});
</script>
 <div class="col-12 mt-2">
        <div class="row mx-auto">
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1">

          </div>
          <div class="col-lg-6 col-md-8 col-sm-10 col-12 mb-1 mt-1 ver-bordes border-secondary sombra fondo_verdecito">
            <header class="bg-dark text-white sombra text-center pb-2 pt-2 mb-3" with="100%"><h4>Inicio de Sesión</h4></header>
            <div class="row">
              <div class="col-12 p-5">
                
                 <form  class="needs-validation" enctype="multipart/form-data" onsubmit="check_login('login'); return false" id="login" novalidate>
                    <div class="input-group input-group-sm mb-3 me-5">
                      <span class="input-group-text sombra"><b>Usuario:</b></span>
                      <input class="form-control sombra" placeholder="Usuario" name="usuario" type="text" autofocus="true" autocomplete="off" required>
                      <span class="input-group-text sombra"><i class="bi bi-at"> </i></span>
                      <div class="invalid-feedback">
                        Se Requiere un Usuario.
                      </div>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                      <span class="input-group-text sombra"><b>Contraseña:</b></span>
                      <input class="form-control sombra"  placeholder="*********" id="txtPassword" name="password" type="password"  autocomplete="off" required>
                      <span class="input-group-text sombra ar-cursor-pointer" id="imgContrasena" data-activo="false"><i class="bi bi-eye-fill" id="ojo"></i></span>
                      <span class="input-group-text sombra"><i class="bi bi-lock"> </i></span>
                      <div class="invalid-feedback">
                        Se Requiere una Contraseña.
                      </div>
                    </div>
                    <div class="col text-center">
                      <button class="btn btn-primary btn-sm sombra mt-4 center-block" type="submit" form="login"><i class="bi bi-person-circle me-1 text-md"></i>Iniciar Sesión</button>
                    
                    </div>
                 </form>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1 ">

          </div>
        </div>
       <div id="repuesta_login"></div>
    <div id="alertas"></div>
</div>