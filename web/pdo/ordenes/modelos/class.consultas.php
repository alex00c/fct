<?php
class Consultas
{

	public function cargarordenes()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT ordenes.id_orden as id ,empleados.Nombre as empleado , ordenes.Cod_Cli as cliente , ordenes.fecha as fecha , ordenes.precio as precio
		FROM ordenes INNER JOIN empleados on ordenes.Cod_Emp=empleados.Cod_Emp;";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function borrarordenes($arg_codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "delete from ordenes where id_orden like :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $arg_codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			return "El registro se ha borrado correctamente.";
		}
	}
	public function motivo($motivo,$codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update ordenes_canceladas set motivo = :motivo where id_orden like :codigo;";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':motivo', $motivo);
		$statement->bindParam(':codigo', $codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			return "El registro se ha borrado correctamente.";
		}
	}
	public function borordenes($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT ordenes.id_orden as id ,empleados.Nombre as empleado , ordenes.Cod_Cli as cliente , ordenes.fecha as fecha , ordenes.precio as precio
		FROM ordenes INNER JOIN empleados on ordenes.Cod_Emp=empleados.Cod_Emp where id_orden like :codigo;";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	public function ordenarordenes($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT ordenes.id_orden as id ,empleados.Nombre as empleado , ordenes.Cod_Cli as cliente , ordenes.fecha as fecha , ordenes.precio as precio
		FROM ordenes INNER JOIN empleados on ordenes.Cod_Emp=empleados.Cod_Emp order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscarordenes($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT ordenes.id_orden as id ,empleados.Nombre as empleado , ordenes.Cod_Cli as cliente , ordenes.fecha as fecha , ordenes.precio as precio
		FROM ordenes INNER JOIN empleados on ordenes.Cod_Emp=empleados.Cod_Emp where id_orden like :codigo;";
		$statement = $conexion->prepare($sql);
		$codigo = '%' . $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	

	
}
