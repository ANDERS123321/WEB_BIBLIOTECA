<?php

require_once "../conexion.php";

// Mostrar errores (por si falla algo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verificar si se envió el formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $autor = trim($_POST["autor"]);
    $descripcion = trim($_POST["descripcion"]);

    // Validaciones básicas
    if (empty($titulo) || empty($autor) || empty($descripcion)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO libros (titulo, autor, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titulo, $autor, $descripcion);

    if ($stmt->execute()) {
        echo "<script>
        alert('Libro registrado exitosamente');
        window.location.href = 'panel_user.php';
        </script>";
    } else {
        echo "Error al registrar el libro: " . $stmt->error;
        error_log("Error al registrar libro: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Acceso inválido.";
}
?>