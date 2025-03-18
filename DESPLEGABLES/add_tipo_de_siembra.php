<?php include_once("../INCLUDES/CONEXION.php");

// proveedor
$tipo_de_siembra=utf8_decode($_POST["tipo_de_siembra"]);




// Registro en tabla proveedor


$var_reg_prove="INSERT INTO `tipo_de_siembra`(`tipo_de_siembra`) VALUES ('$tipo_de_siembra')";

$var_reg_prove = $con->query($var_reg_prove); 

if($var_reg_prove){

echo "<script>alerta_srcs('tipo_siembra_registrado');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}


 ?>
