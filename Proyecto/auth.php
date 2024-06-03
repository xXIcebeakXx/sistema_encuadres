<?php
session_start();

// Credenciales válidas
$validUsername = 'admin';
$validPassword = 'password123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['Correo'];
    $password = $_POST['Password'];

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
