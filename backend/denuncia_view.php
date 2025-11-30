<?php
// Verifica se o usuário está logado como admin

include '../backend/conexao.php';

// Obtém o ID da denúncia
$id = $_GET['id'] ?? 0;
// Busca a denúncia no banco de dados e usa prepared statements para evitar SQL Injection
$stmt = $conn->prepare("SELECT * FROM denuncias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resp = $stmt->get_result();
// Verifica se a denúncia existe
if($resp->num_rows == 0){
    die("Denúncia não encontrada.");
}

$d = $resp->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da denúncia</title>
    <link rel="stylesheet" href="../css/denunciaView.css">
</head>
<body>
    <section class="geral">
            
<!-- Detalhes da denúncia -->
<h1>Denúncia #<?= $d['id'] ?></h1>



<p><strong>Nome:</strong> <?= $d['nome'] ?></p>
<p><strong>Descrição:</strong> <?= nl2br($d['descricao']) ?></p>
<p><strong>Localização:</strong> <?= $d['localizacao'] ?></p>
<p><strong>Contato:</strong> <?= $d['contato'] ?></p>
<p><strong>Data:</strong> <?= $d['data_envio'] ?></p>
<p><strong>Status atual:</strong> <?= $d['status'] ?></p>

<hr>

<h2>Alterar Status</h2>

<form action="../backend/mudar_status.php" method="POST">
    <input type="hidden" name="id" value="<?= $d['id'] ?>">

    <select name="status">
        <option value="pendente"  <?= $d['status']=="pendente"?"selected":"" ?>>Pendente</option>
        <option value="analise"   <?= $d['status']=="analise" ?"selected":"" ?>>Em Análise</option>
        <option value="resolvida" <?= $d['status']=="resolvida" ?"selected":"" ?>>Resolvida</option>
    </select>

    <button type="submit">Salvar</button>
    <a href="admin.php">Voltar</a>
</form>

<br>


</section>
</body>
</html>