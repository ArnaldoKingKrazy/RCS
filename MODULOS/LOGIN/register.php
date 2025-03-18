<?php include "../../INCLUDES/CONEXION.php"; ?>
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
$("#imgContrasena").click(function () {

  var control = $(this);
  var estatus = control.data('activo');
  
  var icon = $("#ojo");
  if (estatus == false) {
  
    control.data('activo', true);
    $(icon).removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    $("#txtPassword").attr('type', 'text');
  }
  else {
  
    control.data('activo', false);
    $(icon).removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    $("#txtPassword").attr('type', 'password');
  }
});
//ver contaseñas



$("#hijosi").click(function () {
$("#divhijos").removeAttr("hidden");
llenar_form_hijos();
$("#tenencia_hijos_input").val("SI");


});

$("#hijono").click(function () {
$("#divhijos").attr("hidden",true);
$("#datos_de_hijos").empty();
$("#tenencia_hijos_input").val("NO");
$("#numero_hijos").val(1);

});


$("#dotasi").click(function () {
$("#divdota").removeAttr("hidden");
$("#div_dota").removeAttr("hidden");
$("#dotacion_input").val("SI");
llenar_dota();
});

$("#dotano").click(function () {
$("#divdota").attr("hidden",true);
$("#div_dotaciones").empty();
$("#dotacion_input").val("NO");
$("#numero_dota").val(1);
});

$("#contratosi").click(function () {
$("#contrato_input").val("SI");
});

$("#contratono").click(function () {
$("#contrato_input").val("NO");
});

</script>


    <div class="col-12">
        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">
            <button class="btn btn-sm btn-primary sombra" style="float: left;" onclick="admin_lista_de_registrados();">Regresar</button>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Registro de Nuevo Usuario</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h5 class="mt-2 text-center">Datos Personales</h5>
      </div>
       </div>
