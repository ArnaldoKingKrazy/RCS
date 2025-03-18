<?php 
function readFileByLinea($theFile, $theLine){
    /*Conviene establecer controles de la existencia del archivo*/

    $file = new SplFileObject($theFile);
    $file->seek($theLine);
    return $file->current();            
}

$Linea=0;
$archivo ="TEMA_ACTUAL.php";
$tema = readFileByLinea($archivo, $Linea);
$tema =preg_replace("/[\r\n|\n|\r]+/", " ", $tema);
$tema =str_replace(' ','',$tema);
 ?>
<div class="col-12">
        <div class="row bg-info  mt-1 ver-bordes centrar sombra mx-auto">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-1 mt-1 ">
               <strong >Temas </strong> <i>( Actual: <b><?php echo $tema; ?> </b>)</i>
          </div>

        </div>
        <div class="row">
        	<div class="col-12 pb-5">
        		<div class="row">
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=='Bootstrap'){echo 'bg-danger';} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Bootstrap');">
			              	<img width="100%" style="" src="CORE/TEMAS/Bootstrap/thumbnail.png"  title="Bootstrap" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Cerulean"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Cerulean');">
			              	<img width="100%" style="" src="CORE/TEMAS/Cerulean/thumbnail.png"  title="Cerulean" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Cosmo"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Cosmo');">
			              	<img width="100%" style="" src="CORE/TEMAS/Cosmo/thumbnail.png"  title="Cosmo" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Cyborg"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Cyborg');">
			              	<img width="100%" style="" src="CORE/TEMAS/Cyborg/thumbnail.png"  title="Cyborg" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Darkly"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Darkly');">
			              	<img width="100%" style="" src="CORE/TEMAS/Darkly/thumbnail.png"  title="Darkly" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Flatly"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Flatly');">
			              	<img width="100%" style="" src="CORE/TEMAS/Flatly/thumbnail.png"  title="Flatly" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Journal"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Journal');">
			              	<img width="100%" style="" src="CORE/TEMAS/Journal/thumbnail.png"  title="Journal" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Litera"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Litera');">
			              	<img width="100%" style="" src="CORE/TEMAS/Litera/thumbnail.png"  title="Litera" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Lumen"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Lumen');">
			              	<img width="100%" style="" src="CORE/TEMAS/Lumen/thumbnail.png"  title="Lumen" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Lux"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Lux');">
			              	<img width="100%" style="" src="CORE/TEMAS/Lux/thumbnail.png"  title="Lux" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Materia"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Materia');">
			              	<img width="100%" style="" src="CORE/TEMAS/Materia/thumbnail.png"  title="Materia" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Minty"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Minty');">
			              	<img width="100%" style="" src="CORE/TEMAS/Minty/thumbnail.png"  title="Minty" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Morph"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Morph');">
			              	<img width="100%" style="" src="CORE/TEMAS/Morph/thumbnail.png"  title="Morph" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Pulse"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Pulse');">
			              	<img width="100%" style="" src="CORE/TEMAS/Pulse/thumbnail.png"  title="Pulse" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Quartz"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Quartz');">
			              	<img width="100%" style="" src="CORE/TEMAS/Quartz/thumbnail.png"  title="Quartz" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Sandstone"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Sandstone');">
			              	<img width="100%" style="" src="CORE/TEMAS/Sandstone/thumbnail.png"  title="Sandstone" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Simplex"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Simplex');">
			              	<img width="100%" style="" src="CORE/TEMAS/Simplex/thumbnail.png"  title="Simplex" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Sketchy"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Sketchy');">
			              	<img width="100%" style="" src="CORE/TEMAS/Sketchy/thumbnail.png"  title="Sketchy" class="sombra">
			            	</a>
			        	</div>
			      	</div>
        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Slate"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Slate');">
			              	<img width="100%" style="" src="CORE/TEMAS/Slate/thumbnail.png"  title="Slate" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Solar"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Solar');">
			              	<img width="100%" style="" src="CORE/TEMAS/Solar/thumbnail.png"  title="Solar" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Spacelab"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Spacelab');">
			              	<img width="100%" style="" src="CORE/TEMAS/Spacelab/thumbnail.png"  title="Spacelab" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Superhero"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Superhero');">
			              	<img width="100%" style="" src="CORE/TEMAS/Superhero/thumbnail.png"  title="Superhero" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="United"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('United');">
			              	<img width="100%" style="" src="CORE/TEMAS/United/thumbnail.png"  title="United" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Vapor"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Vapor');">
			              	<img width="100%" style="" src="CORE/TEMAS/Vapor/thumbnail.png"  title="Vapor" class="sombra">
			            	</a>
			        	</div>
			      	</div>

        			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 text-center mt-2">
			        	<div class="card sombra p-2 <?php if($tema=="Zephyr"){echo "bg-danger";} ?>" align="center" style="width:195px; min-width: 195px;">
			        		<a href="#" onclick="Guardar_nombre_de_tema('Zephyr');">
			              	<img width="100%" style="" src="CORE/TEMAS/Zephyr/thumbnail.png"  title="Zephyr" class="sombra">
			            	</a>
			        	</div>
			      	</div>










        		</div>



        	</div>
        </div>
 </div>