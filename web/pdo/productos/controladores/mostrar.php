<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargarproductos();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Precio</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Pro']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Precio']."</td>";



				echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Pro']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['Cod_Pro']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenarproductos($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Precio</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Pro']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Precio']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Pro']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['Cod_Pro']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	
		function borrado(){
			$codigo=$_REQUEST['codigo'];
		    $consulta=new Consultas();
			$fila=$consulta->borproductos($codigo);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Precio</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Pro']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Precio']."</td>";;

				echo "<td><a href='./preductos.php'>NO</td>";
				echo "<td><a href='./controladores/borrar.php?codigo=". $registro['Cod_Pro']."'>SI</td></tr>";
			}
			echo "</table></div>";
		}
		function selectPuesto(){

			echo "
			<fieldset>
			<legend>Insercion de Producto</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertar.php'>
			
		<label for='nombre'>Nombre:</label>
		<input type='text' name='nombre' id='nombre'required><br>
		<label for='precio'>Precio:</label>
		<input type='text' name='precio' id='precio'required><br>


		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscarproductos($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Precio</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Pro']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Precio']."</td>";

					echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Pro']."'>Modificar</td>";
					echo "<td><a href='./borrarM.php?codigo=". $registro['Cod_Pro']."'>Borrar</td></tr>";
				}
					echo "</table>";
		}
	}
?>