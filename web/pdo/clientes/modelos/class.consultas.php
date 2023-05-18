<?php
class Consultas
{
	public function insertarclientes($nombre,$dni,$correo,$tel)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into clientes(Nombre,DNI,Correo,Tel) values (:nombre, :dni, :correo , :tel)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':dni', $dni);
		$statement->bindParam(':correo', $correo);		
		$statement->bindParam(':tel', $tel);
	
		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function cargarclientes()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from clientes;";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	
	

	public function borrarclientes($arg_codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "delete from clientes where DNI=:codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $arg_codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			return "El registro se ha borrado correctamente.";
		}
	}
	public function ordenarclientes($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT * from clientes order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscarclientes($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from clientes where DNI like :codigo;";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function modclientes($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from clientes where DNI like :codigo";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function borclientes($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from clientes where DNI like :codigo;";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function modificarclientes($codigo,$nombre, $dni, $correo , $tel)
	{


		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update clientes set Nombre= :nombre, DNI= :dni , Correo= :correo , Tel= :tel where DNI like :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':dni', $dni);
		$statement->bindParam(':correo', $correo);		
		$statement->bindParam(':tel', $tel);

		if (!$statement) {
			return "ERROR en la modificación del registro.
				<br>
				<a href='../index.html'>Volver</a>";
		} else {
			$statement->execute();
			return "Se ha modificado.
				<br>
				<a href='../clientes.php'>Volver</a>";
		}
	}
}
