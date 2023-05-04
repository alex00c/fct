<?php
	require('./modelos/class.conexion.php');
	require('./modelos/class.consultas.php');
	require('./controladores/mostrar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ver productores</title>
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		body{
			background-color: rgb(219, 246, 217);
		}
	</style>
	<h1>Borrado de Asignaturas</h1><br>
	<div class="busqueda">
	<form>
		<input type="text" name="buscar">
		<input type="submit" value="BUSCAR">
	</form>

</div>
<div class="insertar">
	<br>
<a href="insertar.php">Nueva Asignatura</a>
<br>
</div>
<div class="insertar">
<a href="index.html">Inicio</a>
</div>
	<?php
	if (isset($_REQUEST['buscar'])) {
		buscar($_REQUEST['buscar']);
	}else{
		borrado();
	}
	?>
	
</body>
</html>