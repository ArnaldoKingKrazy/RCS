<?php 
include_once("../INCLUDES/CONEXION.php");

include("../REGISTROS_DE_SIEMBRA/funciones_para_llenar_siembras.php");


function _encargado_local($parametro){
      include("../INCLUDES/CONEXION.php");

                          $var_consulta= "SELECT * FROM usuarios WHERE id='$parametro' ";
                          $respuesta = $con->query($var_consulta);
                            if($respuesta->num_rows>0)
                                {
                                   while ($row=$respuesta->fetch_array())
                                  {

                                    $nombre_u=utf8_encode($row["nombre"]);
                                    $apellido_u=utf8_encode($row["apellido"]);
                                    $cedula_u=utf8_encode($row["cedula"]);
                      
                      }
                    }
                $respuesta = $nombre_u." ".$apellido_u."";

  return $respuesta;
}



session_start();
$id_usuario = $_SESSION["user_id"];

    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    $busqueda = (isset($_REQUEST['orden'])&& $_REQUEST['orden'] !=NULL)?$_REQUEST['orden']:'';
    if($action == 'ajax'){
        include '../INCLUDES/PAGINATION.php'; //incluir el archivo de paginación
        //las variables de paginación
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 25; //la cantidad de registros que desea mostrar
        $adjacents  = 4; //brecha entre páginas después de varios adyacentes
        $offset = ($page - 1) * $per_page;
        //Cuenta el número total de filas de la tabla*/
        $query_a_buscar="SELECT count(*) AS numrows FROM ordenes_de_trabajo WHERE estado='APROBADA'  ";
        if ($busqueda!="") {
          $query_a_buscar=$query_a_buscar." AND asunto LIKE '%$busqueda%'";
        }

        $count_query   = mysqli_query($con,$query_a_buscar);
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
        $total_pages = ceil($numrows/$per_page);
        $reload = 'AGRONOMO/ordenes_en_espera.php';
        //consulta principal para recuperar los datos
?>
 <script type="text/javascript">
  function load_modal(id_unico_siembra){

    var parametros = {"action":"ajax","id_unico_siembra":id_unico_siembra};
    $.ajax({
      url:'REGISTROS_DE_SIEMBRA/modal_de_siembra.php',
      data: parametros,
      success:function(data){
        $(".carga_modal_siembra"+id_unico_siembra).html(data);
      }
    })
  }

  </script>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 noti-over-scroll">
  <div class="dentro-noti-over-scroll">
    <div class="table-responsive">

<?php
    $query_a_ejecutar="SELECT * FROM ordenes_de_trabajo WHERE estado='APROBADA' ";
     if ($busqueda!="") {
          $query_a_ejecutar=$query_a_ejecutar." AND asunto LIKE '%$busqueda%' ";
        }
        $query_a_ejecutar=$query_a_ejecutar."LIMIT $offset,$per_page";

        $query = mysqli_query($con,$query_a_ejecutar);
        
        if ($numrows>0){
            while($row = mysqli_fetch_array($query)){
                $id_orden=$row["id"];
                $asunto=$row["asunto"];
                $tipo_de_orden=$row["tipo_de_orden"];
                $caracter=$row["caracter"];
                $fecha_inicio=$row["fecha_inicio"];
                $fecha_finalizacion=$row["fecha_finalizacion"];
                $instrucciones=utf8_encode($row["instrucciones"]);
                $instrucciones_detalladas=utf8_encode($row["instrucciones_detalladas"]);
                $id_producto=$row["id_producto"];
                $id_usuario_asignado=$row["id_usuario_asignado"];
                $id_usuario_emisor=$row["id_usuario_emisor"];
                $id_unico_siembra=$row["id_unico_siembra"];






?>


<div class="card">
    <div class="card-tittle text-center fondo_verdecito sombra pt-1 pb-1" style="border-radius: 5px 5px 0px 0px;">
 <strong> <?php echo $asunto; ?> </strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Dirigida a:</span ><b> <?php echo _encargado_local($id_usuario_asignado);?></b>
                  </div>
                </div>
     
                <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Siembra:</span ><b class="carga_modal_siembra<?php echo $id_unico_siembra; ?>">
                    </b>
                    <script type="text/javascript">
                        load_modal('<?php echo $id_unico_siembra; ?>');
                    </script>
                  </div>
                </div>

                           <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Tipo de Orden:</span ><b> <?php echo $tipo_de_orden; ?></b>
                  </div>
                </div>

                <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Caracter:</span ><b> <?php echo $caracter; ?></b>
                  </div>
                </div>

            </div>





            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card sombra mb-2">
                
                    <span class="fondo_span sombra">Producto:</span >
     
                  <b class="text-center"> <?php echo _tipo_de_semilla($id_producto); ?></b>
                </div>

                <div class="card sombra mb-2">
<div id="accordion<?php echo $id_orden; ?>">
  <div class="card">
      <a class="btn  fv_hover" data-bs-toggle="collapse" href="#collapseOne<?php echo $id_orden; ?>">
    <div class="card-tittle ">
        Instrucciones de Uso
     
    </div>
     </a>
    <div id="collapseOne<?php echo $id_orden; ?>" class="collapse" data-bs-parent="#accordion<?php echo $id_orden; ?>">
      <div class="card-body">
       <?php echo $instrucciones; ?>
      </div>
    </div>
  </div>

  <div class="card">
     <a class="collapsed btn  fv_hover" data-bs-toggle="collapse" href="#collapseTwo<?php echo $id_orden; ?>">
    <div class="card-tittle ">
     
        Instrucciones Detalladas
    </div>
      </a>

    <div id="collapseTwo<?php echo $id_orden; ?>" class="collapse" data-bs-parent="#accordion<?php echo $id_orden; ?>">
      <div class="card-body">
       <?php echo utf8_encode($instrucciones_detalladas); ?>
      </div>
    </div>
  </div>

</div>
                </div>





            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">

                 <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Fecha de Inicio:</span ><b> <?php echo $fecha_inicio; ?></b>
                  </div>
                </div>

                 <div class="card sombra mb-2">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Fecha de Finalización:</span ><b> <?php echo $fecha_finalizacion; ?></b>
                  </div>
                </div>
                <div class="card sombra mb-2 mt-5">
                  <div class="card-tittle">
                    <span class="fondo_span sombra">Emitida Por:</span ><b> <?php echo _encargado_local($id_usuario_emisor);?></b>
                  </div>
                </div>
     
            </div>
        </div>
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
