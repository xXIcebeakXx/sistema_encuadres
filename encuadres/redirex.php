<?php
// Inicia la sesión
session_start();
include 'conectar.php';
$usuario_rol = $_SESSION['usuario_rol'];

// Verifica el rol del usuario y redirige a la página correspondiente
if ($usuario_rol == '1') {
    // Redirigir a la página de administrador
    header("Location: template_ingenieria.php");
    exit();
} elseif ($usuario_rol == '2') {
    // Redirigir a la página de usuario
    header("Location: template_arquitectura.php");
    exit();
} else {
    // Si el rol no es reconocido, redirigir a una página de error o inicio de sesión
    header("Location: login.php");
    exit();
}
?>
