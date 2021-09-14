<?php
session_start();
if(isset($_SESSION['usuarios'])){
	header('Location:index.php');
}
if ($_SERVER['REQUEST_METHOD']=='GET') {
	$usuario = strtolower($_GET['usuario']);
	$correo = $_GET['correo'];
	$password = $_GET['password'];
	$errores='';
	if ( empty($usuario) or empty($correo) or empty($password)) {
		$errores = "<li> Por favor rellena los campos </li>";
	}else{
		$conexion = mysqli_connect('localhost','root', 'mysql123', 'tienda_calzado' );
		$sql = "SELECT * FROM  usuarios where usuario='$usuario'";
		if($resultado = $conexion->query($sql)){
			while ($fila = $resultado->fetch_array()) {
				$errores = '<li> El usuario ya existe </li>';
			}
		}
	}
	if($errores==''){
		$sql = "INSERT INTO usuarios (id, usuario, correo, password) VALUES (null, '$usuario', '$correo', '$password');";
		$resultado = mysqli_query($conexion, $sql);
		header('Location:login.php');
	}
}
require 'views/registrate.view.php';
?>