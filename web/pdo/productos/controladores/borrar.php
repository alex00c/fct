<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borrarempleados($codigo);
	echo "<a href='../empleados.php'>Volver</a>"
?>