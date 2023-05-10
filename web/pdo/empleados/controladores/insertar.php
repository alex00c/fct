<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$nombre=$_REQUEST['nombre'];
	$correo=$_REQUEST['correo'];
	$bonus=$_REQUEST['bonus'];
	$departamento=$_REQUEST['departamento'];
	$fecha=$_REQUEST['fecha'];


	$mensaje=null;

if (strlen($nombre)>0 && strlen($correo)>0) {

	$consulta=new Consultas();
	$consulta->insertarempleados($nombre,$correo,$bonus,$fecha,$departamento);
	echo "<a href='../empleados.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>