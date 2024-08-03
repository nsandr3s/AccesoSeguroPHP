<?php
// Incluye el archivo que contiene el middleware de autenticación
require_once realpath(__DIR__ . '/../middleware/AutenticadorMiddleware.php');

// Verifica si el usuario está autenticado
AutenticadorMiddleware::verificar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de perfil del usuario. Muestra la información del usuario y opciones según su rol.">
    <meta name="author" content="nsandr3s">
    <title>Perfil</title>
    <!-- Incluye el archivo de estilos CSS para la página de perfil -->
    <link rel="stylesheet" type="text/css" href="../assets/css/perfil.css">
</head>
<body>
    <div class="profile-container">
        <!-- Muestra el nombre del usuario -->
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?></h1>
        <!-- Muestra el correo electrónico del usuario -->
        <p>Email: <?php echo htmlspecialchars($_SESSION['usuario']['email']); ?></p>
        <!-- Muestra el rol del usuario -->
        <p>Rol: <?php echo htmlspecialchars($_SESSION['usuario']['rol']); ?></p>

        <!-- Mostrar botones y enlaces según el rol del usuario -->
        <?php if ($_SESSION['usuario']['rol'] === 'Administrador'): ?>
            <!-- Apartados visibles solo para administradores -->
            <a href="">Apartado administrador 1</a>
            <a href="">Apartado administrador 2</a>
        <?php else: ?>
            <!-- Apartados visibles solo para clientes -->
            <a href="">Apartado cliente 1</a>
            <a href="">Apartado cliente 2</a>
        <?php endif; ?>

        <!-- Enlace para cerrar sesión -->
        <a href="../views/auth/CerrarSesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
