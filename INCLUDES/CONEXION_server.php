<?php
include_once("SED.php");
//error_reporting(0);
//date_default_timezone_set("America/Caracas");
define("USER", "delafink_user");
define("SERVER", "localhost");
define("BD", "delafink_database");
define("PASS", "10152427voto");
define("BACKUP_PATH", "sql/");
define("BACKUP_ZIP", "zip/");
$con=mysqli_connect(SERVER, USER, PASS, BD);


    $mail_Host       = 'mail.delafink.com';                     //Set the SMTP server to send through
    $mail_Username   = 'notificaciones@delafink.com';                     //SMTP username
    $mail_Password   = '10152427voto';    
    $mail_setFrom_1 = 'notificaciones@delafink.com';
    $mail_setFrom_2 = 'notificaciones@delafink.com';

?>
