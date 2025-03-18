<?php 
include_once("../INCLUDES/CONEXION.php");

    $id = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';


$var_consulta2= "DELETE FROM usuarios WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta2); 
if($respuesta2){

echo"<script>alerta_login('registro_eliminado');</script>";

}else {
echo"<script>alerta_login('error');</script>";
}


 ?>