<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="css/admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Denúncias</title>
    
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Denúncias</h1>
   
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Localização</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../desenvolvimento/backend/listar_denuncias.php");
                ?>
                
                <!-- Denúncias serão exibidas aqui dinamicamente -->
            </tbody>
        </table>
    </div>


    <script>
        // Função para aprovar denúncia
function aprovarDenuncia(id) {
    if (confirm("Tem certeza de que deseja aprovar esta denúncia?")) {
        // Envia uma requisição POST para o servidor
        fetch('../desenvolvimento/backend/acoes_denuncia.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: id=${id}&acao==aprovar
        })
        .then(response => response.text())
        .then(data => {
            alert("Denúncia aprovada com sucesso!");
            location.reload(); // Recarrega a página para atualizar a lista
        })
        .catch(error => {
            alert("Erro ao aprovar a denúncia: " + error);
        });
    }
}

// Função para excluir denúncia
function excluirDenuncia(id) {
    if (confirm("Tem certeza de que deseja excluir esta denúncia?")) {
        // Envia uma requisição POST para o servidor
        fetch('../desenvolvimento/backend/acoes_denuncia.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: id=${id}&acao=excluir
        })
        .then(response => response.text())
        .then(data => {
            alert("Denúncia excluída com sucesso!");
            location.reload(); // Recarrega a página para atualizar a lista
        })
        .catch(error => {
            alert("Erro ao excluir a denúncia: " + error);
        });
    }
}
        
        </script>
        
</body>
</html>