<?php 
include_once("../INCLUDES/CONEXION.php");



include("funciones_para_llenar_siembras.php");
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
        $query_a_buscar="SELECT count(*) AS numrows FROM siembra WHERE id!=0 ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." AND id_tipo_de_siembra LIKE '%$busqueda%'";
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

<?php
    $query_a_ejecutar="SELECT * FROM siembra WHERE id!=0 ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND id_tipo_de_siembra LIKE '%$busqueda%' ";
        }
        $query_a_ejecutar=$query_a_ejecutar."LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                   $id_eliminar=$row["id"];
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

?>


<div class="card sombra " style="background: linear-gradient(rgba(255,255,255,0.70),rgba(255,255,255,0.70)),url(<?php echo $foto; ?>); background-size: cover;">
   <div class="card-tittle text-center fondo_verdecito sombra"><b> <?php echo $titulo; ?> </b></div>
  <div class="card-body">
   
   <table style="border-collapse: separate; border-spacing: 5px 10px;">
     <tr>
       <td >
         <span class="fondo_span sombra">Tipo de Siembra:</span ><b> <?php echo _tipo_de_siembra($id_tipo_de_siembra); ?></b>
       </td>
        <td >
         <span class="fondo_span sombra">Semilla:</span ><b> <?php echo _tipo_de_semilla($id_tipo_de_semilla); ?></b>
       </td>
        <td >
         <span class="fondo_span sombra">Estatus:</span ><b> <?php echo _estatus($id_estatus); ?></b>
       </td>
      <td style="padding:0px;" width="20%">
        <table width="100%" style=" height:80px; border-collapse: separate; border-spacing: 2px 0px;">
          <tr>
            <td style="height: 100%;">
           <a href="<?php echo $foto_google_earth; ?>" data-lightbox="imagen-<?php echo $id_unico; ?>" data-title="Foto de Google Earth sombra">
           <img src="<?php echo $foto_google_earth; ?>" width="100%" height="100%" class="img-google-earth">
            </a>
             
            </td>
            <td style="height: 100%;">
              <a href="<?php echo $foto; ?>" data-lightbox="image-<?php echo $id_unico; ?>" data-title="Foto">
              <img src="<?php echo $foto; ?>" width="100%" height="100%" class="img-google-earth">
              </a>
             
            </td>
          </tr>
        </table>
       </td>

     </tr>
     <tr >
        <td >
         <span class="fondo_span sombra">Encargado:</span ><b> <?php echo _encargado($id_usuario_responsable); ?></b>
        </td>
        <td>
         <span class="fondo_span sombra">Ubicación:</span ><b> <?php echo _ubicacion($id_ubicacion,$id_punto); ?></b>

        </td>
        <td>
          <span class="fondo_span sombra">Nº Matas:</span ><b> <?php echo $numero_de_matas; ?></b>

        </td>
        <td>
          <span class="fondo_span sombra">Área:</span ><b> <?php echo $area; ?> m2</b>

        </td>
     
       
     </tr>
     <tr>
       <td class="text-center" colspan="4">
        <br>
        <center>
            <a href="#" class="text-center" >Mas Información</a>
         </center>
       </td>
     </tr>
     <tr>
       <td colspan="4"> <a href="#" class="btn  btn-danger sombra" onclick="admin_eliminar_siembra('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a></td>
     </tr>
   </table>
  </div>
</div> <br>









<?php
}
?>

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