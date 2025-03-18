<?php 
include_once("../../INCLUDES/CONEXION.php");
session_start();
if(isset($_SESSION["user_id"])){$user_id=$_SESSION["user_id"];}
$estatus=$_POST["estatus"];

	$var_consulta= "UPDATE users SET status='$estatus' WHERE user_id = '$user_id' ";
	$respuesta = $con->query($var_consulta);


 ?>