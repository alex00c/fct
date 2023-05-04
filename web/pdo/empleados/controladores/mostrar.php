<?php
	function cargar(){
		$consulta=new Consultas();
			$fila=$consulta->cargarasignaturas();
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
						<th><a href='ordenar.php?orden=clave_asignatura'>Codigo</a></th>
						<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
						<th><a href='ordenar.php?orden=aula'>Aula</a></th>

						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['clave']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['aula']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['clave']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['clave']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
		
		function cargarOrdenar($orden){
		$consulta=new Consultas();
		
			$fila=$consulta->ordenarasignaturas($orden);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th><a href='ordenar.php?orden=clave_asignatura'>Codigo</a></th>
			<th><a href='ordenar.php?orden=nombre'>Nombre</a></th>
			<th><a href='ordenar.php?orden=aula'>Aula</a></th>
						<th colspan='2'>Opciones</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['clave']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['aula']."</td>";

				echo "<td><a href='./modificar.php?codigo=". $registro['clave']."'>Modificar</td>";
				echo "<td><a href='borrarM.php?codigo=". $registro['clave']."'>Borrar</td></tr>";
			}
			echo "</table></div>";
		}
	
		function borrado(){
			$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
			$fila=$consulta->borasignaturas($codigo);
			echo "<div id='caja'><table class='table table-striped' border='1'>";
			echo "<tr>
			<th>Código de Asignatura</th>
			<th>Nombre</th>
			<th>Aula</th>
						<th colspan='2'>¿Desa borrarlo?</th>
					</tr>";
			foreach ($fila as $registro) {
				echo "<tr><td>".$registro['clave']."</td>";
				echo "<td>".$registro['nombre']."</td>";
				echo "<td>".$registro['aula']."</td>";

				echo "<td><a href='./asignaturas.php'>NO</td>";
				echo "<td><a href='./controladores/borrar.php?codigo=". $registro['clave']."'>SI</td></tr>";
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
			
		<label for='productor'>Codigo de asignatura:</label>
		<input type='text' name='codigo' id='productor'required><br>
		<label for='productor'>Nombre:</label>
		<input type='text' name='nombre' id='productor'required><br>";
			echo "<label for='productor'>Aula:</label>";
		    echo "<select name='aula' id='puesto'> <br>";
		  
		  		
			$sql="SELECT clave_aula , nombre from aulas order by clave_aula";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				  echo ("<option value='".$codigo["clave_aula"]."'>".$codigo["nombre"]."</option>");
			  }
    		
		  	         echo("</select><br>");
		  	         echo "

		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
function buscar($codigo){
		$consulta=new Consultas();
		$fila=$consulta->buscarasignaturas($codigo);
		
		if (empty($fila)) {
			echo "Error: No se han encontrado resultados para el código proporcionado.";
		} else {
			echo "<table class='table table-striped' border='1'>";
			echo "<tr>
			<th>Código de Asignatura</th>
			<th>Nombre</th>
			<th>Aula</th>
							<th colspan='2'>Opciones</th>
						</tr>";
			foreach ($fila as $registro) {
			echo "<tr><td>".$registro['clave']."</td>";
					echo "<td>".$registro['nombre']."</td>";
					echo "<td>".$registro['aula']."</td>";

					echo "<td><a href='./modificar.php?codigo=". $registro['clave']."'>Modificar</td>";
					echo "<td><a href='./borrarM.php?codigo=". $registro['clave']."'>Borrar</td></tr>";
				}
					echo "</table>";
		}
	}
?>