<?php 
include_once("../INCLUDES/CONEXION.php");

				$latitud=$_POST["latitud"];
				$longitud=$_POST["longitud"];

			$var_reg_calificacion="UPDATE `ubicacion_fink` SET `latitud`='$latitud',`longitud`='$longitud' WHERE id=1 ";

			$var_reg_calificacion = $con->query($var_reg_calificacion);

			if($var_reg_calificacion){
				echo "<script>alerta_srcs('ubikcion_actualizada');</script>";
			}

 ?>