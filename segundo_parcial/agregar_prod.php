<?php

if (isset($_POST["btn_agregar"])) {

 include("datos_conexion.php");
 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
 
 $txt_producto =utf8_decode( $_POST["txt_producto"]);
 $drop_marca =utf8_decode( $_POST["drop_marca"]);

 $txt_descripcion =utf8_decode( $_POST["txt_descripcion"]);
 $txt_pcosto =utf8_decode( $_POST["txt_pcosto"]);
 $txt_pventa =utf8_decode( $_POST["txt_pventa"]);
 $txt_existencia =utf8_decode( $_POST["txt_existencia"]);

 $sql = "INSERT INTO productos(producto,idMarca,descripcion,precio_costo,precio_venta,existencia) 
 VALUES('". $txt_producto."' , '". $drop_marca."','". $txt_descripcion."','". $txt_pcosto."','". $txt_pventa."','". $txt_existencia."');";
 if($db_conexion->query($sql)===true){
   $db_conexion ->close();
   echo "Exito";
   
   header('Location: index.php');
   
}else{
   $db_conexion ->close();
}
}


?>