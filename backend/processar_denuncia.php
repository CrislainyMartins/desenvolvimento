<?php
require_once('../backend/conexao.php');
// Diretório para salvar os arquivos
$uploadDir = "uploads/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Variáveis do formulário
$nome = $_POST['nome'] ?? null;
$descricao = $_POST['descricao'] ?? null;
$localizacao = $_POST['localizacao'] ?? null;
$contato = $_POST['contato'] ?? null;
$arquivo = null;

// Processar upload de arquivo
if (isset($_FILES['provas']) && $_FILES['provas']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['provas']['tmp_name'];
    $fileName = time() . "_" . basename($_FILES['provas']['name']);
    $destPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpPath, $destPath)) {
        $arquivo = $fileName;
    } else {
        die("Erro ao fazer upload do arquivo.");
    }
}

// Inserir dados no banco de dados
$sql = "INSERT INTO denuncias (nome, descricao, localizacao, contato, arquivo)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $descricao, $localizacao, $contato, $arquivo);

if ($stmt->execute()) {
    //echo "Denúncia enviada com sucesso!";
    echo "Denúncia enviada com sucesso.";

    header("Location: /desenvolvimento/formulario.html");
    exit;
} else {
    echo "Erro ao enviar denúncia: " . $stmt->error;
}


// Fechar conexão
$stmt->close();
$conn->close();
