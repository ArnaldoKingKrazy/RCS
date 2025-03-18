<?php 
include_once("../../INCLUDES/CONEXION.php");
  $var_consulta= "SELECT * FROM modulo_about_quienes_somos  WHERE id =1";
  $respuesta = $con->query($var_consulta);
	if($respuesta->num_rows>0){

		while ($row=$respuesta->fetch_array())
                        {
                        $quienes_somos=utf8_encode($row["quienes_somos"]);
                    }
                   }
 ?>

 <div class="col-12 mt-2">
        <div class="row mx-auto" style="height: 90vh;">

          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 ver-bordes border-secondary sombra fondo_verdecito">
            <header class="bg-dark sombra text-center pb-2 pt-2"><h4 class="text-white">¿Quienes Somos?</h4></header>
            <div class="row">
              <div class="col-12 p-5">
                <center>
              	<p>
              		<?php echo $quienes_somos; ?>
              	</p>
              </center>
                </div>
              </div>
              
            </div>
          </div>
      </div>
 </div>