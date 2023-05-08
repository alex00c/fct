<?php
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	require('./mostrar.php');
	$consulta=new Consultas();
	$codigo=$_REQUEST['codigo'];
	$nombre=$_REQUEST['nombre'];
	$correo=$_REQUEST['correo'];
	$bonus=$_REQUEST['bonus'];
	$dep=$_REQUEST['departamento'];


	$mensaje=$consulta->modificarempleados($codigo,$nombre,$correo, $bonus, $dep);

	
	echo $mensaje;
?>