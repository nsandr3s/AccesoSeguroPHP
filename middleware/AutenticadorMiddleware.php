<?php
/**
 * Middleware para la verificación de autenticación de usuarios.
 */
class AutenticadorMiddleware
{
    /**
     * Verifica si el usuario está autenticado.
     * Redirige al usuario a la página de acceso si no está autenticado.
     */
    public static function verificar()
    {
        // Inicia la sesión
        session_start();
        
        // Verifica si la variable de sesión 'usuario' está establecida
        if (!isset($_SESSION['usuario'])) {
            // Redirige al usuario a la página de acceso si no está autenticado
            header("Location: /../views/auth/Acceso.php");
            exit(); // Termina el script para evitar que se ejecute código adicional
        }
    }
}
?>
