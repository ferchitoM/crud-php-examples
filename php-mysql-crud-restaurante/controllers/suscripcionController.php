<?php
	//Importamos la conexión a la base de datos y el controlador
	include('../config/conexion.php');

	if (isset($_POST["nombreSus"])) {
		
		$nombre = $_POST["nombreSus"];
		$correo = $_POST["emailSus"];
		$fechaSus = date('Y-m-d H:i:s');

		$consulta = "
			INSERT INTO suscripcion (nombreSuscriptor, correoSuscriptor, fechaSuscripcion) 
			VALUES ('$nombre','$correo','$fechaSus')";

		if(mysqli_query($conn, $consulta)) {
			header("refresh:5;url=../index.php");
			echo '<h3 class="registroCorrecto">¡GRACIAS POR REGISTRARTE!</h3>';
			echo '<h3 class="registroCorrecto">¡Registro correcto. Tus datos se han enviado!</h3>';
		} else {
			echo '<h3 class="registroCorrecto">¡Ups ha ocurrido un problema!</h3>';
			echo "Error al conectarse a la base de datos: " . $consulta . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	} else {
		header("refresh:5;url=../index.php");
		echo '<h3 class="registroCorrecto">¡Ups ha ocurrido un problema!</h3>';
		echo '<h3 class="registroCorrecto">Por favor ingresa tu nombre correctamente</h3>';
	} 
?>