<?php
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	require('./mostrar.php');
	$consulta=new Consultas();
	$codigo=$_REQUEST['DNI'];
	$nombre=$_REQUEST['nombre'];
	$dni=$_REQUEST['DNI'];
	$correo=$_REQUEST['correo'];
	$tel=$_REQUEST['Tel'];
	


	$mensaje=$consulta->modificarclientes($codigo,$nombre,$dni,$correo,$tel);

	
	echo $mensaje;
?>