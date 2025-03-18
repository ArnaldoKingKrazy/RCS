<?php 
$numero = $_POST["numero"];

for ($i = 1; $i <= $numero; $i++) {
    echo'
   <div class="card sombra">
  <div class="card-body">

  		 		<div class="input-group input-group-sm mb-3 mr-5 ml-5" id="divhijos">
                    <span class="input-group-text sombra"><b>Nombre y Apelllido</b></span>
                    <input class="form-control form-control-sm sombra" name="nombre_hijo'.$i.'" type="text" required>
                    <div class="invalid-feedback">Ingrese un nombre.</div>
                  </div>	

  		 		<div class="input-group input-group-sm mb-3 mr-5 ml-5" id="divhijos">
                    <span class="input-group-text sombra"><b>Edad(años):</b></span>
                    <input class="form-control form-control-sm sombra" min="0" name="edad_hijo'.$i.'" type="number" required>
                    <div class="invalid-feedback">Ingrese una edad Valida (si tiene meses coloque 0).</div>
                  </div>

                <div class="input-group input-group-sm mb-3 mr-5 ml-5" id="divhijos">
                    <span class="input-group-text sombra"><b>Cedula(Si la Posee):</b></span>
                    <input class="form-control form-control-sm sombra" name="cedula_hijo'.$i.'" type="text">
                    <div class="invalid-feedback">Ingrese un nombre.</div>
                  </div>		

  </div>
</div>
<br>

    ';
}
 ?>
