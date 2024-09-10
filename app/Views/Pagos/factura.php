<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPROBANTE DE LA FACTURA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
<body >

<style>
  /* Factura */

html,body {
    min-width: 100%;
    height: 100vh;
    box-sizing: border-box;
    
}

.contenido{
    max-width: 800px; 
    height: 100%;
    position: relative;
    margin: 0 auto;
    box-shadow: 9px 5px 27px 10px rgba(0,0,0,0.1);
    /* background: #f9f7f7; */

}



.encabezado{
    height: 300px;
     width: 100%;
     display: flex;
     justify-content: center;
     position: absolute;
     top: 0;
     padding-top: 10px;
  }
  
.encabezado-logo{
    height: 100px;
    position: absolute;
    left: 50px;
    top: 10px;
    opacity: 60%;
}
.encabezado-info{
    display: flex;
    flex-direction: column;
}

.info-factura{
    text-align: center;
}

.logo-rounded{
    border-radius: 10%;
}

.main-content{
    padding-top: 150px;
    padding-left: 25px;
    padding-right: 25px;
 }



 .firmas-group {
    /* margin-top: 75px; */
    width: 100%;
 }


 .firma-autorizada{
    height: 60px;
    width: auto;
 }


 .firmas-img, .firmas-labels{
    display: flex;
    justify-content: space-around;
 }

 .firma-label{
    border-top: 1px solid;
 }

 
 
.pie_pagina{
    height: auto;
    width: 100%;
    position: absolute;
    bottom: 0; left: 0;
    right: 0;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
}

.img-footer{
    width: 50%;
    height: auto;
    margin: 0 auto;
}





.input-group-text, .form-control{
    border: none ;
    background-color: white;
}

.input-group-text{
    font-weight: 700;
}
  
</style>

<div class="contenido">

    <!-- Header -->
     <header class="encabezado">
          <div class="encabezado-info">
            <h2 class="font-weight-bold ">FACTURA N° <?php echo $pago[0]['PAGID']?></h2>
            </div>  

        <img class="encabezado-logo logo-rounded" src="<?=base_url('/public/img/logo.jpeg')?>" >
    </header>
   <!-- Header -->


    <!-- Main  -->
  
  <main class="main-content">
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Estudiante:</span>
  <h3 class="form-control"  ><?php echo $pago[0]['ESTNOMBRE']?></h3>
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Fecha:</span>
  <h3 class="form-control"  ><?php echo date('d-m-Y')?></h3>

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
   
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>