<?php
class Consultas
{
	public function insertarempleados($codigo,$nombre,$aula)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into empleados(clave_asignatura,nombre,clave_aula) values (:clave, :nombre, :aula)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':clave', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':aula', $aula);
		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function cargarempleados()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT empleados.clave_asignatura as clave , empleados.nombre as nombre , aulas.nombre as aula from empleados inner join aulas on empleados.clave_aula=aulas.clave_aula";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	
	

	public function borrarempleados($arg_codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "delete from empleados where clave_asignatura=:codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $arg_codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			return "El registro se ha borrado correctamente.";
		}
	}
	public function ordenarempleados($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT empleados.clave_asignatura as clave , empleados.nombre as nombre , aulas.nombre as aula from empleados inner join aulas on empleados.clave_aula=aulas.clave_aula order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscarempleados($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT empleados.clave_asignatura as clave , empleados.nombre as nombre , aulas.nombre as aula from empleados inner join aulas on empleados.clave_aula=aulas.clave_aula where empleados.nombre like :codigo order by aulas.clave_aula";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function modempleados($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT empleados.clave_asignatura as clave , empleados.nombre as nombre , aulas.nombre as aula from empleados inner join aulas on empleados.clave_aula=aulas.clave_aula where empleados.clave_asignatura like :codigo order by aulas.clave_aula";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function borempleados($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT empleados.clave_asignatura as clave , empleados.nombre as nombre , aulas.nombre as aula from empleados inner join aulas on empleados.clave_aula=aulas.clave_aula where empleados.clave_asignatura like :codigo";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function modificarempleados($clave, $nombre, $aula)
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update empleados set nombre= :nombre, clave_aula= :aula where clave_asignatura= :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $clave);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':aula', $aula);

		if (!$statement) {
			return "ERROR en la modificación del registro.
				<br>
				<a href='../index.html'>Volver</a>";
		} else {
			$statement->execute();
			return "Se ha modificado.
				<br>
				<a href='../index.html'>Volver</a>";
		}
	}
}
