<?php 
include_once("../../INCLUDES/CONEXION.php");
$var_consulta="SELECT * FROM modulo_about_contacto";
$var_respuesta = $con->query($var_consulta);
$var_boton_borrar = ($var_respuesta->num_rows);
 ?>


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
                  <input type="text" name="busqueda" placeholder="Buscar Nombre o Correo..." class="form-control form-control-sm" autocomplete="off" id="searchText">
              </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Lista de Mensajes</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          	<?php if($var_boton_borrar>0){ ?>
          	<button class="btn btn-danger btn-sm sombra" onclick="admin_vaciar_mensajes_about();"><i class="bi bi-trash"></i> Borrar Todos</button>
          <?php } ?>
          </div>
        </div>

        <div class="row  mt-3 cargador_de_mendajes "></div> 

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




  function load(page,busqueda){

    var parametros = {"action":"ajax","page":page,"busqueda":busqueda};
    $.ajax({
      url:'MODULOS/ABOUT/mensajes_carga.php',
      data: parametros,
      success:function(data){
        $(".cargador_de_mendajes").html(data);
      }
    })
  }

  </script>