<div class="row">
    <div class="col-md-20">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Auditorias</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/AuditoriasController/reportePDf'" class="btn btn-primary">Descargar Reporte PDF</button>
            </div>

            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">USUARIO</th>
                            <th scope="col">ACCION</th>
                            <th scope="col">TABLA</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">HORA</th>
                            <th scope="col">IP</th>
                            <th scope="col">HOST</th>
                            <th scope="col">SENTENCIA</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        $contador = 0;
                        foreach($auditorias as $item) {
                            $contador++;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $item->USUNOMBRE; ?></td>
                        <td><?php echo $item->AUDACCION; ?></td>
                        <td><?php echo $item->AUDTABLA; ?></td>
                        <td><?php echo $item->AUDFECHA; ?></td>
                        <td><?php echo $item->AUDHORA; ?></td>
                        <td><?php echo $item->AUDIP; ?></td>
                        <td><?php echo $item->AUDHOST; ?></td>
                        <td><?php echo $item->AUDSENTENCIA; ?></td>                        
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