<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrarme('registro'); return false" id="registro" novalidate>
       <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Usuario:</b></span>




                      <select class="form-select form-control form-control-sm sombra" name="tipo_usuario" required>
                        <option value="" disabled selected>Seleccione un Tipo</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM tipo_de_usuario WHERE id!=1";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_tipo=$row['id'];
                                      $tipo=$row['tipo'];
                                      echo '<option value="'.utf8_encode($id_tipo).'">'.utf8_encode($tipo).'</option>';
                                    }
                                  }

                                     ?>
                      </select>


                    <div class="invalid-feedback">Ingrese un Tipo de Usuario Valido</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre:</b></span>
                    <input class="form-control form-control-sm sombra" name="fname" placeholder="Nombre" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Apellido:</b></span>
                    <input class="form-control form-control-sm sombra" name="lname" placeholder="Apellido" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un apellido valido.</div>
                  </div>

                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Cedula:</b></span>
                    <input class="form-control form-control-sm sombra" name="cedula" pattern=".{6,7,8}"  placeholder="cedula" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una cedula valida.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Fecha de Nacimiento:</b></span>
                    <input class="form-control form-control-sm sombra" name="fecha_nacimiento" type="date"  required>
                    <div class="invalid-feedback">Ingrese una fecha valido.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="email" placeholder="correo@correo.com" type="email"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>

                <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Estado Civil:</b></span>

                  <select class="form-select form-control form-control-sm sombra" name="estado_civil" required>
                        <option value="" disabled selected>Seleccione un Estado Civil</option>
                        <option value="Soltero(a)" >Soltero(a)</option>
                        <option value="Casado(a)" >Casado(a)</option>
                        <option value="Divorciado(a)" >Divorciado(a)</option>
                        <option value="Viudo(a)" >Viudo(a)</option>
                      </select>
                </div>
              <div class="input-group input-group-sm mb-3 mr-5 ml-5 pl-10">
                    <span class="input-group-text sombra ml-5"><b>Contrato:</b></span>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="contratosi" type="radio" name="tiene_contrato">
                    <label class="ar-cursor-pointer" for="contratosi">Si</label>
                  </div>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="contratono" type="radio" name="tiene_contrato" checked>
                    <label class="ar-cursor-pointer" for="contratono">No</label>
                  </div>
                  <input type="text" name="contrato" value="NO" id="contrato_input" hidden>
            </div> 
                <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Sueldo:</b></span>
                    <input class="form-control form-control-sm sombra" name="sueldo" min="1"  placeholder="sueldo" type="number"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese una sueldo valido.</div>
                  </div>
                 <!--
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Contraseña:</b></span>
                    <input class="form-control form-control-sm sombra" id="txtPassword" type="password" name="password" pattern=".{8,100}" placeholder="Ingresa tu contraseña"  autocomplete="off" required>
                     <span class="input-group-text sombra ar-cursor-pointer" id="imgContrasena" data-activo="false"><i class="bi bi-eye-fill" id="ojo"></i></span>
                    <div class="invalid-feedback">Ingrese una contraseña valida.</div>
                  </div>
                -->
           <div class="input-group input-group-sm mb-3 mr-5 ml-5 pl-10">
                    <span class="input-group-text sombra ml-5"><b>Dotación:</b></span>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="dotasi" type="radio" name="tiene_dota">
                    <label class="ar-cursor-pointer" for="dotasi">Si</label>
                  </div>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="dotano" type="radio" name="tiene_dota" checked>
                    <label class="ar-cursor-pointer" for="dotano">No</label>
                  </div>
                  <input type="text" name="tiene_dotacion"value="NO" id="dotacion_input" hidden>
            </div> 

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5" style="width: 250px;" id="divdota" hidden>
                    <span class="input-group-text sombra"><b>Numero de Dotaciones:</b></span>
                    <input class="form-control form-control-sm sombra" name="numero_dota" onchange="llenar_dota();" id="numero_dota" type="number" min="1" value="1">
                    <div class="invalid-feedback">Ingrese un numero Valido.</div>
                  </div>
          <div id="div_dotaciones">
            

          </div>  
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">

            <div class="input-group input-group-sm mb-3 mr-5 ml-5 pl-10">
                    <span class="input-group-text sombra ml-5"><b>Tiene Hijos:</b></span>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="hijosi" type="radio" name="tiene_hijos">
                    <label class="ar-cursor-pointer" for="hijosi">Si</label>
                  </div>

                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input sombra id_tema" id="hijono" type="radio" name="tiene_hijos" checked>
                    <label class="ar-cursor-pointer" for="hijono">No</label>
                  </div>
            </div>
                  <input type="text" name="tenencia_hijos"value="NO" id="tenencia_hijos_input" hidden>


                  <div class="input-group input-group-sm mb-3 mr-5 ml-5" id="divhijos" style="width: 200px;" hidden>
                    <span class="input-group-text sombra"><b>Numero de Hijos:</b></span>
                    <input class="form-control form-control-sm sombra"  name="numero_hijos" onchange="llenar_form_hijos();" id="numero_hijos" type="number" min="1" value="1">
                    <div class="invalid-feedback">Ingrese un numero Valido.</div>
                  </div>

                  <div id="datos_de_hijos" style="margin-left: 20px;">
                    
                  </div>



      </div>
    </div>
       <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">

            


                            <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="registro"><i class="bi bi-person me-1 text-md"></i>Registrar</button>
      </div>
    </div>
   </form>



<script type="text/javascript">
  function llenar_form_hijos(){
var numero = $("#numero_hijos").val();
var url="MODULOS/LOGIN/llenar_form_hijos.php";
$.post(url,{numero:numero},function(response){
    $('#datos_de_hijos').html(response);
})
}

  function llenar_dota(){
var numero = $("#numero_dota").val();
var url="MODULOS/LOGIN/llenar_dota.php";
$.post(url,{numero:numero},function(response){
    $('#div_dotaciones').html(response);
})
}

</script>





























