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


$id_a_actualizar=$_POST["id_a_actualizar"];
$tipo_usuario=$_POST["tipo_usuario"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];

$estado_civil=$_POST["estado_civil"];


$tiene_contrato=$_POST["contrato"];
$sueldo=$_POST["sueldo"];
$cedula=$_POST["cedula"];



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



$var_reg_user="UPDATE `usuarios` SET `usuario`='$email',`nombre`='$fname',`apellido`='$lname',`cedula`='$cedula',`estado_civil`='$estado_civil',`fecha_nac`='$fecha_nacimiento',`cargo`='$cargo',`tiene_contrato`='$tiene_contrato',`sueldo`='$sueldo',`tipo`='$id_tipo' WHERE id='$id_a_actualizar' ";


$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){


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
 
    	<h5>Se Realizaron Cambios en el Registro.<h5><br>
        <h5>su usuario es:'.$correo_destino.'<h5><br>
        

            ';
    $mail->AltBody = 'https://www.delafink.com';

    $mail->send();
//echo "<script>alert('enviado');</script>";
    // Aqui va si queremos notificar envio del correo
} catch (Exception $e) {
    // Aqui para notificar fallo al enviar el correro
//echo "<script>alert('error');</script>";

}
echo "<script>alerta_srcs_id('update',$id_a_actualizar);</script>";


}else{
echo "<script>alert('error');</script>";
}

 ?>
