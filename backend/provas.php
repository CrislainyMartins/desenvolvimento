<?php
include '../backend/conexao.php';


// Função para buscar as mídias
function buscarMidias() {
    global $conn;
    $sql = "SELECT id, nome, arquivo FROM denuncias";
    $result = $conn->query($sql);

    $midias = [];
    if ($result->num_rows > 0) {
        // Armazenando as mídias em um array
        while($row = $result->fetch_assoc()) {
            $midias[] = $row;
        }
    }
    return $midias;
}

// Fechar a conexão com o banco de dados
//$conn->close();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Mídias</title>
    <style>
        .media-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .media-item {
            width: 200px;
            margin: 10px;
        }
        img, video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Galeria de Mídias</h1>
    <div class="media-container">
        <?php
        // Buscar as mídias
        $midias = buscarMidias();

        // Exibir as mídias
        foreach ($midias as $midia) {
            $arquivo = $midia['arquivo'];
            $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
            echo '<div class="media-item">';
            if (in_array($extensao, ['.jpg', '.jpeg', '.png', '.gif'])) {
                echo "<img src='$arquivo' alt='{$midia['nome']}'>";
            } elseif (in_array($extensao, ['mp4', 'webm', 'ogg'])) {
                echo "<video controls><source src='$arquivo' type='video/$extensao'></video>";
            } else {
                echo "<p>Formato não suportado</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
