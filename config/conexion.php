<?php
/*

* Achivo de conexión a la base de datos usando POO.
* Permitir establecer una conexión segura con MySQL.

*/

$host = "localhost";   // Servidor de la base de datos
$usuario = "root";     // Usuarios de MySQL(por defecto en XAMPP)
$password = "";        // Contraseña(vacia por defecto en XAMPP)
$base_datos = "Gestor";  // Nombre de base de datos.

try {
    // Se establece la conexión a la base de datos.

    $pdo = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // Activar errores de POO.
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage()); 
    //Mensaje en caso de error
}
?>
