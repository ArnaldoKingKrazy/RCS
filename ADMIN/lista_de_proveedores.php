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
                <div class="input-group input-group-sm mx-auto" style="width: 250px;">
                  <span class="input-group-text sombra-b"><b>Buscar:</b></span>
                  <input type="text" name="busqueda" placeholder="Buscar Proveedor..." class="form-control form-control-sm" autocomplete="off" id="searchText">
              </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Lista de Proveedores Registrados</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
            <button class="btn btn-success btn-sm sombra" onclick="registro_proveedor();"><i class="bi bi-plus-circle "></i> Agregar</button>
          </div>
        </div>

        <div class="row  mt-3 carga_prove_registrados "></div> 

        </div>
      







  <script>
  $(document).ready(function(){
    load(1);
  });

$(document).on('keyup','#searchText',function(){
    var valor= $(this).val();
    if (valor!="") {
        load(1,valor);
    }else{
        load();
    }
});




  function load(page,usuario){

    var parametros = {"action":"ajax","page":page,"usuario":usuario};
    $.ajax({
      url:'ADMIN/proveedores_registrados_carga.php',
      data: parametros,
      success:function(data){
        $(".carga_prove_registrados").html(data);
      }
    })
  }

  </script>