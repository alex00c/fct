<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargarempleados();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Bonus</a></th>
			<th><a>Correo</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha Contratacion</a></th>
			<th><a>Departamento</a></th>
			<th><a>Salario</a></th>
			<th><a>Salario Total</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['codigo']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['bonus']."</td>";
				echo "<td>".$registro['correo']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['departamento']."</td>";
				echo "<td>".$registro['salario']."</td>";
				echo "<td>".$registro['totalsalario']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['codigo']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['codigo']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenarempleados($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=codigo'>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Bonus</a></th>
			<th><a>Correo</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha Contratacion</a></th>
			<th><a>Departamento</a></th>
			<th><a>Salario</a></th>
			<th><a>Salario Total</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['codigo']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['bonus']."</td>";
				echo "<td>".$registro['correo']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['departamento']."</td>";
				echo "<td>".$registro['salario']."</td>";
				echo "<td>".$registro['totalsalario']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['codigo']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['codigo']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	
		function borrado(){
			$codigo=$_REQUEST['codigo'];
		    $consulta=new Consultas();
			$fila=$consulta->borempleados($codigo);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Bonus</a></th>
			<th><a>Correo</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha Contratacion</a></th>
			<th><a>Departamento</a></th>
			<th><a>Salario</a></th>
			<th><a>Salario Total</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['codigo']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['bonus']."</td>";
				echo "<td>".$registro['correo']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['departamento']."</td>";
				echo "<td>".$registro['salario']."</td>";
				echo "<td>".$registro['totalsalario']."</td>";

				echo "<td><a href='./empleados.php'>NO</td>";
				echo "<td><a href='./controladores/borrar.php?codigo=". $registro['codigo']."'>SI</td></tr>";
			}
			echo "</table></div>";
		}
		function selectPuesto(){
			$codigo=null;
			$modelo=new Conexion();
			$conexion=$modelo->conectar();
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
		$fila=$consulta->buscarempleados($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Bonus</a></th>
			<th><a>Correo</a></th>
			<th><a href='ordenar.php?orden=fecha'>Fecha Contratacion</a></th>
			<th><a>Departamento</a></th>
			<th><a>Salario</a></th>
			<th><a>Salario Total</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['codigo']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['bonus']."</td>";
				echo "<td>".$registro['correo']."</td>";
				echo "<td>".$registro['fecha']."</td>";
				echo "<td>".$registro['departamento']."</td>";
				echo "<td>".$registro['salario']."</td>";
				echo "<td>".$registro['totalsalario']."</td>";

					echo "<td><a href='./modificar.php?codigo=". $registro['codigo']."'>Modificar</td>";
					echo "<td><a href='./borrarM.php?codigo=". $registro['codigo']."'>Borrar</td></tr>";
				}
					echo "</table>";
		}
	}
?>