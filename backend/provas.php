<?php
include '../backend/conexao.php';




// Função para buscar as mídias
function buscarMidias()
{
    global $conn;
    $sql = "SELECT id, nome, arquivo FROM denuncias";
    $result = $conn->query($sql);

    $midias = [];
    if ($result->num_rows > 0) {
        // Armazenando as mídias em um array
        while ($row = $result->fetch_assoc()) {
            $midias[] = $row;
        }
    }
    return $midias;
}

// Fechar a conexão com o banco de dados
//$conn->close();


include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Provas das Denúncias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .prova {
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .prova img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        .mensagem {
            text-align: center;
            font-style: italic;
            color: #666;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #6200ee;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }
    </style>
</head>

<body>

    <h2>Prova da Denúncia</h2>
    <div class="container">

        <?php
        $id = $_GET['id'] ?? 0;

        // Buscar apenas a prova da denúncia selecionada
        $stmt = $conn->prepare("
    SELECT descricao, data_envio, arquivo 
    FROM denuncias 
    WHERE id = ? AND arquivo IS NOT NULL AND arquivo != ''
");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();


        if (!$result) {
            echo "<p class='mensagem'>Erro na consulta: " . $conn->error . "</p>";
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='prova'>";
                echo "<strong>Descrição:</strong> " . htmlspecialchars($row['descricao']) . "<br>";
                echo "<strong>Data:</strong> " . htmlspecialchars($row['data_envio']) . "<br>";
                echo "<strong>Prova:</strong><br>";

                $arquivo = htmlspecialchars($row['arquivo']);
                $ext = pathinfo($arquivo, PATHINFO_EXTENSION);
                $caminho = "http://localhost/desenvolvimento/backend/uploads/$arquivo";
                /*
                echo "Caminho da imagem: $caminho<br>";*/

                if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    echo "<img src='$caminho' alt='Prova da denúncia'>";
                } else {
                    echo "<a href='$caminho' download>Download da prova</a>";
                }


                echo "</div>";
            }
        } else {
            echo "<p class='mensagem'>Nenhuma prova enviada.</p>";
        }

        $conn->close();
        ?>


    </div>


    <a href='admin.php?id={$row["id"]}'>
        <button>Voltar</button>
    </a>

</body>

</html>