<?php 
include_once("../../INCLUDES/CONEXION.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../../INCLUDES/Exception.php';
require '../../INCLUDES/PHPMailer.php';
require '../../INCLUDES/SMTP.php';

function generatePassword($length)
{
    $key = "";
    $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}




$correo_destino=$_POST['email'];
$nombre_destino="RCS";


$tipo_usuario=$_POST["tipo_usuario"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];
$password=generatePassword(8);
$estado_civil=$_POST["estado_civil"];
$tiene_dotacion=$_POST["tiene_dotacion"];
$tenencia_hijos=$_POST["tenencia_hijos"];
$tiene_contrato=$_POST["contrato"];
$sueldo=$_POST["sueldo"];
$cedula=$_POST["cedula"];
$fecha_ingreso=date("Y-m-d");


                                   $var_consulta= "SELECT * FROM tipo_de_usuario WHERE id=$tipo_usuario";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_tipo=$row['id'];
                                      $cargo=$row['tipo'];
                                    }
                                  }



$var_reg_user="INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`,`apellido`,`cedula`, `estado_civil`, `fecha_nac`, `tiene_hijos`, `cargo`, `fecha_ingreso`, `tiene_contrato`, `sueldo`, `tipo`) VALUES
('$email','$password', '$fname', '$lname', '$cedula', '$estado_civil', '$fecha_nacimiento', '$tenencia_hijos', '$cargo','$fecha_ingreso','$tiene_contrato','$sueldo','$id_tipo')";


$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){

		if ($tenencia_hijos=="SI") {
			$numero_hijos=$_POST["numero_hijos"];
			for ($i = 1; $i <= $numero_hijos; $i++) {
				$nombre_hijo[$i] = $_POST["nombre_hijo".$i.""];
				$edad_hijo[$i] = $_POST["edad_hijo".$i.""];
				$cedula_hijo[$i] = $_POST["cedula_hijo".$i.""];

				$var_reg_hijos[$i]="INSERT INTO `hijos_empleados` (`id_empleado`,`nombre_hijo`,`edad`,`cedula_hijo`)VALUES('$cedula','$nombre_hijo[$i]','$edad_hijo[$i]','$cedula_hijo[$i]')";
				$var_reg_hijos[$i]= $con->query($var_reg_hijos[$i]); 

			}
		}


		if ($tiene_dotacion=="SI") {
				$numero_dota=$_POST["numero_dota"];
				for ($i = 1; $i <= $numero_dota; $i++) {
					$dotacion[$i] = $_POST["dotacion".$i.""];
					$cantidad_dotacion[$i] = $_POST["cantidad_dota".$i.""];
					$fecha_dotacion[$i] = $_POST["fecha_dota".$i.""];


				$var_reg_dotacion[$i]="INSERT INTO `prestaciones` (`id_empleado`,`dotacion`,`cantidad`,`fecha`)VALUES('$cedula','$dotacion[$i]','$cantidad_dotacion[$i]','$fecha_dotacion[$i]')";
				$var_reg_dotacion[$i]= $con->query($var_reg_dotacion[$i]); 

				}
		}

$mail = new PHPMailer(true);
try {

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $mail_Host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $mail_Username;                     //SMTP username
    $mail->Password   = $mail_Password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                        

    //Recipients
    $mail->setFrom($mail_setFrom_1, $mail_setFrom_2);

    $mail->addAddress($correo_destino, $nombre_destino);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Delafink';
    $mail->Body    = '
    	<b>Ante Todo un Coordial Saludo de parte de Todos en delafink</b><br>
    	<b>Notificamos Mediante este Correo:</b>
 
    	<h5>Que Usted a sido Registrado Correctamente.<h5><br>
    	<h2>Bienvenido</h2>
        <h5>su usuario es:'.$correo_destino.'<h5><br>
        <h5>su nueva clave es:'.$password.'<h5><br>

            ';
    $mail->AltBody = 'https://www.delafink.com';

    $mail->send();
//echo "<script>alert('enviado');</script>";
    // Aqui va si queremos notificar envio del correo
} catch (Exception $e) {
    // Aqui para notificar fallo al enviar el correro
//echo "<script>alert('error');</script>";

}
echo "<script>alertas('registro');</script>";


}else{
echo "<script>alert('error');</script>";
}

 ?>
