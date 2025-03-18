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



function cargador_de_calificacion(id_calificado){
let calificacion=parseFloat($("#calificacion_input"+id_calificado).val());

    var parametros = {"action":"ajax","calificacion":calificacion};
    $.ajax({
      url:'ADMIN/cargar_calificaciones.php',
      data: parametros,
      success:function(data){
        $("#cargar_calificacion"+id_calificado).html(data);
      }
    })
}


function sumar_calificacion(id_calificado){
let calificacion=parseFloat($("#calificacion_input"+id_calificado).val());
calificacion= calificacion+0.5;
var tabla="productos_agricolas";
var parametros = {"action":"ajax","id_producto":id_calificado,"tabla":tabla,"calificacion":calificacion};

    $.ajax({
      url:'ADMIN/calificar.php',
      data: parametros,
      success:function(data){
        $("#alertas").html(data);
      }
    })

}
function restar_calificacion(id_calificado){
let calificacion=parseFloat($("#calificacion_input"+id_calificado).val());
calificacion= calificacion-0.5;
var tabla="productos_agricolas";
var parametros = {"action":"ajax","id_producto":id_calificado,"tabla":tabla,"calificacion":calificacion};

    $.ajax({
      url:'ADMIN/calificar.php',
      data: parametros,
      success:function(data){
        $("#alertas").html(data);
      }
    })

}
    function calificado(id_calificado,new_number){
    $("#calificacion_input"+id_calificado).val(new_number);
    cargador_de_calificacion(id_calificado);
  }



</script>

<?php 
include_once("../INCLUDES/CONEXION.php");
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    $busqueda = (isset($_REQUEST['busqueda'])&& $_REQUEST['busqueda'] !=NULL)?$_REQUEST['busqueda']:'';
    if($action == 'ajax'){
        include '../INCLUDES/PAGINATION.php'; //incluir el archivo de paginación
        //las variables de paginación
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 25; //la cantidad de registros que desea mostrar
        $adjacents  = 4; //brecha entre páginas después de varios adyacentes
        $offset = ($page - 1) * $per_page;
        //Cuenta el número total de filas de la tabla*/
        $query_a_buscar="SELECT count(*) AS numrows FROM productos_agricolas WHERE id!=0 ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." AND nombre LIKE '%$busqueda%' OR nombre_cientifico LIKE '%$busqueda%'";
        }

        $count_query   = mysqli_query($con,$query_a_buscar);
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
        $total_pages = ceil($numrows/$per_page);
        $reload = 'ADMIN/lista_de_productos.php';
        //consulta principal para recuperar los datos
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
  <div class="dentro-noti-over-scroll">
    <div class="table-responsive">
       <?php if($total_pages!=0){ ?>
      <table class=" table table-sm table-bordered table-hover sombra align-middle">
        <tr>
          <th>Producto</th>
          <th>Proveedor</th>
          <th>Ultima Compra</th>
          <th>Cantidad</th>
          <th>Costo</th>
          <th>Calificación</th>
          <th class="text-center">*</th>
        </tr>
      <?php } ?>
<?php
    $query_a_ejecutar="SELECT * FROM productos_agricolas WHERE id!=0 ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND nombre LIKE '%$busqueda%' OR nombre_cientifico LIKE '%$busqueda%' ";
        }
        $query_a_ejecutar=$query_a_ejecutar."ORDER BY nombre ASC LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                   $id_eliminar=$row["id"];
                   $nombre=$row["nombre"];
                   $id_proveedor=$row["id_proveedor"];


                                   $var_consulta= "SELECT * FROM proveedores WHERE id='$id_proveedor'";
                                    $respuesta2 = $con->query($var_consulta);
                                     if($respuesta2->num_rows>0)
                                  {
                                     while ($row2=$respuesta2->fetch_array())
                                    {
                                      
                                      $proveedor=$row2['nombre'];
                                      $proveedor=utf8_encode($proveedor);
                                     
                                    }
                                  }



                                  $var_consulta3= "SELECT * FROM compras_de_productos_agricolas WHERE id_producto='$id_eliminar' ORDER BY fecha ASC";
                                    $respuesta3 = $con->query($var_consulta3);
                                     if($respuesta3->num_rows>0)
                                  {
                                     while ($row2=$respuesta3->fetch_array())
                                    {
                                      
                                      $fecha=$row2['fecha'];
                                      $costo=$row2['costo'];
                                      $cantidad=$row2['cantidad'];
                                     
                                    }
                                  }else{
                                    $fecha="Sin Registro";
                                      $costo="Sin Registro";
                                      $cantidad="Sin Registro";
                                  }

                                  $var_consulta= "SELECT * FROM calificaciones WHERE tabla_de_producto='productos_agricolas' AND id_producto='$id_eliminar'";
                                    $respuesta2 = $con->query($var_consulta);
                                     if($respuesta2->num_rows>0)
                                  {
                                     while ($row2=$respuesta2->fetch_array())
                                    {
                                      
                                      $calificacion=$row2['calificacion'];

                                     
                                    }
                                  }                

