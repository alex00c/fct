<?php
class Consultas
{
	public function insertarorden($id,$empleado,$cliente,$producto,$cantidad)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into empleados(Nombre,Bonus,Correo,fecha_contrato,Cod_Dep) values (:nombre, :bonus, :correo , :fecha , :dep)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->bindParam(':empleado', $empleado);
		$statement->bindParam(':cliente', $cliente);
		$statement->bindParam(':producto', $producto);
		$statement->bindParam(':cantidad', $cantidad);
		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	
}
