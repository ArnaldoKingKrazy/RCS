<?php 
include_once("../../INCLUDES/CONEXION.php");
$id_usuario=$_POST["id_usuario"];
$email=$_POST["email"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];


	$var_consulta= "UPDATE usuarios SET usuario='$email',nombre='$fname',apellido='$lname' WHERE id = '$id_usuario' ";
	$respuesta = $con->query($var_consulta);
		if ($respuesta){
				echo "<script>alerta_login('actualizacion_exitosa');</script>";
			}else{

				echo "<script> alerta_login('error');</script>";
			}

		

 ?>