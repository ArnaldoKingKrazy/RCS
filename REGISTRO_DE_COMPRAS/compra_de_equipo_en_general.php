<?php 
include_once("../INCLUDES/CONEXION.php");
$id_producto=$_POST["id_producto"];
$costo=$_POST["costo"];
$fecha=$_POST["fecha"];
$cantidad=$_POST["cantidad"];

$var_reg_user="INSERT INTO `compras_de_equipos_en_general`( `id_producto`, `costo`, `fecha`,`cantidad`) VALUES ('$id_producto','$costo','$fecha','$cantidad')";
$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){
echo "<script>alerta_srcs('compra_registrada_equipo_en_general');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}
?>