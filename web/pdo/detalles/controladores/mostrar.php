<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargardetalles();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=id'>Id de Orden</a></th>
			<th><a>Empleado</a></th>
			<th><a>Cliente</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha</a></th>
			<th><a href='ordenar.php?orden=producto'>Producto</a></th>
			<th><a>Cantidad</a></th>
			<th><a>Precio Unitario</a></th>
			<th><a>Precio</a></th>
			
			
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['producto']."</td>";
				echo "<td>".$registro['cantidad']."</td>";
				echo "<td>".$registro['precioud']."</td>";
				echo "<td>".$registro['total']."</td>";
				
				
				

				echo "<td><a href='./modificar.php?codigo=". $registro['id']."&cod_pro=". $registro['codigo']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['id']."'>Borrar</td></tr>";
				
			}
			
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenardetalles($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=id'>Id de Orden</a></th>
			<th><a>Empleado</a></th>
			<th><a>Cliente</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha</a></th>
			<th><a href='ordenar.php?orden=producto'>Producto</a></th>
			<th><a>Cantidad</a></th>
			<th><a>Precio Unitario</a></th>
			<th><a>Precio Total</a></th>
			
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['producto']."</td>";
				echo "<td>".$registro['cantidad']."</td>";
				echo "<td>".$registro['precioud']."</td>";
				echo "<td>".$registro['total']."</td>";
				

				echo "<td><a href='./modificar.php?codigo=". $registro['id']."&cod_pro=". $registro['codigo']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['id']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	


function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscardetalles($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Id de Orden</a></th>
			<th><a>Empleado</a></th>
			<th><a>Cliente</a></th>
			<th>Fecha</a></th>
			<th><a>Producto</a></th>
			<th><a>Cantidad</a></th>
			<th><a>Precio Unitario</a></th>
			<th><a>Precio</a></th>
			<th colspan='2'>Opciones</th>
			
			
						
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['id']."</td>";
				echo "<td>".$registro['empleado']."</td>";
				echo "<td>".$registro['cliente']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['producto']."</td>";
				echo "<td>".$registro['cantidad']."</td>";
				echo "<td>".$registro['precioud']."</td>";
				echo "<td>".$registro['total']."</td>";
				echo "<td><a href='./modificar.php?codigo=". $registro['id']."&cod_pro=". $registro['codigo']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['id']."'>Borrar</td>";
				

				
				}
				
				
					echo "</table>";
					echo "<div id='pdf'><p>PDF</p><a href='generatepdf.php?buscar=". $registro['id']."'><i class='material-icons'>picture_as_pdf</i></a></div>";
					echo "<div id=precio>";
					echo "<h2>PRECIO TOTAL DE LA ORDEN</h2>";
					echo "<h3>".$registro['pago']."</h3>";
					echo "</div";
		}
	}
?>