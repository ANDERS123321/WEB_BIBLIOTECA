<?php
session_start();

// Verificamos si hay una sesión activa
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.html"); // Redirigir si no ha iniciado sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="es" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Usuario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-md w-full text-center">
    <h1 class="text-3xl font-bold text-blue-900 dark:text-blue-300 mb-4">Bienvenido</h1>
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
      Hola, <strong><?php echo htmlspecialchars($_SESSION["nombre"]); ?></strong>. Has iniciado sesión correctamente.
    </p>
    <a href="logout.php">
      <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">Cerrar sesión</button>
    </a>
  </div>

</body>
</html>
