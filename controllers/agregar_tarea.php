<?php
require '../config/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id_u"])) {
    $usuario_id = $_SESSION["id_u"];
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);

    if (!empty($titulo) && !empty($descripcion)) {
        $sql = "INSERT INTO tareas (usuario_id, titulo, descripcion) VALUES (:usuario_id, :titulo, :descripcion)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":usuario_id", $usuario_id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->execute();

        echo json_encode(["success" => true]);
        exit();
    }
}

echo json_encode(["success" => false]);
?>
