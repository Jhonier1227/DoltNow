<?php
/**
 * Cierra la sesión del usuario y lo redirige a la pagina de login.
 */

session_start();
session_unset(); // Elimina toda las variables de la sesión.
session_destroy(); // Destruye la sesión.

echo "ya cerraste sesion";
header("Location: ../views/login.html"); // redirige al login si no hay sesión
exit();
?>