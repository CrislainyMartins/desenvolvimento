<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../restrito/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="topbar">
        <h2>Painel Administrativo</h2>

        <div class="topbar-actions">
            <a href="../backend/gerenciar_depoimento.php" class="btn-topbar">Depoimentos</a>
            <a href="../backend/gerenciar_feedback.php" class="btn-topbar">Feedbacks</a>
            <a href="../restrito/logout.php" class="btn-logout">Sair</a>
        </div>
    </div>

    <div class="container">
             <h1>Gerenciamento de Denúncias</h1>
        <!-- Cards de contagem -->
        <div class="cards">
            <div class="card">
                <h3>Pendentes</h3>
                <p id="count-pendentes">0</p>
            </div>

            <div class="card">
                <h3>Em Análise</h3>
                <p id="count-analise">0</p>
            </div>

            <div class="card">
                <h3>Resolvidas</h3>
                <p id="count-resolvidas">0</p>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filtros">
            <input type="text" id="busca" placeholder="Buscar por nome, localização ou descrição...">

          <select id="filtroStatus">
    <option value="">Todos os status</option>
    <option value="pendente">Pendente</option>
    <option value="analise">Em análise</option>
    <option value="resolvida">Resolvida</option>
</select>

        </div>

        <!-- Tabela -->
        <div class="tabela-container">
       
            <table id="tabela">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Localização</th>
                        <th>Contato</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody id="lista-denuncias">
                    <?php include("../backend/listar_denuncias.php"); ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>
        // ------- FILTRO DE BUSCA -------
        document.getElementById("busca").addEventListener("keyup", function () {
            let filtro = this.value.toLowerCase();
            let linhas = document.querySelectorAll("#lista-denuncias tr");

            linhas.forEach(linha => {
                let texto = linha.innerText.toLowerCase();
                linha.style.display = texto.includes(filtro) ? "" : "none";
            });
        });

     // ------- FILTRAR POR STATUS -------
document.getElementById("filtroStatus").addEventListener("change", function () {
    const filtro = (this.value || '').toString().trim().toLowerCase();
    const linhas = document.querySelectorAll("#lista-denuncias tr");

    linhas.forEach(linha => {
        const statusSpan = linha.querySelector(".status");
        const status = statusSpan ? statusSpan.dataset.status.toString().trim().toLowerCase() : '';

        if (!filtro || filtro === status) {
            linha.style.display = "";
        } else {
            linha.style.display = "none";
        }
    });
});


        // ------- CONTAR STATUS -------
        function atualizarContadores() {
            let pendentes = 0, analise = 0, resolvidas = 0;
            let statusList = document.querySelectorAll(".status");

            statusList.forEach(s => {
                switch (s.dataset.status) {
                    case "pendente": pendentes++; break;
                    case "analise": analise++; break;
                    case "resolvida": resolvidas++; break;
                }
            });

            document.getElementById("count-pendentes").innerText = pendentes;
            document.getElementById("count-analise").innerText = analise;
            document.getElementById("count-resolvidas").innerText = resolvidas;
        }

        atualizarContadores();
    </script>

</body>

</html>
