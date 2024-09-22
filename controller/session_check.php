<?php
//FROM CHAT GPT
session_start();

// Establecer el tiempo de expiración (en segundos)
$expiration_time = 1800; // 30 minutos

// Comprobar si la sesión ya está iniciada
if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time(); // Guardar la hora actual
}

// Verificar si la sesión ha expirado
if (time() - $_SESSION['last_activity'] > $expiration_time) {
    // La sesión ha expirado, destruirla
    session_unset(); // Destruir todas las variables de sesión
    session_destroy(); // Destruir la sesión

    // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje
    header("Location: login.php");
    exit();
}

// Actualizar la hora de la última actividad
$_SESSION['last_activity'] = time();


/* A cada pagina
<?php
include 'session_check.php';

// Resto del código de la página
?>
*/


