<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borrarproductos($codigo);
	echo "<a href='../productos.php'>Volver</a>"
?>