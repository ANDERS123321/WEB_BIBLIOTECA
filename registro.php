<?php
require_once "conexion.php";

// Mostrar errores (por si falla algo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verificar si se envió el formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // Validaciones básicas
    if (empty($nombre) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido.";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Hashear contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $passwordHash);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
        // Aquí podrías redirigir si quieres:
        // header("Location: login.html");
        // exit;
    } else {
        echo "Error al registrar: " . $stmt->error;
        error_log("Error al registrar usuario: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Acceso inválido.";
}
?>
