# AccesoSeguroPHP

## Descripción

Este proyecto es una aplicación web que permite la autenticación de usuarios, incluyendo el registro e inicio de sesión. Los usuarios pueden registrarse con un nombre, correo electrónico, y contraseña, y luego iniciar sesión en el sistema. Dependiendo del rol del usuario, se le redirige a diferentes secciones de la aplicación.

## Estructura del Proyecto

- `config/Conexion.php`: Configuración y establecimiento de la conexión con la base de datos.
- `controllers/ControladorAutenticacion.php`: Controlador que maneja el registro e inicio de sesión de usuarios.
- `middleware/AutenticadorMiddleware.php`: Middleware para verificar si el usuario está autenticado.
- `views/auth/Acceso.php`: Página de inicio de sesión.
- `views/auth/Registrarse.php`: Página de registro de nuevos usuarios.
- `views/VerPerfil.php`: Página que muestra el perfil del usuario autenticado.
- `views/auth/CerrarSesion.php`: Script para cerrar sesión.
- `assets/css/auth.css`: Estilos para las páginas de autenticación.
- `assets/css/perfil.css`: Estilos para la página de perfil.

## Instalación

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/nsandr3s/AccesoSeguroPHP.git
2. **Navega a la carpeta del proyecto:**:
   ```bash
   cd AccesoSeguroPHP