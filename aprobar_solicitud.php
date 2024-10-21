<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_solicitud = $_POST['id_solicitud'];
    $accion = $_POST['accion']; // "aprobada" o "rechazada"
    
    // Actualizar estado en la base de datos
    $sql = "UPDATE solicitudes SET estado = '$accion' WHERE id = $id_solicitud";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php'); // Redirigir al panel de administración después de la acción
    } else {
        echo "<script>alert('Error al actualizar estado: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>
