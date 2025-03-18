<?php 
include_once("../../INCLUDES/CONEXION.php");
 session_start();
 if(isset($_SESSION['user_id'])) {
 	$id_usuario = $_SESSION['user_id'];
 	$var_consulta="SELECT * FROM usuarios WHERE id='$id_usuario'";
 	$respuesta = $con->query($var_consulta); 
 	if($respuesta->num_rows>0)
       {
       	while ($row=$respuesta->fetch_array()){
       		$fname=$row["nombre"];
       		$lname=$row["apellido"];
       		$email=$row["usuario"];
       		$password=$row["clave"];

       	}
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

// ver contaseñas
function ver_nover(letra){

  var control = $('#imgver'+letra);
  var estatus = control.data('activo');
  
  var icon = $("#ojo"+letra);
  if (estatus == false) {
  
    control.data('activo', true);
    $(icon).removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    $("#txtPassword"+letra).attr('type', 'text');
  }
  else {
  
    control.data('activo', false);
    $(icon).removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    $("#txtPassword"+letra).attr('type', 'password');
  }
}
//ver contaseñas
</script>
<div class="col-12">
        <div class="row radius bg-dark  mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 mx-auto  text-center text-white">
              <strong class="text-center "><?php echo $fname." ".$lname; ?></strong><?php if($id_usuario==1){echo " (Administrador)";} ?>
          </div>
      </div>
    	<div class="row mx-auto mt-1">
      		<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
		      		<div class="card sombra border-dark" >
		              <div class="card-body" style="min-height: 310px;">
		                <h6 class="card-title bg-dark mb-3 p-2 sombra text-white">Cambiar Contraseña</h6>
						<form  class="needs-validation" enctype="multipart/form-data" onsubmit="cambio_de_claves('changeclave'); return false" id="changeclave" novalidate>
		      			   	<input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
		      			   	<input type="text" name="password" value="<?php echo $password; ?>" hidden>
		      			    <div class="input-group input-group-sm mb-5">
		                      <span class="input-group-text sombra"><b>Contraseña Actual:</b></span>
		                      <input class="form-control sombra"  placeholder="*********" id="txtPassword-a" name="password_actual" type="password"  autocomplete="off" required>
		                      <span class="input-group-text sombra ar-cursor-pointer" onclick="ver_nover('-a')" id="imgver-a" data-activo="false"><i class="bi bi-eye-fill" id="ojo-a"></i></span>
		                      <span class="input-group-text sombra"><i class="bi bi-lock"> </i></span>
		                      <div class="invalid-feedback input-group-text">Se Requiere una Contraseña.</div>
		                    </div>
		      			    <div class="input-group input-group-sm mb-3">
		                      <span class="input-group-text sombra"><b>Contraseña Nueva:</b></span>
		                      <input class="form-control sombra"  placeholder="*********" id="txtPassword-b" name="password_nueva" type="password"  autocomplete="off" required>
		                      <span class="input-group-text sombra ar-cursor-pointer" onclick="ver_nover('-b')" id="imgver-b" data-activo="false"><i class="bi bi-eye-fill" id="ojo-b"></i></span>
		                      <span class="input-group-text sombra"><i class="bi bi-lock"> </i></span>
		                      <div class="invalid-feedback input-group-text">Se Requiere una Contraseña.</div>
		                    </div>
		      			    <div class="input-group input-group-sm mb-3">
		                      <span class="input-group-text sombra"><b>Repita la Nueva Contraseña:</b></span>
		                      <input class="form-control sombra"  placeholder="*********" id="txtPassword-c" name="password_repetida" type="password"  autocomplete="off" required>
		                      <span class="input-group-text sombra ar-cursor-pointer" onclick="ver_nover('-c')" id="imgver-c" data-activo="false"><i class="bi bi-eye-fill" id="ojo-c"></i></span>
		                      <span class="input-group-text sombra"><i class="bi bi-lock"> </i></span>
		                      <div class="invalid-feedback input-group-text">Se Requiere una Contraseña.</div>
		                    </div>
		                    <button class="btn btn-primary btn-sm sombra mt-2 mb-2 center-block" type="submit" form="changeclave"><i class="bi bi-person-lock me-1 text-md"></i>Cambiar Contraseña</button>
		                </form>
		            </div>
		        </div>
      		</div>
      		 <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
      		 	<div class="card sombra border-dark" >
		            <div class="card-body" style="min-height: 310px;">
		            <form  class="needs-validation" enctype="multipart/form-data" onsubmit="update_informacion('update_info'); return false" id="update_info" novalidate>
		               <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
		               <h6 class="card-title bg-dark mb-2 p-2 sombra text-white">información del Perfil </h6>
		               	<h6><span class="badge text-bg-dark mb-2">¡Recuerde que su correo es su usuario de ingreso!</span></h6>
		               	<div class="input-group input-group-sm mb-4 mt-2">
		                      <span class="input-group-text sombra"><b>Correo:</b></span>
		                      <input class="form-control sombra"  placeholder="correo@correo.com"  name="email" type="email" value="<?php echo $email; ?>"  autocomplete="off" required>
		                      <span class="input-group-text sombra" ><i class="bi bi-at"></i></span>
		                      <div class="invalid-feedback input-group-text">Debe Colocar Un Correo Valido.</div>
		                 </div>

		                 <div class="input-group input-group-sm mb-3">
		                      <span class="input-group-text sombra"><b>Nombre:</b></span>
		                      <input class="form-control sombra"  placeholder="Nombre..."  name="fname" type="text" value="<?php echo $fname; ?>"  autocomplete="off" required>
		                      <span class="input-group-text sombra" ><i class="bi bi-asterisk"></i></span>
		                      <div class="invalid-feedback input-group-text">Debe Colocar Un Nombre Valido.</div>
		                 </div>
		                 <div class="input-group input-group-sm mb-3">
		                      <span class="input-group-text sombra"><b>Apellido:</b></span>
		                      <input class="form-control sombra"  placeholder="Apellido..."  name="lname" type="text" value="<?php echo $lname; ?>"  autocomplete="off" required>
		                      <span class="input-group-text sombra" ><i class="bi bi-asterisk"></i></span>
		                      <div class="invalid-feedback input-group-text">Debe Colocar Un Apellido Valido.</div>
		                 </div>
		                 <button class="btn btn-primary btn-sm sombra mt-2 mb-2 center-block" type="submit" form="update_info"><i class="bi bi-person-lines-fill me-1 text-md"></i>Actualizar Información</button>
		            	</form>
		            </div>
		        </div>
      		</div>
      	</div>

 </div>