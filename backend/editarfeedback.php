<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conexao.php';

// Query para buscar todas as denúncias ordenadas pela data mais recente
$sql = "SELECT * FROM feedbacks ORDER BY data_envio DESC";

// Executa a query
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

// Verifica se existem registros
if ($result->num_rows > 0) {
    // Loop para exibir cada depoimento como uma linha na tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='Id'>{$row['id']}</td>"; // ID da depoimento
        echo "<td data-label='Nome'>{$row['nome']}</td>"; // nome
        echo "<td data-label='Avaliação'>{$row['avaliacao']}</td>"; // texto do depoimento
        echo "<td data-label='sugestão'>{$row['sugestao']}</td>"; // Data da depoimento
        echo "<td>

                
                <a href='deletarfeed.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir este depoimento?\");'>Excluir</a>
              </td>"; // Ações de editar e excluir
        echo "</tr>";
    }
} else {
    // Exibe uma mensagem se não houver depoimento
    echo "<tr><td colspan='5'>Nenhum feedback encontrado.</td></tr>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>