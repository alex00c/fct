<?php 
function seleccion(){
		$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
		$filas=$consulta->modclientes($codigo);
		foreach ($filas as $registro){
			echo '
			<fieldset>
				  <form action="./controladores/modificarP.php?codigo='.$codigo.'" method="post">
				      <label for="DNI">DNI:</label>
					  <input type="text" name="DNI" value="'.$registro['DNI'].'"><br>
				      <label for="nombre">Nombre:</label>
				      <input type="text" name="nombre" value="'.$registro['Nombre'].'"><br>
					  <label for="correo">Correo:</label>
				      <input type="text" name="correo" value="'.$registro['Correo'].'"><br>					  
					  <label for="Tel">Tel:</label>
				      <input type="text" name="Tel" value="'.$registro['Tel'].'"><br>';
				       
				     
				     echo ' <input type="submit" value="GUARDAR CAMBIOS">
				  </form>
				  </fieldset>
				 ';
		}
	}
