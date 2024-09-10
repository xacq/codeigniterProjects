<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
  <div class="col-md-12">
   <div class="card">
      <div class="card-header">
        <h3> Gestión de Matrículas Pendientes</h3>
      </div>
      <div class="card-body">
      <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
        <thead>
          <tr>
            <th style="text-align:center">Codigo</th>
            <th style="text-align:center">Curso</th>
            <th style="text-align:center">Modalidad</th>
            <th style="text-align:center">Nombre Estudiante</th>
            <th style="text-align:center">Correo</th>
            <th style="text-align:center">Precio </th>
            <th style="text-align:center">Estado</th>
            <th style="text-align:center">Acciones</th>


          </tr>
        </thead>
        <?php
        //var_dump($matriculas);
        $contador = 0;
        foreach ($matriculas as $matricula) {
          $contador = $contador + 1;
        ?>
          <tbody>
            <tr>
              <td style="text-align:center"><?= $contador; ?></td>
              <td style="text-align:center"><?php echo $matricula['ESTNOMBRE']; ?></td>
              <td style="text-align:center"><?php echo $matricula['CURNOMBRE']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATTIPPAGO']; ?></td>
              <td style="text-align:center">$<?php echo $matricula['CURPRECIO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATCUOTAS']; ?></td>
              <td style="text-align:center">$<?php echo $matricula['PAGCUOTA']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATFECHA']; ?></td>
              <td style="text-align:center"><?php echo  $matricula['PAGFECREGPAGO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['PAGESTADO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATESTADO']; ?></td>
            </tr>
          <?php
        }
          ?>
          </tbody>
      </table>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
   <div class="card">
      <div class="card-header">
        <h3>Gestión de Matrículados</h3>
      </div>
      <div class="card-body">
      <table id="table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
        <thead>
          <tr>
          <th style="text-align:center">Codigo</th>
            <th style="text-align:center">Curso</th>
            <th style="text-align:center">Modalidad</th>
            <th style="text-align:center">Nombre Estudiante</th>
            <th style="text-align:center">Correo</th>
            <th style="text-align:center">Precio </th>
            <th style="text-align:center">Estado</th>
            <th style="text-align:center">Acciones</th>


          </tr>
        </thead>
        <?php
        //var_dump($matriculas);
        $contador = 0;
        foreach ($matriculas as $matricula) {
          $contador = $contador + 1;
        ?>
          <tbody>
            <tr>
              <td style="text-align:center"><?= $contador; ?></td>
              <td style="text-align:center"><?php echo $matricula['ESTNOMBRE']; ?></td>
              <td style="text-align:center"><?php echo $matricula['CURNOMBRE']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATTIPPAGO']; ?></td>
              <td style="text-align:center">$<?php echo $matricula['CURPRECIO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATCUOTAS']; ?></td>
              <td style="text-align:center">$<?php echo $matricula['PAGCUOTA']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATFECHA']; ?></td>
              <td style="text-align:center"><?php echo  $matricula['PAGFECREGPAGO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['PAGESTADO']; ?></td>
              <td style="text-align:center"><?php echo $matricula['MATESTADO']; ?></td>
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
<script>
  $(function() {
    $('#example').DataTable({
      'paging': true,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>

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