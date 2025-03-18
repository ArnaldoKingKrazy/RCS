<?php 
include_once("../INCLUDES/CONEXION.php");
$id_producto=$_POST["id_producto"];
$costo=$_POST["costo"];
$fecha=$_POST["fecha"];
$cantidad=$_POST["cantidad"];

$var_reg_user="INSERT INTO `compras_de_productos_agricolas`( `id_producto`, `costo`, `fecha`,`cantidad`) VALUES ('$id_producto','$costo','$fecha','$cantidad')";
$var_reg_user = $con->query($var_reg_user); 

if($var_reg_user){


                                   $var_consulta= "SELECT * FROM almacen WHERE tabla='productos_agricolas' AND id_producto='$id_producto'";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {

                                     while ($row=$respuesta->fetch_array())
                                    {
                         
                                      $cantidad_actual=$row['cantidad'];
                                    }
                                    $new_cantidad = $cantidad_actual+$cantidad;
                                  	$var_update_cant="UPDATE `almacen` SET `cantidad`='$new_cantidad' WHERE tabla='productos_agricolas' AND id_producto='$id_producto'";
											$var_update_cant = $con->query($var_update_cant);
                                  }else{
										$var_insert_cant="INSERT INTO `almacen`( `tabla`,`id_producto`, `cantidad`) VALUES ('productos_agricolas','$id_producto','$cantidad')";
										$var_insert_cant = $con->query($var_insert_cant); 

                                  }








echo "<script>alerta_srcs('compra_registrada_producto_agricola');</script>";

}else{
echo "<script>alerta_login('error');</script>";
}
?>