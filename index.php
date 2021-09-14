<?php 
session_start();
if (isset($_SESSION['usuarios'])) {
	header('Location:inicio.php');
} else{
	header('Location:registrate.php');
}
?>