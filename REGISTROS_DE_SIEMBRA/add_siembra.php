<?php 
include_once("../INCLUDES/CONEXION.php");

function generateid($length)
{
    $key = "";
    $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}




$cantidad_restar=$_POST["cantidad_restar"];
$titulo=$_POST["titulo"];
$id_tipo_de_siembra=$_POST["tipo_de_siembra"];
$id_unico=generateid(8);
$id_tipo_semilla=$_POST["tipo_semilla"];
$id_estatus=$_POST["estatus"];
$id_usuario=$_POST["agronomo_id"];
$id_ubicacion=$_POST["ubicacion"];



            $var_consulta4= "SELECT * FROM almacen WHERE tabla='productos_agricolas' AND id_producto='$id_tipo_semilla'";
            $respuesta4 = $con->query($var_consulta4);
            if($respuesta4->num_rows>0)
              {
                while ($row4=$respuesta4->fetch_array())
                {
                    $cantidad_en_almacen=$row4['cantidad'];

                }
              }

if ($cantidad_en_almacen>=$cantidad_restar) {



$ran_id=generateid(5);
$foto_google_earth=$_FILES['foto_earth']['name'];
$dire='IMGS/'.$ran_id;
$directoriox = $dire;
$subir_archivo = $directoriox.basename($_FILES['foto_earth']['name']);
copy($_FILES['foto_earth']['tmp_name'], $subir_archivo);
$foto_google_earth=$dire.basename($_FILES['foto_earth']['name']);



$numero_de_matas=$_POST["numero_de_matas"];
$area=$_POST["area"];


$ran_id2=generateid(5);
$foto=$_FILES['foto']['name'];
$dire2='IMGS/'.$ran_id2;
$directoriox2 = $dire2;
$subir_archivo2 = $directoriox2.basename($_FILES['foto']['name']);
copy($_FILES['foto']['tmp_name'], $subir_archivo2);
$foto=$dire2.basename($_FILES['foto']['name']);


$contador=$_POST["contador"];
	for ($i = 1; $i <= $contador; $i++) {
		$fecha[$i] = $_POST["fecha".$i.""];
			}

$contador_ft=$_POST["contador_ft"];
	for ($j = 1; $j <= $contador_ft; $j++) {
		$fecha_tansplante[$j] = $_POST["fecha_tansplante".$j.""];
			}

$contador_punto=$_POST["contador_punto"];
	for ($k = 1; $k <= $contador_punto; $k++) {
		$punto[$k] = $_POST["punto_".$k.""];
		$latitud[$k] = utf8_decode($_POST["latitud_".$k.""]);
		$longitud[$k] = utf8_decode($_POST["longitud_".$k.""]);
			}			




$var_reg_user="INSERT INTO `siembra`(`id_unico`,`titulo`, `id_tipo_de_siembra`, `id_tipo_de_semilla`, `id_estatus`, `id_usuario_responsable`, `id_ubicacion`, `foto_google_earth`, `numero_de_matas`, `area`, `foto`) VALUES ('$id_unico','$titulo','$id_tipo_de_siembra','$id_tipo_semilla','$id_estatus','$id_usuario','$id_ubicacion','$foto_google_earth','$numero_de_matas','$area','$foto')";

$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){
		

$new_cantidad = $cantidad_en_almacen-$cantidad_restar;
$var_update_cant="UPDATE `almacen` SET `cantidad`='$new_cantidad' WHERE tabla='productos_agricolas' AND id_producto='$id_tipo_semilla'";
$var_update_cant = $con->query($var_update_cant);





			for ($i = 1; $i <= $contador; $i++) {
				$var_reg_fecha_siembra[$i]="INSERT INTO `fechas_de_siembra` (`id_unico_siembra`, `fecha`)VALUES('$id_unico','$fecha[$i]')";
				$var_reg_fecha_siembra[$i]= $con->query($var_reg_fecha_siembra[$i]); 
				}


			for ($j = 1; $j <= $contador_ft; $j++) {
				$var_reg_fecha_transplante[$j]="INSERT INTO `fechas_de_transplante` (`id_unico_siembra`, `fecha`)VALUES('$id_unico','$fecha_tansplante[$j]')";
				$var_reg_fecha_transplante[$j]= $con->query($var_reg_fecha_transplante[$j]); 
				}

			for ($k = 1; $k <= $contador_punto; $k++) {
				$var_reg_puntos[$k]="INSERT INTO `ubicacion_de_ubicaciones` (`id_unico_siembra`, `nombre_ubicacion`, `latitud`, `longitud`)VALUES('$id_unico','$punto[$k]','$latitud[$k]','$longitud[$k]')";
				$var_reg_puntos[$k]= $con->query($var_reg_puntos[$k]); 
				}






			echo "<script>alerta_srcs('siembra_registrada');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}

}else{

			echo "<script>alerta_srcs('no_hay_suficiente_producto');</script>";

}

 ?>