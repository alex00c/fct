<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargaridentificador();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Nombre</a></th>
			<th><a>Numero de Serie</a></th>

			
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['nombre']."</td>";
				echo "<td>".$registro['numero']."</td>";


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
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a>Numero de Serie</a></th>
			
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['nombre']."</td>";
				echo "<td>".$registro['numero']."</td>";


			}
			echo "</table></div>";
		}
	}
?>