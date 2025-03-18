     <?php include_once("../INCLUDES/CONEXION.php"); 
include("funciones_para_llenar_siembras.php");
session_start();
$id_usuario = $_SESSION["user_id"];

    $id_siembra = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';

                          $var_consulta= "SELECT * FROM siembra WHERE id_usuario_responsable='$id_usuario' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                $id_siembra=$row["id"];
                                 $id_unico=$row["id_unico"];
                                 $titulo=$row["titulo"];
                                 $id_tipo_de_siembra=$row["id_tipo_de_siembra"];
                                 $id_tipo_de_semilla=$row["id_tipo_de_semilla"];
                                 $id_estatus=$row["id_estatus"];
                                 $id_usuario_responsable=$row["id_usuario_responsable"];
                                 $id_ubicacion=$row["id_ubicacion"];
                                 $id_punto=$row["id_punto"];
                                 $foto_google_earth="REGISTROS_DE_SIEMBRA/".$row["foto_google_earth"];
                                 $numero_de_matas=$row["numero_de_matas"];
                                 $area=$row["area"];
                                 $foto="REGISTROS_DE_SIEMBRA/".$row["foto"];
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

        <div class="row bg-dark alinear-centro centrar mt-1 ver-bordes sombra mx-auto">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  mx-auto ">

          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-1 mt-1 mx-auto ">
              <div id="pruebas_id"></div>
               <strong class="mx-auto text-white">Orden de Trabajo</strong>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-1 mt-1  ">
          </div>
        </div>
<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_orden('registro_orden'); return false" id="registro_orden" novalidate>
<div class="row mt-2">
  <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  ">


                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Siembras Asignadas:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="id_unico_siembra" required>
                        <option value="" disabled selected>Seleccione una Siembra</option>
                           
                     <?php
                          $var_consulta= "SELECT * FROM siembra WHERE id_usuario_responsable='$id_usuario' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {
                                  $id_siembra=$row["id"];
                                  $id_unico=$row["id_unico"];
                                  $titulo=$row["titulo"];
                                  $id_tipo_de_siembra=$row["id_tipo_de_siembra"];
                                  $id_tipo_de_semilla=$row["id_tipo_de_semilla"];
                                  $id_estatus=$row["id_estatus"];
                                  $id_usuario_responsable=$row["id_usuario_responsable"];
                                  $id_ubicacion=$row["id_ubicacion"];
                                  $id_punto=$row["id_punto"];
                                  $foto_google_earth="REGISTROS_DE_SIEMBRA/".$row["foto_google_earth"];
                                  $numero_de_matas=$row["numero_de_matas"];
                                  $area=$row["area"];
                                  $foto="REGISTROS_DE_SIEMBRA/".$row["foto"];

                                  echo ' <option value="'.$id_unico.'">'.$titulo.'</option>' ;


                      }
                    }





     ?>
      
                      </select>
                    <div class="invalid-feedback">Seleccione una Siembra.</div>
                  </div> 


                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Asunto:</b></span>
                          <input class="form-control form-control-sm sombra" name="asunto" placeholder="Asunto..."  type="text"  autocomplete="off" required>
                          <div class="invalid-feedback">Agregue un Asunto.</div>
                        </div>
  

                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Caracter:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="caracter" required>
                        <option value="" disabled selected>Seleccione Caracter</option>

                            <option value="Permanente">Rutinario</option>
                            <option value="Temporal">Urgente</option>
      
                      </select>
                    <div class="invalid-feedback">Seleccione un Caracter.</div>
                  </div>  

                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha de Inicio:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha_inicio"  type="date"  autocomplete="off" required>
                          <div class="invalid-feedback">Seleccione una Fecha.</div>
                        </div>

                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Orden:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="tipo_de_orden" required>
                        <option value="" disabled selected>Seleccione un Tipo de Siembra</option>

                            <option value="Permanente">Permanente</option>
                            <option value="Temporal">Temporal</option>
                            <option value="Periodico">Periodico</option>
      
                      </select>
                    <div class="invalid-feedback">Seleccione un Tipo de Siembra.</div>
                  </div>

                          <span class="input-group-text sombra"><b>Instrucciones de Uso:</b></span>

                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <textarea class="form-control form-control-sm sombra" name="instrucciones" placeholder="Instrucciones de Uso..."  autocomplete="off" required></textarea>
                          <div class="invalid-feedback">Indique una Instrucción</div>
                        </div>
                          
  </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  ">

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Proveedor:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" onchange="load(this.value);" name="proveedor" required>
                        <option value="" disabled selected>Seleccione un Proveedor</option>

                                    <?php      
                                   $var_consulta= "SELECT * FROM proveedores";
                                    $respuesta = $con->query($var_consulta);
                                     if($respuesta->num_rows>0)
                                  {
                                     while ($row=$respuesta->fetch_array())
                                    {
                                      $id_proveedor=$row['id'];
                                      $nombre=$row['nombre'];
                                      echo '<option value="'.utf8_encode($id_proveedor).'">'.utf8_encode($nombre).'</option>';
                                    }
                                  }

                                     ?>
                      </select>
                    <div class="invalid-feedback">Seleccione un Proveedor.</div>
                  </div>  

                    <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Tipo de Producto:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="id_producto" id="select_tipo_producto" required>
                        <option value="" disabled selected>Seleccione un Producto</option>

                      </select>
                    <div class="invalid-feedback">Seleccione un producto.</div>
                  </div> 



                   <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                    <span class="input-group-text sombra"><b>Capataz Encargado:</b></span>
        
                      <select class="form-select form-control form-control-sm sombra" name="id_usuario_asignado" required>
                        <option value="" disabled selected>Seleccione un Capataz</option>

                                <?php 

                                              $var_consulta= "SELECT * FROM usuarios WHERE tipo=5 ";
                                              $respuesta = $con->query($var_consulta);
                                                if($respuesta->num_rows>0)
                                                    {
                                                       while ($row=$respuesta->fetch_array())
                                                      {

                                                        $id_capataz=utf8_encode($row["id"]);
                                                        $nombre_u=utf8_encode($row["nombre"]);
                                                        $apellido_u=utf8_encode($row["apellido"]);
                                                        $cedula_u=utf8_encode($row["cedula"]);
                                                  
                                                   echo '<option value="'.$id_capataz.'">'.$nombre_u.' '.$apellido_u.' ('.$cedula_u.')</option>';
                                          }
                                        }
                                    
                                    ?>
      
                      </select>
                    <div class="invalid-feedback">Seleccione un Capataz.</div>
                  </div>

                  <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha de Finalización:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha_finalizacion"  type="date"  autocomplete="off" required>
                          <div class="invalid-feedback">Seleccione una Fecha.</div>
                        </div>

                    <span class="input-group-text sombra"><b>Instrucciones Detalladas:</b></span>

                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <textarea class="form-control form-control-sm sombra" rows="4" name="instrucciones_detalladas" placeholder="Instrucciones Detalladas..."  autocomplete="off" required></textarea>
                          <div class="invalid-feedback">Indique una Instrucción a detalle</div>
                        </div>


    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-1 mt-1  ">
    </div>
</div>
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
        <button class="btn btn-success btn-sm sombra" type="submit" form="registro_orden">Registrar Orden</button>
        <br><br>
      </div>
       </div>
     </form>


<script type="text/javascript">
  
              function load(id_proveedor){
              var parametros = {"action":"ajax","id_proveedor":id_proveedor};
              $.ajax({
                url:'AGRONOMO/llenar_select_producto.php',
                data: parametros,
                success:function(data){
                  $("#select_tipo_producto").html(data);
                }
              })

            }
</script>