<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$nombre=$_REQUEST['nombre'];
	$dni=$_REQUEST['DNI'];
	$correo=$_REQUEST['correo'];
	$tel=$_REQUEST['tel'];
	


	$mensaje=null;

if (strlen($nombre)>0 && strlen($dni)>0) {

	$consulta=new Consultas();
	$consulta->insertarclientes($nombre,$dni,$correo,$tel);
	echo "<a href='../../ordenes/ordenes.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>