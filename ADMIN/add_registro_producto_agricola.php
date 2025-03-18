<?php include_once("../INCLUDES/CONEXION.php");





	$id_proveedor=$_POST["id_proveedor"];
	$nombre_producto=$_POST["nombre_producto"];
	$nombre_cientifico=$_POST["nombre_cientifico"];
	$descripcion_de_uso=$_POST["descripcion_de_uso"];
	$presentacion=$_POST["presentacion"];
	$laboratorio=$_POST["laboratorio"];
	$posologia=$_POST["posologia"];
	$id_tipo_de_cultivo=$_POST["tipo_de_cultivo"];
	$restricciones=$_POST["restricciones"];
	$observaciones=$_POST["observaciones"];
	




			$var_reg_producto="INSERT INTO `productos_agricolas`(`id_proveedor`,`nombre`,`nombre_cientifico`,`descripcion_de_uso`,`presentacion`,`laboratorio`,`posologia`,`id_tipo_de_cultivo`,`restricciones`,`observaciones`) VALUES ('$id_proveedor','$nombre_producto','$nombre_cientifico','$descripcion_de_uso','$presentacion','$laboratorio','$posologia','$id_tipo_de_cultivo','$restricciones','$observaciones')";

			$var_reg_producto = $con->query($var_reg_producto); 
			$id_rec=$con -> insert_id;
			if($var_reg_producto){



			$var_reg_calificacion="INSERT INTO `calificaciones`(`id_producto`, `tabla_de_producto`, `calificacion`) VALUES ('$id_rec','productos_agricolas',0.0)";

			$var_reg_calificacion = $con->query($var_reg_calificacion); 





			echo "<script>alerta_srcs('producto_registrado');</script>";

			}else{
			echo "<script>alerta_login('error');</script>";
			}






 ?>
