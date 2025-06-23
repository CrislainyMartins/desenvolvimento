<?php
include 'conexao.php';
$sql = "SELECT id, nome, avaliacao, sugestao FROM feedbacks ";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $acao = $_POST['acao'];

    if ($acao == 'aprovar') {
        $sql = "UPDATE feedbacks SET status = 'aprovada' WHERE id = $id";
    } elseif ($acao == 'excluir') {
        $sql = "DELETE FROM feedbacks WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Ação realizada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>