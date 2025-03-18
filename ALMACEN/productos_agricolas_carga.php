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
      url:'ALMACEN/cargar_calificaciones.php',
      data: parametros,
      success:function(data){
        $("#cargar_calificacion"+id_calificado).html(data);
      }
    })
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
        $reload = 'ALMACEN/productos_agricolas.php';
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
          <th>Cantidad Disponible</th>
          <th>Calificación</th>
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


                                  $var_consulta4= "SELECT * FROM almacen WHERE tabla='productos_agricolas' AND id_producto='$id_eliminar'";
                                    $respuesta4 = $con->query($var_consulta4);
                                    $productos_en_almacen =$respuesta4->num_rows;
                                     if($respuesta4->num_rows>0)
                                  {
                                     while ($row4=$respuesta4->fetch_array())
                                    {
                                      
                                      $cantidad_en_almacen=$row4['cantidad'];
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




<?php if ($fecha!="Sin Registro") {?>

          <tr class="ar-cursor-pointer">
           <td> <?php echo $nombre; ?></td>
           <td> <?php echo $proveedor; ?></td>
           <td> <?php echo $fecha; ?></td>
           <td> <?php echo $cantidad_en_almacen; ?></td>
           <td>
            <table width="100%">
              <tr>
                <td width="20%">
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

         </tr>

       <?php } ?>
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

