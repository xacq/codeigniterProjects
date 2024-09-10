<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Docentes</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/nuevo'" class="btn btn-primary">Crear Docente</button>
            </div>

            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">Código</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">C&eacute;dula</th>
                            <th style="text-align:center">Titulo</th>
							<th style="text-align:center">Tel&eacute;fono</th>
                            <th style="text-align:center">Correo</th>
							<th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>
                <tbody>                   
                    <?php 
                        foreach($docentes as $item) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $item->DOCID; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCNOMBRE; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCCEDULA; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCTITULO; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCTELEFONO; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCCORREO; ?></td>
                        <td style="text-align:center"><?php echo $item->DOCESTADO; ?></td>
                        <td style="text-align:center">
                            <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/editar?id=<?php echo $item->DOCID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/borrar?id=<?php echo $item->DOCID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('mensaje')): ?>
    <script>
        var msg = '<?php echo session()->getFlashdata('mensaje'); ?>'
        var title = '<?php echo session()->getFlashdata('title'); ?>'
        var status = '<?php echo session()->getFlashdata('status'); ?>'
         function showSuccessSweetAlert(icon) {
            Swal.fire({
                title: title,
                text: msg,
                icon: 'success'
            }).then((result) => {
            });
        }
        if(status === 'success'){
            showSuccessSweetAlert('success')
        }else{
            showSuccessSweetAlert('error')
        }
    </script>
<?php endif; ?>