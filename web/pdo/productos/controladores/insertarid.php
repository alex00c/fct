<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
	$codigo=$_REQUEST['codigo'];
	$numero=$_REQUEST['numero'];
	



	$mensaje=null;

if (strlen($codigo)>0 && strlen($numero)>0) {

	$consulta=new Consultas();
	$consulta->insertarid($codigo,$numero);
	echo "<a href='../productos.php'>Volver</a><br>";
    echo "<a href='../../identificador/identificador.php'>Comprobar Identificadores</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>