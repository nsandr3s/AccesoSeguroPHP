<?php
// Incluye el archivo que contiene la clase AutenticadorController
require_once __DIR__ . '/../../controllers/AuntenticadorController.php';

// Variable para almacenar mensajes de error
$error_message = '';

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene el correo electrónico y la contraseña del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Crea una instancia del controlador de autenticación
    $autenticador = new AutenticadorController();

    // Intenta iniciar sesión con las credenciales proporcionadas
    if (!$autenticador->login($email, $password)) {
        // Si el login falla, asigna un mensaje de error
        $error_message = 'Credenciales incorrectas';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de acceso para usuarios. Inicia sesión para acceder a tu perfil.">
    <meta name="author" content="nsandr3s">
    <title>Acceso</title>
    <!-- Incluye el archivo de estilos CSS para la página de acceso -->
    <link rel="stylesheet" href="../../assets/css/auth.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST">
            <h2>Acceso</h2>
            <?php if (!empty($error_message)): ?>
                <!-- Muestra el mensaje de error si existe -->
                <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <!-- Campo para ingresar el correo electrónico -->
            <input type="email" name="email" placeholder="Email" required>
            <!-- Campo para ingresar la contraseña -->
            <input type="password" name="password" placeholder="Contraseña" required>
            <!-- Botón para enviar el formulario -->
            <button type="submit">Acceder</button>
            <!-- Enlace para registrarse si no tiene cuenta -->
            <p>¿No tienes cuenta? <a href="Registrarse.php">Regístrate</a></p>
        </form>
    </div>
</body>
</html>
