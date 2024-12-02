<?php
include('conexao.php'); // Conexão com o banco de dados

// Consulta para buscar os 6 depoimentos mais recentes
$sql = "SELECT nome, mensagem, data_envio FROM depoimentos ORDER BY data_envio DESC LIMIT 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<h3>' . htmlspecialchars($row['nome'] ?: 'Anônimo') . '</h3>';
        echo '<p>' . htmlspecialchars($row['mensagem']) . '</p>';
        echo '<small>Enviado em: ' . htmlspecialchars($row['data_envio']) . '</small>';
        echo '</div>';
    }
} else {
    echo '<p>Nenhum depoimento encontrado.</p>';
}

$conn->close();
?>