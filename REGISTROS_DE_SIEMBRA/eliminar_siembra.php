<?php 
include_once("../INCLUDES/CONEXION.php");

$id=$_POST['id'];



	$var_consulta= "SELECT * FROM siembra WHERE id='$id'";
    $respuesta = $con->query($var_consulta);
     if($respuesta->num_rows>0)
      {
       while ($row=$respuesta->fetch_array())
       {
                   $id_eliminar=$row["id"];
                   $id_unico=$row["id_unico"];
                   $titulo=$row["titulo"];
                   $id_tipo_de_siembra=$row["id_tipo_de_siembra"];
                   $id_tipo_de_semilla=$row["id_tipo_de_semilla"];
                   $id_estatus=$row["id_estatus"];
                   $id_usuario_responsable=$row["id_usuario_responsable"];
                   $id_ubicacion=$row["id_ubicacion"];
                   $id_punto=$row["id_punto"];
                   $foto_google_earth=$row["foto_google_earth"];
                   $numero_de_matas=$row["numero_de_matas"];
                   $area=$row["area"];
                   $foto=$row["foto"];
     
        }
       }






$var_consulta= "DELETE FROM siembra  WHERE  id='$id'";
$respuesta2 = $con->query($var_consulta); 
if($respuesta2){

$var_consulta0= "DELETE FROM fechas_de_siembra  WHERE  id_unico_siembra='$id_unico'";
$respuesta0 = $con->query($var_consulta0); 

$var_consulta1= "DELETE FROM fechas_de_transplante  WHERE  id_unico_siembra='$id_unico'";
$respuesta1 = $con->query($var_consulta1); 

$var_consulta2= "DELETE FROM ubicacion_de_ubicaciones  WHERE  id_unico_siembra='$id_unico'";
$respuesta2 = $con->query($var_consulta2); 

unlink($foto_google_earth);
unlink($foto);


echo"<script>alerta_srcs('siembra_eliminada');</script>";

}else {
echo"<script>alerta_login('error');</script>";
}


 ?>