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
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <!--
                    <span class="input-group-text sombra"><b>Tipo de Producto:</b></span>
                      <select class="form-select form-control form-control-sm sombra" onchange="load(1);" name="tipo_producto_select" required id="tipo_producto_select">
                        <option value="no_seleccionado" disabled selected>Seleccione un Tipo de Producto</option>
                        <option value="Producto_Agricola" >Producto Agricola</option>
                        <option value="Equipos_en_General" >Equipos en General</option>
                      </select>
                    -->
                  </div> 
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
               <strong class="mx-auto text-white">Productos Agricolas Registrados</strong>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1  ">
            <button class="btn btn-success btn-sm sombra" style="float: right;" onclick="registro_equipo();"><i class="bi bi-plus-circle "></i> Agregar</button>
        
                  <div class="input-group input-group-sm mx-auto" style=" width: 220px; float: left;">
                  <span class="input-group-text sombra-b"><b>Buscar:</b></span>
                  <input type="text" name="busqueda" placeholder="Buscar Producto..." class="form-control form-control-sm" autocomplete="off" id="searchText">
              </div>
            </div>
        </div>

        <div class="row  mt-3 carga_product_registrados "></div> 

        </div>
      







  <script>
  $(document).ready(function(){
    load(1);
  });

$(document).on('keyup','#searchText',function(){
    var valor= $(this).val();
    if (valor!="") {
        load_buscar(1,valor);
    }else{
        load();
    }
});




  function load(page,busqueda){

    var parametros = {"action":"ajax","page":page,"busqueda":busqueda};

   

  


        $.ajax({
          url:'ADMIN/lista_de_equipos_carga.php',
          data: parametros,
          success:function(data){
            $(".carga_product_registrados").html(data);
          }
        })
  

  }

  function load_buscar(page,busqueda){
    var parametros = {"action":"ajax","page":page,"busqueda":busqueda};


        $.ajax({
          url:'ADMIN/lista_de_equipos_carga.php',
          data: parametros,
          success:function(data){
            $(".carga_product_registrados").html(data);
          }
        })
  }




  </script>