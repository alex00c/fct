<?php
class Consultas
{
	public function insertardep($codigo,$nombre,$salario)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into departamentos(Cod_Dep,Nombre,Salario) values (:codigo, :nombre, :salario)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':salario', $salario);
		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function cargardep()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from departamentos;";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	
	

	public function borrardep($arg_codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "delete from departamentos where Cod_Dep = :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $arg_codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			
		
			return "El registro se ha borrado correctamente.";
		}
	}
	public function ordenardep($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT * from departamentos order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscardep($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from departamentos where Nombre like :codigo;";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function moddep($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from departamentos where Cod_Dep = :codigo";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function bordep($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from departamentos where Cod_Dep= :codigo;";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function modificardep($codigo, $nombre, $salario)
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update departamentos set Nombre= :nombre, Salario= :salario where Cod_Dep= :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':salario', $salario);


		if (!$statement) {
			return "ERROR en la modificación del registro.
				<br>
				<a href='../index.html'>Volver</a>";
		} else {
			$statement->execute();
			return "Se ha modificado.
				<br>
				<a href='../departamentos.php'>Volver</a>";
		}
	}
}
