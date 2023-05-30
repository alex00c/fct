<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$nombre=$_REQUEST['nombre'];
	$salario=$_REQUEST['salario'];
	$codigo=$_REQUEST['codigo'];


	$mensaje=null;

if (strlen($nombre)>0 && strlen($salario)>0) {

	$consulta=new Consultas();
	$consulta->insertardep($codigo,$nombre,$salario);
	echo "<a href='../departamentos.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>