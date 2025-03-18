<?php include_once("../INCLUDES/CONEXION.php");

// proveedor
$ubicacion=utf8_decode($_POST["ubicacion"]);








// Registro en tabla proveedor


$var_reg_prove="INSERT INTO `ubicaciones`(`ubicacion`) VALUES ('$ubicacion')";

$var_reg_prove = $con->query($var_reg_prove); 

if($var_reg_prove){

echo "<script>alerta_srcs('ubicacion_registrado');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}


 ?>
