<?php 
include_once("../INCLUDES/CONEXION.php");

$mod_galeria=$_POST["mod_galeria"];
$mod_calendario=$_POST["mod_calendario"];
$mod_noticias=$_POST["mod_noticias"];
$mod_chat=$_POST["mod_chat"];
$mod_redes=$_POST["mod_redes"];
$mod_about=$_POST["mod_about"];
$mod_foro=$_POST["mod_foro"];
$contacto_about=$_POST["contacto_about"];
$quienes_about=$_POST["quienes_about"];


if ($mod_about=="on"){
	if($contacto_about=="on"){
			$linea_contacto_abouts='true';
			$file_contacto_abouts = fopen("../MODULOS/ABOUT/CONTACTO_ACTIVATOR.php", "w");
			fwrite($file_contacto_abouts, $linea_contacto_abouts);
			fclose($file_contacto_abouts);
	}else{
			$linea_contacto_abouts='false';
			$file_contacto_abouts = fopen("../MODULOS/ABOUT/CONTACTO_ACTIVATOR.php", "w");
			fwrite($file_contacto_abouts, $linea_contacto_abouts);
			fclose($file_contacto_abouts);	
	}

	if($quienes_about=="on"){
			$linea_quienes_about='true';
			$file_quienes_about = fopen("../MODULOS/ABOUT/QUIENES_SOMOS_ACTIVATOR.php", "w");
			fwrite($file_quienes_about, $linea_quienes_about);
			fclose($file_quienes_about);
	}else{
			$linea_quienes_about='false';
			$file_quienes_about = fopen("../MODULOS/ABOUT/QUIENES_SOMOS_ACTIVATOR.php", "w");
			fwrite($file_quienes_about, $linea_quienes_about);
			fclose($file_quienes_about);	
	}



$linea_abouts='true';
$file_abouts = fopen("../MODULOS/ABOUT/ABOUT_ACTIVATOR.php", "w");
fwrite($file_abouts, $linea_abouts);
fclose($file_abouts);



	if($contacto_about=="on"){
			$var_about_contacto="CREATE TABLE IF NOT EXISTS `modulo_about_contacto` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `fname` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
 `lname` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
 `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
 `mensaje` text COLLATE utf8_spanish2_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT";
				$res_about_contacto = $con->query($var_about_contacto); 

	}

	if($quienes_about=="on"){
			$var_about= "CREATE TABLE IF NOT EXISTS `modulo_about_quienes_somos` (
			 `id` int(11) NOT NULL AUTO_INCREMENT,
			 `quienes_somos` text COLLATE utf8_spanish2_ci NOT NULL,
			 PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci";
				$res_about = $con->query($var_about); 

	}
}else{
			$linea_abouts='false';
			$file_abouts = fopen("../MODULOS/ABOUT/ABOUT_ACTIVATOR.php", "w");
			fwrite($file_abouts, $linea_abouts);
			fclose($file_abouts);

	if($contacto_about=="on"){
			$linea_contacto_abouts='true';
			$file_contacto_abouts = fopen("../MODULOS/ABOUT/CONTACTO_ACTIVATOR.php", "w");
			fwrite($file_contacto_abouts, $linea_contacto_abouts);
			fclose($file_contacto_abouts);
	}else{
			$linea_contacto_abouts='false';
			$file_contacto_abouts = fopen("../MODULOS/ABOUT/CONTACTO_ACTIVATOR.php", "w");
			fwrite($file_contacto_abouts, $linea_contacto_abouts);
			fclose($file_contacto_abouts);	
	}

	if($quienes_about=="on"){
			$linea_quienes_about='true';
			$file_quienes_about = fopen("../MODULOS/ABOUT/QUIENES_SOMOS_ACTIVATOR.php", "w");
			fwrite($file_quienes_about, $linea_quienes_about);
			fclose($file_quienes_about);
	}else{
			$linea_quienes_about='false';
			$file_quienes_about = fopen("../MODULOS/ABOUT/QUIENES_SOMOS_ACTIVATOR.php", "w");
			fwrite($file_quienes_about, $linea_quienes_about);
			fclose($file_quienes_about);	
	}

}

	if($mod_foro=="on"){
			$linea_foro='true';
			$file_foro = fopen("../MODULOS/FORO/FORO_ACTIVATOR.php", "w");
			fwrite($file_foro, $linea_foro);
			fclose($file_foro);
	}else{
			$linea_foro='false';
			$file_foro = fopen("../MODULOS/FORO/FORO_ACTIVATOR.php", "w");
			fwrite($file_foro, $linea_foro);
			fclose($file_foro);	
	}

	if($mod_foro=="on"){
		$var_foro= "CREATE TABLE IF NOT EXISTS `modulo_foro_tema` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_autor` int(11) NOT NULL,
 `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
 `asunto` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 `open` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
	$res_foro = $con->query($var_foro); 
	$var_foro2= "CREATE TABLE IF NOT EXISTS `modulo_foro_mensajes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_autor` int(11) NOT NULL,
 `id_tema` int(11) NOT NULL,
 `mensaje` text COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT";
	$res_foro2 = $con->query($var_foro2); 
	$var_foro3= "CREATE TABLE IF NOT EXISTS `modulo_foro_comentarios` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_autor` int(11) NOT NULL,
 `id_mensaje` int(11) NOT NULL,
 `comentario` text COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT";
	$res_foro3 = $con->query($var_foro3); 
	}

if ($mod_galeria=="on") {
	$on_galeria=1;

	$var_galeria= "CREATE TABLE IF NOT EXISTS `modulo_galeria` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `carpeta` text COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT";
	$res_galeria = $con->query($var_galeria); 
}else{
	$on_galeria=0;
}

if ($mod_calendario=="on") {
	$on_calendario=1;
$var_calendario= "CREATE TABLE IF NOT EXISTS `modulo_calendario` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
 `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$res_calendario = $con->query($var_calendario); 

}else{
	$on_calendario=0;
}

if ($mod_noticias=="on") {
	$on_noticias=1;

		$var_noticias= "CREATE TABLE IF NOT EXISTS `mod_noticias` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `titulo` text COLLATE utf8_spanish2_ci NOT NULL,
 `noticia` text COLLATE utf8_spanish2_ci NOT NULL,
 `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
 `frame` text COLLATE utf8_spanish2_ci NOT NULL,
 `fecha` date NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT";
	$res_noticias = $con->query($var_noticias); 
}else{
	$on_noticias=0;
}


if ($mod_chat=="on") {
	$on_chat="true";

	$var_chat= "CREATE TABLE IF NOT EXISTS `modulo_chat_chats` (
 `chat_id` int(11) NOT NULL AUTO_INCREMENT,
 `conversacion_id` int(11) NOT NULL,
 `para_id` int(11) NOT NULL,
 `de_id` int(11) NOT NULL,
 `mensaje` text NOT NULL,
 `fecha_hora` varchar(255) NOT NULL,
 PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT";
	$res_chat = $con->query($var_chat); 
	$var_chat2= "CREATE TABLE IF NOT EXISTS `modulo_chat_conversacion` (
 `conversation_id` int(11) NOT NULL AUTO_INCREMENT,
 `user_1` int(11) NOT NULL,
 `user_2` int(11) NOT NULL,
 PRIMARY KEY (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT";
	$res_chat2 = $con->query($var_chat2); 


}else{
	$on_chat="false";
}

if ($mod_redes=="on") {
	$on_redes="true";
}else{
	$on_redes="false";
}

$linea_redes=$on_redes;
$file_redes = fopen("../MODULOS/SOCIALBAR/SOCIALBAR_ACTIVATOR.php", "w");
fwrite($file_redes, $linea_redes);
fclose($file_redes);


if ($mod_redes=="on") {
			$var_redes= "CREATE TABLE IF NOT EXISTS `mod_redes_sociales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_facebook` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `red_twitter` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `red_instagram` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `red_youtube` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT";
$res_redes = $con->query($var_redes); 

	$var_reds="SELECT id FROM mod_redes_sociales";
	$res_reds = $con->query($var_reds); 
	if($res_reds->num_rows==0){
		$var_llena_redes="INSERT INTO `mod_redes_sociales` (`id`, `red_facebook`, `red_twitter`, `red_instagram`, `red_youtube`) VALUES
		(1, '0', '0', '0', '0')";
		$res_llena_redes = $con->query($var_llena_redes); 
	}


}









$linea_chat=$on_chat;
$file_chat = fopen("../MODULOS/CHAT/CHAT_ACTIVATOR.php", "w");
fwrite($file_chat, $linea_chat);
fclose($file_chat);





$var_modulos_activos="UPDATE `modulos_activos` SET mod_galeria='$on_galeria', mod_calendario='$on_calendario', mod_noticias='$on_noticias'";
$res_modulos_activos= $con->query($var_modulos_activos); 
if($res_modulos_activos){
	echo "<script>update_modulos();</script>";
}

 ?>
