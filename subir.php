<?php
$conexion = new mysqli('localhost', 'root', 'mysql123', 'tienda_calzado');
if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES)){
	$check = @getimagesize($_FILES['foto']['tmp_name']);
	if($check!== false){
		$carpeta_destino = 'img';
		$archivo_subido = $carpeta_destino.$_FILES['foto']['name'];
		echo "Archivo subido";
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
		$titulo = $_POST['titulo'];
		$imagen = $_FILES['foto']['name'];
		$precio = $_POST['precio'];
		$descripcion = $_POST['descripcion'];
		$sql = "INSERT INTO fotos VALUES (null,'$titulo', '$imagen', '$precio', '$descripcion')";
		$conexion->query($sql);
	}
}

require 'views/subir-view.php';
?>