<?php 
include_once("../../INCLUDES/CONEXION.php");
$id_usuario=$_POST["id_usuario"];
$imagen=$_POST['imagen'].".png";

	$var_consulta= "UPDATE users SET img='$imagen' WHERE user_id = '$id_usuario' ";
	$respuesta = $con->query($var_consulta);
		if ($respuesta){
			if($id_usuario==1){
				echo "<script>recargar_menu_admin();</script>";
			}else{
				echo "<script> recargar_menu_user();</script>";
			}

		}

 ?>