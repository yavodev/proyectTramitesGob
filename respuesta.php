<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

$estado = null; // Variable para almacenar el estado de la solicitud

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir el número de documento desde el formulario
    $numero_documento = $_POST['numero_documento'];

    // Consulta para obtener el estado de la solicitud
    $sql = "SELECT estado FROM solicitudes WHERE numero_documento = '$numero_documento'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encuentra la solicitud, obtener el estado
        $row = $result->fetch_assoc();
        $estado = $row['estado'];
    } else {
        $estado = null; // No se encontró la solicitud con ese número de documento
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta - Entidad de Tránsito</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de que esta ruta sea correcta -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <!-- Encabezado con el logo y nombre de la entidad -->
    <header>
        <div class="logo-entidad">
            <img src="IMG/logotransitogob.jpg" alt="Logo Entidad" class="logo">
        </div>
        <h1>Entidad de Tránsito - Servicios al Ciudadano</h1>
        <nav class="miga-de-pan">
            <a href="index.html">Inicio</a> > <a href="solicitud.html">Hago mi solicitud</a> > <a href="solicitud.html">Realizar Pago</a> > <span>Respuesta</span>
        </nav>
    </header>
    <!-- Progreso del trámite -->
    <div class="linea-de-tiempo">
        <ul>
            <li class="completo"><a href="index.html">Inicio</a></li>
            <li class="activo"><a href="solicitud.html">Hago mi solicitud</a></li>
            <li><a href="proceso.php">Realizar Pago</a></li>
        </ul>
    </div>

    <!-- Sección principal de respuesta -->
    <section class="respuesta">
        <div class="contenedor-respuesta">
            <h2>Consulta de Estado de Solicitud</h2>
            
            <!-- Formulario para ingresar el número de documento -->
            <form action="respuesta.php" method="POST">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento" required>
                <button type="submit" class="btn-consultar">Consultar Estado</button>
            </form>

            <br>

            <?php if ($estado !== null): ?>
                <!-- Si se encuentra el estado, mostrar el resultado -->
                <?php if ($estado === 'aprobada'): ?>
                    <div class="mensaje-exito">
                        <p><strong>¡Felicidades!</strong> Tu solicitud ha sido <span class="estado-aprobado">aprobada</span>. Por favor, dirígete a realizar el pago correspondiente. <a href="proceso.php">click aquí</a></p>
                    </div>
                <?php elseif ($estado === 'rechazada'): ?>
                    <div class="mensaje-error">
                        <p><strong>Lo sentimos.</strong> Tu solicitud ha sido <span class="estado-rechazado">rechazada</span> debido a que faltan documentos. Por favor, verifica la información.</p>
                    </div>
                <?php elseif ($estado === NULL or 'en revisión'): ?>
                    <div class="mensaje-revision">
                        <p><strong>Tu solicitud está en revisión.</strong> Aún no ha sido aprobada ni rechazada.</p>
                    </div>
                <?php else: ?>
                    <p>El estado de tu solicitud no está disponible.</p>
                <?php endif; ?>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <!-- Si no se encuentra el número de documento en la base de datos -->
                <p>No se encontró una solicitud con el número de documento proporcionado.</p>
            <?php endif; ?>
        </div>
    </section>

   <!-- Pie de página -->
   <footer>
        <div class="footer-contenido">
            <!-- Sección de redes sociales -->
            <div class="footer-redes">
                <h3>Síguenos en</h3>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
            
            <!-- Sección de temas de interés -->
            <div class="footer-temas">
                <h3>Temas de Interés</h3>
                <ul>
                    <li><a href="#">Trámites en línea</a></li>
                    <li><a href="#">Servicios al ciudadano</a></li>
                    <li><a href="#">Normatividad</a></li>
                    <li><a href="#">Consultas y pagos</a></li>
                    <li><a href="#">Soporte y ayuda</a></li>
                </ul>
            </div>
        </div>

        <!-- Información de contacto y copyright -->
        <div class="footer-copyright">
            <p>© 2024 Entidad Responsable del Trámite | Contacto: +57 (1) 1234567 | contacto@entidad.gov.co</p>
        </div>
    </footer>

</body>
</html>
