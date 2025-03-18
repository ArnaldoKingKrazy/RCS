<?php 
include_once("../INCLUDES/CONEXION.php");
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    $busqueda = (isset($_REQUEST['usuario'])&& $_REQUEST['usuario'] !=NULL)?$_REQUEST['usuario']:'';
    if($action == 'ajax'){
        include '../INCLUDES/PAGINATION.php'; //incluir el archivo de paginación
        //las variables de paginación
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 25; //la cantidad de registros que desea mostrar
        $adjacents  = 4; //brecha entre páginas después de varios adyacentes
        $offset = ($page - 1) * $per_page;
        //Cuenta el número total de filas de la tabla*/
        $query_a_buscar="SELECT count(*) AS numrows FROM proveedores WHERE id!=0 ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." AND nombre LIKE '%$busqueda%' OR rif LIKE '%$busqueda%'";
        }

        $count_query   = mysqli_query($con,$query_a_buscar);
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
        $total_pages = ceil($numrows/$per_page);
        $reload = 'ADMIN/lista_de_proveedores.php';
        //consulta principal para recuperar los datos
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
  <div class="dentro-noti-over-scroll">
    <div class="table-responsive">
       <?php if($total_pages!=0){ ?>
      <table class=" table table-sm table-bordered table-hover sombra align-middle">
        <tr>
          <th>Proveedor</th>
          <th>Rif</th>
          <th>Contacto (Número)</th>
          <th class="text-center">*</th>
        </tr>
      <?php } ?>
<?php
    $query_a_ejecutar="SELECT * FROM proveedores WHERE id!=0 ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND nombre LIKE '%$busqueda%' OR rif LIKE '%$busqueda%' ";
        }
        $query_a_ejecutar=$query_a_ejecutar."ORDER BY nombre ASC LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                   $id_eliminar=$row["id"];
                   $fname=$row["nombre"];
                   $rif=$row["rif"];
                   $contacto=$row["contacto"];
                   $telefono_contacto=$row["telefono_contacto"];
                   

?>
          <tr class="ar-cursor-pointer">
           <td> <?php echo $fname; ?></td>
           <td> <?php echo $rif; ?></td>
           <td> <?php echo $contacto." (".$telefono_contacto.")"; ?></td>
           <td class="text-center">
             <a href="#" class="btn btn-sm btn-danger sombra" onclick="admin_eliminar_proveedor('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>
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