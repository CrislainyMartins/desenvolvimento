<?php
include("conexao.php");

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE denuncias SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: ../backend/admin.php?id=".$id);
exit;

?>  