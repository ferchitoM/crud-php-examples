<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "guardar_imagenes";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
