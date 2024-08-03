<?php
// Incluye la clase Conexion para establecer la conexión con la base de datos
require_once __DIR__ . '/../config/Conexion.php';

/**
 * Controlador para la autenticación de usuarios (registro y login).
 */
class AutenticadorController
{
    // Variable para almacenar la conexión a la base de datos
    private $conn;

    /**
     * Constructor de la clase.
     * Establece la conexión con la base de datos.
     */
    public function __construct()
    {
        $database = new Conexion();
        $this->conn = $database->conectar();
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     */
    public function register($nombre, $email, $password, $rol = 'Cliente')
    {
        try {
            // Consulta SQL para insertar un nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
            $stmt = $this->conn->prepare($query);
            
            // Vincular los parámetros a la consulta
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT)); // Encriptar la contraseña
            $stmt->bindValue(':rol', $rol);
            
            // Ejecutar la consulta
            $stmt->execute();
    
            // Consultar el usuario recién registrado
            $query = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Iniciar la sesión y almacenar la información del usuario
            session_start();
            $_SESSION['usuario'] = $user;
    
            // Redirigir a la página de perfil
            header("Location: /../views/VerPerfil.php");
            exit();
        } catch (PDOException $e) {
            // Manejar errores específicos
            if ($e->getCode() == 23000) { // Código de error para violación de restricción de integridad
                return 'El correo electrónico ya está registrado.';
            }
            return 'Error al registrarse: ' . $e->getMessage();
        }
    }

    /**
     * Inicia sesión de un usuario.
     */
    public function login($email, $password)
    {
        // Consulta SQL para seleccionar el usuario por correo electrónico
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Verificar la contraseña y la existencia del usuario
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['usuario'] = $user;
            header("Location: /../views/VerPerfil.php");
            exit();
        } else {
            return false; // Login fallido
        }
    }
}
?>
