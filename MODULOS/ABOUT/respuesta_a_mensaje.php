<?php 
include_once("../../INCLUDES/CONEXION.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../../INCLUDES/Exception.php';
require '../../INCLUDES/PHPMailer.php';
require '../../INCLUDES/SMTP.php';

$correo_destino=$_POST['correo'];
$nombre_destino="RCS";

$id_mensaje=$_POST["id_mensaje"];
$respuesta=utf8_decode($_POST["respuesta"]);

$var_insertar="UPDATE `modulo_about_contacto` SET `respuesta`='$respuesta' WHERE id='$id_mensaje'";
$var_respuesta_insertar=$con->query($var_insertar);

if($var_respuesta_insertar){
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
    	
        <h5>'.$respuesta.'<h5><br>
  

            ';
    $mail->AltBody = 'https://www.delafink.com';

    $mail->send();
//echo "<script>alert('enviado');</script>";
    // Aqui va si queremos notificar envio del correo
} catch (Exception $e) {
    // Aqui para notificar fallo al enviar el correro
//echo "<script>alert('error');</script>";

}


	echo "<script>alerta_about('update_mensajes');</script>";

}else{

	echo "<script>alerta_about('error');</script>";

}


 ?>