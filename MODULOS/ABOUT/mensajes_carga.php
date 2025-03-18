<?php 
include_once("../../INCLUDES/CONEXION.php");
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    $busqueda = (isset($_REQUEST['busqueda'])&& $_REQUEST['busqueda'] !=NULL)?$_REQUEST['busqueda']:'';
    if($action == 'ajax'){
        include '../../INCLUDES/PAGINATION.php'; //incluir el archivo de paginación
        //las variables de paginación
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page =25; //la cantidad de registros que desea mostrar
        $adjacents  = 4; //brecha entre páginas después de varios adyacentes
        $offset = ($page - 1) * $per_page;
        //Cuenta el número total de filas de la tabla*/
        $query_a_buscar="SELECT count(*) AS numrows FROM modulo_about_contacto ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." WHERE fname LIKE '%$busqueda%' OR email LIKE '%$busqueda%'";
        }

        $count_query   = mysqli_query($con,$query_a_buscar);
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
        $total_pages = ceil($numrows/$per_page);
        $reload = 'MODULOS/ABOUT/mensaje.php';
        //consulta principal para recuperar los datos
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
  <div class="dentro-noti-over-scroll">
    <div class="table-responsive">
       <?php if($total_pages!=0){ ?>
      <table class=" table table-sm table-bordered table-hover sombra align-middle">
        <tr>
          <th width="20%" >Nombre y Apellido</th>
          <th width="15%" >Correo</th>
          <th width="25%" >Mensaje</th>
          <th width="25%" >Respuesta</th>
          <th width="15%"  class="text-center">*</th>

        </tr>
      <?php } ?>
<?php
    $query_a_ejecutar="SELECT * FROM modulo_about_contacto ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." WHERE fname LIKE '%$busqueda%' OR email LIKE '%$busqueda%'";
        }
        $query_a_ejecutar=$query_a_ejecutar." ORDER BY fname ASC LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                   $id_eliminar=$row["id"];
                   $fname=$row["fname"];
                   $lname=$row["lname"];
                   $email=$row["email"];
                   $mensaje=$row["mensaje"];
                   $respuesta=$row["respuesta"];
              

?>
          <tr class="ar-cursor-pointer">
           <td> <?php echo $fname." ".$lname; ?></td>
           <td> <?php echo $email; ?></td>
           <td>
         <a href="#" data-bs-toggle='modal' data-bs-target='#mensaje_completo<?php echo $id_eliminar;?>'>
            <?php echo substr($mensaje,0,30); ?>...
          </a>



<div class='modal fade text-center modal_a_cerrar' id='mensaje_completo<?php echo $id_eliminar;?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog  modal-lg '>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>
        <b class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="mensaje_completo<?php echo $id_eliminar;?>_titulo_modal" class="text-center text-black">Mensaje de: <?php echo $fname." ".$lname; ?> - <?php echo $email; ?></b></center></b>
          
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="mensaje_completo<?php echo $id_eliminar;?>_contenido_de_modal text-center">
          <center> <p class="text-black">
            <?php echo $mensaje; ?>
          </p></center>
        </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-sm btn-secondary sombra" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


















           </td>
           <td>
         <?php if ($respuesta!="Sin Responder") {
  ?>
         <a href="#" data-bs-toggle='modal' data-bs-target='#respuesta_completa<?php echo $id_eliminar;?>'>

            <?php echo substr($respuesta,0,30); ?>...
          </a>
<?php }else{
echo substr($respuesta,0,30)."...";
} ?>





<div class='modal fade text-center modal_a_cerrar' id='respuesta_completa<?php echo $id_eliminar;?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog  modal-lg '>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>
        <b class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="respuesta_completa<?php echo $id_eliminar;?>_titulo_modal" class="text-center text-black">Respondido a: <?php echo $fname." ".$lname; ?> - <?php echo $email; ?></b></center></b>
          
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="respuesta_completa<?php echo $id_eliminar;?>_contenido_de_modal text-center">
          <center> <p class="text-black">
            <?php echo $respuesta; ?>
          </p></center>
        </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-sm btn-secondary sombra" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
          </td>
           <td class="text-center">


<?php if ($respuesta=="Sin Responder") {
  ?>


        <a href="#" class="btn btn-sm btn-success sombra me-1" data-bs-toggle='modal' data-bs-target='#mensaje_para<?php echo $id_eliminar;?>'><i class="bi bi-send "></i>Responder</a>
<?php } ?>
             <a href="#" class="btn btn-sm btn-danger sombra"style="float: right;" onclick="modulo_about_eliminar_mensaje('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>




<form  class="needs-validation" enctype="multipart/form-data" onsubmit="respuesta_al_correo('respuesta_alC<?php echo $id_eliminar; ?>'); return false" id="respuesta_alC<?php echo $id_eliminar; ?>" novalidate>

<div class='modal fade text-center modal_a_cerrar' id='mensaje_para<?php echo $id_eliminar;?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog  modal-lg '>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>
        <b class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="mensaje_para<?php echo $id_eliminar;?>_titulo_modal" class="text-center text-black">Responder a: <?php echo $fname." ".$lname; ?> - <?php echo $email; ?></b></center></b>
          
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="mensaje_para<?php echo $id_eliminar;?>_contenido_de_modal text-center">
                        <input type="number" name="id_mensaje" value="<?php echo $id_eliminar;?>" hidden>
                        <input type="text" name="correo" value="<?php echo $email;?>" hidden>
                        <span class="input-group-text sombra"><b>Respuesta:</b></span>
                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          
                          
                            <textarea class="form-control form-control-sm sombra" rows="6" name="respuesta" placeholder="Respuesta..." autocomplete="off" required></textarea>


                            <div class="invalid-feedback">Ingrese una Respuesta.</div>

                        </div>
                                              

        </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm sombra" type="submit" form="respuesta_alC<?php echo $id_eliminar; ?>"><i class="bi bi-send "></i>Enviar Respuesta</button>

        <button type="button" class="btn btn-sm btn-secondary sombra" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

</form>



           </td>
         </tr>
<?php
}
?>
</table>
  </div>
</div>
</div>
    <?php if($total_pages>=2){ ?>
      <center>
            <table class="auto-table" align="center">
                <tr>
                    <td class="paginador"width="100%" align="center">
                        <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </td>
                </tr>
            </table>
            </center>
        <?php } ?>
<?php 
}else{

     ?>
  
<div class="row mx-auto">
  <div class="col-12 text-center ">
    <div class="alert alert-primary sombra mx-auto" style="width: 70%">
      <strong>¡No hay Registros!</strong>
    </div>
  </div>
</div>

     <?php
    }

}
 ?>