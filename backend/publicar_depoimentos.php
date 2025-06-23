<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? 'Anônimo'; // Nome opcional
    $mensagem = $_POST['mensagem'] ?? '';

    // Validar a mensagem
    if (trim($mensagem) === '') {
        die("A mensagem não pode estar vazia.");
    }

    // Inserir no banco de dados
    $sql = "INSERT INTO depoimentos (nome, mensagem) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $mensagem);

    if ($stmt->execute()) {
        echo "Depoimento enviado com sucesso!";
    } else {
        echo "Erro ao enviar o depoimento: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>