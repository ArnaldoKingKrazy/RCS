<?php
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$AERC@2024');
	define('SECRET_IV','260792');
	class SED {
		public static function ENCRIPTAR($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function DESENCRIPTAR($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		public static function fecha_textual($string){
			$objFecha = new DateTime($fecha, new DateTimeZone('America/Caracas'));
			$dia= $objFecha->format('d');
			$mes= $objFecha->format('m');
			$ano= $objFecha->format('Y');
			if ($mes=='01'){$mes="Enero";}
			if ($mes=='02'){$mes="Febrero";}
			if ($mes=='03'){$mes="Marzo";}
			if ($mes=='04'){$mes="Abril";}
			if ($mes=='05'){$mes="Mayo";}
			if ($mes=='06'){$mes="Junio";}
			if ($mes=='07'){$mes="Julio";}
			if ($mes=='08'){$mes="Agosto";}
			if ($mes=='09'){$mes="Septiembre";}
			if ($mes=='10'){$mes="Octubre";}
			if ($mes=='11'){$mes="Noviembre";}
			if ($mes=='12'){$mes="Diciembre";}
			$output = $dia." ".$mes." de ".$ano;
			return $output;
		}




	}
?>