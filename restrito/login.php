<?php
session_start();
include '../backend/conexao.php'; // Inclua a conexão ao banco

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta segura usando prepared statements
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username); // Evita injeção SQL
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verifica a senha usando password_verify
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true; // Cria a sessão
            header("Location: ../backend/admin.php"); // Redireciona para a página do admin
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login - Admin</title>
</head>

<body>
    <div class="container">
        <h1>Login Admin</h1>
        <?php if (isset($erro)): ?>
            <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <button onclick="window.location.href='/desenvolvimento/inicio.html'">Voltar ao inicio</button>

        </form>
    </div>
</body>

</html>