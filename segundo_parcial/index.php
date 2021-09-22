

<!doctype html>
<html lang="en">
  <head>
	<title>Segundo Parcial PHP</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body background="imgs/fondo1.jpg" style="background-size: cover; background-repeat: no-repeat; margin: 0px; height: 100%;">
  <div class="container" style="padding:20px; background-color: #FFFFFF; color:black; margin-top: 2em;">
	
  <?php include 'datos_conexion.php';?>
	
	<?php
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion ->real_query("
	select p.idProductos as id, p.producto, m.marca, p.descripcion,p.precio_costo,p.precio_venta,p.existencia  
	from productos  p inner join marca  m on p.idMarca= m.idMarca ;");
	$resultado = $db_conexion->use_result();

	
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion ->real_query("SELECT idmarca as id, marca as marca FROM marca;");
	$resultado= $db_conexion->use_result();
	?>
	  	<br>
		  
	  	<h1 class="text-center"> <font color="black">Formulario Ingreso Mercaderia 2do Parcial</font> </h1>

	  	<h3 class="text-left"> <font color="black">Nombre: Allan Rai Yunyor Acan Sacarias</font> </h3>
		<h3 class="text-left"> <font color="black">Carnet: 1290-18-14588</font> </h3> <br>
	  <div class="container">


	  
		  <form class="d-flex" action="agregar_prod.php" method="POST">
			  <div class="col">
				  
			  	<div class="mb-3">
					<label for="lbl_producto" class="form-label"><b>Producto</b></label>
					<input type="text" name="txt_producto" id="txt_producto" class="form-control" placeholder="Playera, Pantalon" required>
				</div>

				<div class="mb-3">
				  <label for="lbl_marca" class="form-label"><b>Marca</b></label>
				  <select class="form-select" name="drop_marca" id="drop_marca" required>
					<option value=0>--- Marcas ---</option>
					
					<?php
						while($fila = $resultado->fetch_assoc()){
							echo"<option value=". $fila['id'] .">". $fila['marca'] ."</option>";
						}
						$db_conexion->close();
					?>
                 
				  </select>
				</div>
				
				

				<div class="mb-3">
					<label for="lbl_descripcion" class="form-label"><b>Descripcion</b></label>
					<input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" placeholder="M, L, XL, XXL" required>
				</div>

				<div class="mb-3">
					<label for="lbl_pcosto" class="form-label"><b>Precio Costo</b></label>
					<input type="text" name="txt_pcosto" id="txt_pcosto" class="form-control" placeholder="10.10" required>
				</div>

				<div class="mb-3">
					<label for="lbl_pventa" class="form-label"><b>Precio Venta</b></label>
					<input type="text" name="txt_pventa" id="txt_pventa" class="form-control" placeholder="100.00" required>
				</div>

				<div class="mb-3">
					<label for="lbl_existencia" class="form-label"><b>Existencia</b></label>
					<input type="text" name="txt_existencia" id="txt_existencia" class="form-control" placeholder="3" required>
				</div>

			
				

				<center>
				<div class="mb-3">
					<input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary btn-lg btn-block" value="Agregar">
				</div></center>



			  </div>
		  </form>
		
		  <br>

		  <table class="table table-dark">
			  <thead class="thead-inverse">
				  <tr>
					  <th>producto</th>
					  <th>marca</th>
					  <th>Descripcion</th>
					  <th>Precio Costo</th>
					  <th>Precio Venta</th>
					  <th>Existencia Disponibles</th>
					<th>Acciones</th>	
					<th></th>
				  </tr>
				  </thead>
				  <tbody>
				    
					<?php
					 include("datos_conexion.php");
					 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
					 $db_conexion ->real_query("
					 select p.idProductos as id, p.producto, m.marca, p.descripcion,p.precio_costo,p.precio_venta,p.existencia  
					 from productos  p inner join marca  m on p.idMarca= m.idMarca ;");
					 $resultado = $db_conexion->use_result();   
						while($fila = $resultado->fetch_assoc()){
							echo "<tr data-id=". $fila['id'] .">";
								echo"<td>". $fila['producto'] ."</td>";
								echo"<td>". $fila['marca'] ."</td>";
								echo"<td>". $fila['descripcion'] ."</td>";
								echo"<td>". $fila['precio_costo'] ."</td>";
								echo"<td>". $fila['precio_venta'] ."</td>";
								echo"<td>". $fila['existencia'] ."</td>";
								
								echo"<td><a href='editar_producto.php?id=".$fila['id']."' class='btn btn-info'>Editar Producto</a></td>";
								echo"<td><a href='eliminar_producto.php?id=".$fila['id']."' class='btn btn-danger'>Eliminar Producto </a></td>";
								
							echo"</tr>";
						}
						$db_conexion->close();
					?>
				  </tbody>
		  </table>

	  </div>						

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
