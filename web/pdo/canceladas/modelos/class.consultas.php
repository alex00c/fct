<?php
class Consultas
{
	
	public function cargaridentificador()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from ordenes_canceladas;";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	

	public function buscaridentificador($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from ordenes_canceladas where id_orden like :codigo;";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	

	
}
