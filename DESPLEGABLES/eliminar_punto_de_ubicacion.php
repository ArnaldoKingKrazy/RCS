<?php 
include_once("../INCLUDES/CONEXION.php");

$id=$_POST['id'];
$id_ubicaciones=$_POST["id_ubicacion"];

$var_consulta= "DELETE FROM ubicacion_de_ubicaciones  WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta); 
if($respuesta2){

echo"<script>alerta_srcs_id('punto_eliminado',$id_ubicaciones);</script>";

}else {
echo"<script>alerta_login('error');</script>";
}


 ?>