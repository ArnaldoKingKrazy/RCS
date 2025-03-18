<?php 
include_once("../../INCLUDES/CONEXION.php");
$id_usuario=$_POST["id_usuario"];
$password=$_POST['password'];
$password_actual=$_POST['password_actual'];
$password_nueva=$_POST['password_nueva'];
$password_repetida=$_POST['password_repetida'];
$password_nueva_encriptada=$password_nueva;
if($password==$password_actual){

	if($password_nueva==$password_repetida){

			$var_consulta= "UPDATE usuarios SET clave='$password_nueva_encriptada' WHERE id = '$id_usuario' ";
			$respuesta = $con->query($var_consulta);
			if ($respuesta){
				echo "<script> alerta_login('clave_cambiada');</script>";
			}else{
				echo "<script> alerta_login('error');</script>";
			}

	}else{
		echo "<script> alerta_login('clave_desiguales');</script>";
	}

}else{
	echo "<script> alerta_login('clave_no_coincide');</script>";
}



 ?>