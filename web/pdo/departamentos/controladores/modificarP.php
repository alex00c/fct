<?php
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	require('./mostrar.php');
	$consulta=new Consultas();
	$nombre=$_REQUEST['nombre'];
	$salario=$_REQUEST['salario'];
	$codigo=$_REQUEST['codigo'];


	$mensaje=$consulta->modificardep($codigo,$nombre,$salario);

	
	echo $mensaje;
?>