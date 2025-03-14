<?php
require '../config/conexion.php';
session_start();

if (!isset($_SESSION["id_u"]) || !isset($_GET["id"])) {
    echo json_encode(["success" => false]);
    exit();
}

$id = $_GET["id"];
$sql = "UPDATE tareas SET completado = NOT completado WHERE id = :id AND usuario_id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->bindParam(":usuario_id", $_SESSION["id_u"]);
$stmt->execute();

echo json_encode(["success" => true]);
?>
