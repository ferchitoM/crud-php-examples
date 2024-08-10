<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: mizonasegura.php');
}else{
	header('Location: login.php');
}	
?>