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
		function menu() {
		
		echo "
		<fieldset> 
		<legend>Seleccione la acción</legend>
		<div class='todo'>
			<div id='form'>
				<a href='./nuevo-producto.php'><button type='button'>Nuevo Producto</button></a>
				<a href='./producto-existente.php'><button type='button'>Producto existente</button></a>
			</div>
		</div>";}
		
		function selectPuesto(){

			echo "
			<fieldset>
			<legend>Insercion de Producto nuevo</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertar.php'>
			
		<label for='nombre'>Nombre:</label>
		<input type='text' name='nombre' id='nombre'required><br>
		<label for='precio'>Precio:</label>
		<input type='text' name='precio' id='precio'required><br>
		<label for='id'>Numero de Serie:</label>
		<input type='text' name='id' id='id'required><br>

		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
		function selectid(){
			$codigo=null;
			$modelo=new Conexion();
			$conexion=$modelo->conectar();
			echo "
			<fieldset>
			<legend>Insercion de Producto existente</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertarid.php'>";
			
			echo "<label for='codigo'>Producto:</label>";
		    echo "<select name='codigo' id='codigo'> <br>";
		  
		  		
			$sql="SELECT Cod_Pro , Nombre from productos order by Cod_Pro";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				  echo ("<option value='".$codigo["Cod_Pro"]."'>".$codigo["Nombre"]."</option>");
			  }
    		
		  	         echo("</select><br>");
					 echo"
		<label for='numero'>Numero de Serie:</label>
		<input type='text' name='numero' id='numero'required><br>


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