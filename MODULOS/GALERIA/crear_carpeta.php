<?php 
include"../../INCLUDES/CONEXION.php";

date_default_timezone_set('America/Caracas');

$carpeta=$_POST['nombre_carpeta'];


$directoriox = 'CARPETAS/'.$carpeta;

if (!file_exists($directoriox)) {
    mkdir($directoriox, 0777, true);
$directoriox =$directoriox."/";

if (isset($_FILES['imagen'])){
	
	$cantidad= count($_FILES["imagen"]["tmp_name"]);
	echo"<script>imagen_loading();</script>";
	for ($i=0; $i<$cantidad; $i++){
	if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'|| $_FILES['imagen']['type'][$i]=='image/jpg'){
		$subir_archivo = $directoriox.basename($_FILES['imagen']['name'][$i]);
			move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $subir_archivo);
		$imagen = $imagen=$_FILES['imagen']['name'][$i];
		$var_consulta= "INSERT INTO modulo_galeria (carpeta,fecha,imagen)values('$carpeta', CURTIME(), '$imagen')";
		$respuesta = $con->query($var_consulta); 


		$validar=true;
	}else{
		$validar = false;
	}
		if ($validar){
			echo"<script>modulo_galeria_alerta('imagen_subida');</script>";
		}else {
			echo"<script>modulo_galeria_alerta('error');</script>";
		}

	}
	if ($i>=$cantidad){
			echo"<script>modulo_galeria_alerta('proceso_terminado');</script>";
		}
	
}

}else{
			echo"<script>modulo_galeria_alerta('existe');</script>";

}






 ?>