<?php
// Inclua o arquivo de conexão com o banco de dados
include 'conexao.php';

// Query para buscar todas as denúncias ordenadas pela data mais recente
$sql = "SELECT * FROM depoimentos ORDER BY data_envio ASC";

// Executa a query
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}
$contador = 1;

// Verifica se existem registros
if ($result->num_rows > 0) {
    // Loop para exibir cada depoimento como uma linha na tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $contador . "</td>"; 
        echo "<td data-label='Nome'>" . (empty($row['nome']) ? "Anônimo" : htmlspecialchars($row['nome'])) . "</td>";
           $mensagemCompleta = $row['mensagem'];
       $mensagemResumida = substr($mensagemCompleta, 0, 100) . "...";
        echo "<td data-label='Mensagem'>{$mensagemResumida}</td>";  
        echo "<td data-label='Data'>{$row['data_envio']}</td>"; // Data da depoimento
        echo "<td>

             
                <a href='deletardp.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir este depoimento?\");'>Excluir</a>
              </td>"; 
        echo "</tr>";

        $contador++;
    }
} else {
    // Exibe uma mensagem se não houver depoimento
    echo "<tr><td colspan='5'>Nenhum depoimento encontrado.</td></tr>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>