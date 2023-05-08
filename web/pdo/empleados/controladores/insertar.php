<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');
    $codigo=$_REQUEST['codigo'];
	$nombre=$_REQUEST['nombre'];
	$aula=$_REQUEST['aula'];


	$mensaje=null;

if (strlen($nombre)>0 && strlen($aula)>0) {

	$consulta=new Consultas();
	$consulta->insertarempleados($codigo,$nombre,$aula);
	echo "<a href='../asignaturas.php'>Volver</a>";
}else{
	echo "Por favor, rellena todos los campos";
}
	echo $mensaje;

 ?>