<?php 
include_once("../INCLUDES/CONEXION.php");

$id=$_POST['id'];

$var_consulta= "DELETE FROM productos_agricolas  WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta); 
if($respuesta2){

	$var_consulta2s= "DELETE FROM calificaciones  WHERE  id_producto='$id'";
	$respuesta32 = $con->query($var_consulta2s); 

echo"<script>alerta_srcs('producto_eliminado');</script>";

}else {
echo"<script>alerta_login('error');</script>";
}






 ?>