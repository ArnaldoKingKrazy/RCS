<?php include_once("../INCLUDES/CONEXION.php");

// producto

	$id_proveedor=$_POST["id_proveedor"];
	$nombre_producto=$_POST["nombre_producto"];
	$serial=$_POST["serial"];
	$modelo=$_POST["modelo"];
	$observaciones=$_POST["observaciones"];
	$fecha_de_compra=$_POST["fecha_de_compra"];
	$costo=$_POST["costo"];


			$var_reg_producto="INSERT INTO `equipos_en_general`(`id_proveedor`,`nombre`,`serial`,`modelo`,`observaciones`,`fecha_de_compra`,`costo`) VALUES ('$id_proveedor','$nombre_producto','$serial','$modelo','$observaciones','$fecha_de_compra','$costo')";

			$var_reg_producto = $con->query($var_reg_producto); 

			if($var_reg_producto){

			echo "<script>alerta_srcs('equipo_registrado');</script>";

			}else{
			echo "<script>alerta_login('error');</script>";
			}







 ?>
