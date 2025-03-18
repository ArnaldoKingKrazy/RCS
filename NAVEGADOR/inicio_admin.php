<?php include_once("../INCLUDES/CONEXION.php"); 


  

?>

<div class="row mt-5">
        <div class="col-md-6 col-xl-3">
          <div style="min-height: 230px;" class="card sombra ar-cursor-pointer border-success" onclick="siembras_admin();">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 bg-success text-black text-center pt-2 pb-1 pe-2 ps-2 sombra redondea_esquinas">Siembras</h6>

            	<?php 
					$var_consulta= "SELECT * FROM estatus_de_la_siembra";
					$respuesta = $con->query($var_consulta);
					     if($respuesta->num_rows>0)
						      {
						       while ($row=$respuesta->fetch_array())
						       {

						       	$id_estatus = $row["id"];
						       	$estatus = $row["estatus"];

								$var_consulta1= "SELECT * FROM siembra WHERE id_estatus='$id_estatus'";
							    $respuesta1 = $con->query($var_consulta1);
							     $cantidad=$respuesta1->num_rows;


						       	echo '<h6 class="mb-3">'.$estatus.': <span class="badge sombra border border-primary text-black"> '.$cantidad.'</span></h6>';

						       }
						   }
            	 ?>


            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div style="min-height: 230px;" class="card sombra  border-warning" >
            <div class="card-body">
              <h6 class="mb-2 f-w-400 bg-warning text-center pt-2 pb-1 pe-2 ps-2 sombra redondea_esquinas ">Ordenes de Trabajo</h6>

              <?php 
          $var_consulta1= "SELECT * FROM ordenes_de_trabajo WHERE estado='PENDIENTE'";
          $respuesta1 = $con->query($var_consulta1);
            $ordenes_pendientes = $respuesta1->num_rows;
               ?>
            <h6 onclick="admin_ondenes_en_espera();" class="mb-3 ar-cursor-pointer">Pendientes: <span class="badge sombra border border-primary text-black " ><?php echo $ordenes_pendientes; ?></span></h6>
              <?php 
          $var_consulta2= "SELECT * FROM ordenes_de_trabajo WHERE estado='APROBADA'";
          $respuesta2 = $con->query($var_consulta2);
            $ordenes_aprobadas = $respuesta2->num_rows;
               ?>
            <h6 onclick="admin_ordenes_aprobadas();" class="mb-3 ar-cursor-pointer">Aprobadas: <span class="badge sombra border border-primary text-black"><?php echo $ordenes_aprobadas; ?></span></h6>




            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div style="min-height: 230px;" class="card sombra">
            <div class="card-body">

            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div style="min-height: 230px;" class="card sombra">
            <div class="card-body">
 
            </div>
          </div>
        </div>

    </div>


