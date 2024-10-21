<?php
$host = "localhost";
$user = "root";  // Usuario por defecto en XAMPP
$password = "";  // Sin contraseña
$dbname = "solicitudes_db";  // El nombre de tu base de datos

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>


