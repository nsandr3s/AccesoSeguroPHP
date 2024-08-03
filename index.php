<?php
// Inicia la sesión para poder acceder a las variables de sesión
session_start();

// Destruye la sesión actual, eliminando todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de acceso después de cerrar sesión
header("Location: views/auth/Acceso.php");

// Termina la ejecución del script para asegurar que no se ejecute código adicional
exit();
?>
