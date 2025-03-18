<?php 
	include_once("../INCLUDES/CONEXION.php");
    $consulta = (isset($_REQUEST['consulta'])&& $_REQUEST['consulta'] !=NULL)?$_REQUEST['consulta']:'';

          $var_consulta= "SELECT * FROM siembra WHERE titulo='$consulta'";
          $respuesta = $con->query($var_consulta);
         $response=$respuesta->num_rows + 1;

         if ($response==1){
			$response=$consulta;
         }else{
         $response=$consulta."-".$response;
     }

         echo $response;
 ?>