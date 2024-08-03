<?php
/**
 * Clase Conexion para gestionar la conexión a la base de datos.
 */
class Conexion {
    public static function conectar() {
        // Configuración de parámetros de conexión
        $host = "localhost";     // Host de la base de datos
        $dbname = "bd_01";       // Nombre de la base de datos
        $username = "root";      // Nombre de usuario para la base de datos
        $password = "";          // Contraseña para el usuario de la base de datos

        try {
            // Crear una nueva instancia de PDO para la conexión a la base de datos
            $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Configurar el modo de error de PDO para lanzar excepciones en caso de error
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion; // Retornar el objeto PDO para usar en consultas
        } catch (PDOException $e) {
            // Capturar y mostrar el mensaje de error si ocurre una excepción
            echo 'Error de conexión: ' . $e->getMessage();
            return null; // Retornar null en caso de error
        }
    }
}
?>
