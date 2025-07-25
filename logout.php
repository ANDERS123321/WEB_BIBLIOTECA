<?php
session_start();
session_unset(); // Limpia las variables de sesión
session_destroy(); // Elimina la sesión

header("Location: login.html"); // Redirige al login
exit;
?>
