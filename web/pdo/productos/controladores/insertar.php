<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$codigo=$_REQUEST['Cod_Pro'];
	$nombre=$_REQUEST['Nombre'];
	$precio=$_REQUEST['Precio'];
	$numero=$_REQUEST['id'];
	



	$mensaje=null;

if (strlen($nombre)>0 && strlen($correo)>0) {

	$consulta=new Consultas();
	$consulta->insertarproductos($codigo,$nombre,$precio);
	echo "<a href='../productos.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>