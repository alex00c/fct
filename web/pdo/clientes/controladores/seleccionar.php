<?php 
function seleccion(){
		$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
		$filas=$consulta->modempleados($codigo);
		foreach ($filas as $registro){
			echo '
			<fieldset>
				  <form action="./controladores/modificarP.php?codigo='.$codigo.'" method="post">

				     
				      <label for="nombre">Nombre:</label>
				      <input type="text" name="nombre" value="'.$registro['nombre'].'"><br>
					  <label for="correo">Correo:</label>
				      <input type="text" name="correo" value="'.$registro['correo'].'"><br>
					  <label for="bonus">Bonus:</label>
				      <input type="text" name="bonus" value="'.$registro['bonus'].'"><br>';
				       echo "<label for='dep'>Departamento:</label>";
		               echo "<select name='departamento' id='dep'> <br>";
					 	$codigo=null;
						$modelo=new Conexion();
						$conexion=$modelo->conectar();
		  		
		  		$sql="SELECT Cod_Dep , Nombre from departamentos order by Cod_Dep";
				$statement=$conexion->prepare($sql);
				$statement->execute();
				while ($codigo=$statement->fetch()) {
				  	echo ("<option value='".$codigo["Cod_Dep"]."'>".$codigo["Nombre"]."</option>");
				  }
    		
		  	         echo("</select><br>");
				     
				     echo ' <input type="submit" value="GUARDAR CAMBIOS">
				  </form>
				  </fieldset>
				 ';
		}
	} 
 ?>