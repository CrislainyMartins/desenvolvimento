<?php
session_start();
include 'conexao.php';
//Apenas o admin pode acessar esta página
if (empty($_SESSION['admin'])) {
    http_response_code(403);
    exit("Acesso negado.");
}


$sql = "SELECT id, descricao, localizacao, data, status 
        FROM denuncias 
        WHERE status = 'pendente'
        ORDER BY data_envio DESC LIMIT 20";

$result = $conn->query($sql);        

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $conn->close();
     exit();
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

if(!$id){
    exit("ID inválido.");
}

$acoes=[
    'aprovar' => "UPDATE denuncias SET status = 'aprovada' WHERE id = ?", 
    'excluir' => "DELETE FROM denuncias WHERE id = ?"
];
   
if(!isset($acoes[$acao])){
    exit("Ação inválida.");
}

$stmt = $conn->prepare($acoes[$acao]);
$stmt->bind_param("i", $id);


echo $stmt->execute() ? "Ação realizada com sucesso!" : "Erro ao processar ação.";
     
$stmt->close();
$conn->close();

?>