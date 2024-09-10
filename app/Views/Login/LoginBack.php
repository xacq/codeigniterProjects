<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
	/>
	<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
	/>
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css?v=<?php echo(rand()); ?>"/>
	<title>SGCC</title><br>
<center><h3>BIENVENIDOS AL SISTEMA DE GESTION 3</h3></center>
</head>
<body>
<div class="wrapper">
	<div class="logo">
		
	</div><br>
	<div class="text-center mt-4 name"style="color:white;"></div>
	<form class="p-3 mt-3" action="<?php echo base_url('home/auth'); ?>" method="post" autocomplete="off">
		<div class="form-field d-flex align-items-center">
			<i class="far fa-user"style="color:white;"></i>
			<input type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario"required autocomplete="on"/>
		</div><br>
		<div class="form-field d-flex align-items-center">
			<i class="fas fa-key" style="color:white;"></i>
			<br><input type="password" name="txtClave" id="txtClave" placeholder="Clave " required autocomplete="on"/>
		</div><br>
		<button class="btn mt-3"style="color:white;">Iniciar</button>
	</form>
	<div class="text-center fs-6"><br>
		<span style="color:white;font-size:12px;"> Sino Tienes Una Cuenta | </span><a href="<?php echo base_url('EstudianteController/nuevo'); ?>">Registrate</a>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
