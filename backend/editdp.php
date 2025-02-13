<?php
// Inclua a conexão com o banco de dados
include '../backend/conexao.php';

// Verifica se foi passado um ID pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar os dados da denúncia
    $sql = "SELECT * FROM depoimentos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $depoimento = $result->fetch_assoc();
    } else {
        echo "depoimento não encontrado.";
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];
    $data_envio = $_POST['data_envio'];

    // Atualiza os dados da depoimento no banco
    $sql = "UPDATE depoimentos SET nome = '$nome', mensagem = '$mensagem', data_envio = '$data_envio' WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Depoimento atualizada com sucesso.";
        header("Location: admin.php");
        exit;
    } else {
        echo "Erro ao atualizar o depoimento: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar.css">
    <title>Editar Depoimento</title>
</head>
<body>
    <div class="geral">
    <div class="container">
    <form method="POST">
        <label for="nome">Nome:</label><br>
        <textarea name="nome" id="nome" rows="4" required><?php echo $nome['nome']; ?></textarea><br><br>

        <label for="mensagem">mensagem:</label><br>
        <input type="text" name="mensagem" id="mensagem" value="<?php echo $denuncia['mensagem']; ?>" required><br><br>


        <button type="submit" ><a href="gerenciar_depoimento.php">Salvar Alterações</a></button>
         
        <a href="../admin.php">Cancelar</a>
    </form>
    </div>

    </div>
</body>
</html>