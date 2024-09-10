<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Calificaciones / Listado de cursos</h3>
            </div>
            <div class="card-body">
                <table id="table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th style="text-align:center">Nombre Curso</th>
                            <th style="text-align:center">Fecha Inicio</th>
                            <th style="text-align:center">Fecha Final</th>
                            <th style="text-align:center">Nº Estudiantes</th>
                            <th style="text-align:center">Modalidad</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($cursos as $curso) {
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $curso['CURNOMBRE']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURFECINICIO']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURFECFINAL']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURNUMESTUDIANTES']; ?></td>
                        <td style="text-align:center"><?php echo $curso['CURMODALIDAD']; ?></td>
                        <td style="text-align:center"><button type="button" onclick="location.href='<?php echo base_url();?>/RegistroCalificacionesController/indexEstudiantes?id=<?php echo $curso['CURID'];?>'" class="btn btn-primary">Cargar Estudiantes</button></td>                        
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