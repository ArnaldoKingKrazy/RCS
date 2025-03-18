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
        $query_a_buscar="SELECT count(*) AS numrows FROM equipos_en_general WHERE id!=0 ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." AND nombre LIKE '%$busqueda%' OR modelo LIKE '%$busqueda%'";
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
          <th>Serial</th>
          <th>Modelo</th>
          <th>Observación</th>
          <th>fecha de Compra</th>
          <th>Costo</th>
          <th class="text-center">*</th>
        </tr>
      <?php } ?>
<?php
    $query_a_ejecutar="SELECT * FROM equipos_en_general WHERE id!=0 ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND nombre LIKE '%$busqueda%' OR modelo LIKE '%$busqueda%' ";
        }
        $query_a_ejecutar=$query_a_ejecutar."ORDER BY nombre ASC LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                   $id_eliminar=$row["id"];
                   $nombre=$row["nombre"];
                   $serial=$row["serial"];
                   $modelo=$row["modelo"];
                   $observaciones=$row["observaciones"];
                   $id_proveedor=$row["id_proveedor"];
                   $fecha_de_compra=$row["fecha_de_compra"];
                   $costo=$row["costo"];


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

                                                 

?>
          <tr class="ar-cursor-pointer">
           <td> <?php echo $nombre; ?></td>
           <td> <?php echo $serial; ?></td>
           <td> <?php echo $modelo; ?></td>
           <td> <?php echo $observaciones; ?></td>
           <td> <?php echo $fecha_de_compra; ?></td>
           <td> <?php echo $costo; ?></td>
           <td class="text-center">
             <a href="#" class="btn btn-sm btn-danger sombra" onclick="admin_eliminar_equipos_en_general('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>





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