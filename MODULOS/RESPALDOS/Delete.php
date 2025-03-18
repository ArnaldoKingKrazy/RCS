<?php
$restorePoint=$_POST['restorePoint'];

if ($restorePoint!="") {
unlink($restorePoint);
   echo"<script>modulo_admin_alerta('eliminado_exitoso');</script>";
}else{
   echo"<script>modulo_admin_alerta('error');</script>";
	
}
?>