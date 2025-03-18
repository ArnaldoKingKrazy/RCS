<?php 
include_once("../../INCLUDES/CONEXION.php");
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$mensaje=utf8_decode($_POST["mensaje"]);
$donde=$_POST["donde"];
$respuesta="Sin Responder";

$var_insertar="INSERT INTO modulo_about_contacto (fname, lname, email, mensaje,respuesta)VALUES('$fname','$lname','$email', '$mensaje', '$respuesta')";
$var_respuesta_insertar=$con->query($var_insertar);

if($var_respuesta_insertar){
	if ($donde=="navegador"){
	echo "<script>alerta_about('contacto_exitoso');</script>";
		}else{
	echo "<script>alerta_about('contacto_exito_2');</script>";
		}
}else{

	echo "<script>alerta_about('error');</script>";

}


 ?>