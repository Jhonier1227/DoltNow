<?php
session_start();
require '../config/conexion.php'; // Ajusta la ruta si es necesario
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $contrasena = trim($_POST["contrasena"]);

    if (!empty($correo) && !empty($contrasena)) {
        try {
            $sql = "SELECT id_u, contrasena FROM usuarios WHERE correo = :correo";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                // Iniciar sesión y almacenar datos del usuario
                $_SESSION["id_u"] = $usuario["id_u"];
                $_SESSION["correo"] = $correo;
                
                // Redirigir a tareas.html
                header("Location: tareas.html");
                exit();
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
