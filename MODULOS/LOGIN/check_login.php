<?php 
include_once("../../INCLUDES/CONEXION.php");
session_destroy();
session_start();
$usuario= $_POST['usuario'];
$password =$_POST['password'];

			$var_consulta2= "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$password'";
			$respuesta2 = $con->query($var_consulta2);
				if($respuesta2->num_rows>0)
			      	{
			      	 while ($row=$respuesta2->fetch_array())
			    		{
			    			$tipo_id= $row['tipo'];
			    			$_SESSION["user_id"] = $row['id'];
			    			$_SESSION["tipo_id"] = $row['tipo'];
			    		}
			      		

			    		if ($tipo_id>=1){
			    			echo '<script> hacerbackup_and_zip();</script>';
			      			echo "<script>logueo_admin();</script>";

			    		}else{
			      			echo "<script>logueo_usuario();</script>";
			    		
			    		}

			    	}else{
			      		echo "<script>alerta_login('datos_erroneos');</script>";

			    	}

 ?>