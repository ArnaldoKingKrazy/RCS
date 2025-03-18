<?php include_once("../INCLUDES/CONEXION.php");

// proveedor
$nombre=$_POST["nombre"];
$rif=$_POST["rif"];
$direccion_fisica=$_POST["direccion_fisica"];
$direccion_fiscal=$_POST["direccion_fiscal"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$web=$_POST["web"];

// proveedor

// producto
/*
$producto=$_POST["producto"];
$metodo_recepcion=$_POST["metodo_recepcion"];
$costo_envio=$_POST["costo_envio"];
$calificacion=0.0;
*/
// producto

// Contacto
$contacto=$_POST["contacto"];
$telefono_contacto=$_POST["telefono_contacto"];
$correo_contacto=$_POST["correo_contacto"];
// Contacto
$estado="Activo";
$fecha=date("Y-m-d");







// Registro en tabla proveedor


$var_reg_prove="INSERT INTO `proveedores`(`nombre`, `rif`, `direccion_fisica`, `estado`, `direcion_fiscal`, `telefono`, `contacto`, `telefono_contacto`, `correo_empresa`, `correo_contacto`) VALUES ('$nombre','$rif','$direccion_fisica','$estado','$direccion_fiscal','$telefono','$contacto','$telefono_contacto','$correo','$correo_contacto')";

$var_reg_prove = $con->query($var_reg_prove); 

if($var_reg_prove){
/*
	$var_reg_producto="INSERT INTO `productos`(`id_productor`, `nombre`, `calificacion`, `costo_envio`) VALUES ('$rif','$producto','$calificacion','$costo_envio')";
		$var_reg_producto = $con->query($var_reg_producto); 
*/

echo "<script>alertas('prove_registrado');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}


 ?>
