<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$id=$_REQUEST['id'];
	$empleado=$_REQUEST['empleado'];
	$cliente=$_REQUEST['cliente'];
	$producto=$_REQUEST['producto'];
	$cantidad=$_REQUEST['cantidad'];


	$mensaje=null;

if (strlen($id)>0 && strlen($empleado)>0) {

	$consulta=new Consultas();
	$consulta->insertarorden($id,$empleado,$cliente,$producto,$cantidad);
	echo "<a href='../empleados.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>