?>

          <tr class="ar-cursor-pointer">
           <td> <?php echo $nombre; ?></td>
           <td> <?php echo $proveedor; ?></td>
           <td> <?php echo $fecha; ?></td>
           <td> <?php echo $cantidad; ?></td>
           <td> <?php echo $costo; ?></td>
           <td>
            <table width="100%">
              <tr>
                <td width="20%">
                    <table>
                      <tr>
                        <td> <a href="#" class="btn btn-sm-ar btn-success sombra" onclick="sumar_calificacion('<?php echo $id_eliminar;?>');"><i class="bi bi-caret-up"></i></a> </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#" class="btn btn-sm-ar btn-danger sombra" onclick="restar_calificacion('<?php echo $id_eliminar;?>');"><i class="bi bi-caret-down"></i></a> 
                        </td>
                      </tr>
                    </table>
                    <input type="number" name="calificacion_input<?php echo $id_eliminar; ?>" id="calificacion_input<?php echo $id_eliminar; ?>" step="0.5" value="<?php echo $calificacion;?>" hidden>
                    <input type="number" name="input_id_producto<?php echo $id_eliminar; ?>" id="input_id_producto<?php echo $id_eliminar; ?>" value="<?php echo $id_eliminar;?>" hidden>
                </td>
                <td width="70%">

                  <div id="cargar_calificacion<?php echo $id_eliminar; ?>">
                    
                  </div>
                  <script type="text/javascript">cargador_de_calificacion('<?php echo $id_eliminar;?>');</script>

                  
                    


                </td>
              </tr>
            </table>


             
        






           </td>
           <td class="text-center">
             
 <a href="#" class="btn btn-primary btn-sm sombra" data-bs-toggle='modal' data-bs-target='#infocompra<?php echo $id_eliminar;?>'><i class="bi bi-bag-plus"></i></a>

            <a href="#" class="btn  btn-danger btn-sm sombra" onclick="admin_eliminar_producto_agricola('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>


<form  class="needs-validation" enctype="multipart/form-data" onsubmit="registrar_compra_agricola('registro_c<?php echo $id_eliminar; ?>'); return false" id="registro_c<?php echo $id_eliminar; ?>" novalidate>

<div class='modal fade text-center modal_a_cerrar' id='infocompra<?php echo $id_eliminar;?>' tabindex='-1' aria-labelledby='EditModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered '>
    <div class='modal-content'>
      <div class='modal-header bg-4 text-center'>
        <b class='modal-title titulo_modal' id='EditModalLabel text-center'><center id="infocompra<?php echo $id_eliminar;?>_titulo_modal" class="text-center texto-blanco">Registro de Compra de <?php echo $nombre; ?> - <?php echo $proveedor; ?></b></center></b>
          
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     <div class='container-fluid'>
      <div class='row'>
        <div class="col" id="infocompra<?php echo $id_eliminar;?>_contenido_de_modal text-center">
                        <input type="number" name="id_producto" value="<?php echo $id_eliminar;?>" hidden>
                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Fecha de Compra:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha"  type="date"  autocomplete="off" required>
                            <div class="invalid-feedback">Ingrese una Fecha.</div>

                        </div>
                                                <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Cantidad:</b></span>
                          <input class="form-control form-control-sm sombra" name="cantidad" placeholder="0"  type="number"  autocomplete="off" required>
                            <div class="invalid-feedback">Ingrese una Cantidad.</div>

                        </div>

                        <div class="input-group input-group-sm mb-3 mr-5 ml-5">
                          <span class="input-group-text sombra"><b>Costo de Compra:</b></span>
                          <input class="form-control form-control-sm sombra" name="costo" step="0.01" placeholder="0.0" type="number"  autocomplete="off" required>
                            <div class="invalid-feedback">Ingrese un costo.</div>

                        </div>




        </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm sombra" type="submit" form="registro_c<?php echo $id_eliminar; ?>">Registrar Compra</button>

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

