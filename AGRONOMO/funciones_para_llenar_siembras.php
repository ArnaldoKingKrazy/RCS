<?php 
function _tipo_de_siembra($parametro){
      include("../INCLUDES/CONEXION.php");
                          $var_consulta= "SELECT * FROM tipo_de_siembra WHERE id='$parametro' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $tipo_de_siembra=utf8_encode($row["tipo_de_siembra"]);
                      }
                    }

  return $tipo_de_siembra;
}


function _tipo_de_semilla($parametro){
      include("../INCLUDES/CONEXION.php");
                          $var_consulta= "SELECT * FROM productos_agricolas WHERE id='$parametro' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $nombre=utf8_encode($row["nombre"]);
                                    $id_proveedor=utf8_encode($row["id_proveedor"]);
                      }
                    }

                          $var_consulta2= "SELECT * FROM proveedores WHERE id='$id_proveedor' ";
                          $respuesta2 = $con->query($var_consulta2);
                            if($respuesta2->num_rows>0)
                                {
                                   while ($row=$respuesta2->fetch_array())
                                  {

                                    $nombre_p=utf8_encode($row["nombre"]);
                                    $rif=utf8_encode($row["rif"]);
                      }
                    }
           $variable_retorno = $nombre." (".$nombre_p." - ".$rif.")";
  return $variable_retorno;
}


function _estatus($parametro){
      include("../INCLUDES/CONEXION.php");
                          $var_consulta= "SELECT * FROM estatus_de_la_siembra WHERE id='$parametro' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $estatus=utf8_encode($row["estatus"]);
                      }
                    }

  return $estatus;
}

function _encargado($parametro){
      include("../INCLUDES/CONEXION.php");

                          $var_consulta= "SELECT * FROM usuarios WHERE id='$parametro' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $nombre_u=utf8_encode($row["nombre"]);
                                    $apellido_u=utf8_encode($row["apellido"]);
                                    $cedula_u=utf8_encode($row["cedula"]);
                      
                      }
                    }
                $respuesta = $nombre_u." ".$apellido_u." (".$cedula_u.") ";

  return $respuesta;
}

function _ubicacion($id_ubicacion){
      include("../INCLUDES/CONEXION.php");

                          $var_consulta= "SELECT * FROM ubicaciones WHERE id='$id_ubicacion' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $ubicacion=utf8_encode($row["ubicacion"]);
                      }
                    }
                       
                   $respuesta= $ubicacion;
  return $respuesta;
}

function _puntos($id_unico){
      include("../INCLUDES/CONEXION.php");
                            $void="";
                          $var_consulta= "SELECT * FROM ubicacion_de_ubicaciones WHERE id_unico_siembra='$id_unico' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $nombre_ubicacion=utf8_encode($row["nombre_ubicacion"]);
                                    $latitud=round($row["latitud"],4);
                                    $longitud=round($row["longitud"],4);

                       $void=$void.'<div class="card sombra mb-3"><div class="card-tittle ms-3">Punto:<b class="ms-1 me-2">'.$nombre_ubicacion.'</b> Lat: <b class="ms-1 me-2">'.$latitud.'</b> Long: <b class="ms-1 me-2">'.$longitud.'</b></div></div> ';

                      }
                    }
                       
                   $respuesta= $void;
  return $respuesta;
}


 ?>