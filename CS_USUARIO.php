<?php
session_start();

// Eliminar los datos del carrito de la sesión
unset($_SESSION['productos']);

// Destruir completamente la sesión
session_destroy();

// Redireccionar al usuario a la página de inicio
header("Location: index.php");
exit;
?>
