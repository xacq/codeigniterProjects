<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Gesti&oacute;n Pago de Matr&iacute;culas</h3>

            </div>
            <div class="card-body">

            <div class="table-responsive">
                  <table id="table"  class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                      <thead>
                          <tr>
                          <th style="text-align:center">Código</th>
                            <th style="text-align:center">Estudiante</th>
                            <th style="text-align:center">Curso</th>
                            <th style="text-align:center">Precio</th>
                            <th style="text-align:center">Nº de Cuotas</th>
                            <th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acción</th> 
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $contador =0;
                        foreach ($matriculas as $matricula) {
                            $contador = $contador + 1;
                        ?>
                        <tr>
                            <td style="text-align:center"><?=$contador;?></td>
                            <td style="text-align:center"><?php echo $matricula->ESTNOMBRE ; ?></td>
                            <td style="text-align:center"><?php echo $matricula->CURNOMBRE; ?></td>
                            <td style="text-align:center"> $ <?php echo $matricula->CURPRECIO; ?></td>
                            <td style="text-align:center"><?php echo $matricula->MATCUOTAS; ?></td>
                            <td style="text-align:center"><?php echo $matricula->ESTADO; ?></td>
                            <?php if($matricula->ESTADO != "CANCELADO"){ ?>
                            <td style="text-align:center"><button type="button" onclick="location.href='<?php echo base_url();?>/PagosController/index?id=<?php echo $matricula->MATID;?>'" class="btn btn-primary">Pagar</button></td>
                            <?php }else{?>
                                <td style="text-align:center">  <button type="button" onclick="location.href='<?php echo base_url();?>/PagosController/index?id=<?php echo $matricula->MATID;?>'" class="btn btn-success">Ver Comprobantes</button></td>
                                <?php } ?>
                        </tr>
                        <?php
                        }
                    ?>
                      </tbody>
                  </table>
              </div>

            </div>
        </div>
    </div>
</div>

