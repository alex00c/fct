<?php
class Consultas
{
	
	public function cargaridentificador()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT productos.Nombre as nombre , identificador.num_serie as numero from identificador inner join productos on identificador.Cod_Pro = productos.Cod_Pro order by productos.Nombre;";
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

		$sql = "SELECT productos.Nombre as nombre , identificador.num_serie as numero from identificador inner join productos on identificador.Cod_Pro = productos.Cod_Pro where num_serie like :codigo;";
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
