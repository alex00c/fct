<?php
	
	function selectPuesto()
	{
		$modelo = new Conexion();
		$conexion = $modelo->conectar();
		$idorden = sprintf("ORD%010d", rand(1, 9999999999));
	?>
	
		<fieldset>
			<legend>Nueva Orden</legend>
			<button type="button" id="agregar-producto">Agregar Producto</button>
			<div class='todo'>
				<div id='form'>
					<form action='./controladores/insertar.php'>
						<label for='id'>Id de Orden:</label>
						<input type='text' name='id' id='id' value='<?php echo $idorden; ?>' required><br>
			 <label for='empleado'>Empleado:</label>
		     <select name='empleado' id='empleado'> <br>
		  	<?php	  		
			$sql="SELECT Cod_Emp , Nombre from empleados order by Cod_Emp";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				  echo ("<option value='".$codigo["Cod_Emp"]."'>".$codigo["Nombre"]."</option>");
			  }
    		?>
		  	</select><br>
				
			 <label for='cliente'>Cliente:</label>
			 <select name='cliente' id='cliente'> <br>
					 
				<?php			 
			$sql="SELECT DNI , Nombre from clientes order by DNI";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($codigo=$statement->fetch()) {
				 echo ("<option value='".$codigo["DNI"]."'>".$codigo["Nombre"]."</option>");
						 }
					   ?>
							</select><br>
						<div id="productos-container">
							<div class="producto-row">
								<label for="producto">Producto:</label>
								<select name="producto[]" class="producto-select">
									<?php
									$sql = "SELECT Cod_Pro, Nombre FROM productos ORDER BY Cod_Pro";
									$statement = $conexion->prepare($sql);
									$statement->execute();
									while ($codigo = $statement->fetch()) {
										echo ("<option value='" . $codigo["Cod_Pro"] . "'>" . $codigo["Nombre"] . "</option>");
									}
									?>
								</select>
	
								<label for="cantidad">Cantidad:</label>
								<input type="number" name="cantidad[]" class="cantidad-input" required>
							

							</div>
						</div>
	
						
	
						<div class='botones'>
							<input type='submit' value='GUARDAR'>
							
						</div>
					</form>
					
				</div>
			</div>
			
		</fieldset>
		
	
		<script>
			// Obtener elementos del DOM
			const productosContainer = document.getElementById('productos-container');
			const agregarProductoBtn = document.getElementById('agregar-producto');
	
			// Manejador de evento para agregar un nuevo campo de producto y cantidad
			agregarProductoBtn.addEventListener('click', function() {
				const productoRow = document.createElement('div');
				productoRow.classList.add('producto-row');
	
				const productoLabel = document.createElement('label');
				productoLabel.for = 'producto';
				productoLabel.textContent = 'Producto:';
	
				const productoSelect = document.createElement('select');
				productoSelect.name = 'producto[]';
				productoSelect.classList.add('producto-select');
				
				// Clonar las opciones del primer select de productos
				const primerProductoSelect = document.querySelector('.producto-select');
				const opcionesProductos = primerProductoSelect.innerHTML;
				productoSelect.innerHTML = opcionesProductos;
	
				const cantidadLabel = document.createElement('label');
				cantidadLabel.for = 'cantidad';
				cantidadLabel.textContent = 'Cantidad:';
	
				const cantidadInput = document.createElement('input');
				cantidadInput.type = 'number';
				cantidadInput.name = 'cantidad[]';
				cantidadInput.classList.add('cantidad-input');
				cantidadInput.required = true;
	
				productoRow.appendChild(productoLabel);
				productoRow.appendChild(productoSelect);
				productoRow.appendChild(cantidadLabel);
				productoRow.appendChild(cantidadInput);
	
				productosContainer.appendChild(productoRow);
			});
		</script>
	
	<?php
	}
	
?>