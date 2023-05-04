<?php
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	require('./mostrar.php');
	$consulta=new Consultas();
	$codigo=$_REQUEST['codigo'];
	$nombre=$_REQUEST['nombre'];
	$aula=$_REQUEST['aula'];


	$mensaje=$consulta->modificarasignaturas($codigo,$nombre,$aula);

	
	echo $mensaje;
?>