<?php 
function seleccion(){
		$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
		$filas=$consulta->moddep($codigo);
		foreach ($filas as $registro){
			echo '
			<fieldset>
				  <form action="./controladores/modificarP.php?codigo='.$codigo.'" method="post">

				     
				      <label for="nombre">Nombre:</label>
				      <input type="text" name="nombre" value="'.$registro['Nombre'].'"><br>
					  <label for="salario">Salario:</label>
				      <input type="text" name="salario" value="'.$registro['Salario'].'"><br>';

				     
				     echo ' <input type="submit" value="GUARDAR CAMBIOS">
				  </form>
				  </fieldset>
				 ';
		}
	} 
 ?>