<?php
// Inclua a conexão com o banco de dados

include 'conexao.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM denuncias WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Reorganizar IDs após a exclusão
        $conn->query("SET @count = 0");
        $conn->query("UPDATE denuncias SET id = (@count := @count + 1)");
        $conn->query("ALTER TABLE depoimentos AUTO_INCREMENT = 1");

        header("Location: ../backend/admin.php");
        exit;
    } else {
        echo "Erro ao excluir a denuncia: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();

?>

