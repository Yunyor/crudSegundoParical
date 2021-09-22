
<!doctype html>
<html lang="en">
  <head>
	<title>Pagina PHP</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body background="imgs/fondo1.jpg" style="background-size: cover; background-repeat: no-repeat; margin: 0px; height: 100%;">
  <div class="container" style="padding:20px; background-color: #FFFFFF; color:black; margin-top: 2em;">
	
 <?php
	include("datos_conexion.php");
    $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
    $id_empleado = utf8_decode($_GET["id"]);
    $db_conexion ->real_query("
	select p.idProductos as id, p.producto, m.marca, p.descripcion,p.precio_costo,p.precio_venta,p.existencia  
	from productos  p inner join marca  m on p.idMarca= m.idMarca  WHERE p.idProductos = $id_empleado;");
    $resultado = $db_conexion->use_result();
    $fila_producto = $resultado->fetch_assoc();

 
    $db_conexion_puesto = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion_puesto ->real_query("SELECT idmarca as id, marca as marca FROM marca;");
	$resultado_puesto = $db_conexion_puesto->use_result();
    $id_Marca = $resultado_puesto->fetch_assoc();
?>
	  	<br>
	  	<h1 class="text-center"> Editar Producto </h1>

	  <div class="container">
		  <form class="d-flex" action="" method="POST" autocomplete="off">
			  <div class="col">
				
                <input type="hidden" name="id" id="id" value="<?php echo $fila_producto['id']; ?>">
				
				<div class="mb-3">
					<label for="lbl_producto" class="form-label"><b>Producto</b></label>
					<input type="text" name="txt_producto" id="txt_producto" class="form-control"  value="<?php echo $fila_producto['producto']; ?>">
				</div>

			

				<div class="mb-3">
				  <label for="lbl_marca" class="form-label"><b>Marca</b></label>
				  <select class="form-select" name="drop_marca" id="drop_marca" required>
					<option value="<?php echo $id_Marca['id']; ?>"><?php echo $id_Marca['marca']; ?></option>
					
					<?php
						while($fila = $resultado_puesto->fetch_assoc()){
							echo"<option value=". $fila['id'] .">". $fila['marca'] ."</option>";
						}
						$db_conexion_puesto->close();
					?>

				  </select>
				</div>



				<div class="mb-3">
					<label for="lbl_descripcion" class="form-label"><b>Descripcion</b></label>
					<input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" value="<?php echo $fila_producto['descripcion']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_pcosto" class="form-label"><b>Precio Costo</b></label>
					<input type="text" name="txt_pcosto" id="txt_pcosto" class="form-control" value="<?php echo $fila_producto['precio_costo']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_pventa" class="form-label"><b>Precio Venta</b></label>
					<input type="text" name="txt_pventa" id="txt_pventa" class="form-control" value="<?php echo $fila_producto['precio_venta']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_existencia" class="form-label"><b>Existencia</b></label>
					<input type="text" name="txt_existencia" id="txt_existencia" class="form-control" value="<?php echo $fila_producto['existencia']; ?>">
				</div>

			
				
				
				<div class="mb-3">
                   
                   <center> <input type="submit" name="btn_editar" id="btn_editar" class="btn btn-warning" value="Editar">
				<a href='index.php' class='btn btn-info'>Regresar</a></center>
				</div>
				
	
			  </div>
			  
		  </form>
          
	  </div>

      <?php
		
		if(isset($_POST["btn_editar"])){	
			include 'actualizar_datos.php';
		}
	

	?>

	

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

