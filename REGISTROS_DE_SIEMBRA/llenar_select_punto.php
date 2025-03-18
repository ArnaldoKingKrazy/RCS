
<option value="" disabled selected>Seleccione un Punto</option>
<?php 
	include_once("../INCLUDES/CONEXION.php");
    $id_ubicacion = (isset($_REQUEST['id_ubicacion'])&& $_REQUEST['id_ubicacion'] !=NULL)?$_REQUEST['id_ubicacion']:'';

                                       $var_consulta= "SELECT * FROM ubicacion_de_ubicaciones WHERE id_ubicaciones='$id_ubicacion'";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_ubicaciones=$row['id'];
                                      $nombre_ubicacion=$row['nombre_ubicacion'];
                                      echo '<option value="'.utf8_encode($id_ubicaciones).'">'.utf8_encode($nombre_ubicacion).'</option>';
                                    }
                                  }

 ?>