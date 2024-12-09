<?php
include 'conexao.php';
$sql = "SELECT id, descricao, localizacao, data, status FROM denuncias WHERE status = 'pendente' ORDER BY data_envio DESC LIMIT 20";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $acao = $_POST['acao'];

    if ($acao == 'aprovar') {
        $sql = "UPDATE denuncias SET status = 'aprovada' WHERE id = $id";
    } elseif ($acao == 'excluir') {
        $sql = "DELETE FROM denuncias WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Ação realizada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>