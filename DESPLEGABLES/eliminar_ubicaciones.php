<?php 
include_once("../INCLUDES/CONEXION.php");

$id=$_POST['id'];

$var_consulta= "DELETE FROM ubicaciones WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta); 
if($respuesta2){

echo"<script>alerta_srcs('ubicacion_eliminado');</script>";

}else {
echo"<script>alerta_login('error');</script>";
}


 ?>