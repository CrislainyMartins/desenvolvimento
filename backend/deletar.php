<?php
// Inclua a conexão com o banco de dados
include 'conexao.php';

// Verifica se foi passado um ID pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query para deletar a denúncia
    $sql = "DELETE FROM denuncias WHERE id = $id";


    if ($conn->query($sql)) {
        echo "Denúncia excluída com sucesso.";
        header("Location: ../backend/admin.php");
        exit;
    } else {
        echo "Erro ao excluir a denúncia: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
