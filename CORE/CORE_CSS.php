<?php 
function readFileByLine($theFile, $theLine){
    /*Conviene establecer controles de la existencia del archivo*/

    $file = new SplFileObject($theFile);
    $file->seek($theLine);
    return $file->current();            
}
$theFile="CORE/VERSIONES.php";
$theLine=0;
$version = readFileByLine($theFile, $theLine);


$archivo ="ADMIN/TEMA_ACTUAL.php";
$tema = readFileByLine($archivo, $theLine);


?>
<link rel="stylesheet" href="CORE/TEMAS/menu_lateral.css<?php echo $version;?>">
	<!--<link rel="stylesheet" href="CORE/TEMAS/<?php echo$tema; ?>/bootstrap.css<?php echo $version;?>">-->
	
	<link rel="stylesheet" href="CORE/CSS/bootstrap-icons.css<?php echo $version;?>">
	<link rel="stylesheet" href="CORE/CSS/CORE.css<?php echo $version;?>">
	<link rel="stylesheet" href="CORE/CSS/lightbox.css<?php echo $version;?>">
	<link rel="stylesheet" href="MODULOS/GALERIA/galeria.css <?php echo $version;?>">
	<script src="CORE/JS/jquery-3.7.1.min.js<?php echo $version;?>"></script>
    <script src="CORE/JS/jquery.contextMenu.min.js<?php echo $version;?>"></script>
    <script src="CORE/JS/jquery.ui.position.js<?php echo $version;?>"></script>
	<link rel="stylesheet" href="CORE/CSS/jquery.contextMenu.min.css<?php echo $version;?>">
	<script src="CORE/JS/sweetalert2@11.js<?php echo $version;?>"></script>
	<script src="CORE/JS/axios.min.js<?php echo $version;?>"></script>
	<script src="AXIOS/principal.js<?php echo $version;?>"></script>
	<script src="AXIOS/alertas.js<?php echo $version;?>"></script>
	<script src="CORE/JS/fontawesome.js"></script>
	<?php include_once("MODULOS/MODULOS_CSS_JS.php"); ?>