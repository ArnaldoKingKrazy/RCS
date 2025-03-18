<?php 
    $contador_punto = (isset($_REQUEST['contador_punto'])&& $_REQUEST['contador_punto'] !=NULL)?$_REQUEST['contador_punto']:'';

    $contador_punto=$contador_punto+1;

 ?>


              <span class="input-group-text sombra" id="span_puntos<?php echo $contador_punto; ?>"><b>Punto <?php echo $contador_punto; ?>:</b></span>
                       
               <div class="input-group input-group-sm mb-3 mr-5 ml-5" id="input_puntos<?php echo $contador_punto; ?>">
                   <span class="input-group-text sombra"></span>

                      <input style="min-width: 80;" class="form-control form-control-sm sombra" style="font-size: 11px;" placeholder="Punto <?php echo $contador_punto; ?>" name="punto_<?php echo $contador_punto; ?>"  type="text"  autocomplete="off" required>

                   <span class="input-group-text sombra"></span>


                          <input class="form-control form-control-sm sombra" readonly="readonly" style="font-size: 11px;"  placeholder="Latitud" name="latitud_<?php echo $contador_punto; ?>_mostrat" id="latitud_mostrar<?php echo $contador_punto; ?>" type="text"  autocomplete="off" required>

                          <input class="form-control form-control-sm sombra" placeholder="Latitud <?php echo $contador_punto; ?>" name="latitud_<?php echo $contador_punto; ?>" id="latitud<?php echo $contador_punto; ?>" type="text"  autocomplete="off" required hidden>

                          <span class="input-group-text sombra">
                          	<button type="button"  data-bs-toggle='modal'onclick="selector_de_punto('<?php echo $contador_punto; ?>');" data-bs-target='#modalpunto1' class="btn btn-sm btn-primary sombra"><i class="bi bi-geo-alt-fill "></i></button>
                          </span>

                          <input class="form-control form-control-sm sombra" readonly="readonly" style="font-size: 11px;" placeholder="Longitud" name="longitud_<?php echo $contador_punto; ?>_mostrar" id="longitud_mostrar<?php echo $contador_punto; ?>"  type="text"  autocomplete="off" required>

                          <input class="form-control form-control-sm sombra" placeholder="Longitud <?php echo $contador_punto; ?>" name="longitud_<?php echo $contador_punto; ?>" id="longitud<?php echo $contador_punto; ?>"  type="text"  autocomplete="off" required hidden>

                        </div>

	