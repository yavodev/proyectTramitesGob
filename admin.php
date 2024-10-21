<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

// Consulta para obtener todas las solicitudes en revisión
$sql = "SELECT * FROM solicitudes WHERE estado = 'en revisión'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="admin.css"> <!-- Asegúrate de que la ruta sea correcta -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Íconos de FontAwesome -->
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div class="logo-entidad">
            <img src="IMG/logotransitogob.jpg" alt="Logo Entidad" class="logo">
        </div>
        <h1>Entidad de Tránsito - Administrar usuarios</h1>
    </header>

    <!-- Barra de navegación del panel de administración -->
    <nav>
        <a href="index.html">Inicio</a> |
        <a href="admin.php">Solicitudes Pendientes</a> |
        <a href="respuesta.php">Respuestas</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <h2>Solicitudes Pendientes</h2>

        <?php if ($result->num_rows > 0): ?>
            <p>Se encontraron <?php echo $result->num_rows; ?> solicitudes pendientes.</p>
            <table class="solicitudes">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th>Documento</th>
                        <th>Documento Identidad</th>
                        <th>Formulario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nombre_completo']); ?></td>
                            <td><?php echo htmlspecialchars($row['correo_electronico']); ?></td>
                            <td><?php echo htmlspecialchars($row['numero_documento']); ?></td>

                            <!-- Descarga del documento de identidad -->
                            <td>
                                <?php if ($row['archivo_identidad']): ?>
                                    <a href="uploads/<?php echo $row['archivo_identidad']; ?>" download>Descargar Documento Identidad</a>
                                <?php else: ?>
                                    No hay archivo
                                <?php endif; ?>
                            </td>

                            <!-- Descarga del formulario -->
                            <td>
                                <?php if ($row['archivo_formulario']): ?>
                                    <a href="uploads/<?php echo $row['archivo_formulario']; ?>" download>Descargar Formulario</a>
                                <?php else: ?>
                                    No hay formulario
                                <?php endif; ?>
                            </td>

                            <td>
                                <!-- Botones de aprobar y rechazar -->
                                <form action="aprobar_solicitud.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id_solicitud" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="accion" value="aprobada" class="btn-aprobar">Aprobar</button>
                                </form>
                                <form action="aprobar_solicitud.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id_solicitud" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="accion" value="rechazada" class="btn-rechazar">Rechazar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay solicitudes pendientes.</p>
        <?php endif; ?>
    </main>

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
        <ul>
            <li><a href="#">Políticas</a></li>
            <li><a href="https://maps.app.goo.gl/SEEcpan4TZSEvFNM6">Mapa del sitio</a></li>
        </ul>
    </footer>
</body>
</html>

<?php $conn->close(); ?>
