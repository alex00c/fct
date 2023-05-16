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
	$consulta->insertarorden($id,$empleado,$cliente);
	
	
	
}else{
	echo "Por favor, rellena todos los campos";
}
$productos = $_REQUEST['producto'];
$cantidades = $_REQUEST['cantidad'];

if (is_array($productos) && is_array($cantidades) && count($productos) === count($cantidades)) {
    // Ambos son arrays y tienen la misma longitud, se pueden procesar los datos
    for ($i = 0; $i < count($productos); $i++) {
        $producto = $productos[$i];
        $cantidad = $cantidades[$i];

        // Aquí puedes realizar las operaciones necesarias con cada producto y cantidad
        // Por ejemplo, puedes insertar los detalles en la base de datos
        $consulta->insertardetalles($id, $producto, $cantidad);
    }
	$consulta->actualizaprecio($id);
	echo "<a href='../../ordenes/ordenes.php'>Volver</a>";
} else {
    // Los arrays no son válidos o no tienen la misma longitud, muestra un mensaje de error o realiza alguna otra acción apropiada
    echo "Error: los arrays de productos y cantidades no son válidos o no tienen la misma longitud.";
}

	echo $mensaje;

 ?>