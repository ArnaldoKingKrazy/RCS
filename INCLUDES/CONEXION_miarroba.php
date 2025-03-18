<?php
include_once("SED.php");
error_reporting(0);
date_default_timezone_set("America/Caracas");
define("USER", "srcs");
define("SERVER", "mysql.webcindario.com");
define("BD", "srcs");
define("PASS", "260792");
define("BACKUP_PATH", "sql/");
define("BACKUP_ZIP", "zip/");
$con=mysqli_connect(SERVER, USER, PASS, BD);


    $mail_Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail_Username   = 'arnaldoruizpersonal@gmail.com';                     //SMTP username
    $mail_Password   = 'aerckira260792';    
    $mail_setFrom_1 = 'arnaldoruizpersonal@gmail.com';
    $mail_setFrom_2 = 'arnaldoruizpersonal@gmail.com';
?>
