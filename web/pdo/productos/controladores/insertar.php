<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$codigo=$_REQUEST['id'];
	$nombre=$_REQUEST['nombre'];
	$precio=$_REQUEST['precio'];

	



	$mensaje=null;

if (strlen($nombre)>0 && strlen($precio)>0) {

	$consulta=new Consultas();
	$consulta->insertarproductos($codigo,$nombre,$precio);
	echo "<a href='../productos.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>