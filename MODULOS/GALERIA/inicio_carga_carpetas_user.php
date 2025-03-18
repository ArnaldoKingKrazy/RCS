<?php 
	include_once("../../INCLUDES/CONEXION.php");

  $carpeta = (isset($_REQUEST['carpeta'])&& $_REQUEST['carpeta'] !=NULL)?$_REQUEST['carpeta']:'';

 	$var_consulta= "SELECT DISTINCT carpeta FROM modulo_galeria ";

if($carpeta!=""){
  $var_consulta=$var_consulta." WHERE carpeta LIKE '%$carpeta%'";
}

      $respuesta = $con->query($var_consulta);
      $num_carpetas=0;
        if($respuesta->num_rows>0)

        	
            {
              $cantidad_col=0;
               while ($row=$respuesta->fetch_array())
              {
                $carpeta=$row["carpeta"];

	?>				

<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 text-center mt-2">
  <div class="card sombra fondo-degradado-carpeta" title="<?php echo $carpeta; ?>"  align="center" style="width:185px; min-width: 185px; height: 150px;max-height: 150px;">
      <div class="card-body text-truncate ar-cursor-pointer" onclick="modulo_galeria_ver_carpeta_user('ver_carpeta<?php echo $carpeta;?>');">
        <small class="card-title h6" ><?php echo $carpeta; ?></small>
              <table width="100%">
                <tr>
                  <?php 
                        $var_consulta2= "SELECT * FROM modulo_galeria  WHERE carpeta ='$carpeta' ORDER BY fecha DESC ";
                     $respuesta2 = $con->query($var_consulta2);
                     $num_imagenes=0;
                     if($respuesta2->num_rows>0)
                         {
                         while ($row2=$respuesta2->fetch_array())
                        {
                        $imagen=$row2["imagen"];
                        if ($num_imagenes<=3){
                          ?>
                          <td width="50%" class="alto-auto">
                            
                              <img src="MODULOS/GALERIA/CARPETAS/<?php echo $carpeta;?>/<?php echo $imagen; ?>"  class="rounded" width="100%" >
                            
                           </td>

                           <?php
                          if($num_imagenes==1){echo "</tr><tr>";};
                          }
                           $num_imagenes++;

                           if ($num_imagenes==4){$num_imagenes==0;}
                         }}

                ?>
                </tr>
            </table>
                  <form enctype="multipart/form-data" onsubmit="modulo_galeria_ver_carpeta('ver_carpeta<?php echo $carpeta;?>'); return false" id="ver_carpeta<?php echo $carpeta;?>" hidden>
                    <input type="text" name="carpeta" value="<?php echo $carpeta;?>" hidden>
                    </form>

      </div>

    </div>
  </div>


<?php 
  $num_carpetas++;
  if($num_carpetas==4){echo "</div><div class='row mt-3'>"; $num_carpetas=0;}


        
      }
    }else{
     ?>

<div class="row mx-auto">
  <div class="col-12 text-center ">
    <div class="alert alert-primary sombra mx-auto" style="width: 70%">
      <strong>¡No hay Carpetas!</strong>
    </div>
  </div>
</div>
     <?php
 }
 ?>

  </div>