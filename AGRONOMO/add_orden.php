<?php 
include_once("../INCLUDES/CONEXION.php");

session_start();
$id_usuario_emisor = $_SESSION["user_id"];

$asunto=$_POST["asunto"];
$tipo_de_orden=$_POST["tipo_de_orden"];
$caracter=$_POST["caracter"];
$fecha_inicio=$_POST["fecha_inicio"];
$fecha_finalizacion=$_POST["fecha_finalizacion"];
$instrucciones=utf8_decode($_POST["instrucciones"]);
$instrucciones_detalladas=utf8_decode($_POST["instrucciones_detalladas"]);
$id_producto=$_POST["id_producto"];
$id_usuario_asignado=$_POST["id_usuario_asignado"];
$id_unico_siembra=$_POST["id_unico_siembra"];
$estado="PENDIENTE";


$var_reg_user="INSERT INTO `ordenes_de_trabajo`(`asunto`, `tipo_de_orden`, `caracter`, `fecha_inicio`, `fecha_finalizacion`, `instrucciones`, `instrucciones_detalladas`, `id_producto`, `id_usuario_asignado`,`id_usuario_emisor`, `id_unico_siembra`, `estado`) VALUES ('$asunto','$tipo_de_orden','$caracter','$fecha_inicio','$fecha_finalizacion','$instrucciones','$instrucciones_detalladas','$id_producto','$id_usuario_asignado','$id_usuario_emisor','$id_unico_siembra','$estado')";

$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){
			echo "<script>alerta_srcs('orden_dada');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}

 ?>