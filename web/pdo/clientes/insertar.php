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
	<title>Insertar Cliente</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

	
		<?php
			selectPuesto();
		?>
		<div class="inicio">
<a href="clientes.php">Inicio</a>
</div>
</body>
</html>