<?php
// Incluye el archivo que contiene la clase AutenticadorController
require_once __DIR__ . '/../../controllers/AuntenticadorController.php';

// Variable para almacenar mensajes de error
$error_message = '';

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crea una instancia del controlador de autenticación
    $controller = new AutenticadorController();
    
    // Obtiene los datos del formulario
    $rol = $_POST['rol'];
    
    // Intenta registrar al usuario con los datos proporcionados
    $error_message = $controller->register($_POST['nombre'], $_POST['email'], $_POST['password'], $rol);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de registro de usuario. Completa el formulario para crear una nueva cuenta.">
    <meta name="author" content="nsandr3s">
    <title>Registrarse</title>
    <!-- Incluye el archivo de estilos CSS para la página de registro -->
    <link rel="stylesheet" href="../../assets/css/auth.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST">
            <h2>Registrarse</h2>
            <?php if (!empty($error_message)): ?>
                <!-- Muestra el mensaje de error si existe -->
                <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <!-- Campo para ingresar el nombre -->
            <input type="text" name="nombre" placeholder="Nombre" required>
            <!-- Campo para ingresar el correo electrónico -->
            <input type="email" name="email" placeholder="Email" required>
            <!-- Campo para ingresar la contraseña -->
            <input type="password" name="password" placeholder="Contraseña" required>
            <!-- Selector para elegir el rol del usuario -->
            <select name="rol" required>
                <option value="Cliente">Cliente</option>
                <option value="Administrador">Administrador</option>
            </select>
            <!-- Botón para enviar el formulario -->
            <button type="submit">Registrarse</button>
            <!-- Enlace para acceder a la página de inicio de sesión si ya tiene cuenta -->
            <p>¿Ya tienes cuenta? <a href="Acceso.php">Accede aquí</a></p>
        </form>
    </div>
</body>
</html>
