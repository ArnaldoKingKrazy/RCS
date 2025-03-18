<?php 
include_once("../INCLUDES/CONEXION.php");
$id_producto = (isset($_REQUEST['id_producto'])&& $_REQUEST['id_producto'] !=NULL)?$_REQUEST['id_producto']:'';
$tabla = (isset($_REQUEST['tabla'])&& $_REQUEST['tabla'] !=NULL)?$_REQUEST['tabla']:'';
$calificacion = (isset($_REQUEST['calificacion'])&& $_REQUEST['calificacion'] !=NULL)?$_REQUEST['calificacion']:'';

				
if ($calificacion<=0) {
	$calificacion=0;

}

if ($calificacion>=5) {
	$calificacion=5;
}



			$var_reg_calificacion="UPDATE `calificaciones` SET `calificacion`='$calificacion' WHERE id_producto='$id_producto' AND tabla_de_producto='$tabla'";

			$var_reg_calificacion = $con->query($var_reg_calificacion);

			if($var_reg_calificacion){
				echo "<script>calificado('$id_producto','$calificacion');</script>";
			}

 ?>