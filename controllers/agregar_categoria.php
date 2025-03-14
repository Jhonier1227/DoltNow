<?php
require '../config/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);

    if (!empty($nombre)) {
        $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();

        echo json_encode(["success" => true]);
        exit();
    }
}

echo json_encode(["success" => false]);
?>
