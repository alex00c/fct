<?php
	
		function selectPuesto(){
			$codigo=null;
			$modelo=new Conexion();
			$conexion=$modelo->conectar();
			$idorden = sprintf("ORD%010d", rand(1, 9999999999));

			echo "
			<fieldset>
			<legend>Nueva Orden</legend>
			<div class='todo'>
			<div id='form'>
			
			<form action='./controladores/insertar.php'>
			
			<label for='id'>Id de Orden:</label>
			<input type='text' name='id' id='id' value='$idorden' required><br>";
			echo "<label for='empleado'>Empleado:</label>";
		    echo "<select name='empleado' id='empleado'> <br>";
		  		  		
			$sql="SELECT Cod_Emp , Nombre from empleados order by Cod_Emp";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				  echo ("<option value='".$codigo["Cod_Emp"]."'>".$codigo["Nombre"]."</option>");
			  }
    		
		  	echo("</select><br>");
				
			echo "<label for='cliente'>Cliente:</label>";
			echo "<select name='cliente' id='cliente'> <br>";
					 
							 
			$sql="SELECT DNI , Nombre from clientes order by DNI";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				 echo ("<option value='".$codigo["DNI"]."'>".$codigo["Nombre"]."</option>");
						 }
					   
							echo("</select><br>");	
			echo "<label for='producto'>Producto:</label>";
			echo "<select name='producto' id='producto'> <br>";
					 
							 
			$sql="SELECT Cod_Pro , Nombre from productos order by Cod_Pro";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				 echo ("<option value='".$codigo["Cod_Pro"]."'>".$codigo["Nombre"]."</option>");
						 }
					   
							echo("</select><br>");
		echo "<label for='cantidad'>Cantidad:</label>
		<input type='number' name='cantidad' id='cantidad'required><br>";		 
		  	         echo "

		<div class='botones'>
		<input type='submit' value='GUARDAR'>
		</div>
	</form></div></div>";
		
		}
	
?>