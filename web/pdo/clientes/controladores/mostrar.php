<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargarclientes();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a>DNI</a></th>
			<th><a>Correo</a></th>
			<th><a>Teléfono</a></th>

			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['DNI']."</td>";
				echo "<td>".$registro['Correo']."</td>";
				echo "<td>".$registro['Tel']."</td>";


				echo "<td><a href='./modificar.php?codigo=". $registro['DNI']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['DNI']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenarclientes($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a>DNI</a></th>
			<th><a>Correo</a></th>
			<th><a>Teléfono</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['DNI']."</td>";
				echo "<td>".$registro['Correo']."</td>";
				echo "<td>".$registro['Tel']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['DNI']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['DNI']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	
		function borrado(){
			$codigo=$_REQUEST['codigo'];
		    $consulta=new Consultas();
			$fila=$consulta->borclientes($codigo);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a>DNI</a></th>
			<th><a>Correo</a></th>
			<th><a>Teléfono</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['DNI']."</td>";
				echo "<td>".$registro['Correo']."</td>";
				echo "<td>".$registro['Tel']."</td>";

				echo "<td><a href='./clientes.php'>NO</td>";
				echo "<td><a href='./controladores/borrar.php?codigo=". $registro['DNI']."'>SI</td></tr>";
			}
			echo "</table></div>";
		}
		function selectPuesto(){

			echo "
			<fieldset>
			<legend>Insercion de asignatura</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertar.php'>
			
		<label for='nombre'>Nombre:</label>
		<input type='text' name='nombre' id='nombre'required><br>
		<label for='DNI'>DNI:</label>
		<input type='text' name='DNI' id='DNI'required><br>
		<label for='correo'>Correo:</label>
		<input type='text' name='correo' id='correo'required><br>
		
		<label for='tel'>Telefono de Contacto:</label>
		<input type='number' name='tel' id='tel'required><br>";

		  	         echo "

		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscarclientes($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a>DNI</a></th>
			<th><a>Correo</a></th>
			<th><a>Teléfono</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['DNI']."</td>";
				echo "<td>".$registro['Correo']."</td>";
				echo "<td>".$registro['Tel']."</td>";


				echo "<td><a href='./modificar.php?codigo=". $registro['DNI']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['DNI']."'>Borrar</td></tr>";
				}
					echo "</table>";
		}
	}
?>