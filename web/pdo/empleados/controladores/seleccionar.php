<?php 
function seleccion(){
		$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
		$filas=$consulta->modasignaturas($codigo);
		foreach ($filas as $registro){
			echo '
			<fieldset>
				  <form action="./controladores/modificarP.php?codigo='.$codigo.'" method="post">

				     
				      <label for="clave">Nombre:</label>
				      <input type="text" name="nombre" value="'.$registro['nombre'].'"><br>';
				       echo "<label for='productor'>Aula:</label>";
		               echo "<select name='aula' id='clase'> <br>";
					 	$codigo=null;
						$modelo=new Conexion();
						$conexion=$modelo->conectar();
		  		
		  		$sql="SELECT clave_aula , nombre from aulas order by clave_aula";
				$statement=$conexion->prepare($sql);
				$statement->execute();
				while ($codigo=$statement->fetch()) {
				  	echo ("<option value='".$codigo["clave_aula"]."'>".$codigo["nombre"]."</option>");
				  }
    		
		  	         echo("</select><br>");
				     
				     echo ' <input type="submit" value="GUARDAR CAMBIOS">
				  </form>
				  </fieldset>
				 ';
		}
	} 
 ?>