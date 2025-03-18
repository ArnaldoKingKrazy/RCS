<?php 
include_once("../../INCLUDES/CONEXION.php");

$id=$_POST['id_img'];
$carpeta=$_POST['carpeta'];

$var_consulta= "SELECT * FROM modulo_galeria WHERE id='$id'";
$respuesta = $con->query($var_consulta); 
				if($respuesta->num_rows>0)
			      {
			      	 while ($row=$respuesta->fetch_array())
			    		{
			    			$id_elim=$row["id"];
			    			$imagen=$row["imagen"];
			    			$carpeta=$row["carpeta"];

			    		}
			    	}

$var_consulta= "DELETE FROM modulo_galeria  WHERE  id='$id_elim'";
$respuesta = $con->query($var_consulta); 
if($respuesta){
	$eliminar = "CARPETAS/".$carpeta."/".$imagen;
unlink($eliminar);


echo"<script>modulo_galeria_ver_carpeta_id('$carpeta');</script>";


}else {
echo"<script>modulo_galeria_alerta('error');</script>";
}


 ?>