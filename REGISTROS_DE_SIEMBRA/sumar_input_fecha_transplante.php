<?php 
    $contador_ft = (isset($_REQUEST['contador_ft'])&& $_REQUEST['contador_ft'] !=NULL)?$_REQUEST['contador_ft']:'';

    $contador_ft=$contador_ft+1;

 ?>

                         <div class="input-group input-group-sm mb-3 mr-5 ml-5" id="input_fecha_t_<?php echo $contador_ft; ?>">
                          <span class="input-group-text sombra"><b>Fecha <?php echo $contador_ft; ?>:</b></span>
                          <input class="form-control form-control-sm sombra" name="fecha_tansplante<?php echo $contador_ft; ?>"  type="date"  autocomplete="off" required>
                        </div>