<?php
class Consultas
{
	public function insertarproductos($codigo,$nombre,$precio)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into productos(Cod_Pro,Nombre,Precio) values (:codigo, :nombre, :precio)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':precio', $precio);

		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function insertarid($codigo,$numero)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into identificador(Cod_Pro,num_serie) values (:codigo, :numero)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':numero', $numero);


		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function cargarproductos()
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * FROM productos";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	
	
	

	public function borrarproductos($arg_codigo)
	{

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "delete from productos where Cod_Pro=:codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $arg_codigo);

		if (!$statement) {
			return "ERROR: No se ha podido borrar.";
		} else {
			$statement->execute();
			return "El registro se ha borrado correctamente.";
		}
	}
	public function ordenarproductos($orden)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$sql = "SELECT * from productos order by " . $orden;
		$statement = $conexion->prepare($sql);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function buscarproductos($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from productos where Cod_Pro=:codigo;";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function modproductos($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from productos where Cod_Pro = :codigo";
		$statement = $conexion->prepare($sql);
		$codigo = $codigo . '%';
		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}
	public function borproductos($codigo)
	{
		$registro = null;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "SELECT * from productos where Cod_Pro= :codigo;";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function modificarproductos($codigo ,$nombre, $precio)
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update productos set Nombre= :nombre , Precio= :precio where Cod_Pro= :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':precio', $precio);


		if (!$statement) {
			return "ERROR en la modificación del registro.
				<br>
				<a href='../index.html'>Volver</a>";
		} else {
			$statement->execute();
			return "Se ha modificado.
				<br>
				<a href='../productos.php'>Volver</a>";
		}
	}
}
