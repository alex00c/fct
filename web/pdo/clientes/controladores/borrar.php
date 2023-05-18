<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borclientes($codigo);
	echo "<a href='../clientes.php'>Volver</a>"
?>