<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargaridentificador();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Id de orden</a></th>
			<th><a>Motivo de la cancelacion</a></th>
			<th><a>Fecha de cancelacion</a></th>
			<th><a>Precio</a></th>

			
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id_orden']."</td>";
				echo "<td>".$registro['motivo']."</td>";
				echo "<td>".$registro['fecha_cancelacion']."</td>";
				echo "<td>".$registro['precio']."</td>";


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
			echo "<tr>";
			echo "<th><a>Id de orden</a></th>
			<th><a>Motivo de la cancelacion</a></th>
			<th><a>Fecha de cancelacion</a></th>
			<th><a>Precio</a></th>
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id_orden']."</td>";
				echo "<td>".$registro['motivo']."</td>";
				echo "<td>".$registro['fecha_cancelacion']."</td>";
				echo "<td>".$registro['precio']."</td>";


			}
			echo "</table></div>";
		}
	}
?>