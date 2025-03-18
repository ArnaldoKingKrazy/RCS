<?php 
include"../../INCLUDES/CONEXION.php";

function myrmdir($dirname){
        if ($dirHandle = opendir($dirname)){
            $old_cwd = getcwd();
            chdir($dirname);

            while ($file = readdir($dirHandle)){
                if ($file == '.' || $file == '..') continue;

                if (is_dir($file)){
                    if (!full_rmdir($file)) return false;
                }else{
                    if (!unlink($file)) return false;
                }
            }
            closedir($dirHandle);
            chdir($old_cwd);
            if (!rmdir($dirname)) 
                return false;
            return true;
        }else{
            return false;
        }
   } 

$id=$_POST['id'];
$var_consulta= "DELETE FROM modulo_galeria  WHERE  carpeta='$id'";
$respuesta = $con->query($var_consulta); 
if($respuesta){
	$eliminar = "CARPETAS/".$id;
	if (file_exists($eliminar)) {
	myrmdir($eliminar);
 }


echo"<script>modulo_galeria_alerta('carpeta_eliminada');</script>";

}else {
echo"<script>modulo_galeria_alerta('error');</script>";
}


 ?>