<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si los campos requeridos están completos
    if (!empty($_POST['nombre_completo']) && !empty($_POST['correo_electronico']) && !empty($_POST['numero_documento']) 
        && isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK 
        && isset($_FILES['formulario']) && $_FILES['formulario']['error'] === UPLOAD_ERR_OK) {

        $nombre_completo = $_POST['nombre_completo'];
        $correo_electronico = $_POST['correo_electronico'];
        $numero_documento = $_POST['numero_documento'];

        // Manejar la subida del documento de identidad
        $nombreArchivoIdentidad = $_FILES['archivo']['name'];
        $rutaArchivoIdentidad = 'uploads/' . $nombreArchivoIdentidad;

        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivoIdentidad)) {
            $archivoIdentidadAdjuntado = $nombreArchivoIdentidad;
        } else {
            echo "Error al subir el documento de identidad.";
            exit();
        }

        // Manejar la subida del formulario
        $nombreArchivoFormulario = $_FILES['formulario']['name'];
        $rutaArchivoFormulario = 'uploads/' . $nombreArchivoFormulario;

        if (move_uploaded_file($_FILES['formulario']['tmp_name'], $rutaArchivoFormulario)) {
            $archivoFormularioAdjuntado = $nombreArchivoFormulario;
        } else {
            echo "Error al subir el formulario.";
            exit();
        }

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO solicitudes (nombre_completo, correo_electronico, numero_documento, archivo_identidad, archivo_formulario) 
                VALUES ('$nombre_completo', '$correo_electronico', '$numero_documento', '$archivoIdentidadAdjuntado', '$archivoFormularioAdjuntado')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir a respuesta.php con un mensaje de éxito
            header("Location: respuesta.php?estado=exito");
            exit();
        } else {
            echo "Error al enviar la solicitud: " . $conn->error;
        }
    } else {
        echo "Por favor, completa todos los campos requeridos y carga los archivos solicitados.";
    }

    $conn->close();
}
?>

