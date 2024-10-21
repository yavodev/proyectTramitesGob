<?php
include 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Recibir los datos del formulario
$nombre = $_POST['nombre_completo'];
$correo = $_POST['correo_electronico'];
$documento = $_POST['numero_documento'];

// Verificar si hay archivo de identidad adjunto
if (isset($_FILES['archivo_identidad']) && $_FILES['archivo_identidad']['error'] == 0) {
    $nombreArchivoIdentidad = $_FILES['archivo_identidad']['name'];
    $rutaArchivoIdentidad = 'uploads/' . $nombreArchivoIdentidad;
    move_uploaded_file($_FILES['archivo_identidad']['tmp_name'], $rutaArchivoIdentidad);
} else {
    $nombreArchivoIdentidad = null;
}

// Verificar si hay formulario adjunto
if (isset($_FILES['archivo_formulario']) && $_FILES['archivo_formulario']['error'] == 0) {
    $nombreArchivoFormulario = $_FILES['archivo_formulario']['name'];
    $rutaArchivoFormulario = 'uploads/' . $nombreArchivoFormulario;
    move_uploaded_file($_FILES['archivo_formulario']['tmp_name'], $rutaArchivoFormulario);
} else {
    $nombreArchivoFormulario = null;
}

// Insertar los datos y archivos en la base de datos
$sql = "INSERT INTO solicitudes (nombre_completo, correo_electronico, numero_documento, archivo_identidad, archivo_formulario)
        VALUES ('$nombre', '$correo', '$documento', '$nombreArchivoIdentidad', '$nombreArchivoFormulario')";

if ($conn->query($sql) === TRUE) {
    echo "Solicitud enviada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


