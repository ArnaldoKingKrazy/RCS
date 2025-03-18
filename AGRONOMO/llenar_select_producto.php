<option value="" disabled selected>Seleccione un Producto</option>
<?php 
	include_once("../INCLUDES/CONEXION.php");
    $id_proveedor = (isset($_REQUEST['id_proveedor'])&& $_REQUEST['id_proveedor'] !=NULL)?$_REQUEST['id_proveedor']:'';

                                $var_consulta= "SELECT * FROM productos_agricolas WHERE id_proveedor='$id_proveedor'";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_producto=$row['id'];
                                      $nombre=$row['nombre'];
                                      $presentacion=$row['presentacion'];
                                      $laboratorio=$row['laboratorio'];



                                  $var_consulta4= "SELECT * FROM almacen WHERE tabla='productos_agricolas' AND id_producto='$id_producto'";
                                    $respuesta4 = $con->query($var_consulta4);
                                      if($respuesta4->num_rows>0)
                                  {
                                     while ($row4=$respuesta4->fetch_array())
                                    {
                                      
                                      $cantidad_en_almacen=$row4['cantidad'];


                                      if ($cantidad_en_almacen>=1) {
                                        echo '<option value="'.$id_producto.'">'.utf8_encode($nombre).' - '.utf8_encode($presentacion). '  - '.utf8_encode($laboratorio). '</option>';

                                        

                                      }
                                    }
                                  }

 




                                    }
                                  }

 ?>