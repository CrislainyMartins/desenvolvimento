<?php
// Inclua a conexão com o banco de dados
include '../backend/conexao.php';

// Verifica se foi passado um ID pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar os dados da denúncia
    $sql = "SELECT * FROM denuncias WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $denuncia = $result->fetch_assoc();
    } else {
        echo "Denúncia não encontrada.";
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $localizacao = $_POST['localizacao'];
    $arquivo=$_POST['arquivo'];
    $status = $_POST['status'];

    // Atualiza os dados da denúncia no banco
    $sql = "UPDATE denuncias SET descricao = '$descricao', localizacao = '$localizacao', arquivo = '$arquivo',status = '$status' WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Denúncia atualizada com sucesso.";
        header("Location: admin.php");
        exit;
    } else {
        echo "Erro ao atualizar a denúncia: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar.css">
    <title>Editar Denúncia</title>
</head>

<body>
    <div class="geral">
        <div class="container">
            <form method="POST">
                <label for="descricao">Descrição:</label><br>
                <textarea name="descricao" id="descricao" rows="4" required><?php echo $denuncia['descricao']; ?></textarea><br><br>

                <label for="localizacao">Localização:</label><br>
                <input type="text" name="localizacao" id="localizacao" value="<?php echo $denuncia['localizacao']; ?>" required><br><br>

                <button><a href="provas.php">Ver provas</a></button><!--ajeitar-->

                <label for="status">Status:</label><br>
                <select name="status" id="status" required>
                    <option value="Pendente" <?php echo $denuncia['status'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
                    <option value="Resolvido" <?php echo $denuncia['status'] == 'Resolvido' ? 'selected' : ''; ?>>Resolvido</option>
                </select><br><br>

                <button type="submit" onclick="window.location.href='admin.php'">Salvar Alterações</button><!--ajeitar-->

                <a href="../admin.php">Cancelar</a>
            </form>
        </div>

    </div>
</body>

</html>