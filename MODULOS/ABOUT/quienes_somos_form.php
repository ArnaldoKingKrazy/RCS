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

<?php 
include_once("../../INCLUDES/CONEXION.php");
  $var_consulta= "SELECT * FROM modulo_about_quienes_somos  WHERE id =1";
  $respuesta = $con->query($var_consulta);
	if($respuesta->num_rows>0){

		while ($row=$respuesta->fetch_array())
                        {
                        $quienes_somos=$row["quienes_somos"];
                    }
 ?>				

<div class="col-12 mt-2">
        <div class="row mx-auto">

          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 ver-bordes border-secondary sombra fondo_verdecito">
            <header class="bg-dark sombra text-center pb-2 pt-2 text-white"><h4 class="text-white">¿Quienes Somos?</h4></header>
            <div class="row fondo_verdecito">
              <div class="col-12 p-5">
                <form  class="needs-validation" enctype="multipart/form-data" onsubmit="guardar_quienes_somos('reg_quieness'); return false" id="reg_quieness" novalidate>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                  	<textarea class="form-control form-control-sm sombra" rows="8" name="quienes_somos" placeholder="Resumen para mostrar en ventana de ¿Quienes Somos?" autocomplete="off" required><?php echo $quienes_somos; ?></textarea>
                    <div class="invalid-feedback">Debe llenar el Campo de texto.</div>
                  </div>
                 </form>
                   <div class="col text-center">
                    <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="reg_quieness"><i class="bi bi-upload me-1 text-md"></i>Actualizar</button>
                </div>
              </div>

          </div>
      </div>
 </div>



 <?php }else{ ?>




<div class="col-12 mt-2">
        <div class="row mx-auto">

          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 ver-bordes border-secondary sombra fondo_verdecito">
            <header class="bg-dark sombra text-center pb-2 pt-2"><h4  class="text-white">¿Quienes Somos?</h4></header>
            <div class="row">
              <div class="col-12 p-5">
                <form  class="needs-validation" enctype="multipart/form-data" onsubmit="guardar_quienes_somos('reg_quienes'); return false" id="reg_quienes" novalidate>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                  	<textarea class="form-control form-control-sm sombra" rows="8" name="quienes_somos" placeholder="Resumen para mostrar en ventana de ¿Quienes Somos?" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Debe llenar el Campo de texto.</div>
                  </div>
                 </form>
                   <div class="col text-center">
                    <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="reg_quienes"><i class="bi bi-upload me-1 text-md"></i>Actualizar</button>
                </div>
              </div>

            </div>
          </div>
      </div>
 </div>

<?php } ?>