<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conexao.php';

// Query para buscar todas as denúncias ordenadas pela data mais recente
$sql = "SELECT * FROM denuncias ORDER BY data_envio DESC";

// Executa a query
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

// Verifica se existem registros
if ($result->num_rows > 0) {
    // Loop para exibir cada denúncia como uma linha na tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='Id'>{$row['id']}</td>"; // ID da denúncia
         echo "<td data-label='Nome'>{$row['nome']}</td>"; // Descrição
        echo "<td data-label='Descricao'>{$row['descricao']}</td>"; // Descrição
        echo "<td data-label='Localizacao'>{$row['localizacao']}</td>"; // Localização
        echo "<td data-label='contato'>{$row['contato']}</td>";
        echo "<td data-label='Data'>{$row['data_envio']}</td>"; // Data da denúncia
        echo "<td data-label='Status'>{$row['status']}</td>";
        echo "<td>

                <a  href='editar.php?id={$row['id']}'>Editar</a> | 
                <a href='deletar.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir esta denúncia?\");'>Excluir</a>
              </td>"; // Ações de editar e excluir
        echo "</tr>";
    }
} else {
    // Exibe uma mensagem se não houver denúncias
    echo "<tr><td colspan='5'>Nenhuma denúncia encontrada.</td></tr>";
}

// Fecha a conexão com o banco de dados
$conn->close();
