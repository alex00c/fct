<?php 
function seleccion(){
		$codigo=$_REQUEST['codigo'];
		$consulta=new Consultas();
		$filas=$consulta->modproductos($codigo);
		foreach ($filas as $registro){
			echo '
			<fieldset>
				  <form action="./controladores/modificarP.php?codigo='.$codigo.'" method="post">
				  <label for="codigo">Codigo:</label>
				  <input type="text" name="codigo" value="'.$registro['Cod_Pro'].'"><br>
				     
				      <label for="nombre">Nombre:</label>
				      <input type="text" name="nombre" value="'.$registro['Nombre'].'"><br>
					  <label for="Precio">Precio:</label>
				      <input type="text" name="Precio" value="'.$registro['Precio'].'"><br>';

				     
				     echo ' <input type="submit" value="GUARDAR CAMBIOS">
				  </form>
				  </fieldset>
				 ';
		}
	} 
 ?>