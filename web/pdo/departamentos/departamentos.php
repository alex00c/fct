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
	<title>Ver Departamentos</title>
	
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<script>
    function filtro(){
         var elements = document.querySelectorAll(".menu, .bclases");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.display === "none") {
            elements[i].style.display = "block";
        } else {
            elements[i].style.display = "none";
        }
    }
    }
    function filtro2(){
         var elements = document.querySelectorAll(".menu, .ordenar");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.display === "none") {
            elements[i].style.display = "block";
        } else {
            elements[i].style.display = "none";
        }
    }
    }
</script>
	<style type="text/css">
body{
    background-color: rgba(60, 105, 169, 255);
}
	</style>
	<h1>Departamentos</h1><br>
	<div class="busqueda">
	<form>
		<input type="text" name="buscar">
		<input type="submit" value="BUSCAR">
	</form>
	
</div>
<br>



<div class="insertar">
	<br>
<a href="insertar.php">Nuevo Departamento</a>
<br>
</div>
<div class="insertar">
<a href="../index.html">Inicio</a>
</div>
	<?php
	if (isset($_REQUEST['buscar'])) {
		buscar($_REQUEST['buscar']);
	}else{
		cargar();
	}
	?>
	
</body>
</html>