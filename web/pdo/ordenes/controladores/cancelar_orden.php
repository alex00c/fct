<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$motivo=$_REQUEST['motivo'];
    $codigo=$_REQUEST['id_orden'];
		$consulta=new Consultas();
	$consulta->motivo($motivo,$codigo);
	echo "<a href='../ordenes.php'>Volver</a>";


?>