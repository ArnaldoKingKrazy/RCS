<?php 
include_once("../INCLUDES/CONEXION.php");

$id=$_POST['id'];

$var_consulta= "DELETE FROM ordenes_de_trabajo  WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta); 
if($respuesta2){

echo"<script>alerta_srcs('orden_eliminada');</script>";

}else {
echo"<script>alerta_login('error');</script>";
}


 ?>