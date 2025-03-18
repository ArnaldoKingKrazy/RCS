<?php 
$numero = $_POST["numero"];

for ($i = 1; $i <= $numero; $i++) {
    echo'
   <div class="card sombra">
  <div class="card-body">
  		 		<div class="input-group input-group-sm mb-3 mr-5 ml-5" >
                    <span class="input-group-text sombra"><b>Dotación</b></span>
                    <input class="form-control form-control-sm sombra" name="dotacion'.$i.'" type="text" style="width:70px;" required>


                    <span class="input-group-text sombra"><b>Cantidad:</b></span>
                    <input class="form-control form-control-sm sombra" min="1" value="1" name="cantidad_dota'.$i.'" type="number" style="width:5px;" required>

                    <span class="input-group-text sombra"><b>Fecha:</b></span>
                    <input class="form-control form-control-sm sombra" name="fecha_dota'.$i.'" type="date" value="'.date("Y-m-d").'" style="width:60px;">
                    <div class="invalid-feedback">Ingrese datos validos.</div>
                  </div>		

  </div>
</div>
<br>

    ';
}
 ?>
