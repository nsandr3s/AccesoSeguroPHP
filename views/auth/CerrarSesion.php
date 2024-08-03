<?php
// Inicia la sesión para poder acceder a las variables de sesión
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión actual
session_destroy();

// Redirige al usuario a la página de acceso
header("Location: /../views/auth/Acceso.php");

// Termina la ejecución del script para asegurar que no se ejecute código adicional
exit();
?>
