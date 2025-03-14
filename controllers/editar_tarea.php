<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../config/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id_u"])) {
    $usuario_id = $_SESSION["id_u"];
    $id = $_POST["id"];
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);

    if (!empty($id) && !empty($titulo) && !empty($descripcion)) {
        $sql = "UPDATE tareas SET titulo = :titulo, descripcion = :descripcion WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":usuario_id", $usuario_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
            exit();
        }
    }
}

echo json_encode(["success" => false]);
?>
