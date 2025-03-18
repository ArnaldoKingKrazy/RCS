<?php 
include_once("../../INCLUDES/CONEXION.php");
$id=$_POST['id'];
$var_consulta= "DELETE FROM modulo_about_contacto  WHERE  id='$id'";
$respuesta = $con->query($var_consulta); 
if($respuesta){
	echo "<script>alerta_about('borrado_exitoso');</script>";
 }else{
	echo "<script>alerta_about('error');</script>";
 }

 ?>