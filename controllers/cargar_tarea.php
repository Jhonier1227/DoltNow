<?php
require '../config/conexion.php';
session_start();

if (!isset($_SESSION["id_u"])) {
    echo json_encode([]);
    exit();
}

$usuario_id = $_SESSION["id_u"];
$sql = "SELECT * FROM tareas WHERE usuario_id = :usuario_id ORDER BY fecha_creacion DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":usuario_id", $usuario_id);
$stmt->execute();
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tareas);
?>
