<?php
// Inclua a conexão com o banco de dados
include 'conexao.php';

// Verifica se foi passado um ID pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query para deletar o depoimento
    $sql = "DELETE FROM depoimentos WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Depoimento excluído com sucesso.";
        header("Location: ../gerenciar_depoimento.php");
        exit;
    } else {
        echo "Erro ao excluir o depoimento: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
?>