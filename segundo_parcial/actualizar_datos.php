<?php

	include("datos_conexion.php");
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	
	$id_producto = utf8_decode($_POST["id"]);

	$txt_producto =utf8_decode( $_POST["txt_producto"]);
	$drop_marca =utf8_decode( $_POST["drop_marca"]);
	$txt_descripcion =utf8_decode( $_POST["txt_descripcion"]);
	$txt_pcosto =utf8_decode( $_POST["txt_pcosto"]);
	$txt_pventa =utf8_decode( $_POST["txt_pventa"]);
	$txt_existencia =utf8_decode( $_POST["txt_existencia"]);
	
	$sqlUpdate = "UPDATE productos SET producto='".$txt_producto."', idMarca='".$drop_marca."', descripcion='".$txt_descripcion."', precio_costo='".$txt_pcosto."', 
	precio_venta='".$txt_pventa."', existencia='".$txt_existencia."' WHERE idProductos = $id_producto;";
	
	echo"<br><br><br><br>";
	if($db_conexion->query($sqlUpdate)==true){
		echo 'Se ha modificado los datos correctamente!!!!';
	}
	else{
		echo 'No se ha modificado los datos correctamente!!!!';
	}
	echo"<br>SQL-->:  ".$sqlUpdate."<br>";
	$db_conexion -> close();
	header("Location: index.php");
    
	
?>