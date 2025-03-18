<?php 
    $contador = (isset($_REQUEST['contador'])&& $_REQUEST['contador'] !=NULL)?$_REQUEST['contador']:'';

    $contador=$contador+1;

 ?>

                         <div class="input-group input-group-sm mb-3 mr-5 ml-5" id="input_fecha_<?php echo $contador; ?>">
                          <span class="input-group-text sombra"><b>Fecha <?php echo $contador; ?>:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha<?php echo $contador; ?>"  type="date"  autocomplete="off" required>
                        </div>