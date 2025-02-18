<?php
session_start();

// Verifica se o usuário está logado como admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../restrito/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="../css/admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Denúncias</title>

</head>

<body>
    <div class="container"><!--Inicio da tabela de denuncias-->
        <h1>Gerenciamento de Denúncias</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Localização</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include("../backend/listar_denuncias.php");
                ?>

                <!-- Denúncias serão exibidas aqui dinamicamente -->
            </tbody>
        </table>

        <!--botão de sair admin-->
        <div class="botoes">

            <!--Botão de gerenciar depoimentos-->
            <a href="../gerenciar_depoimento.php">
                <button>
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                        <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
                    </svg>
                    <span>Gerenciar depoimentos</span>
                </button>
            </a>

            <a href="../restrito/logout.php"><button>
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                        <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
                    </svg>
                    <span>Sair</span>
                </button></a>
            <!--Fim do botão de sair admin-->


        </div>
        <!--Fim do botão de gerenciar depoimentos-->


        <!--<a href="restrito/logout.php" style="text-decoration: none; color: red; font-weight: bold; margin-left:400px; margin-top:-40px;">Sair</a>-->


    </div><!--Fim da tabela de denuncias-->






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
                        body: id = $ {
                            id
                        } & acao == aprovar
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
                        body: id = $ {
                            id
                        } & acao = excluir
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