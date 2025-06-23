<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? 'Anônimo'; // Nome opcional
    $avaliacao = $_POST['avaliacao'] ?? ''; //variavel da coluna avaliacao
    $sugestao = $_POST['sugestao'] ?? ''; //variavel da coluna sugestao

    // Validar a mensagem
    if (trim($sugestao) === '') {
        die("A mensagem não pode estar vazia.");
    }

    // Inserir no banco de dados
    $sql = "INSERT INTO feedbacks (	nome, avaliacao, sugestao) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $nome, $avaliacao,  $sugestao);

    if ($stmt->execute()) {
        echo "Feedback enviado com sucesso!";
    } else {
        echo "Erro ao enviar o feedback: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>