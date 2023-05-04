<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borrarasignaturas($codigo);
	echo "<a href='../asignaturas.php'>Volver</a>"
?>