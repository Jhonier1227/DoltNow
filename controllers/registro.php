<?php
require '../config/conexion.php'; // Asegúrate de tener el archivo de conexión a la base de datos con PDO

function registrarUsuario($pdo, $nombre, $correo, $contrasena) {
    try {
        // Encriptar la contraseña antes de guardarla en la base de datos
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena_hash);

        if ($stmt->execute()) {
            return "Usuario registrado exitosamente.";
        } else {
            return "Error al registrar usuario.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $correo = htmlspecialchars(trim($_POST['correo'] ?? ''));
    $contrasena = htmlspecialchars(trim($_POST['contrasena'] ?? ''));

    if ($nombre && $correo && $contrasena) {
        echo registrarUsuario($pdo, $nombre, $correo, $contrasena);
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>
