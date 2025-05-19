<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Feedbacks</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
    
      color: black;
    }

    tr:nth-child(even) td {
     
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #6200ee;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      transition: transform 0.2s ease-in-out, background-color 0.3s;
    }

    .back-button:hover {
      transform: scale(1.05);
      background-color: #3700b3;
    }

    #cor-roxa{
        background-color:  #6200ee;
        color:white;
    
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Feedback dos Usuários</h1>

    <table>
      <thead>
        <tr>
          <th id="cor-roxa">Nome</th>
          <th id="cor-roxa">Avaliação (1-10)</th>
          <th id="cor-roxa">O que deve ser melhorado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João</td>
          <td>8</td>
          <td>Tempo de carregamento</td>
        </tr>
        <tr>
          <td></td>
          <td>5</td>
          <td>Design da interface</td>
        </tr>
        <tr>
          <td>Ana</td>
          <td>9</td>
          <td>Nada, tudo ótimo!</td>
        </tr>
        <!-- Adicione mais linhas conforme necessário -->
      </tbody>
    </table>

    <a href="admin.html" class="back-button">← Voltar</a>
  </div>
</body>
</html>
