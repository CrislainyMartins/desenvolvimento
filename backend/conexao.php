<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root"; // Altere para o usuário do seu banco
$password = ""; // Adicione a senha do banco
$dbname = "denuncias_db";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die(("erro na conexão" . $conn->connect_error));}
    else{
        //echo"conexão realizada";

    }

?>