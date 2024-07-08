<?php  
    $servername = "localhost";
    $database = "sis_inventario";
    $username = "root";
    $password = "";

    // Crear CONEXION con la función mysqli_connect que viene integrada en PHP
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Revisar CONEXION
    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
?>