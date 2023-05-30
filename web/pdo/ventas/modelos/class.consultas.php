<?php
class Consultas
{
	
	public function cargaridentificador()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT p.Nombre as nombre , v.num_serie as numero , v.id_orden as id , v.fecha as fecha from ventas v inner join productos p on v.Cod_Pro=p.Cod_Pro;";
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

		$sql = "SELECT p.Nombre as nombre , v.num_serie as numero , v.id_orden as id , v.fecha as fecha from ventas v inner join productos p on v.Cod_Pro=p.Cod_Pro where v.id_orden like :codigo;";
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
