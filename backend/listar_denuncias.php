<?php
include 'conexao.php';

$sql = "SELECT * FROM denuncias ORDER BY data_envio DESC";
$result = $conn->query($sql);

if ($result === false) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // normalize status (opcional): mapear variações para um valor único
        $status_raw = strtolower(trim($row['status']));
        // se no banco tiver "finalizada" e você quer "resolvida", ajuste aqui:
        if ($status_raw === 'finalizada') $status_raw = 'resolvida';

        echo "<tr>";
        echo "<td data-label='Id'>{$row['id']}</td>";
        echo "<td data-label='Nome'>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td data-label='Descricao'>" . htmlspecialchars($row['descricao']) . "</td>";
        echo "<td data-label='Localizacao'>" . htmlspecialchars($row['localizacao']) . "</td>";
        echo "<td data-label='Contato'>" . htmlspecialchars($row['contato']) . "</td>";
        echo "<td data-label='Data'>{$row['data_envio']}</td>";

        // status com badge (classe "status" e atributo data-status)
        echo "<td data-label='Status'>
                <span class='status' data-status='{$status_raw}'>" . htmlspecialchars($status_raw) . "</span>
              </td>";

        // ação: ver
        echo "<td data-label='Ações'>
                <a class='acao-ver' href='ver.php?id={$row['id']}'>Ver</a>
              </td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Nenhuma denúncia encontrada.</td></tr>";
}

$conn->close();
?>
