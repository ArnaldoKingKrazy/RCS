<?php include_once("../INCLUDES/CONEXION.php");

// proveedor
$tipo_de_cultivo=utf8_decode($_POST["tipo_de_cultivo"]);








// Registro en tabla proveedor


$var_reg_prove="INSERT INTO `tipos_de_cultivos`(`tipo_de_cultivo`) VALUES ('$tipo_de_cultivo')";

$var_reg_prove = $con->query($var_reg_prove); 

if($var_reg_prove){

echo "<script>alerta_srcs('tipo_cultivo_registrado');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}


 ?>
