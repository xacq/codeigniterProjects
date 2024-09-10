<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPROBANTE DE LA FACTURA 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/factura.css">
  </head>
<body >

    <!-- Header -->
     <header class="encabezado">
          <div class="encabezado-info">
            <h2 class="font-weight-bold ">FACTURA N° 001</h2>
            <span class="info-factura text-muted">https://www.vidanueva.edu.ec</span>
            <span class="info-factura text-muted">Mobile : +593 982081291</span>
            <span class="info-factura text-muted">tic@istvidanueva.edu.ec</span>
          </div>  

        <img class="encabezado-logo logo-rounded" src="<?=base_url('/public/img/logo.jpeg')?>" >
    </header>
   <!-- Header -->


    <!-- Main  -->
  
  <main class="main-content">
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Estudiante:</span>
  <input type="text" value="<? echo $data[0]['ESTNOMBRE']?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon/1">
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Fecha:</span>
  <input type="text" value="<? echo date('d-m-Y')?>" class="form-control" placeholder="Fecha" aria-label="Username" aria-describedby="basic-addon1">

</div>
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Curso</th>
      <th scope="col">Valor</th>
      <th scope="col">Fecha de Pago</th>
      <th scope="col">Forma de Pago</th>
      <th scope="col">Doc. Pago</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        foreach($pago as $data){
        ?>
        <td><?=$data['ESTNOMBRE']?></td>
        <td><?=$data['CURNOMBRE']?></td>
        <td>$ <?=$data['PAGCUOTA']?></td>
        <td><?=$data['PAGFECREGPAGO']?></td>
        <td><?=$data['PAGFORMAPAGO']?></td>
        <td><?=$data['PAGNUMDOCPAGO']?></td>
        <?php
        }
        ?>
    </tr>
    <tr>
  
   
  </tbody>
</table>

  <div class="firmas-group">
    <div class="firmas-img">
    <img class="firma-autorizada" src="<?= base_url('/public/img/firma.png')?>">
    <img src="" alt="">
    </div>
    <div class="firmas-labels">
      <span class="firma-label">Firma de Autorizacion</span>
      <span class="firma-label">Firma de Cliente</span>
    </div>
    
  </div>

</main>
<!-- End Main -->
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>