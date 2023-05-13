<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargarordenes();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=id'>Id de Orden</a></th>
			<th><a href='ordenar.php?orden=empleado'>Empleado</a></th>
			<th><a href='ordenar.php?orden=cliente'>Cliente</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha</a></th>
			
			
						<th colspan='1'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				
				

				echo "<td><a href='../detalles/mostrar.php?codigo=". $registro['id']."'>Ver Detalles</td>";
				
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenarordenes($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=id'>Id de Orden</a></th>
			<th><a href='ordenar.php?orden=empleado'>Empleado</a></th>
			<th><a href='ordenar.php?orden=cliente'>Cliente</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha</a></th>
			
			
						<th colspan='1'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				
				

				echo "<td><a href='../detalles/detalles.php?buscar=". $registro['id']."'>Ver Detalles</td>";
			}
			echo "</table></div>";
		}
	


function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscarordenes($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=id'>Id de Orden</a></th>
			<th><a href='ordenar.php?orden=empleado'>Empleado</a></th>
			<th><a href='ordenar.php?orden=cliente'>Cliente</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha</a></th>
			
			
						<th colspan='1'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				
				

				echo "<td><a href='../detalles/detalles.php?buscar=". $registro['id']."'>Ver Detalles</td>";
				}
					echo "</table>";
		}
	}
?>