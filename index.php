<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
    include_once("CORE/CORE_CSS.php"); 
    
    ?>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <title>RCS</title>
      <script type="text/javascript">
      function llenar_barra_user(){
  
var url="NAVEGADOR/relleno_barra_user.php";
$.post(url,function(response){
    $('#relleno_top_barra').html(response);
});


  }

        function llenar_barra_admin(){
  
var url="NAVEGADOR/relleno_barra_admin.php";
$.post(url,function(response){
    $('#relleno_top_barra').html(response);
});


  }
  </script>    
  </head>
<body class="sb-nav-fixed bg-img" id="axios-body" >
  <div class="container-fluid" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark sombra-b">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" onclick="logueo_admin();" href="#">Sistema RCS</a>
            <!-- Sidebar Toggle-->
                          <div id="contractor_de_menu me-5">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            </div>
            <div id="relleno_top_barra">



            </div>


            <div>

            </div>
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" id="axios-barra">

            </ul>
        </nav>
        <div id="layoutSidenav" >
            <div id="axios-menu"></div>
            <div id="layoutSidenav_content">
                <main id="axios-container" >
                    
                </main>

            </div>
        </div>
    </div>
</body>
  <footer>
    <?php
       include_once("CORE/CORE_JS.php");
        session_start();
        //session_destroy();
        if(isset($_SESSION['tipo_id'])) {
           if ($_SESSION['tipo_id']==1){
             echo '<script>logueo_administrador();</script>';
           echo '<script>llenar_barra_admin();</script>';

           }else if ($_SESSION['tipo_id']==4){
             echo '<script>logueo_agronomo();</script>';

           }else if ($_SESSION['tipo_id']==5){
             echo '<script>logueo_capataz();</script>';

           }else{
            echo '<script>logueo_usuario();</script>';
        }


    }else{
           echo '<script>pag_inicio();</script>';
           echo '<script>llenar_barra_user();</script>';
    }


      ?>

</div>

    <div id="alertas"></div>

  </footer>


</html>
