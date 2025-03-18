<?php 
include_once("../../INCLUDES/CONEXION.php");

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




$carpeta= glob("CARPETAS/*");

foreach ($carpeta as $file) {
	myrmdir($file);
}





$var_consulta="DELETE FROM modulo_galeria";
$res_consulta= $con->query($var_consulta); 


if($res_consulta){
	echo "<script>admin_modulos();</script>";
}
 ?>