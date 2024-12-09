<?php
include 'conexao.php'; // Inclua o arquivo de conexão

// Consultar denúncias do banco de dados
$sql = "SELECT id, descricao, localizacao, data FROM denuncias ORDER BY data DESC LIMIT 20";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['localizacao']}</td>
            <td>{$row['data']}</td>
            <td>{$row['status']}</td>
            <td class='action-buttons'>
                <button class='approve-btn' onclick='aprovarDenuncia({$row['id']})'>Aprovar</button>
                <button class='delete-btn' onclick='excluirDenuncia({$row['id']})'>Excluir</button>
            </td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='5'>Nenhuma denúncia encontrada.</td></tr>";
}

$conn->close();
?>
