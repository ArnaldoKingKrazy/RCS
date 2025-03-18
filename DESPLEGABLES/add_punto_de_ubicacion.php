<?php include_once("../INCLUDES/CONEXION.php");

// proveedor
$nombre_ubicacion=utf8_decode($_POST["punto"]);
$id_ubicaciones=utf8_decode($_POST["id_ubicaciones"]);








// Registro en tabla proveedor


$var_reg_prove="INSERT INTO `ubicacion_de_ubicaciones`(`id_ubicaciones`,`nombre_ubicacion`) VALUES ('$id_ubicaciones','$nombre_ubicacion')";

$var_reg_prove = $con->query($var_reg_prove); 

if($var_reg_prove){

echo "<script>alerta_srcs_id('ubicacion_registrada',$id_ubicaciones);</script>";

}else{
echo "<script>alerta_login('error');</script>";
}


 ?>
