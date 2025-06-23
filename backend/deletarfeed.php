<?php
include 'conexao.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM feedbacks WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Reorganiza os IDs sequencialmente
        $conn->query("SET @count = 0");
        $conn->query("UPDATE feedbacks SET id = (@count := @count + 1)");
        $conn->query("ALTER TABLE feedbacks AUTO_INCREMENT = 1");

        header("Location: gerenciar_feedback.php");
        exit;
    } else {
        echo "Erro ao excluir o feedback: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();
?>
