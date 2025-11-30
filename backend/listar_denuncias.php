<?php
include 'conexao.php';
require_once("chave_criptografia.php");

// Função para descriptografar
function descriptografar($texto) {
    return $texto ? openssl_decrypt($texto, 'AES-256-CBC', CHAVE_CRIPTO, 0, IV_CRIPTO) : null;
}

$sql = "SELECT * FROM denuncias ORDER BY data_envio ASC";
$result = $conn->query($sql);

$contador = 1;

if ($result === false) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $status_raw = strtolower(trim($row['status']));
        if ($status_raw === 'finalizada') $status_raw = 'resolvida';

        echo "<tr>";
        echo "<td>" . $contador . "</td>"; 
       echo "<td data-label='Nome'>" . (empty($row['nome']) ? "Anônimo" : htmlspecialchars($row['nome'])) . "</td>";
       $descricaoCompleta = $row['descricao'];
       $descricaoResumida = substr($descricaoCompleta, 0, 60) . "...";
        echo "<td data-label='Descrição'>{$descricaoResumida}</td>";  
        echo "<td data-label='Localizacao'>" . htmlspecialchars($row['localizacao']) . "</td>";
       $contato = descriptografar($row["contato"]);
       echo "<td data-label='Contato'>" . htmlspecialchars($contato) . "</td>";

        echo "<td data-label='Data'>{$row['data_envio']}</td>";

        

        echo "<td data-label='Status'>
                <span class='status' data-status='{$status_raw}'>" . htmlspecialchars($status_raw) . "</span>
              </td>";

        echo "<td data-label='Ações'>
                <a class='acao-ver' href='denuncia_view.php?id={$row['id']}'>Ver</a>
              </td>";

        echo "</tr>";

        $contador++;
    }
} else {
    echo "<tr><td colspan='8'>Nenhuma denúncia encontrada.</td></tr>";
}


$conn->close();
?>
