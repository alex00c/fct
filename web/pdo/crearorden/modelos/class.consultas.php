<?php
class Consultas
{
	public function insertarorden($id,$empleado,$cliente)
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into ordenes (id_orden,Cod_Emp,Cod_Cli,fecha) values (:id, :empleado, :cliente,NOW())";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->bindParam(':empleado', $empleado);
		$statement->bindParam(':cliente', $cliente);

		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	
	public function insertardetalles($id,$producto,$cantidad)
	{   $precio = 0;
		$modelo = new Conexion();
		$conexion = $modelo->conectar();

		$sql = "insert into detalles_ordenes (id_orden,Cod_Pro,cantidad,precio_unitario) values (:id, :producto, :cantidad , :precio)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->bindParam(':producto', $producto);
		$statement->bindParam(':cantidad', $cantidad);
		$statement->bindParam(':precio', $precio);
		if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
		} else {
			$statement->execute();
			return "El registro se ha insertado correctamente.";
		}
	}
	public function actualizaprecio($id) {
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
        $sql = "UPDATE detalles_ordenes AS d
                  INNER JOIN productos AS p ON d.Cod_Pro = p.Cod_Pro
                  SET d.precio_unitario = p.Precio
                  WHERE d.id_orden = :id_orden";
        
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':id_orden', $id);
        
        if (!$statement) {
			return "ERROR: No se ha insertado el registro.";
            
        } else {
			$statement->execute();
            return "El registro se ha insertado correctamente.";
        }
    }
}
