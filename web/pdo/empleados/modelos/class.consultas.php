<?php
class Consultas
{
	public function insertarempleados($nombre,$correo,$bonus,$fecha,$departamento)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into empleados(Nombre,Bonus,Correo,fecha_contrato,Cod_Dep) values (:nombre, :bonus, :correo , :fecha , :dep)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':correo', $correo);
		$statement->bindParam(':bonus', $bonus);
		$statement->bindParam(':fecha', $fecha);
		$statement->bindParam(':dep', $departamento);
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

		$sql = "SELECT empleados.Cod_Emp as codigo , empleados.Nombre as nombre , empleados.correo as correo , empleados.Bonus as bonus , empleados.fecha_contrato as fecha , departamentos.Nombre as departamento, departamentos.Salario as salario , (bonus + salario) AS totalsalario from empleados inner join departamentos on empleados.Cod_Dep=departamentos.Cod_Dep;";
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

		$sql = "delete from empleados where Cod_Emp=:codigo";
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

		$sql = "SELECT Cod_Emp ,Nombre as nombre  , Bonus as bonus , correo from empleados where Cod_Emp like :codigo";
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

		$sql = "SELECT empleados.Cod_Emp as codigo , empleados.Nombre as nombre , empleados.correo as correo , empleados.Bonus as bonus , empleados.fecha_contrato as fecha , departamentos.Nombre as departamento, departamentos.Salario as salario , (bonus + salario) AS totalsalario from empleados inner join departamentos on empleados.Cod_Dep=departamentos.Cod_Dep where Cod_Emp= :codigo;";
		$statement = $conexion->prepare($sql);

		$statement->bindParam(':codigo', $codigo);
		$statement->execute();
		while ($fila = $statement->fetch()) {
			$registro[] = $fila;
		}
		return $registro;
	}

	public function modificarempleados($codigo, $nombre, $correo , $bonus , $dep)
	{
		$registro = null;

		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "update empleados set Nombre= :nombre, correo= :correo , Bonus= :bonus , Cod_Dep= :dep where Cod_Emp= :codigo";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':codigo', $codigo);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':correo', $correo);
		$statement->bindParam(':bonus', $bonus);
		$statement->bindParam(':dep', $dep);

		if (!$statement) {
			return "ERROR en la modificación del registro.
				<br>
				<a href='../index.html'>Volver</a>";
		} else {
			$statement->execute();
			return "Se ha modificado.
				<br>
				<a href='../empleados.php'>Volver</a>";
		}
	}
}
