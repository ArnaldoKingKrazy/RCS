<?php 
include_once("../../INCLUDES/CONEXION.php");
session_start();
if(isset($_SESSION["user_id"])){$user_id=$_SESSION["user_id"];}

$var_user="SELECT * FROM users WHERE user_id='$user_id'";
$res_var_user = $con->query($var_user);
if($res_var_user->num_rows>0)
             {
             while ($row3=$res_var_user->fetch_array())
            {
            $fname=$row3["fname"];
            $lname=$row3["lname"];
            $email=$row3["email"];

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
</script>
<div class="col-12 mt-2">
        <div class="row mx-auto">
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1">

          </div>
          <div class="col-lg-6 col-md-8 col-sm-10 col-12 mb-1 mt-1 ver-bordes border-secondary sombra">
            <header class="bg-info sombra text-center pb-2 pt-2"><h4>Contactanos</h4></header>
            <div class="row">
              <div class="col-12 p-5">
                <form  class="needs-validation" enctype="multipart/form-data" onsubmit="envio_de_mensaje_contacto('contactor'); return false" id="contactor" novalidate>
                  <input type="text" name="donde" value="usuario" hidden>
                  <input type="text" name="fname" value="<?php echo $fname;?>" hidden>
                  <input type="text" name="lname" value="<?php echo $lname;?>" hidden>
                  <input type="text" name="email" value="<?php echo $email;?>" hidden>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Nombre:</b></span>
                    <input class="form-control form-control-sm sombra" name="fn" disabled value="<?php echo $fname;?>" placeholder="Nombre" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un nombre valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Apellido:</b></span>
                    <input class="form-control form-control-sm sombra" name="ln" disabled value="<?php echo $lname;?>" placeholder="Apellido" type="text"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un apellido valido.</div>
                  </div>
                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Correo:</b></span>
                    <input class="form-control form-control-sm sombra" name="em" disabled value="<?php echo $email; ?>" placeholder="correo@correo.com" type="email"  autocomplete="off" required>
                    <div class="invalid-feedback">Ingrese un correo valido.</div>
                  </div>
                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <textarea class="form-control form-control-sm sombra" name="mensaje" required></textarea>
                    <div class="invalid-feedback">Debe LLenar este Campo.</div>
                  </div>
                  <div class="col text-center">
                    <button class="btn btn-primary btn-sm sombra mt-3" type="submit" form="contactor"><i class="bi bi-at me-1 text-md"></i>Enviar Mensaje</button>
                 
                  </div>
                  </div>

                </form>
                </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-2 col-sm-1 col-12 mb-1 mt-1 ">
          </div>
        </div>

        
</div>