<?php 
	require('../modelos/class.conexion.php');
	require('../modelos/class.consultas.php');

	$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
	$consulta->borrarordenes($codigo);
	echo "<a href='../ordenes.php'>Volver</a>";

	echo "<form action='cancelar_orden.php' method='POST'>
	<label for='id_orden'>ID de la Orden:</label>
	<input type='text' name='id_orden' id='id_orden' value='$codigo'required><br>
	<label for='motivo'>Motivo de la Cancelación:</label>
	<textarea name='motivo' id='motivo' rows='3' required></textarea><br>
	<input type='submit' value='Cancelar Orden'>
</form>";
?>