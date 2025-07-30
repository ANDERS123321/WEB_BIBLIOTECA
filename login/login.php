<?php
session_start(); // Inicia sesión

require_once "../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "Debes ingresar correo y contraseña.";
        exit;
    }

    // Buscar al usuario por email
    $stmt = $conn->prepare("SELECT id, nombre, email, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $usuario["password"])) {
            // Iniciar sesión
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["email"] = $usuario["email"];

            // Redirigir al dashboard
            header("Location: ../user/index_user.html");
            exit;
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                window.location.href = '../login/login.html';
                </script>";
        }
    } else {
        echo "<script>
            alert('Usuario no encontrado.');
            window.location.href = '../login/login.html';
            </script>";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no válido.";
}
?>