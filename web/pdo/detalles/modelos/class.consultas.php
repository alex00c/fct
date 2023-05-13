<?php
class Consultas
{

	public function cargardetalles()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT p.Cod_Pro as codigo , d.id_orden as id, e.Nombre as empleado, o.Cod_Cli as cliente, o.fecha, p.Nombre as producto, d.cantidad, d.precio_unitario as precioud, d.cantidad * d.precio_unitario AS total 
		FROM detalles_ordenes d INNER JOIN productos p ON d.Cod_Pro = p.Cod_Pro INNER JOIN ordenes o ON o.id_orden = d.id_orden INNER JOIN empleados e ON e.Cod_Emp = o.Cod_Emp;";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	public function ordenardetalles($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT p.Cod_Pro as codigo , d.id_orden as id, e.Nombre as empleado, o.Cod_Cli as cliente, o.fecha, p.Nombre as producto, d.cantidad, d.precio_unitario as precioud, d.cantidad * d.precio_unitario AS total 
		FROM detalles_ordenes d INNER JOIN productos p ON d.Cod_Pro = p.Cod_Pro INNER JOIN ordenes o ON o.id_orden = d.id_orden INNER JOIN empleados e ON e.Cod_Emp = o.Cod_Emp order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscardetalles($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT o.precio as pago , p.Cod_Pro as codigo , d.id_orden as id, e.Nombre as empleado, o.Cod_Cli as cliente, o.fecha, p.Nombre as producto, d.cantidad, d.precio_unitario as precioud, d.cantidad * d.precio_unitario AS total 
		FROM detalles_ordenes d INNER JOIN productos p ON d.Cod_Pro = p.Cod_Pro INNER JOIN ordenes o ON o.id_orden = d.id_orden INNER JOIN empleados e ON e.Cod_Emp = o.Cod_Emp  where d.id_orden like :codigo;";
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
