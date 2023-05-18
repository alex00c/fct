<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargardep();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Salario</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Dep']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Salario']."</td>";


				echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Dep']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['Cod_Dep']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenardep($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Salario</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Dep']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Salario']."</td>";


				echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Dep']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['Cod_Dep']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	
		function borrado(){
			$codigo=$_REQUEST['codigo'];
		    $consulta=new Consultas();
			$fila=$consulta->bordep($codigo);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Salario</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Dep']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Salario']."</td>";

				echo "<td><a href='./departamentos.php'>NO</td>";
				echo "<td><a href='./controladores/borrar.php?codigo=".$registro['Cod_Dep']."'>SI</a></td></tr>";
			}
			echo "</table></div>";
		}
		function selectPuesto(){


			echo "
			<fieldset>
			<legend>Insercion de Departamento</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertar.php'>
			
		<label for='codigo'>Codigo:</label>
		<input type='text' name='codigo' id='codigo'required><br>
		<label for='nombre'>Nombre:</label>
		<input type='text' name='nombre' id='nombre'required><br>
		<label for='salario'>Salario:</label>
		<input type='number' name='salario' id='salario'required><br>";
		  	         echo "

		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscardep($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a>Codigo</a></th>
			<th><a>Nombre</a></th>
			<th><a>Salario</a></th>
			
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['Cod_Dep']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Salario']."</td>";


				echo "<td><a href='./modificar.php?codigo=". $registro['Cod_Dep']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['Cod_Dep']."'>Borrar</td></tr>";
				}
					echo "</table>";
		}
	}
?>