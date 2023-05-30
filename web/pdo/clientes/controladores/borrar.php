<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borrarclientes($codigo);
	echo "<a href='../clientes.php'>Volver</a>"
?>