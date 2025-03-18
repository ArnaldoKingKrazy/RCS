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
          $query_a_buscar=$query_a_buscar." AND titulo LIKE '%$busqueda%'";
        }

        $count_query   = mysqli_query($con,$query_a_buscar);
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
        $total_pages = ceil($numrows/$per_page);
        $reload = 'ADMIN/lista_de_proveedores.php';
        //consulta principal para recuperar los datos
?>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
  <div class="dentro-noti-over-scroll">
    <div class="table-responsive">

<?php
    $query_a_ejecutar="SELECT * FROM siembra WHERE id!=0 ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND titulo LIKE '%$busqueda%'";
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
   <a class="no_link"href="#<?php echo $id_unico; ?> " data-bs-toggle="collapse" title="Click para Desplegar <?php echo $titulo; ?>"><div class="card-tittle text-center fondo_verdecito sombra pt-2 pb-2"><i class="fas fa-angle-down" style="float: left; margin-left: 10px; margin-top: 5px;"></i><b> <?php echo $titulo; ?> </b><i class="fas fa-angle-down" style="float: right; margin-right: 10px; margin-top: 5px;"></i></div></a>
  <div id="<?php echo $id_unico; ?>" class="collapse card-body">
   
    <div class="row">

      <div class="col-5">
        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Tipo de Siembra:</span ><b> <?php echo _tipo_de_siembra($id_tipo_de_siembra); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Semilla:</span ><b> <?php echo _tipo_de_semilla($id_tipo_de_semilla); ?></b>
          </div>
        </div>


        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Estatus:</span ><b> <?php echo _estatus($id_estatus); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
            <span class="fondo_span sombra">Encargado:</span ><b> <?php echo _encargado($id_usuario_responsable); ?></b>
          </div>
        </div>

        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Nº Semillas:</span ><b> <?php echo $numero_de_matas; ?></b>
          </div>
        </div>

      <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Área:</span ><b> <?php echo $area; ?> (Ha)</b>
          </div>
        </div>
      </div>
     
      <div class="col-5">
        <div class="card sombra mb-3">
          <div class="card-tittle">
           <span class="fondo_span sombra">Ubicación:</span ><b> <?php echo _ubicacion($id_ubicacion); ?></b>
          </div>
        </div>
        <div class="card sombra mb-2">
           <span class="fondo_span sombra">Punto(s):</span >
        </div>

        <?php echo _puntos($id_unico); ?>


      </div>


      <div class="col-2">      
        <table width="100%" style=" height:80px; border-collapse: separate; border-spacing: 0px 5px;">
          <tr>
            <td style="height: 100%;" width="100%">
           <a href="<?php echo $foto_google_earth; ?>" data-lightbox="imagen-<?php echo $id_unico; ?>" data-title="Foto de Google Earth sombra">
           <img src="<?php echo $foto_google_earth; ?>" width="100%" height="100%" class="img-google-earth">
            </a>
            </td>
             </tr>
             <tr>
            
            <td style="height: 100%;" width="100%">
              <a href="<?php echo $foto; ?>" data-lightbox="image-<?php echo $id_unico; ?>" data-title="Foto">
              <img src="<?php echo $foto; ?>" width="100%" height="100%" class="img-google-earth">
              </a>
             
            </td>
          </tr>
        </table>
      </div>
      
    </div>
    <div class="row">
      <div class="col-3"></div>
      <div class="col-4">

        <table width="100%" class="mt-3">
          <tr>
            <td>
            <a href="#" style="float: right;" onclick="admin_informacion_siembra('<?php echo $id_eliminar; ?>');" class="btn btn-sm btn-primary sombra me-2" >Mas Información</a>
              
            </td>
            <td>
               <a href="#" style="float: left;" class="btn  btn-danger btn-sm sombra" onclick="admin_eliminar_siembra('<?php echo $id_eliminar; ?>');"><i class="bi bi-trash "></i></a>
            </td>
          </tr>
        </table>

      </div>
      <div class="col-5"></div>
    </div>




  </div>
</div>
 <br>









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