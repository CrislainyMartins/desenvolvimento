<?php


require_once('../backend/conexao.php');
require_once('../backend/chave_criptografia.php');

function limparEntrada($data) {
    return htmlspecialchars(trim(strip_tags($data)), ENT_QUOTES, 'UTF-8');
}

// Campos opcionais
$nome    = isset($_POST['nome']) && $_POST['nome'] !== '' ? limparEntrada($_POST['nome']) : null;
$contato = isset($_POST['contato']) && $_POST['contato'] !== '' ? limparEntrada($_POST['contato']) : null;

// Campos obrigatórios
if (empty($_POST['descricao']) || empty($_POST['localizacao'])) {
    die("Descrição e localização são obrigatórias.");
}

$descricao   = limparEntrada($_POST['descricao']);
$localizacao = limparEntrada($_POST['localizacao']);

// Diretório de upload
$uploadDir = "uploads/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Upload de arquivo
$arquivo = null;

if (!empty($_FILES['provas']) && $_FILES['provas']['error'] === UPLOAD_ERR_OK) {

    $tmp = $_FILES['provas']['tmp_name'];

    $allowedMime = ['image/jpeg', 'image/png', 'application/pdf'];
    $mime = mime_content_type($tmp);

    if (!in_array($mime, $allowedMime)) {
        die("Tipo de arquivo não permitido.");
    }

    if ($_FILES['provas']['size'] > 5 * 1024 * 1024) {
        die("Arquivo muito grande. Máximo: 5MB.");
    }

    // Nome aleatório
    $ext = strtolower(pathinfo($_FILES['provas']['name'], PATHINFO_EXTENSION));
    $fileName = time() . "_" . bin2hex(random_bytes(8)) . "." . $ext;

    if (move_uploaded_file($tmp, $uploadDir . $fileName)) {
        $arquivo = $fileName;
    } else {
        die("Erro ao mover o arquivo.");
    }
}

// Criptografia
function criptografar($texto) {
    return openssl_encrypt($texto, 'AES-256-CBC', CHAVE_CRIPTO, 0, IV_CRIPTO);
}

$contatoCriptografado = $contato ? criptografar($contato) : null;

// Inserção no banco
$sql = "INSERT INTO denuncias (nome, descricao, localizacao, contato, arquivo)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro no prepare: " . $conn->error);
}

$stmt->bind_param("sssss", $nome, $descricao, $localizacao, $contatoCriptografado, $arquivo);

if ($stmt->execute()) {
    header("Location: ../index.html?sucesso=1");
    exit;
} else {
    die("Erro ao enviar denúncia: " . $stmt->error);
}

?>
