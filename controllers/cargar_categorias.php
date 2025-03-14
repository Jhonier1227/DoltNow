<?php
require '../config/conexion.php';

$sql = "SELECT * FROM categorias ORDER BY nombre ASC";
$stmt = $pdo->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categorias);
?>
