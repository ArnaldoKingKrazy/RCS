<?php 
include_once("../../INCLUDES/CONEXION.php");

$quienes_somos= $_POST["quienes_somos"];

  $var_consulta= "SELECT * FROM modulo_about_quienes_somos  WHERE id =1";
  $respuesta = $con->query($var_consulta);
	if($respuesta->num_rows>0){

			$var_update= "UPDATE modulo_about_quienes_somos SET quienes_somos='$quienes_somos' WHERE id = 1 ";
			$respuesta_update = $con->query($var_update);
			if ($respuesta_update){
					echo "<script> alerta_about('add_correcto');</script>";
			
			}else{
					echo "<script> alerta_about('error');</script>";
				
			}


	}else{


			$var_add= "INSERT INTO modulo_about_quienes_somos (id,quienes_somos)values(1,'$quienes_somos')";
			$respuesta_add = $con->query($var_add); 

			if ($respuesta_add){
					echo "<script> alerta_about('add_correcto');</script>";
			
			}else{
					echo "<script> alerta_about('error');</script>";
				
			}

	}

 ?>