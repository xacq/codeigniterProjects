<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Auditorias</title>
</head>
<body>
    <style>
    @page {
      margin: 100px 25px;
    }
    header {
        position: fixed;
        top: -60px;
        height: 50;
        color: white;
        text-align: center;
        /*line-height: 35px;*/
    }

    footer {
        position: fixed;
        bottom: -60px;
        height: 50px;
        background-color: #752727;
        color: white;
        text-align: center;
        line-height: 35px;
    }
    thead th{
        background: lightgray; 
    }
    h1 {
        text-align:center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid;
    }
    </style>
    
    <header>
        <img src="<?=base_url('/public/img/logo.jpeg')?>" width="90" height="100">
        
    </header>

    
    <main><br><br><br>
    <h1>REPORTE AUDITORIAS </h1>
    
    <table >
      <thead>
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Accion</th>
          <th>Tabla</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Ip</th>
          <th>Host</th>
          <th>Sentencia</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $contador = 0;
            foreach($auditorias as $auditoria){
            $contador++;
        ?>
        <tr>
          
          <td><?=$contador?></td>
          <td><?=$auditoria['USUNOMBRE']?></td>
          <td><?=$auditoria['AUDACCION']?></td>
          <td><?=$auditoria['AUDTABLA']?></td>
          <td><?=$auditoria['AUDFECHA']?></td>
          <td><?=$auditoria['AUDHORA']?></td>
          <td><?=$auditoria['AUDIP']?></td>
          <td><?=$auditoria['AUDHOST']?></td>
          <td><?=$auditoria['AUDSENTENCIA']?></td>
        </tr>
        
        <?php    
           }
        ?>
      </tbody>
    </table><br>
    </main>
</body>
</html>