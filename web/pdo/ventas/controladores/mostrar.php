<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargaridentificador();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Nombre del producto</a></th>
			<th><a>Numero de serie</a></th>
			<th><a>Id de orden</a></th>
			<th><a>Fecha de venta</a></th>

			
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['nombre']."</td>";
				echo "<td>".$registro['numero']."</td>";
				echo "<td>".$registro['id']."</td>";
				echo "<td>".$registro['fecha']."</td>";


			}
			echo "</table></div>";
		}
		
		
		
	
function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscaridentificador($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Nombre del producto</a></th>
			<th><a>Numero de serie</a></th>
			<th><a>Id de orden</a></th>
			<th><a>Fecha de venta</a></th>
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['nombre']."</td>";
				echo "<td>".$registro['numero']."</td>";
				echo "<td>".$registro['id']."</td>";
				echo "<td>".$registro['fecha']."</td>";


			}
			echo "</table></div>";
		}
	}
?>