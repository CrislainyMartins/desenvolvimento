<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? 'Anônimo';
    $avaliacao = $_POST['avaliacao'] ?? '';
    $sugestao = $_POST['sugestao'] ?? '';

    if (trim($sugestao) === '') {
        die("A mensagem não pode estar vazia.");
    }

    $sql = "INSERT INTO feedbacks (nome, avaliacao, sugestao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro ao preparar a query: " . $conn->error);
    }

    $stmt->bind_param("sis", $nome, $avaliacao, $sugestao);

    if ($stmt->execute()) {
        echo "Feedback enviado com sucesso!";
    } else {
        echo "Erro ao enviar o feedback: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
