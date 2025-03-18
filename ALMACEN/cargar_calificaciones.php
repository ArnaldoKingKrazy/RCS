<?php 
    $calificacion = (isset($_REQUEST['calificacion'])&& $_REQUEST['calificacion'] !=NULL)?$_REQUEST['calificacion']:'';


if ($calificacion==0) {?>
<img src="PICTURES/stars-0.png" width="80px">
<?php } ?>


 <?php if ($calificacion==0.5) {?>
 	<img src="PICTURES/stars-0.5.png" width="80px">
<?php } ?>

 <?php if ($calificacion==1) {?>
 	<img src="PICTURES/stars-1.png" width="80px">
<?php } ?>

 <?php if ($calificacion==1.5) {?>
 	<img src="PICTURES/stars-1.5.png" width="80px">
<?php } ?>

 <?php if ($calificacion==2) {?>
 	<img src="PICTURES/stars-2.png" width="80px">
<?php } ?>

 <?php if ($calificacion==2.5) {?>
 	<img src="PICTURES/stars-2.5.png" width="80px">
<?php } ?>

 <?php if ($calificacion==3) {?>
 	<img src="PICTURES/stars-3.png" width="80px">
<?php } ?>
 <?php if ($calificacion==3.5) {?>
 	<img src="PICTURES/stars-3.5.png" width="80px">
<?php } ?>
 <?php if ($calificacion==4) {?>
 	<img src="PICTURES/stars-4.png" width="80px">
<?php } ?>
 <?php if ($calificacion==4.5) {?>
 	<img src="PICTURES/stars-4.5.png" width="80px">
<?php } ?>
 <?php if ($calificacion==5) {?>
 	<img src="PICTURES/stars-5.png" width="80px">
<?php } ?>