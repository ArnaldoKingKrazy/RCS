<?php include "../INCLUDES/CONEXION.php";
    $id = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';


	$var_consulta= "SELECT * FROM usuarios WHERE id='$id'";
    $respuesta = $con->query($var_consulta);
     if($respuesta->num_rows>0)
      {
       while ($row=$respuesta->fetch_array())
       {
                   $id_usuario=$row["id"];
                   $fname=$row["nombre"];
                   $lname=$row["apellido"];
                   $email=$row["usuario"];
                   $tipo_id=$row["tipo"];
                   $cedula=$row["cedula"];
                   $estado_civil=$row["estado_civil"];
                   $fecha_nac=$row["fecha_nac"];
                   $tiene_contrato=$row["tiene_contrato"];
                   $sueldo=$row["sueldo"];
        }
       }








 ?>


 <script type="text/javascript">
        (function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, true)
    })
})()

function activar_form(){
  $(".form-check-input").removeAttr("disabled");
	$(".form-control").removeAttr("disabled");
	$("#boton_actualizar").removeAttr("hidden");
	$("#b_no_edit").removeAttr("hidden");
	$("#b_edit").attr("hidden",true);

}
function desactivar_form(){
  $(".form-control").attr("disabled",true);
	$(".form-check-input").attr("disabled",true);
	$("#boton_actualizar").attr("hidden",true);
	$("#b_edit").removeAttr("hidden");
	$("#b_no_edit").attr("hidden",true);

}

</script>

    <div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">
<button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="admin_lista_de_registrados();">Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Información de <?php echo $fname." ".$lname; ?></strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">

            
          </div>
        </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h5 class="mt-2 text-center">Datos Personales</h5>
      </div>
       </div>

        <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 fondo_verdecito sombra pt-2">
              <form  class="needs-validation" enctype="multipart/form-data" onsubmit="actualizar_registrado('registro'); return false" id="registro" novalidate>
	<input type="number" name="id_a_actualizar" value="<?php echo $id_usuario; ?>" hidden>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Usuario:</b></span>

                      <select class="form-select form-control form-control-sm sombra" name="tipo_usuario" disabled>
                    

                                    <?php      
                                   $var_consulta= "SELECT * FROM tipo_de_usuario ";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_tipo=$row['id'];
                                      $tipo=$row['tipo'];
                                      if ($id_tipo==$tipo_id) {
                                      echo '<option  selected value="'.utf8_encode($id_tipo).'">'.utf8_encode($tipo).'</option>';
                                      	
                                      }else{
                                      echo '<option  value="'.utf8_encode($id_tipo).'">'.utf8_encode($tipo).'</option>';
                                 			 }
                                    }
                                  }

                                     ?>
                      </select>
                  </div>

                 <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre:</b></span>
                    <input class="form-control form-control-sm sombra" name="fname" placeholder="Nombre" type="text" value="<?php echo utf8_encode($fname);?>"   autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Apellido:</b></span>
                    <input class="form-control form-control-sm sombra" name="lname" placeholder="Apellido" type="text" value="<?php echo utf8_encode($lname);?>"   autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese un apellido valido.</div>
                  </div>

					<div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Cedula:</b></span>
                    <input class="form-control form-control-sm sombra" name="cedula" pattern=".{6,7,8}" value="<?php echo utf8_encode($cedula);?>" placeholder="cedula" type="number"  autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese una cedula valida.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Fecha de Nacimiento:</b></span>
                    <input class="form-control form-control-sm sombra" name="fecha_nacimiento" type="date" value="<?php echo $fecha_nac;?>"  required disabled>
                    <div class="invalid-feedback">Ingrese una fecha valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="email" placeholder="correo@correo.com" value="<?php echo utf8_encode($email);?>" type="email"  autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>
    	
                <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Estado Civil:</b></span>

                  <select class="form-select form-control form-control-sm sombra" name="estado_civil" required disabled>
                      
                        <option <?php if($estado_civil=="Soltero(a)"){echo "selected";} ?> value="Soltero(a)" >Soltero(a)</option>
                        <option <?php if($estado_civil=="Casado(a)"){echo "selected";} ?> value="Casado(a)" >Casado(a)</option>
                        <option <?php if($estado_civil=="Divorciado(a)"){echo "selected";} ?> value="Divorciado(a)" >Divorciado(a)</option>
                        <option <?php if($estado_civil=="Viudo(a)"){echo "selected";} ?> value="Viudo(a)" >Viudo(a)</option>
                      </select>
                </div>

              <div class="input-group input-group-sm mb-3 mr-5 ml-5 pl-10">
                    <span class="input-group-text sombra ml-5"><b>Contrato:</b></span>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="contratosi" type="radio" name="tiene_contrato" disabled <?php if($tiene_contrato="Si"){echo "checked";} ?>>
                    <label class="ar-cursor-pointer" for="contratosi">Si</label>
                  </div>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="contratono" type="radio" name="tiene_contrato" disabled <?php if($tiene_contrato="No"){echo "checked";} ?>>
                    <label class="ar-cursor-pointer" for="contratono">No</label>
                  </div>
                  <input type="text" name="contrato" value="<?php echo $tiene_contrato; ?>" id="contrato_input" hidden>
            </div> 

                 <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Sueldo:</b></span>
                    <input class="form-control form-control-sm sombra" name="sueldo" min="1" value="<?php echo utf8_encode($sueldo);?>"  placeholder="sueldo" type="number"  autocomplete="off" required disabled>
                    <div class="invalid-feedback">Ingrese una sueldo valido.</div>
                  </div>

                          </form>
					<center>
						<table>
							<tr>
							<td>
							<button id="boton_actualizar" hidden class="btn btn-primary btn-sm sombra mt-3" type="submit" form="registro"><i class="bi bi-person me-1 text-md"></i>Actualizar</button>
							</td>
							<td>
								<button class="btn btn-sm btn-secondary sombra mt-3"  onclick="desactivar_form();" hidden id="b_no_edit">Cancelar</button>
							</td>
						</tr>
						</table>


                   
<button class="btn btn-sm btn-primary sombra mt-3" onclick="activar_form();"  id="b_edit">Editar Datos</button>

               </center>        <br>


              </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-12 fondo_verdecito sombra pt-2">

      </div>



          </div>

