<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
	$consulta=new Consultas();
	$consulta->borrardep($codigo);
	echo "<a href='../departamentos.php'>Volver</a>"
?>