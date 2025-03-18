<?php 
include_once("../INCLUDES/CONEXION.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../INCLUDES/Exception.php';
require '../INCLUDES/PHPMailer.php';
require '../INCLUDES/SMTP.php';


$fecha_actual=date("Y-m-d");


$var_consulta= "SELECT * FROM ordenes_de_trabajo ";
                                    $respuesta = $con->query($var_consulta);
                                      if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      
                                            $id_orden=$row["id"];
							                $asunto=$row["asunto"];
							                $tipo_de_orden=$row["tipo_de_orden"];
							                $caracter=$row["caracter"];
							                $fecha_inicio=$row["fecha_inicio"];
							                $fecha_finalizacion=$row["fecha_finalizacion"];
							                $instrucciones=utf8_encode($row["instrucciones"]);
							                $instrucciones_detalladas=utf8_encode($row["instrucciones_detalladas"]);
							                $id_producto=$row["id_producto"];
							                $id_usuario_asignado=$row["id_usuario_asignado"];
							                $id_usuario_emisor=$row["id_usuario_emisor"];
							                $id_unico_siembra=$row["id_unico_siembra"];	

		if ($fecha_actual>=$fecha_inicio && $fecha_actual<=$fecha_finalizacion) {

			
 $var_consulta2= "SELECT * FROM usuarios WHERE id='$id_usuario_asignado' ";
                          $respuesta2 = $con->query($var_consulta2);
                            if($respuesta2->num_rows>0)
                                {
                                   while ($row2=$respuesta2->fetch_array())
                                  {

                                    $nombre_u=utf8_encode($row2["nombre"]);
                                    $apellido_u=utf8_encode($row2["apellido"]);
                                    $cedula_u=utf8_encode($row2["cedula"]);
                                    $correo_asignado=utf8_encode($row2["usuario"]);
                      
                      }
                    }
                          $var_consulta3= "SELECT * FROM productos_agricolas WHERE id='$id_producto' ";
                          $respuesta3 = $con->query($var_consulta3);
                            if($respuesta3->num_rows>0)
                                {
                                   while ($row3=$respuesta3->fetch_array())
                                  {

                                    $nombre_producto=utf8_encode($row3["nombre"]);
                                    $id_proveedor=utf8_encode($row3["id_proveedor"]);
                      }
                    }

                          $var_consulta24= "SELECT * FROM proveedores WHERE id='$id_proveedor' ";
                          $respuesta24 = $con->query($var_consulta24);
                            if($respuesta24->num_rows>0)
                                {
                                   while ($row4=$respuesta24->fetch_array())
                                  {

                                    $nombre_p=utf8_encode($row4["nombre"]);
                                    $rif=utf8_encode($row4["rif"]);
                      }
                    }

$correo_destino=$correo_asignado;
$nombre_destino="RCS";




$mail = new PHPMailer(true);
						try {

						    $mail->isSMTP();                                            //Send using SMTP
						    $mail->Host       = $mail_Host;                     //Set the SMTP server to send through
						    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
						    $mail->Username   = $mail_Username;                     //SMTP username
						    $mail->Password   = $mail_Password;                               //SMTP password
						    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
						    $mail->Port       = 465;                        

						    //Recipients
						    $mail->setFrom($mail_setFrom_1, $mail_setFrom_2);

						    $mail->addAddress($correo_destino, $nombre_destino);     //Add a recipient

						    //Content
						    $mail->isHTML(true);                                  //Set email format to HTML
						    $mail->Subject = 'Delafink';
						    $mail->Body    = '
						    	<b>Notificación Diaria de Tarea Activa.</b><br>

								<h5>Asunto:'.$asunto.' </h5><br>
								<p>
								Dicha tarea es de caracter '.$caracter.' y de tipo '.$tipo_de_orden.'
								la fecha de inicio sera: '.$fecha_inicio.' y de finalización: '.$fecha_finalizacion.'
								</p>
								<br>
								<p>
								Producto: '.$nombre_producto.' del Poveedor: '.$nombre_p.'
								</p>
								<br>
								<p>
								<h5>Intrucciones de Uso</h5>
								'.$instrucciones.'
								</p>
								<br>
								<p>
								<h5>Intrucciones detalladas</h5>
								'.$instrucciones_detalladas.'
								</p>
								<br>
								<i>Recibira un correo diario durante los dias que la tarea este activa.</i>
						            ';
						    $mail->AltBody = 'https://www.delafink.com';

						    $mail->send();
						echo "<script>alert('".$correo_destino."');</script>";
						    // Aqui va si queremos notificar envio del correo
						} catch (Exception $e) {
						    // Aqui para notificar fallo al enviar el correro
						//echo "<script>alert('error');</script>";

						}







		}















                                    }// fin del While
                                  }


 ?>