<?php 
include_once("../../INCLUDES/CONEXION.php");
$var_consulta="DELETE FROM modulo_about_contacto";
$res_consulta= $con->query($var_consulta); 


if($res_consulta){
	echo "<script>alerta_about('borrado_exitoso');</script>";
}
 ?>