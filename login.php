<?php 
session_start();
if(isset($_SESSION['usuarios'])){
  header('Location:index.php');
}
if ($_SERVER['REQUEST_METHOD']== 'GET'){
 $usuario = strtolower($_GET['usuario']);
 $password = $_GET['password'];
 $errores='';
 if ( empty($usuario) or empty($password)) {
  $errores = "<li> Por favor rellena los campos </li>";
 }else{
 $conexion = mysqli_connect('localhost', 'root', 'mysql123', 'tienda_calzado');
  $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
  if ($resultado = $conexion->query($sql)){
   if ($fila=$resultado->fetch_array()){
    $_SESSION['usuarios']= $usuario;
    header('Location:inicio.php');
  }
   }else{
    $errores= '<li> Datos incorrectos </li>';
	}
  }
}
require 'views/login.view.php';
?>