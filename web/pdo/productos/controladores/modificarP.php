<?php
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	require('./mostrar.php');
	$consulta=new Consultas();
	$codigo=$_REQUEST['codigo'];
	$nombre=$_REQUEST['nombre'];
	$precio=$_REQUEST['Precio'];


	$mensaje=$consulta->modificarproductos($codigo,$nombre,$precio);

	
	echo $mensaje;
?>